<?php
// Handle Search Logic
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
    
    <form method="POST" action="" class="d-flex gap-2 w-100 mobile-w-auto" style="max-width: 400px;">
        <input type="search" name="searchinput" value="<?php echo isset($_POST['searchinput']) ? htmlspecialchars($_POST['searchinput']) : ''; ?>" placeholder="Search rooms..." class="form-control rounded-pill border-secondary shadow-sm">
        <button type="submit" name="btnsearch" class="btn pink-button text-dark px-4 rounded-pill fw-semibold shadow-sm">Search</button>
    </form>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($room = $rooms->fetch_assoc()) { ?>
                    <tr>
                        <td>#<?php echo $room['room_id']; ?></td>
                        <td><?php echo htmlspecialchars($room['room_number']); ?></td>
                        <td class="fw-bold"><?php echo htmlspecialchars($room['room_type']); ?></td>
                        <td>
                            <?php 
                            $desc = $room['description'] ?? ''; 
                            echo htmlspecialchars(substr($desc, 0, 50)) . (strlen($desc) > 50 ? '...' : ''); 
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($room['capacity']); ?> guests</td>
                        <td>₱<?php echo number_format($room['price_per_night'], 2); ?></td>
                        <td>
                            <?php if($room['availability_status'] == 'Available'): ?>
                                <span class="badge bg-success rounded-pill px-3 py-2">Available</span>
                            <?php else: ?>
                                <span class="badge bg-danger rounded-pill px-3 py-2"><?php echo htmlspecialchars($room['availability_status']); ?></span>
                            <?php endif; ?>
                        </td>
                        <td><button class="btn btn-sm btn-outline-secondary">Edit</button></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="text-center py-4 text-muted font-body">No matching room records found.</div>
    <?php endif; ?>
</div>