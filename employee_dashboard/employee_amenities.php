<?php
// ==========================================
// 1. BACKEND AMENITY ADDITION LOGIC
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_save_amenity'])) {
    $amenity_name = $_POST['amenity_name'];
    $description = $_POST['description'];
    $price_per_use = floatval($_POST['price_per_use']);

    $insert_sql = "INSERT INTO tbl_amenitydetails (amenity_name, description, price_per_use) 
                   VALUES ('$amenity_name', '$description', $price_per_use)";
    
    if ($conn->query($insert_sql)) {
        if (isset($_SESSION['GBid'])) {
            $user_id = $_SESSION['GBid'];
            $log_action = "Created new amenity: " . $amenity_name;
            $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
        }
        echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                <strong>Success!</strong> Amenity ['.$amenity_name.'] added successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    }
}

// ==========================================
// 2. BACKEND AMENITY UPDATE (EDIT) LOGIC
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_update_amenity'])) {
    $amenity_id = $_POST['amenity_id'];
    $amenity_name = $_POST['amenity_name'];
    $description = $_POST['description'];
    $price_per_use = floatval($_POST['price_per_use']);

    $update_sql = "UPDATE tbl_amenitydetails SET 
                    amenity_name = '$amenity_name', 
                    description = '$description', 
                    price_per_use = $price_per_use 
                   WHERE amenity_id = $amenity_id";
    
    if ($conn->query($update_sql)) {
        if (isset($_SESSION['GBid'])) {
            $user_id = $_SESSION['GBid'];
            $log_action = "Modified Amenity ID #$amenity_id properties ($amenity_name)";
            $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
        }
        echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                <strong>Success!</strong> Amenity changes applied successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #2c2421; color: #fbb4b9; border-color: #fbb4b9;">
                <strong>Error:</strong> ' . $conn->error . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1) grayscale(100%) brightness(200%);"></button>
              </div>';
    }
}

// ==========================================
// 3. BACKEND AMENITY DELETION LOGIC (NEW)
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_delete_amenity'])) {
    $amenity_id = $_POST['amenity_id'];

    // Fetch the name of the amenity before deleting it for logging/auditing purposes
    $fetch_res = $conn->query("SELECT amenity_name FROM tbl_amenitydetails WHERE amenity_id = $amenity_id");
    $target_name = ($fetch_res && $fetch_res->num_rows > 0) ? $fetch_res->fetch_assoc()['amenity_name'] : "Unknown Amenity";

    $delete_sql = "DELETE FROM tbl_amenitydetails WHERE amenity_id = $amenity_id";
    
    if ($conn->query($delete_sql)) {
        if (isset($_SESSION['GBid'])) {
            $user_id = $_SESSION['GBid'];
            $log_action = "Permanently deleted Amenity Facility: " . $target_name . " (ID #$amenity_id)";
            $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
        }
        echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                <strong>Success!</strong> Amenity ['.$target_name.'] has been permanently dropped from the database.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #2c2421; color: #fbb4b9; border-color: #fbb4b9;">
                <strong>Database Error:</strong> Unable to wipe entry row. ' . $conn->error . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1) grayscale(100%) brightness(200%);"></button>
              </div>';
    }
}

// ==========================================
// 4. SEARCH FILTRATION PROCESSING
// ==========================================
$search_query = "";
$amenity_sql = "SELECT * FROM tbl_amenitydetails";
if (isset($_POST['btnsearch']) && !empty($_POST['searchinput'])) {
    $search_query = $_POST['searchinput'];
    $amenity_sql .= " WHERE amenity_id LIKE '%$search_query%' 
                      OR amenity_name LIKE '%$search_query%' 
                      OR description LIKE '%$search_query%'";
}
$amenity_sql .= " ORDER BY amenity_id DESC";
$amenities = $conn->query($amenity_sql);
?>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div class="font-title text-darkbrown fs-2 fw-bold">Amenities</div>
    
    <div class="d-flex gap-2 w-100 mobile-w-auto justify-content-md-end" style="max-width: 600px;">
        <form method="POST" action="" class="d-flex gap-2 flex-grow-1">
            <input type="search" name="searchinput" value="<?php echo isset($_POST['searchinput']) ? $_POST['searchinput'] : ''; ?>" placeholder="Search amenities..." class="form-control rounded-pill border-secondary shadow-sm">
            <button type="submit" name="btnsearch" class="btn pink-button text-dark px-4 rounded-pill fw-semibold shadow-sm">Search</button>
        </form>
        <button type="button" class="btn btn-dark bg-darkbrown text-white px-4 rounded-pill fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#addAmenityModal">
            + Add Amenity
        </button>
    </div>
</div>

<div class="bg-white rounded-4 shadow-sm p-4">
    <?php if ($amenities->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Amenity Name</th>
                        <th>Description</th>
                        <th>Price Per Use</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($amn = $amenities->fetch_assoc()) { ?>
                    <tr>
                        <td>#<?php echo $amn['amenity_id']; ?></td>
                        <td class="fw-bold"><?php echo $amn['amenity_name']; ?></td>
                        <td><?php echo $amn['description']; ?></td>
                        <td>₱<?php echo number_format($amn['price_per_use'], 2); ?></td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <button type="button" class="btn btn-sm btn-outline-dark rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#editAmenityModal_<?php echo $amn['amenity_id']; ?>">
                                    Edit
                                </button>
                                
                                <form method="POST" action="" onsubmit="return confirm('Are you completely sure you want to permanently delete the amenity \'<?php echo $amn['amenity_name']; ?>\'? This action cannot be reversed.');" class="m-0">
                                    <input type="hidden" name="amenity_id" value="<?php echo $amn['amenity_id']; ?>">
                                    <button type="submit" name="btn_delete_amenity" class="btn btn-sm btn-dark bg-darkbrown rounded-pill px-3">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="editAmenityModal_<?php echo $amn['amenity_id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded-4 border-0 shadow-lg">
                                <div class="modal-header bg-darkbrown text-white py-3">
                                    <h5 class="modal-title font-title fw-bold">Edit Amenity</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="POST" action="">
                                    <div class="modal-body p-4">
                                        <input type="hidden" name="amenity_id" value="<?php echo $amn['amenity_id']; ?>">
                                        
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold text-dark">Amenity Name</label>
                                            <input type="text" name="amenity_name" value="<?php echo $amn['amenity_name']; ?>" class="form-control rounded-3" required maxlength="45">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold text-dark">Description</label>
                                            <textarea name="description" class="form-control rounded-3" rows="3" required maxlength="100"><?php echo $amn['description']; ?></textarea>
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label fw-semibold text-dark">Price Per Use (₱)</label>
                                            <input type="number" step="0.01" name="price_per_use" value="<?php echo $amn['price_per_use']; ?>" class="form-control rounded-3" required min="0">
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-light border-0 py-3 rounded-bottom-4">
                                        <button type="button" class="btn btn-outline-dark rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="btn_update_amenity" class="btn pink-button text-dark fw-bold rounded-pill px-4 shadow-sm">Save Changes</button>
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
        <div class="text-center py-4 text-muted font-body">No matching amenities found.</div>
    <?php endif; ?>
</div>

<div class="modal fade" id="addAmenityModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header bg-darkbrown text-white py-3">
                <h5 class="modal-title font-title fw-bold">Add Amenity</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark">Amenity Name</label>
                        <input type="text" name="amenity_name" class="form-control rounded-3" placeholder="e.g., Rooftop Pool Access" required maxlength="45">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark">Description</label>
                        <textarea name="description" class="form-control rounded-3" rows="3" placeholder="Write short description" required maxlength="100"></textarea>
                    </div>
                    <div class="mb-1">
                        <label class="form-label fw-semibold text-dark">Price Per Use (₱)</label>
                        <input type="number" step="0.01" name="price_per_use" class="form-control rounded-3" placeholder="0.00" required min="0">
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 py-3 rounded-bottom-4">
                    <button type="button" class="btn btn-outline-dark rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="btn_save_amenity" class="btn pink-button text-dark fw-bold rounded-pill px-4 shadow-sm">Add Amenity</button>
                </div>
            </form>
        </div>
    </div>
</div>