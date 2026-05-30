<?php
// ==========================================
// 1. BACKEND RESERVATION INSERTION (ADD) LOGIC
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_save_reservation'])) {
    $full_name = $_POST['full_name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $check_in = $_POST['check_in_date'];
    $check_out = $_POST['check_out_date'];
    $total_price = $_POST['total_price'];
    $status = $_POST['reservation_status'];

    $insert_sql = "INSERT INTO tbl_reservationdetails (full_name, contact, email, check_in_date, check_out_date, total_price, reservation_status) 
                   VALUES ('$full_name', '$contact', '$email', '$check_in', '$check_out', $total_price, '$status')";
    
    if ($conn->query($insert_sql)) {
        $new_id = $conn->insert_id;
        if (isset($_SESSION['GBid'])) {
            $user_id = $_SESSION['GBid'];
            $log_action = "Manually created Reservation #$new_id for $full_name";
            $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
        }
        echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                <strong>Success!</strong> Reservation #'.$new_id.' recorded successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    }
}

// ==========================================
// 2. BACKEND RESERVATION UPDATE (EDIT) LOGIC
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_update_reservation'])) {
    $res_id = $_POST['reservation_id'];
    $full_name = $_POST['full_name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $check_in = $_POST['check_in_date'];
    $check_out = $_POST['check_out_date'];
    $total_price = $_POST['total_price'];
    $status = $_POST['reservation_status'];

    $update_sql = "UPDATE tbl_reservationdetails SET 
                    full_name = '$full_name', contact = '$contact', email = '$email', 
                    check_in_date = '$check_in', check_out_date = '$check_out', 
                    total_price = $total_price, reservation_status = '$status' 
                   WHERE reservation_id = $res_id";
    
    if ($conn->query($update_sql)) {
        if (isset($_SESSION['GBid'])) {
            $user_id = $_SESSION['GBid'];
            $log_action = "Updated details for Reservation #$res_id ($full_name)";
            $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
        }
        echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                <strong>Success!</strong> Reservation #'.$res_id.' update complete.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    }
}

// Quick Approve Action Link integration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve_reservation'])) {
    $res_id = $_POST['reservation_id'];
    if ($conn->query("UPDATE tbl_reservationdetails SET reservation_status = 'Confirmed' WHERE reservation_id = $res_id")) {
        if (isset($_SESSION['GBid'])) {
            $user_id = $_SESSION['GBid'];
            $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', 'Approved Reservation #$res_id', NOW())");
        }
    }
}

// ==========================================
// 3. BACKEND RESERVATION DELETION LOGIC
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_delete_reservation'])) {
    $res_id = $_POST['reservation_id'];
    
    // Fetch user profile name quickly before record drop to enrich system auditing logs
    $res_data = $conn->query("SELECT full_name FROM tbl_reservationdetails WHERE reservation_id = $res_id")->fetch_assoc();
    $guest_name = $res_data ? $res_data['full_name'] : 'Unknown Guest';

    $delete_sql = "DELETE FROM tbl_reservationdetails WHERE reservation_id = $res_id";
    
    if ($conn->query($delete_sql)) {
        if (isset($_SESSION['GBid'])) {
            $user_id = $_SESSION['GBid'];
            $log_action = "Permanently Deleted Reservation Record #$res_id ($guest_name)";
            $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
        }
        echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                <strong>Success!</strong> Reservation ledger record safely deleted.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert" style="background-color: #2c2421; color: #fbb4b9; border-color: #fbb4b9;">
                <strong>Database Error!</strong> Failed to drop booking index row.
                <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1) grayscale(100%) brightness(200%);"></button>
              </div>';
    }
}

// ==========================================
// 4. SEARCH PROCESSING
// ==========================================
$search_query = "";
$res_sql = "SELECT * FROM tbl_reservationdetails";
if (isset($_POST['btnsearch']) && !empty($_POST['searchinput'])) {
    $search_query = $_POST['searchinput'];
    $res_sql .= " WHERE reservation_id LIKE '%$search_query%' 
                  OR full_name LIKE '%$search_query%' 
                  OR email LIKE '%$search_query%' 
                  OR reservation_status LIKE '%$search_query%'";
}
$res_sql .= " ORDER BY reservation_id DESC";
$reservations = $conn->query($res_sql);
?>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div class="font-title text-darkbrown fs-2 fw-bold">All Reservations</div>
    
    <div class="d-flex gap-2 w-100 mobile-w-auto justify-content-md-end" style="max-width: 600px;">
        <form method="POST" action="" class="d-flex gap-2 flex-grow-1">
            <input type="search" name="searchinput" value="<?php echo isset($_POST['searchinput']) ? $_POST['searchinput'] : ''; ?>" placeholder="Search guests..." class="form-control rounded-pill border-secondary shadow-sm">
            <button type="submit" name="btnsearch" class="btn pink-button text-dark px-4 rounded-pill fw-semibold shadow-sm">Search</button>
        </form>
        <button type="button" class="btn btn-dark bg-darkbrown text-white px-4 rounded-pill fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#addReservationModal">
            + Book Reservation
        </button>
    </div>
</div>

<div class="bg-white rounded-4 shadow-sm p-4">
    <?php if ($reservations->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Res ID</th>
                        <th>Guest Name</th>
                        <th>Contact</th>
                        <th>Dates (In/Out)</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($res = $reservations->fetch_assoc()) { ?>
                    <tr>
                        <td>#<?php echo $res['reservation_id']; ?></td>
                        <td class="fw-bold"><?php echo $res['full_name']; ?><br><small class="text-muted"><?php echo $res['email']; ?></small></td>
                        <td><?php echo $res['contact']; ?></td>
                        <td><small><?php echo $res['check_in_date']; ?> to <?php echo $res['check_out_date']; ?></small></td>
                        <td>₱<?php echo number_format($res['total_price'], 2); ?></td>
                        <td>
                            <?php
                            $status = $res['reservation_status'];
                            if($status == 'Pending') echo '<span class="badge text-dark rounded-pill px-3 py-2 bg-warning">Pending</span>';
                            elseif($status == 'Confirmed') echo '<span class="badge rounded-pill px-3 py-2 bg-success">Confirmed</span>';
                            else echo '<span class="badge bg-danger rounded-pill px-3 py-2">'.$status.'</span>';
                            ?>
                        </td>
                        <td class="text-center">
                            <div class="d-flex gap-2 justify-content-center align-items-center">
                                <button type="button" class="btn btn-sm btn-outline-dark rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#editResModal_<?php echo $res['reservation_id']; ?>">
                                    Edit
                                </button>
                                
                                <?php if($status == 'Pending'): ?>
                                    <form method="POST" action="" class="m-0">
                                        <input type="hidden" name="reservation_id" value="<?php echo $res['reservation_id']; ?>">
                                        <button type="submit" name="approve_reservation" class="btn btn-sm btn-dark bg-darkbrown rounded-pill px-3 fw-semibold">Approve</button>
                                    </form>
                                <?php endif; ?>

                                <form method="POST" action="" onsubmit="return confirm('Are you completely sure you want to permanently delete Reservation #<?php echo $res['reservation_id']; ?> for <?php echo $res['full_name']; ?>?');" class="m-0">
                                    <input type="hidden" name="reservation_id" value="<?php echo $res['reservation_id']; ?>">
                                    <button type="submit" name="btn_delete_reservation" class="btn btn-sm btn-dark bg-darkbrown rounded-pill px-3">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="editResModal_<?php echo $res['reservation_id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content rounded-4 border-0 shadow-lg">
                                <div class="modal-header bg-darkbrown text-white py-3">
                                    <h5 class="modal-title font-title fw-bold">Modify Reservation Booking #<?php echo $res['reservation_id']; ?></h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="POST" action="">
                                    <div class="modal-body p-4">
                                        <input type="hidden" name="reservation_id" value="<?php echo $res['reservation_id']; ?>">
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Guest Full Name</label>
                                                <input type="text" name="full_name" value="<?php echo $res['full_name']; ?>" class="form-control rounded-3" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Contact Number</label>
                                                <input type="text" name="contact" value="<?php echo $res['contact']; ?>" class="form-control rounded-3" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Email Address</label>
                                            <input type="email" name="email" value="<?php echo $res['email']; ?>" class="form-control rounded-3" required>
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Check-In Date</label>
                                                <input type="date" name="check_in_date" value="<?php echo $res['check_in_date']; ?>" class="form-control rounded-3" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Check-Out Date</label>
                                                <input type="date" name="check_out_date" value="<?php echo $res['check_out_date']; ?>" class="form-control rounded-3" required>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Total Cost (₱)</label>
                                                <input type="number" step="0.01" name="total_price" value="<?php echo $res['total_price']; ?>" class="form-control rounded-3" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Booking Status</label>
                                                <select name="reservation_status" class="form-select rounded-3" required>
                                                    <option value="Pending" <?php echo ($status == 'Pending')?'selected':''; ?>>Pending Approval</option>
                                                    <option value="Confirmed" <?php echo ($status == 'Confirmed')?'selected':''; ?>>Confirmed</option>
                                                    <option value="Cancelled" <?php echo ($status == 'Cancelled')?'selected':''; ?>>Cancelled</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-light border-0 py-3 rounded-bottom-4">
                                        <button type="button" class="btn btn-outline-dark rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="btn_update_reservation" class="btn pink-button text-dark fw-bold rounded-pill px-4 shadow-sm">Save Changes</button>
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
        <div class="text-center py-4 text-muted font-body">No matching reservations found.</div>
    <?php endif; ?>
</div>

<div class="modal fade" id="addReservationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header bg-darkbrown text-white py-3">
                <h5 class="modal-title font-title fw-bold">Create Direct Back-Office Reservation</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body p-4">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Guest Full Name</label>
                            <input type="text" name="full_name" class="form-control rounded-3" placeholder="John Doe" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Contact Number</label>
                            <input type="text" name="contact" class="form-control rounded-3" placeholder="0917XXXXXXX" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark">Email Address</label>
                        <input type="email" name="email" class="form-control rounded-3" placeholder="example@domain.com" required>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Check-In Date</label>
                            <input type="date" name="check_in_date" class="form-control rounded-3" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Check-Out Date</label>
                            <input type="date" name="check_out_date" class="form-control rounded-3" required>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Calculated Total Price (₱)</label>
                            <input type="number" step="0.01" name="total_price" class="form-control rounded-3" placeholder="0.00" required min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Initial Status Assignment</label>
                            <select name="reservation_status" class="form-select rounded-3" required>
                                <option value="Pending" selected>Pending Verification</option>
                                <option value="Confirmed">Confirmed (Paid / Downpayment Settled)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 py-3 rounded-bottom-4">
                    <button type="button" class="btn btn-outline-dark rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="btn_save_reservation" class="btn pink-button text-dark fw-bold rounded-pill px-4 shadow-sm">Process Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>