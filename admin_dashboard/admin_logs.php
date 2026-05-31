<?php

    // Manual Log Note
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_save_log_note'])) {
        $note_message = "[MANUAL ADMIN NOTE] " . $_POST['note_content'];
        
        if (isset($_SESSION['GBid'])) {
            $user_id = $_SESSION['GBid'];
            $insert_sql = "INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$note_message', NOW())";
            
            if ($conn->query($insert_sql)) {
                echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                        <strong>Success!</strong> Manual internal operational note logged into chronological data database records.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>';
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #2c2421; color: #fbb4b9; border-color: #fbb4b9;">
                    <strong>Error!</strong> Unauthorized operational block state context - Session reference identity lost.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1) grayscale(100%) brightness(200%);"></button>
                </div>';
        }
    }

    // Update Log Note
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_update_log'])) {
        $target_id = $_POST['log_id'];
        $updated_content = $_POST['note_content'];

        $update_sql = "UPDATE tbl_logs SET action = '$updated_content' WHERE log_id = $target_id";
        
        if ($conn->query($update_sql)) {
            echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                    <strong>Success!</strong> Log modified successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #2c2421; color: #fbb4b9; border-color: #fbb4b9;">
                    <strong>Database Error!</strong> Unable to modify log.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1) grayscale(100%) brightness(200%);"></button>
                </div>';
        }
    }

    // Delete Log Note
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_delete_log'])) {
        $target_id = $_POST['log_id'];

        $delete_sql = "DELETE FROM tbl_logs WHERE log_id = $target_id";
        
        if ($conn->query($delete_sql)) {
            echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                    <strong>Success!</strong> Log [#' . $target_id . '] has been deleted successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #2c2421; color: #fbb4b9; border-color: #fbb4b9;">
                    <strong>Database Error!</strong> Unable to delete log.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1) grayscale(100%) brightness(200%);"></button>
                </div>';
        }
    }

    // Search and Display Logs
    $search_query = "";
    $logs_sql = "SELECT l.*, u.full_name, u.role FROM tbl_logs l INNER JOIN tbl_userdetails u ON l.user_id = u.user_id";
    if (isset($_POST['btnsearch']) && !empty($_POST['searchinput'])) {
        $search_query = $_POST['searchinput'];
        $logs_sql .= " WHERE l.log_id LIKE '%$search_query%' 
                    OR u.full_name LIKE '%$search_query%' 
                    OR l.action LIKE '%$search_query%'";
    }
    $logs_sql .= " ORDER BY l.log_id DESC";
    $logs = $conn->query($logs_sql);
    
?>


<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div class="font-title text-darkbrown fs-2 fw-bold">Logs</div>
    
    <div class="d-flex gap-2 w-100 mobile-w-auto justify-content-md-end" style="max-width: 600px;">
        <form method="POST" action="" class="d-flex gap-2 flex-grow-1">
            <input type="search" name="searchinput" value="<?php echo isset($_POST['searchinput']) ? $_POST['searchinput'] : ''; ?>" placeholder="Search system audit trails..." class="form-control rounded-pill border-secondary shadow-sm">
            <button type="submit" name="btnsearch" class="btn pink-button text-dark px-4 rounded-pill fw-semibold shadow-sm">Search</button>
        </form>
        <button type="button" class="btn btn-dark bg-darkbrown text-white px-4 rounded-pill fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#addLogNoteModal">
            + Add Manual Log Note
        </button>
    </div>
</div>


<!-- Display Table -->
<div class="bg-white rounded-4 shadow-sm p-4">
    <?php if ($logs->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Log ID</th>
                        <th>User ID</th>
                        <th>User Details</th>
                        <th>Action Performed</th>
                        <th>Date & Time</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($log = $logs->fetch_assoc()){ ?>
                    <tr>
                        <td>#<?php echo $log['log_id']; ?></td>
                        <td><?php echo $log['user_id']; ?></td>
                        <td class="fw-bold"><?php echo $log['full_name']; ?><br><small class="text-muted text-uppercase text-xs">[<?php echo $log['role']; ?>]</small></td>
                        <td><code><?php echo $log['action']; ?></code></td>
                        <td class="text-muted"><small><?php echo $log['date_time']; ?></small></td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button type="button" class="btn btn-sm btn-outline-dark rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#editLogModal_<?php echo $log['log_id']; ?>">
                                    Edit
                                </button>
                                
                                <form method="POST" action="" onsubmit="return confirm('WARNING: Are you sure you want to permanently delete this log?');" class="m-0">
                                    <input type="hidden" name="log_id" value="<?php echo $log['log_id']; ?>">
                                    <button type="submit" name="btn_delete_log" class="btn btn-sm btn-dark bg-darkbrown rounded-pill px-3">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Edit Logs -->
                    <div class="modal fade" id="editLogModal_<?php echo $log['log_id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded-4 border-0 shadow-lg">
                                <div class="modal-header bg-darkbrown text-white py-3">
                                    <h5 class="modal-title font-title fw-bold">Edit Log #<?php echo $log['log_id']; ?></h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="POST" action="">
                                    <div class="modal-body p-4">
                                        <input type="hidden" name="log_id" value="<?php echo $log['log_id']; ?>">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold text-dark">Log Message</label>
                                            <textarea name="note_content" class="form-control rounded-3 font-mono text-sm" rows="5" required><?php echo $log['action']; ?></textarea>
                                        </div>
                                        <div class="text-muted text-xs p-3 bg-light rounded border border-secondary border-opacity-25">
                                            <strong>User:</strong> <?php echo $log['full_name']; ?> [<?php echo $log['role']; ?>]<br>
                                            <strong>Date & Time:</strong> <?php echo $log['date_time']; ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-light border-0 py-3 rounded-bottom-4">
                                        <button type="button" class="btn btn-outline-dark rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="btn_update_log" class="btn pink-button text-dark fw-bold rounded-pill px-4 shadow-sm">Save Log</button>
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
        <div class="text-center py-4 text-muted font-body">No matching operation logs recorded.</div>
    <?php endif; ?>
</div>

<!-- Add Logs -->
<div class="modal fade" id="addLogNoteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header bg-darkbrown text-white py-3">
                <h5 class="modal-title font-title fw-bold">Add Manual Log Note</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body p-4">
                    <div class="mb-1">
                        <label class="form-label fw-semibold text-dark">Log Message</label>
                        <textarea name="note_content" class="form-control rounded-3 font-mono" rows="4" placeholder="Type here" required></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 py-3 rounded-bottom-4">
                    <button type="button" class="btn btn-outline-dark rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="btn_save_log_note" class="btn pink-button text-dark fw-bold rounded-pill px-4 shadow-sm">Add Manual Log Note</button>
                </div>
            </form>
        </div>
    </div>
</div>