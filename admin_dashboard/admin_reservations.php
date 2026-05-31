<?php

// Insert Reservation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_save_reservation'])) {
    $full_name = $_POST['full_name'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $check_in = $_POST['check_in_date'];
    $check_out = $_POST['check_out_date'];
    $total_price = $_POST['total_price'];
    $status = $_POST['reservation_status'];
    $special_request = $_POST['special_request'];

    $insert_sql = "INSERT INTO tbl_reservationdetails (full_name, gender, birth_date, address, contact, email, check_in_date, check_out_date, total_price, reservation_status, special_request) 
                   VALUES ('$full_name', '$gender', '$birth_date', '$address', '$contact', '$email', '$check_in', '$check_out', $total_price, '$status', '$special_request')";
    
    if ($conn->query($insert_sql)) {
        $new_id = $conn->insert_id;
        if (isset($_SESSION['GBid'])) {
            $user_id = $_SESSION['GBid'];
            $log_action = "Manually created Reservation #$new_id for $full_name";
            $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
        }
        echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4 shadow-sm" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                <strong>Success!</strong> Reservation #'.$new_id.' recorded successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    }
}

// Update Reservation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_update_reservation'])) {
    $res_id = $_POST['reservation_id'];
    $full_name = $_POST['full_name'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $check_in = $_POST['check_in_date'];
    $check_out = $_POST['check_out_date'];
    $total_price = $_POST['total_price'];
    $status = $_POST['reservation_status'];
    $special_request = $_POST['special_request'];

    $update_sql = "UPDATE tbl_reservationdetails SET 
                    full_name = '$full_name', gender = '$gender', birth_date = '$birth_date', address = '$address',
                    contact = '$contact', email = '$email', check_in_date = '$check_in', check_out_date = '$check_out', 
                    total_price = $total_price, reservation_status = '$status', special_request = '$special_request' 
                   WHERE reservation_id = $res_id";
    
    if ($conn->query($update_sql)) {
        if (isset($_SESSION['GBid'])) {
            $user_id = $_SESSION['GBid'];
            $log_action = "Updated Reservation #$res_id ($full_name)";
            $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
        }
        echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4 shadow-sm" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                <strong>Success!</strong> Reservation #'.$res_id.' updated successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve_reservation'])) {
    $res_id = $_POST['reservation_id'];
    if ($conn->query("UPDATE tbl_reservationdetails SET reservation_status = 'Confirmed' WHERE reservation_id = $res_id")) {
        if (isset($_SESSION['GBid'])) {
            $user_id = $_SESSION['GBid'];
            $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', 'Approved Reservation #$res_id', NOW())");
        }
    }
}

// Delete Reservation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_delete_reservation'])) {
    $res_id = $_POST['reservation_id'];
    
    $res_data = $conn->query("SELECT full_name FROM tbl_reservationdetails WHERE reservation_id = $res_id")->fetch_assoc();
    $guest_name = $res_data ? $res_data['full_name'] : 'Unknown Guest';

    $delete_sql = "DELETE FROM tbl_reservationdetails WHERE reservation_id = $res_id";
    
    if ($conn->query($delete_sql)) {
        if (isset($_SESSION['GBid'])) {
            $user_id = $_SESSION['GBid'];
            $log_action = "Permanently Deleted Reservation Record #$res_id ($guest_name)";
            $conn->query("INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$log_action', NOW())");
        }
        echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4 shadow-sm" role="alert" style="background-color: #fbb4b9; color: #2c2421; border-color: #2c2421;">
                <strong>Success!</strong> Reservation deleted successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4 shadow-sm" role="alert" style="background-color: #2c2421; color: #fbb4b9; border-color: #fbb4b9;">
                <strong>Database Error!</strong> Unable to delete reservation.
                <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1) grayscale(100%) brightness(200%);"></button>
              </div>';
    }
}

// Search and Display Reservations
$search_query = "";
$res_sql = "SELECT * FROM tbl_reservationdetails";
if (isset($_POST['btnsearch']) && !empty($_POST['searchinput'])) {
    $search_query = $_POST['searchinput'];
    $res_sql .= " WHERE reservation_id LIKE '%$search_query%' 
                  OR full_name LIKE '%$search_query%' 
                  OR email LIKE '%$search_query%' 
                  OR address LIKE '%$search_query%' 
                  OR special_request LIKE '%$search_query%'
                  OR reservation_status LIKE '%$search_query%'";
}
$res_sql .= " ORDER BY reservation_id DESC";
$reservations = $conn->query($res_sql);
?>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div class="font-title text-darkbrown fs-2 fw-bold">Reservations</div>
    
    <div class="d-flex gap-2 w-100 mobile-w-auto justify-content-md-end" style="max-width: 600px;">
        <form method="POST" action="" class="d-flex gap-2 flex-grow-1">
            <input type="search" name="searchinput" value="<?php echo isset($_POST['searchinput']) ? htmlspecialchars($_POST['searchinput']) : ''; ?>" placeholder="Search guests, addresses, requests..." class="form-control rounded-pill border-secondary shadow-sm">
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
            <table class="table table-hover align-middle text-nowrap">
                <thead class="table-light font-body">
                    <tr>
                        <th>Res ID</th>
                        <th>Guest Profiles</th>
                        <th>Contact & Address</th>
                        <th>Dates (In/Out)</th>
                        <th>Special Requests</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($res = $reservations->fetch_assoc()) { ?>
                    <tr>
                        <td class="fw-bold text-muted">#<?php echo $res['reservation_id']; ?></td>
                        
                        <td>
                            <div class="fw-bold text-dark"><?php echo $res['full_name']; ?></div>
                            <div class="text-muted small">
                                <span><strong>Gender:</strong> <?php echo ($res['gender'] ?: 'Unspecified'); ?></span> • 
                                <span><strong>DOB:</strong> <?php echo $res['birth_date'] ? date('M d, Y', strtotime($res['birth_date'])) : 'N/A'; ?></span>
                            </div>
                        </td>

                        <td style="max-width: 250px; white-space: normal;">
                            <div class="fw-semibold text-secondary small"><?php echo $res['contact']; ?></div>
                            <div class="text-muted small mb-1" style="font-size: 0.85rem;"><?php echo $res['email']; ?></div>
                            <div class="text-muted small bg-light p-1 px-2 rounded-2 border border-light" style="font-size: 0.8rem; line-height: 1.2;">
                                <?php echo ($res['address'] ?: 'No address provided'); ?>
                            </div>
                        </td>

                        <td>
                            <span class="badge bg-light text-dark border border-secondary-subtle px-2 py-1.5 fw-normal">
                                <?php echo $res['check_in_date']; ?> to <?php echo $res['check_out_date']; ?>
                            </span>
                        </td>

                        <td style="max-width: 200px; white-space: normal;">
                            <?php if(!empty($res['special_request'])): ?>
                                <div class="p-2 rounded-3 bg-warning-subtle text-warning-emphasis small border border-warning-subtle" style="font-size: 0.85rem;">
                                    <?php echo $res['special_request']; ?>
                                </div>
                            <?php else: ?>
                                <span class="text-muted small italic" style="font-size: 0.85rem;">None</span>
                            <?php endif; ?>
                        </td>

                        <td class="fw-bold text-darkbrown">₱<?php echo number_format($res['total_price'], 2); ?></td>
                        
                        <td>
                            <?php
                            $status = $res['reservation_status'];
                            if($status == 'Pending') echo '<span class="badge text-dark rounded-pill px-3 py-2 bg-warning font-body">Pending</span>';
                            elseif($status == 'Confirmed') echo '<span class="badge rounded-pill px-3 py-2 bg-success font-body">Confirmed</span>';
                            elseif($status == 'Completed') echo '<span class="badge rounded-pill px-3 py-2 bg-info text-dark font-body">Completed</span>';
                            else echo '<span class="badge bg-danger rounded-pill px-3 py-2 font-body">'.$status.'</span>';
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
                                        <button type="submit" name="approve_reservation" class="btn btn-sm text-white bg-success rounded-pill px-3 fw-semibold">Approve</button>
                                    </form>
                                <?php endif; ?>

                                <form method="POST" action="" onsubmit="return confirm('WARNING: Are you sure you want to permanently delete this reservation?');" class="m-0">
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
                                    <h5 class="modal-title font-title fw-bold">Edit Booking #<?php echo $res['reservation_id']; ?></h5>
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
                                            <div class="col-md-3">
                                                <label class="form-label fw-semibold">Gender</label>
                                                <select name="gender" class="form-select rounded-3" required>
                                                    <option value="Male" <?php echo ($res['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                                    <option value="Female" <?php echo ($res['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                                    <option value="Other" <?php echo ($res['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label fw-semibold">Birth Date</label>
                                                <input type="date" name="birth_date" value="<?php echo $res['birth_date']; ?>" class="form-control rounded-3" required>
                                            </div>
                                        </div>

                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Contact Number</label>
                                                <input type="text" name="contact" value="<?php echo $res['contact']; ?>" class="form-control rounded-3" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Email Address</label>
                                                <input type="email" name="email" value="<?php echo $res['email']; ?>" class="form-control rounded-3" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Address</label>
                                            <textarea name="address" class="form-control rounded-3" rows="2" required><?php echo $res['address']; ?></textarea>
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

                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Total Cost (₱)</label>
                                                <input type="number" step="0.01" name="total_price" value="<?php echo $res['total_price']; ?>" class="form-control rounded-3" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Booking Status</label>
                                                <select name="reservation_status" class="form-select rounded-3" required>
                                                    <option value="Pending" <?php echo ($status == 'Pending')?'selected':''; ?>>Pending Approval</option>
                                                    <option value="Confirmed" <?php echo ($status == 'Confirmed')?'selected':''; ?>>Confirmed</option>
                                                    <option value="Completed" <?php echo ($status == 'Completed')?'selected':''; ?>>Completed</option>
                                                    <option value="Cancelled" <?php echo ($status == 'Cancelled')?'selected':''; ?>>Cancelled</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Special Request</label>
                                            <textarea name="special_request" class="form-control rounded-3" rows="2"><?php echo $res['special_request']; ?></textarea>
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
                <h5 class="modal-title font-title fw-bold">Book Reservation</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="">
                <div class="modal-body p-4">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Guest Full Name</label>
                            <input type="text" name="full_name" class="form-control rounded-3" placeholder="John Doe" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold text-dark">Gender</label>
                            <select name="gender" class="form-select rounded-3" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold text-dark">Birth Date</label>
                            <input type="date" name="birth_date" class="form-control rounded-3" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Contact Number</label>
                            <input type="text" name="contact" class="form-control rounded-3" placeholder="0917XXXXXXX" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Email Address</label>
                            <input type="email" name="email" class="form-control rounded-3" placeholder="example@domain.com" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark">Address</label>
                        <textarea name="address" class="form-control rounded-3" rows="2" placeholder="123 Street, City" required></textarea>
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

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Calculated Total Price (₱)</label>
                            <input type="number" step="0.01" name="total_price" class="form-control rounded-3" placeholder="0.00" required min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Status</label>
                            <select name="reservation_status" class="form-select rounded-3" required>
                                <option value="Pending" selected>Pending Verification</option>
                                <option value="Confirmed">Confirmed (Paid / Downpayment Settled)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-dark">Special Request</label>
                        <textarea name="special_request" class="form-control rounded-3" rows="2" placeholder="Any requests (e.g., late check-in, extra pillows)"></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 py-3 rounded-bottom-4">
                    <button type="button" class="btn btn-outline-dark rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="btn_save_reservation" class="btn pink-button text-dark fw-bold rounded-pill px-4 shadow-sm">Add Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>