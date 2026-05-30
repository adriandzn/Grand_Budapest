<?php
// ==========================================
// 1. SECURE MANUAL LOG NOTE INJECTION LOGIC
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_save_log_note'])) {
    $note_message = "[MANUAL ADMIN NOTE] " . $conn->real_escape_string($_POST['note_content']);
    
    if (isset($_SESSION['GBid'])) {
        $user_id = $_SESSION['GBid'];
        $insert_sql = "INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$note_message', NOW())";
        
        if ($conn->query($insert_sql)) {
            echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
                    <strong>Success!</strong> Manual internal operational note logged into chronological data database records.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>';
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert">
                <strong>Error!</strong> Unauthorized operational block state context - Session reference identity lost.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    }
}

// ==========================================
// 2. BACKEND LOG UPDATE (EDIT) LOGIC (NEW)
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_update_log'])) {
    $target_id = intval($_POST['log_id']);
    $updated_content = $conn->real_escape_string($_POST['note_content']);

    $update_sql = "UPDATE tbl_logs SET action = '$updated_content' WHERE log_id = $target_id";
    
    if ($conn->query($update_sql)) {
        echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
                <strong>Success!</strong> Log record payload data modified successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert">
                <strong>Database Error!</strong> Unable to complete row update query.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    }
}

// ==========================================
// 3. BACKEND LOG DELETION LOGIC (NEW)
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_delete_log'])) {
    $target_id = intval($_POST['log_id']);

    $delete_sql = "DELETE FROM tbl_logs WHERE log_id = $target_id";
    
    if ($conn->query($delete_sql)) {
        echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
                <strong>Success!</strong> System event audit log entry [#' . $target_id . '] permanently dropped from system registry.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert">
                <strong>Database Error!</strong> Unable to complete row drop query.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    }
}

// ==========================================
// 4. SEARCH & INNER JOIN TRAILING FETCH
// ==========================================
$search_query = "";
$logs_sql = "SELECT l.*, u.full_name, u.role FROM tbl_logs l INNER JOIN tbl_userdetails u ON l.user_id = u.user_id";
if (isset($_POST['btnsearch']) && !empty($_POST['searchinput'])) {
    $search_query = $conn->real_escape_string($_POST['searchinput']);
    $logs_sql .= " WHERE l.log_id LIKE '%$search_query%' 
                   OR u.full_name LIKE '%$search_query%' 
                   OR l.action LIKE '%$search_query%'";
}
$logs_sql .= " ORDER BY l.log_id DESC";
$logs = $conn->query($logs_sql);
?>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div class="font-title text-darkbrown fs-2 fw-bold">System Logs</div>
    
    <div class="d-flex gap-2 w-100 mobile-w-auto justify-content-md-end" style="max-width: 600px;">
        <form method="POST" action="" class="d-flex gap-2 flex-grow-1">
            <input type="search" name="searchinput" value="<?php echo isset($_POST['searchinput']) ? htmlspecialchars($_POST['searchinput']) : ''; ?>" placeholder="Search system audit trails..." class="form-control rounded-pill border-secondary shadow-sm">
            <button type="submit" name="btnsearch" class="btn pink-button text-dark px-4 rounded-pill fw-semibold shadow-sm">Search</button>
        </form>
        <button type="button" class="btn btn-secondary px-4 rounded-pill fw-semibold shadow-sm text-white" data-bs-toggle="modal" data-bs-target="#addLogNoteModal">
            ✍️ Add Manual Log Note
        </button>
    </div>
</div>

<div class="bg-white rounded-4 shadow-sm p-4">
    <?php if ($logs->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Log ID</th>
                        <th>User Employee Reference</th>
                        <th>Action Performed Log Metric</th>
                        <th>Date & Time Timestamp</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($log = $logs->fetch_assoc()){ ?>
                    <tr>
                        <td>#<?php echo $log['log_id']; ?></td>
                        <td class="fw-bold"><?php echo htmlspecialchars($log['full_name']); ?><br><small class="text-muted text-uppercase text-xs">[<?php echo $log['role']; ?>]</small></td>
                        <td><code><?php echo htmlspecialchars($log['action']); ?></code></td>
                        <td class="text-muted"><small><?php echo $log['date_time']; ?></small></td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#editLogModal_<?php echo $log['log_id']; ?>">
                                    Edit
                                </button>
                                
                                <form method="POST" action="" onsubmit="return confirm('CRITICAL WARNING: Are you certain you want to completely erase audit log trace record entry #<?php echo $log['log_id']; ?>? This operational event record baseline data cannot be restored.');" class="m-0">
                                    <input type="hidden" name="log_id" value="<?php echo $log['log_id']; ?>">
                                    <button type="submit" name="btn_delete_log" class="btn btn-sm btn-danger rounded-pill px-3">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="editLogModal_<?php echo $log['log_id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded-4 border-0 shadow-lg">
                                <div class="modal-header bg-primary text-white py-3">
                                    <h5 class="modal-title font-title fw-bold">Modify System Event Log Entry #<?php echo $log['log_id']; ?></h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="POST" action="">
                                    <div class="modal-body p-4">
                                        <input type="hidden" name="log_id" value="<?php echo $log['log_id']; ?>">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold text-dark">Log Metric Entry Payload Statement</label>
                                            <textarea name="note_content" class="form-control rounded-3 font-mono text-sm" rows="5" required><?php echo htmlspecialchars($log['action']); ?></textarea>
                                        </div>
                                        <div class="text-muted text-xs p-2 bg-light rounded border border-secondary border-opacity-25">
                                            <strong>Record Actor Metadata:</strong> <?php echo htmlspecialchars($log['full_name']); ?> [<?php echo htmlspecialchars($log['role']); ?>]<br>
                                            <strong>Creation Timestamp:</strong> <?php echo $log['date_time']; ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-light border-0 py-3 rounded-bottom-4">
                                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="btn_update_log" class="btn btn-primary fw-bold rounded-pill px-4 shadow-sm">Save Log Mutation</button>
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

<div class="modal fade" id="addLogNoteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header bg-secondary text-white py-3">
                <h5 class="modal-title font-title fw-bold">Write System Event Management Note</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body p-4">
                    <p class="text-muted small">*This feature allows internal operators to record administrative logs (e.g., shifts, cash drawer corrections, or emergency exceptions) into the central audit trail database history.*</p>
                    <div class="mb-1">
                        <label class="form-label fw-semibold text-dark">Log Content Message</label>
                        <textarea name="note_content" class="form-control rounded-3 font-mono" rows="4" placeholder="Ex: Manual adjustment performed to correct a pricing discrepancy on booking checkout overrides..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 py-3 rounded-bottom-4">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="btn_save_log_note" class="btn btn-secondary text-white fw-bold rounded-pill px-4 shadow-sm">Record Internal Log Note</button>
                </div>
            </form>
        </div>
    </div>
</div>