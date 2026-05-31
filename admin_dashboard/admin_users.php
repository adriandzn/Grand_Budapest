<?php

    // Insert User
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_save_user'])) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password']; 
        $role = $_POST['role'];
        $status = $_POST['status'];

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $check_user = $conn->query("SELECT * FROM tbl_userdetails WHERE username = '$username' OR email = '$email'");
        if ($check_user->num_rows > 0) {
            echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #2c2421; color: #fbb4b9; border-color: #fbb4b9;">
                    <strong>Error!</strong> Username or Email already exists in the system.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1) grayscale(100%) brightness(200%);"></button>
                </div>';
        } else {
            $insert_sql = "INSERT INTO tbl_userdetails (full_name, email, username, password, role, status) 
                        VALUES ('$full_name', '$email', '$username', '$hashed_password', '$role', '$status')";
            
            if ($conn->query($insert_sql)) {
                if (isset($_SESSION['GBid'])) {
                    $user_id = $_SESSION['GBid'];
                    $log_action = "Registered new corporate account profile: " . $username . " (" . $role . ")";
                    $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
                }
                echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                        <strong>Success!</strong> Account user profile ['.$username.'] added successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>';
            }
        }
    }

    // Update User
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_update_user'])) {
        $target_id = $_POST['user_id'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $role = $_POST['role'];
        $status = $_POST['status'];

        $password_update_string = "";
        if (!empty($_POST['password'])) {
            $new_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $password_update_string = ", password = '$new_hash'";
        }

        $update_sql = "UPDATE tbl_userdetails SET 
                        full_name = '$full_name', email = '$email', username = '$username', 
                        role = '$role', status = '$status' $password_update_string 
                    WHERE user_id = $target_id";
        
        if ($conn->query($update_sql)) {
            if (isset($_SESSION['GBid'])) {
                $user_id = $_SESSION['GBid'];
                $log_action = "Updated user profile info metrics for Operator Account ID #$target_id";
                $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
            }
            echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                    <strong>Success!</strong> User data modified successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>';
        }
    }

    // Delete User
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_delete_user'])) {
        $target_id = $_POST['user_id'];

        if (isset($_SESSION['GBid']) && $_SESSION['GBid'] == $target_id) {
            echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #2c2421; color: #fbb4b9; border-color: #fbb4b9;">
                    <strong>Action Denied:</strong> You cannot delete your own currently active profile session.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1) grayscale(100%) brightness(200%);"></button>
                </div>';
        } else {
            $fetch_res = $conn->query("SELECT username FROM tbl_userdetails WHERE user_id = $target_id");
            $target_username = ($fetch_res && $fetch_res->num_rows > 0) ? $fetch_res->fetch_assoc()['username'] : "Unknown Account";

            $delete_sql = "DELETE FROM tbl_userdetails WHERE user_id = $target_id";
            
            if ($conn->query($delete_sql)) {
                if (isset($_SESSION['GBid'])) {
                    $user_id = $_SESSION['GBid'];
                    $log_action = "Permanently dropped operator account profile: " . $target_username . " (ID #$target_id)";
                    $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
                }
                echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                        <strong>Success!</strong> User ['.$target_username.'] has been deleted successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #2c2421; color: #fbb4b9; border-color: #fbb4b9;">
                        <strong>Database Error:</strong> Unable to delete user. ' . $conn->error . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1) grayscale(100%) brightness(200%);"></button>
                    </div>';
            }
        }
    }

    // Search and Display Users
    $search_query = "";
    $user_sql = "SELECT * FROM tbl_userdetails";
    if (isset($_POST['btnsearch']) && !empty($_POST['searchinput'])) {
        $search_query = $_POST['searchinput'];
        $user_sql .= " WHERE user_id LIKE '%$search_query%' 
                    OR full_name LIKE '%$search_query%' 
                    OR username LIKE '%$search_query%' 
                    OR role LIKE '%$search_query%'";
    }
    $user_sql .= " ORDER BY user_id DESC";
    $users = $conn->query($user_sql);

?>


<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div class="font-title text-darkbrown fs-2 fw-bold">Users</div>
    
    <div class="d-flex gap-2 w-100 mobile-w-auto justify-content-md-end" style="max-width: 600px;">
        <form method="POST" action="" class="d-flex gap-2 flex-grow-1">
            <input type="search" name="searchinput" value="<?php echo isset($_POST['searchinput']) ? $_POST['searchinput'] : ''; ?>" placeholder="Search system profiles..." class="form-control rounded-pill border-secondary shadow-sm">
            <button type="submit" name="btnsearch" class="btn pink-button text-dark px-4 rounded-pill fw-semibold shadow-sm">Search</button>
        </form>
        <button type="button" class="btn btn-dark bg-darkbrown text-white px-4 rounded-pill fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
            + New Account
        </button>
    </div>
</div>


<!-- Display Table -->
<div class="bg-white rounded-4 shadow-sm p-4">
    <?php if ($users->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>User ID</th>
                        <th>Full Name</th>
                        <th>Email / Username</th>
                        <th>Role Access Level</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($user = $users->fetch_assoc()) { ?>
                    <tr>
                        <td>#<?php echo $user['user_id']; ?></td>
                        <td class="fw-bold"><?php echo $user['full_name']; ?></td>
                        <td><?php echo $user['email']; ?><br><small class="text-muted">@<?php echo $user['username']; ?></small></td>
                        <td><span class="badge rounded-pill px-3 py-1 text-dark" style="background-color: #fbb4b9;"><?php echo $user['role']; ?></span></td>
                        <td>
                            <?php if($user['status'] == 'Active'): ?>
                                <span class="badge rounded-pill px-3 py-2 bg-success">Active</span>
                            <?php elseif($user['status'] == 'Pending'): ?>
                                <span class="badge rounded-pill px-3 py-2 bg-warning text-dark">Pending</span>
                            <?php else: ?>
                                <span class="badge text-white rounded-pill px-3 py-2 bg-danger"><?php echo $user['status']; ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-outline-dark rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#editUserModal_<?php echo $user['user_id']; ?>">
                                    Edit Profile
                                </button>
                                
                                <form method="POST" action="" onsubmit="return confirm('WARNING: Are you sure you want to permanently delete this profile?');" class="m-0">
                                    <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                                    <button type="submit" name="btn_delete_user" class="btn btn-sm btn-dark bg-darkbrown rounded-pill px-3">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Edit User -->
                    <div class="modal fade" id="editUserModal_<?php echo $user['user_id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded-4 border-0 shadow-lg">
                                <div class="modal-header bg-darkbrown text-white py-3">
                                    <h5 class="modal-title font-title fw-bold">Edit Profile</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="POST" action="">
                                    <div class="modal-body p-4">
                                        <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                                        
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Full Name</label>
                                            <input type="text" name="full_name" value="<?php echo $user['full_name']; ?>" class="form-control rounded-3" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Email Address</label>
                                            <input type="email" name="email" value="<?php echo $user['email']; ?>" class="form-control rounded-3" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Username</label>
                                            <input type="text" name="username" value="<?php echo $user['username']; ?>" class="form-control rounded-3" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Change Password (Optional)</label>
                                            <input type="password" name="password" class="form-control rounded-3" placeholder="Leave blank to preserve current password structure">
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Role Access</label>
                                                <select name="role" class="form-select rounded-3" required>
                                                    <option value="Admin" <?php echo ($user['role'] == 'Admin')?'selected':''; ?>>Admin</option>
                                                    <option value="Employee" <?php echo ($user['role'] == 'Employee')?'selected':''; ?>>Employee</option>
                                                    <option value="Customer" <?php echo ($user['role'] == 'Customer')?'selected':''; ?>>Customer</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Status</label>
                                                <select name="status" class="form-select rounded-3" required>
                                                    <option value="Active" <?php echo ($user['status'] == 'Active')?'selected':''; ?>>Active</option>
                                                    <option value="Pending" <?php echo ($user['status'] == 'Pending')?'selected':''; ?>>Pending</option>
                                                    <option value="Inactive" <?php echo ($user['status'] == 'Inactive')?'selected':''; ?>>Inactive / Blocked</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-light border-0 py-3 rounded-bottom-4">
                                        <button type="button" class="btn btn-outline-dark rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="btn_update_user" class="btn pink-button text-dark fw-bold rounded-pill px-4 shadow-sm">Save Changes</button>
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
        <div class="text-center py-4 text-muted font-body">No matching user records located.</div>
    <?php endif; ?>
</div>


<!-- Add User -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header bg-darkbrown text-white py-3">
                <h5 class="modal-title font-title fw-bold">Add an Account</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark">Full Name</label>
                        <input type="text" name="full_name" class="form-control rounded-3" placeholder="Ex: Adrian Dizon" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark">Email Address</label>
                        <input type="email" name="email" class="form-control rounded-3" placeholder="adriandizon@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark">Username</label>
                        <input type="text" name="username" class="form-control rounded-3" placeholder="adriandizon28" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark">Add Password</label>
                        <input type="password" name="password" class="form-control rounded-3" required>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Role Access</label>
                            <select name="role" class="form-select rounded-3" required>
                                <option value="" disabled selected>-- Select Role Access --</option>
                                <option value="Admin">Admin</option>
                                <option value="Employee">Employee</option>
                                <option value="Customer">Customer</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Status</label>
                            <select name="status" class="form-select rounded-3" required>
                                <option value="Active" selected>Active</option>
                                <option value="Pending">Pending</option>
                                <option value="Inactive">Inactive / Blocked</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 py-3 rounded-bottom-4">
                    <button type="button" class="btn btn-outline-dark rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="btn_save_user" class="btn pink-button text-dark fw-bold rounded-pill px-4 shadow-sm">Add Account</button>
                </div>
            </form>
        </div>
    </div>
</div>