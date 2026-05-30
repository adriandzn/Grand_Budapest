<?php
// 1. Handle Approve Action First
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve_reservation'])) {
    $res_id = intval($_POST['reservation_id']);
    $update_sql = "UPDATE tbl_reservationdetails SET reservation_status = 'Confirmed' WHERE reservation_id = $res_id";
    
    if ($conn->query($update_sql)) {
        if (isset($_SESSION['GBid'])) {
            $user_id = $_SESSION['GBid'];
            $action_message = "Approved Reservation #" . $res_id;
            $log_sql = "INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('$user_id', '$action_message', NOW())";
            $conn->query($log_sql);
        }
        echo '<div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
                <strong>Success!</strong> Reservation #'.$res_id.' has been confirmed.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    }
}

// 2. Handle Search Query Generation
$search_query = "";
$res_sql = "SELECT * FROM tbl_reservationdetails";

if (isset($_POST['btnsearch']) && !empty($_POST['searchinput'])) {
    $search_query = $conn->real_escape_string($_POST['searchinput']);
    $res_sql .= " WHERE reservation_id LIKE '%$search_query%' 
                  OR full_name LIKE '%$search_query%' 
                  OR contact LIKE '%$search_query%' 
                  OR email LIKE '%$search_query%' 
                  OR reservation_status LIKE '%$search_query%'";
}
$res_sql .= " ORDER BY reservation_id DESC";
$reservations = $conn->query($res_sql);
?>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div class="font-title text-darkbrown fs-2 fw-bold">All Reservations</div>
    
    <form method="POST" action="" class="d-flex gap-2 w-100 mobile-w-auto" style="max-width: 400px;">
        <input type="search" name="searchinput" value="<?php echo isset($_POST['searchinput']) ? htmlspecialchars($_POST['searchinput']) : ''; ?>" placeholder="Search guest name, status..." class="form-control rounded-pill border-secondary shadow-sm">
        <button type="submit" name="btnsearch" class="btn pink-button text-dark px-4 rounded-pill fw-semibold shadow-sm">Search</button>
    </form>
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
                        <th>Email</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($res = $reservations->fetch_assoc()) { ?>
                    <tr>
                        <td>#<?php echo $res['reservation_id']; ?></td>
                        <td class="fw-bold"><?php echo htmlspecialchars($res['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($res['contact']); ?></td>
                        <td><?php echo htmlspecialchars($res['email']); ?></td>
                        <td><?php echo htmlspecialchars($res['check_in_date']); ?></td>
                        <td><?php echo htmlspecialchars($res['check_out_date']); ?></td>
                        <td>₱<?php echo number_format($res['total_price'], 2); ?></td>
                        <td>
                            <?php
                            $status = $res['reservation_status'];
                            if($status == 'Pending') echo '<span class="badge bg-warning text-dark rounded-pill px-3 py-2">Pending</span>';
                            elseif($status == 'Confirmed') echo '<span class="badge bg-primary rounded-pill px-3 py-2">Confirmed</span>';
                            else echo '<span class="badge bg-secondary rounded-pill px-3 py-2">'.htmlspecialchars($status).'</span>';
                            ?>
                        </td>
                        <td class="text-center">
                            <?php if($status == 'Pending'): ?>
                                <form method="POST" action="" onsubmit="return confirm('Approve Reservation #<?php echo $res['reservation_id']; ?>?');">
                                    <input type="hidden" name="reservation_id" value="<?php echo $res['reservation_id']; ?>">
                                    <button type="submit" name="approve_reservation" class="btn btn-sm btn-success rounded-pill px-3 fw-semibold">Approve</button>
                                </form>
                            <?php else: ?>
                                <span class="text-muted small italic">Settled</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="text-center py-4 text-muted font-body">No matching reservations found.</div>
    <?php endif; ?>
</div>