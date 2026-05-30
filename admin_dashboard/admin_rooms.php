<?php
// ==========================================
// 0. BACKEND ROOM DELETION LOGIC (NEW)
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_delete_room'])) {
    $room_id = intval($_POST['room_id']);
    
    $stmt = $conn->prepare("DELETE FROM tbl_roomdetails WHERE room_id = ?");
    $stmt->bind_param("i", $room_id);
    
    if ($stmt->execute()) {
        if (isset($_SESSION['GBid'])) {
            $user_id = $_SESSION['GBid'];
            $log_action = "Permanently Deleted Room ID #$room_id";
            $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
        }
        echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
                <strong>Success!</strong> Room record successfully deleted.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert">
                <strong>Database Error!</strong> Cannot delete room. It is likely linked to active guest reservations.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    }
}

// ==========================================
// 1. BACKEND ROOM ADDITION LOGIC
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_save_room'])) {
    $room_number = intval($_POST['room_number']);
    $room_type = $conn->real_escape_string($_POST['room_type']);
    $availability_status = "Available";

    if ($room_type === "Standard") {
        $description = "Enjoy comfort and simplicity in our thoughtfully designed Standard Room.";
        $capacity = 2; $price = 4500.00;
    } elseif ($room_type === "Deluxe") {
        $description = "Upgrade your stay with our Deluxe Room, featuring a more spacious layout.";
        $capacity = 4; $price = 8599.00;
    } elseif ($room_type === "Suite") {
        $description = "Experience premium luxury in our Suite Room, designed for maximum family comfort.";
        $capacity = 8; $price = 14999.00;
    }

    $check_room = $conn->query("SELECT * FROM tbl_roomdetails WHERE room_number = $room_number");
    if ($check_room->num_rows > 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert">
                <strong>Error!</strong> Room Number '.$room_number.' already exists.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    } else {
        $insert_sql = "INSERT INTO tbl_roomdetails (room_number, room_type, description, capacity, price_per_night, availability_status) 
                       VALUES ($room_number, '$room_type', '$description', $capacity, $price, '$availability_status')";
        if ($conn->query($insert_sql)) {
            if (isset($_SESSION['GBid'])) {
                $user_id = $_SESSION['GBid'];
                $log_action = "Added a new $room_type Room (#$room_number)";
                $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
            }
            echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
                    <strong>Success!</strong> Room #'.$room_number.' successfully deployed.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>';
        }
    }
}

// ==========================================
// 2. BACKEND ROOM UPDATE (EDIT) LOGIC
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_update_room'])) {
    $room_id = intval($_POST['room_id']);
    $room_number = intval($_POST['room_number']);
    $room_type = $conn->real_escape_string($_POST['room_type']);
    $availability_status = $conn->real_escape_string($_POST['availability_status']);

    if ($room_type === "Standard") {
        $description = "Enjoy comfort and simplicity in our thoughtfully designed Standard Room.";
        $capacity = 2; $price = 4500.00;
    } elseif ($room_type === "Deluxe") {
        $description = "Upgrade your stay with our Deluxe Room, featuring a more spacious layout.";
        $capacity = 4; $price = 8599.00;
    } elseif ($room_type === "Suite") {
        $description = "Experience premium luxury in our Suite Room, designed for maximum family comfort.";
        $capacity = 8; $price = 14999.00;
    }

    $check_room = $conn->query("SELECT * FROM tbl_roomdetails WHERE room_number = $room_number AND room_id != $room_id");
    if ($check_room->num_rows > 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert">
                <strong>Error!</strong> Cannot update. Room Number '.$room_number.' is already assigned to another room.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    } else {
        $update_sql = "UPDATE tbl_roomdetails SET 
                        room_number = $room_number, 
                        room_type = '$room_type', 
                        description = '$description', 
                        capacity = $capacity, 
                        price_per_night = $price, 
                        availability_status = '$availability_status' 
                       WHERE room_id = $room_id";
        
        if ($conn->query($update_sql)) {
            if (isset($_SESSION['GBid'])) {
                $user_id = $_SESSION['GBid'];
                $log_action = "Updated Room ID #$room_id (Now Room #$room_number, Tier: $room_type, Status: $availability_status)";
                $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
            }
            echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
                    <strong>Success!</strong> Room #'.$room_number.' changes saved successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>';
        }
    }
}

// ==========================================
// 3. SEARCH FILTRATION PROCESSING
// ==========================================
$search_query = "";
$rooms_sql = "SELECT * FROM tbl_roomdetails";
if (isset($_POST['btnsearch']) && !empty($_POST['searchinput'])) {
    $search_query = $conn->real_escape_string($_POST['searchinput']);
    $rooms_sql .= " WHERE room_id LIKE '%$search_query%' 
                    OR room_number LIKE '%$search_query%' 
                    OR room_type LIKE '%$search_query%' 
                    OR description LIKE '%$search_query%' 
                    OR availability_status LIKE '%$search_query%'";
}
$rooms_sql .= " ORDER BY room_id DESC";
$rooms = $conn->query($rooms_sql);
?>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div class="font-title text-darkbrown fs-2 fw-bold">Room Management</div>
    
    <div class="d-flex gap-2 w-100 mobile-w-auto justify-content-md-end" style="max-width: 600px;">
        <form method="POST" action="" class="d-flex gap-2 flex-grow-1">
            <input type="search" name="searchinput" value="<?php echo isset($_POST['searchinput']) ? htmlspecialchars($_POST['searchinput']) : ''; ?>" placeholder="Search rooms..." class="form-control rounded-pill border-secondary shadow-sm">
            <button type="submit" name="btnsearch" class="btn pink-button text-dark px-4 rounded-pill fw-semibold shadow-sm">Search</button>
        </form>
        <button type="button" class="btn btn-dark bg-darkbrown text-white px-4 rounded-pill fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#addRoomModal">
            + Add Room
        </button>
    </div>
</div>

<div class="bg-white rounded-4 shadow-sm p-4">
    <?php if ($rooms->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Room Number</th>
                        <th>Room Type</th>
                        <th>Description</th>
                        <th>Capacity</th>
                        <th>Price/Night</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($room = $rooms->fetch_assoc()) { ?>
                    <tr>
                        <td>#<?php echo $room['room_id']; ?></td>
                        <td><?php echo htmlspecialchars($room['room_number']); ?></td>
                        <td class="fw-bold"><?php echo htmlspecialchars($room['room_type']); ?></td>
                        <td><small class="text-muted"><?php echo htmlspecialchars($room['description']); ?></small></td>
                        <td><?php echo htmlspecialchars($room['capacity']); ?> Guests</td>
                        <td>₱<?php echo number_format($room['price_per_night'], 2); ?></td>
                        <td>
                            <?php if($room['availability_status'] == 'Available'): ?>
                                <span class="badge bg-success rounded-pill px-3 py-2">Available</span>
                            <?php else: ?>
                                <span class="badge bg-danger rounded-pill px-3 py-2"><?php echo htmlspecialchars($room['availability_status']); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="text-end">
                            <div class="d-inline-flex gap-2">
                                <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#editRoomModal_<?php echo $room['room_id']; ?>">
                                    Edit
                                </button>
                                
                                <form method="POST" action="" onsubmit="return confirm('Are you sure you want to delete Room #<?php echo $room['room_number']; ?>?');" class="m-0">
                                    <input type="hidden" name="room_id" value="<?php echo $room['room_id']; ?>">
                                    <button type="submit" name="btn_delete_room" class="btn btn-sm btn-danger rounded-pill px-3">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="editRoomModal_<?php echo $room['room_id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded-4 border-0 shadow-lg">
                                <div class="modal-header bg-primary text-white py-3">
                                    <h5 class="modal-title font-title fw-bold">Edit Room Config Details</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="POST" action="">
                                    <div class="modal-body p-4">
                                        <input type="hidden" name="room_id" value="<?php echo $room['room_id']; ?>">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold text-dark">Room Number</label>
                                            <input type="number" name="room_number" value="<?php echo htmlspecialchars($room['room_number']); ?>" class="form-control rounded-3" required min="1">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold text-dark">Room Configuration Tier</label>
                                            <select name="room_type" class="form-select rounded-3" required>
                                                <option value="Standard" <?php echo ($room['room_type'] == 'Standard') ? 'selected' : ''; ?>>Standard Room</option>
                                                <option value="Deluxe" <?php echo ($room['room_type'] == 'Deluxe') ? 'selected' : ''; ?>>Deluxe Room</option>
                                                <option value="Suite" <?php echo ($room['room_type'] == 'Suite') ? 'selected' : ''; ?>>Suite Room</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold text-dark">Operational Status</label>
                                            <select name="availability_status" class="form-select rounded-3" required>
                                                <option value="Available" <?php echo ($room['availability_status'] == 'Available') ? 'selected' : ''; ?>>Available</option>
                                                <option value="Occupied" <?php echo ($room['availability_status'] == 'Occupied') ? 'selected' : ''; ?>>Occupied</option>
                                                <option value="Maintenance" <?php echo ($room['availability_status'] == 'Maintenance') ? 'selected' : ''; ?>>Maintenance / Out of Order</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-light border-0 py-3 rounded-bottom-4">
                                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="btn_update_room" class="btn btn-primary fw-bold rounded-pill px-4 shadow-sm">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="text-center py-4 text-muted font-body">No matching room records found.</div>
    <?php endif; ?>
</div>

<div class="modal fade" id="addRoomModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header bg-darkbrown text-white py-3">
                <h5 class="modal-title font-title fw-bold" id="addRoomModalLabel">Add New Hotel Room</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark">Room Number</label>
                        <input type="number" name="room_number" class="form-control rounded-3" placeholder="e.g., 1001" required min="1">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold text-dark">Room Configuration Tier</label>
                        <select name="room_type" class="form-select rounded-3" required>
                            <option value="" disabled selected>-- Select Tier Level --</option>
                            <option value="Standard">Standard Room (₱4,500.00 / 2 Guests)</option>
                            <option value="Deluxe">Deluxe Room (₱8,599.00 / 4 Guests)</option>
                            <option value="Suite">Suite Room (₱14,999.00 / 8 Guests)</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 py-3 rounded-bottom-4">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="btn_save_room" class="btn pink-button text-dark fw-bold rounded-pill px-4 shadow-sm">Save Room</button>
                </div>
            </form>
        </div>
    </div>
</div>