<?php
$search_query = "";
$user_sql = "SELECT * FROM tbl_userdetails";

if (isset($_POST['btnsearch']) && !empty($_POST['searchinput'])) {
    $search_query = $conn->real_escape_string($_POST['searchinput']);
    $user_sql .= " WHERE user_id LIKE '%$search_query%' 
                   OR full_name LIKE '%$search_query%' 
                   OR email LIKE '%$search_query%' 
                   OR username LIKE '%$search_query%' 
                   OR role LIKE '%$search_query%' 
                   OR status LIKE '%$search_query%'";
}
$user_sql .= " ORDER BY user_id DESC";
$users = $conn->query($user_sql);
?>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div class="font-title text-darkbrown fs-2 fw-bold">User Management</div>
    
    <form method="POST" action="" class="d-flex gap-2 w-100 mobile-w-auto" style="max-width: 400px;">
        <input type="search" name="searchinput" value="<?php echo isset($_POST['searchinput']) ? htmlspecialchars($_POST['searchinput']) : ''; ?>" placeholder="Search user profile fields..." class="form-control rounded-pill border-secondary shadow-sm">
        <button type="submit" name="btnsearch" class="btn pink-button text-dark px-4 rounded-pill fw-semibold shadow-sm">Search</button>
    </form>
</div>

<div class="bg-white rounded-4 shadow-sm p-4">
    <?php if ($users->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>User ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($user = $users->fetch_assoc()) { ?>
                    <tr>
                        <td>#<?php echo $user['user_id']; ?></td>
                        <td class="fw-bold"><?php echo htmlspecialchars($user['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><span class="badge bg-dark px-3 py-1"><?php echo htmlspecialchars($user['role']); ?></span></td>
                        <td>
                            <?php if($user['status'] == 'Active'): ?>
                                <span class="badge bg-success rounded-pill px-3 py-2">Active</span>
                            <?php else: ?>
                                <span class="badge bg-warning text-dark rounded-pill px-3 py-2"><?php echo htmlspecialchars($user['status']); ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="text-center py-4 text-muted font-body">No matching users found.</div>
    <?php endif; ?>
</div>