<?php
$search_query = "";
// Core template base query featuring structural JOIN definitions
$logs_sql = "SELECT l.*, u.full_name FROM tbl_logs l INNER JOIN tbl_userdetails u ON l.user_id = u.user_id";

if (isset($_POST['btnsearch']) && !empty($_POST['searchinput'])) {
    $search_query = $conn->real_escape_string($_POST['searchinput']);
    $logs_sql .= " WHERE l.log_id LIKE '%$search_query%' 
                   OR u.full_name LIKE '%$search_query%' 
                   OR l.action LIKE '%$search_query%' 
                   OR l.date_time LIKE '%$search_query%'";
}
$logs_sql .= " ORDER BY l.log_id DESC";
$logs = $conn->query($logs_sql);
?>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div class="font-title text-darkbrown fs-2 fw-bold">System Logs</div>
    
    <form method="POST" action="" class="d-flex gap-2 w-100 mobile-w-auto" style="max-width: 400px;">
        <input type="search" name="searchinput" value="<?php echo isset($_POST['searchinput']) ? htmlspecialchars($_POST['searchinput']) : ''; ?>" placeholder="Search operational event history..." class="form-control rounded-pill border-secondary shadow-sm">
        <button type="submit" name="btnsearch" class="btn pink-button text-dark px-4 rounded-pill fw-semibold shadow-sm">Search</button>
    </form>
</div>

<div class="bg-white rounded-4 shadow-sm p-4">
    <?php if ($logs->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Log ID</th>
                        <th>User</th>
                        <th>Action Performed</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($log = $logs->fetch_assoc()){ ?>
                    <tr>
                        <td>#<?php echo $log['log_id']; ?></td>
                        <td class="fw-bold"><?php echo htmlspecialchars($log['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($log['action']); ?></td>
                        <td class="text-muted"><?php echo htmlspecialchars($log['date_time']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="text-center py-4 text-muted font-body">No matching operation logs traced.</div>
    <?php endif; ?>
</div>