<?php
    require_once "dbaseconnection.php";
    session_start();

    // Confirm identity and role clear access
    if (!isset($_SESSION['GBrole']) || $_SESSION['GBrole'] !== "Employee") {
        header("location: login.php");
        exit;
    }

    // Logout Post Actions
    if (isset($_POST['logout'])) {
        if (isset($_SESSION['GBid'])) {
            $logsql = "INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('" . $_SESSION['GBid'] . "', 'Logged Out', NOW())";
            $conn->query($logsql);
        }
        session_abort();
        header("location:login.php");
        exit;
    }

    // Panel Views
    $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

    // Metric blocks for the Home View
    $totalRooms = 0; $totalReservations = 0; $pendingReservations = 0; $confirmedReservations = 0;
    $recentReservations = null; $pendingList = null;

    if ($page == 'dashboard') {
        $totalRooms = $conn->query("SELECT COUNT(*) AS total FROM tbl_roomdetails")->fetch_assoc()['total'] ?? 0;
        $totalReservations = $conn->query("SELECT COUNT(*) AS total FROM tbl_reservationdetails")->fetch_assoc()['total'] ?? 0;
        $pendingReservations = $conn->query("SELECT COUNT(*) AS total FROM tbl_reservationdetails WHERE reservation_status='Pending'")->fetch_assoc()['total'] ?? 0;
        $confirmedReservations = $conn->query("SELECT COUNT(*) AS total FROM tbl_reservationdetails WHERE reservation_status='Confirmed'")->fetch_assoc()['total'] ?? 0;

        // Query for Recent Reservations
        $recentReservations = $conn->query("SELECT * FROM tbl_reservationdetails ORDER BY reservation_id DESC LIMIT 5");

        // System Audit Trail Logs
        $pendingList = $conn->query("SELECT * FROM tbl_reservationdetails WHERE reservation_status='Pending' ORDER BY reservation_id DESC LIMIT 5");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard - Grand Budapest Hotel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">
     <style>
        .welcome-card {
            background: linear-gradient(135deg, #2c2421 0%, #423530 100%);
            border-left: 5px solid #fbb4b9;
        }
        .text-gold-light {
            color: #fbb4b9;
            font-size: 0.9rem;
            letter-spacing: 0.05em;
        }
    </style>
</head>

<body class="bg-lightpink font-body">

    <div class="d-flex min-vh-100">

        <aside class="bg-darkbrown text-white flex-shrink-0 position-sticky top-0" style="width: 260px; height: 100vh; overflow: hidden;">
            <div class="d-flex flex-column justify-content-between h-100 p-4">
                <div>
                    <div class="mb-5 text-center">
                        <img src="images/logo.png" alt="Grand Budapest" class="img-fluid" style="max-width: 120px;">
                        <div class="font-title fs-5 mt-3">GRAND BUDAPEST</div>
                        <div class="font-title text-light" style="font-size: 0.8rem; letter-spacing: 0.12em;">HOTEL</div>
                    </div>

                    <div class="mb-4 px-3 py-3 rounded-4 bg-brown d-flex align-items-center gap-3">
                        <img src="images/logo-profile-pink.png" alt="Employee" style="width: 28px;">
                        <div>
                            <div class="font-title fw-bold"><?php echo $_SESSION['GBfullname']; ?></div>
                            <div class="small text-light"><?php echo $_SESSION['GBrole']; ?></div>
                        </div>
                    </div>

                    <nav class="d-grid gap-3">
                        <a href="?page=dashboard" class="btn <?php echo $page == 'dashboard' ? 'pink-button bg-light font-darkpink' : 'pink-button text-dark'; ?> py-3 fw-semibold">Dashboard</a>
                        <a href="?page=rooms" class="btn <?php echo $page == 'rooms' ? 'pink-button bg-light font-darkpink' : 'pink-button text-dark'; ?> py-3 fw-semibold">Rooms</a>
                        <a href="?page=reservations" class="btn <?php echo $page == 'reservations' ? 'pink-button bg-light font-darkpink' : 'pink-button text-dark'; ?> py-3 fw-semibold">Reservations</a>
                        <a href="?page=amenities" class="btn <?php echo $page == 'amenities' ? 'pink-button bg-light font-darkpink' : 'pink-button text-dark'; ?> py-3 fw-semibold">Amenities</a>
                    </nav>
                </div>

                <form method="POST" action="" class="w-100">
                    <button type="submit" name="logout" class="btn btn-light rounded-pill px-4 py-2 d-inline-flex align-items-center justify-content-center gap-2 text-darkbrown w-100">
                        <img src="images/logo-logout-brown.png" alt="Log out" style="height:20px; width:auto;">
                        Log Out
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-grow-1 bg-lightpink min-vh-100">
            <div class="container-fluid py-4 px-4 px-md-5">

                <?php if ($page == 'dashboard'): ?>
                    <div class="welcome-card text-white rounded-4 shadow-sm p-4 mb-4 d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-gold-light text-uppercase fw-bold d-block mb-1">Management Portal</span>
                            <h1 class="font-title fs-2 fw-bold mb-1" style="color: #fff;">Dashboard Overview</h1>
                            <p class="mb-0 text-light-50" style="font-size: 0.95rem;">Welcome back, <strong><?php echo $_SESSION['GBfullname']; ?></strong>! Here is an update on the hotel's status for today.</p>
                        </div>
                        <div class="d-none d-md-block pe-2">
                            <img src="images/logo-profile-pink.png" alt="Hotel Icon" style="width: 45px; opacity: 0.75;">
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-6 col-md-3"><div class="bg-white rounded-4 shadow-sm p-4 h-100"><div class="font-title fw-bold fs-2 text-darkbrown"><?php echo $totalRooms; ?></div><div class="text-muted">Total Rooms</div></div></div>
                        <div class="col-6 col-md-3"><div class="bg-white rounded-4 shadow-sm p-4 h-100"><div class="font-title fw-bold fs-2 text-darkbrown"><?php echo $totalReservations; ?></div><div class="text-muted">Total Bookings</div></div></div>
                        <div class="col-6 col-md-3"><div class="bg-white rounded-4 shadow-sm p-4 h-100"><div class="font-title fw-bold fs-2 text-darkbrown"><?php echo $pendingReservations; ?></div><div class="text-muted">Pending Requests</div></div></div>
                        <div class="col-6 col-md-3"><div class="bg-white rounded-4 shadow-sm p-4 h-100"><div class="font-title fw-bold fs-2 text-darkbrown"><?php echo $confirmedReservations; ?></div><div class="text-muted">Confirmed Bookings</div></div></div>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-12 col-xl-8">
                            <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h3 class="font-title fw-bold mb-1 text-darkbrown">Recent Reservations</h3>
                                    <a href="?page=reservations" class="btn btn-sm btn-outline-dark rounded-pill px-3">View all</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr><th>Guest Name</th><th>Contact / Email</th><th>Check-In Date</th><th>Status</th><th class="text-end">Total Price</th></tr>
                                        </thead>
                                        <tbody>
                                            <?php if($recentReservations && $recentReservations->num_rows > 0): ?>
                                                <?php while($row = $recentReservations->fetch_assoc()) { ?>
                                                <tr>
                                                    <td class="fw-bold text-dark"><?php echo $row['full_name']; ?></td>
                                                    <td><small><?php echo $row['email']; ?></small></td>
                                                    <td><small class="font-mono"><?php echo $row['check_in_date']; ?></small></td>
                                                    <td>
                                                       <?php if($row['reservation_status'] === 'Confirmed'): ?>
                                                            <span class="badge bg-success px-3 py-2 rounded-pill">Confirmed</span>
                                                        <?php elseif($row['reservation_status'] === 'Pending'): ?>
                                                            <span class="badge bg-warning font-brown px-3 py-2 rounded-pill">Pending</span>
                                                        <?php elseif($row['reservation_status'] === 'Completed'): ?>
                                                            <span class="badge bg-info px-3 py-2 rounded-pill text-dark">Completed</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-danger text-white px-3 py-2 rounded-pill"><?php echo $row['reservation_status']; ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-end fw-semibold">₱<?php echo number_format($row['total_price'], 2); ?></td>
                                                </tr>
                                                <?php } ?>
                                            <?php else: ?>
                                                <tr><td colspan="5" class="text-center text-muted py-3">No reservation records located.</td></tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-xl-4">
                            <div class="bg-brown rounded-4 shadow-sm p-4 text-white h-100">
                                <h3 class="font-title fw-bold mb-4">Quick Actions</h3>
                                <div class="d-grid gap-3">
                                    <a href="?page=reservations" class="btn btn-outline-light rounded-4 py-3 text-start">Manage Reservations</a>
                                    <a href="?page=rooms" class="btn btn-outline-light rounded-4 py-3 text-start">Update Room Status</a>
                                    <a href="?page=amenities" class="btn btn-outline-light rounded-4 py-3 text-start">Review Amenities Usage</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else: 
                    $allowed_pages = ['rooms', 'reservations', 'amenities'];
                    if (in_array($page, $allowed_pages)) {
                        include("employee_dashboard/employee_" . $page . ".php");
                    } else {
                        echo "<div class='alert alert-danger rounded-4 shadow-sm' style='background-color: #2c2421; color: #fbb4b9; border-color: #fbb4b9;'>Page architecture blueprint not found.</div>";
                    }
                endif; ?>

            </div>
        </main>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>