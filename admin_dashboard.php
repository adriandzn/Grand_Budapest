<?php
require_once "dbaseconnection.php";
session_start();

// 1. SECURITY WALL: Confirm identity and role clear access clearance levels
if (!isset($_SESSION['GBrole']) || $_SESSION['GBrole'] !== "Admin") {
    header("location: login.php");
    exit;
}

// 2. DISCONNECT EXECUTION: Handle explicit logout post actions cleanly
if (isset($_POST['logout'])) {
    if (isset($_SESSION['GBid'])) {
        $logsql = "INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('" . $_SESSION['GBid'] . "', 'Logged Out', NOW())";
        $conn->query($logsql);
    }
    session_destroy();
    header("location:login.php");
    exit;
}

// 3. TARGET ROUTING: Trace target panel execution views
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// 4. STATISTICAL COMPILATION: Cache metric blocks cleanly for the home view
$totalRooms = 0; $totalUsers = 0; $totalReservations = 0; $pendingReservations = 0;
if ($page == 'dashboard') {
    $totalRooms = $conn->query("SELECT COUNT(*) AS total FROM tbl_roomdetails")->fetch_assoc()['total'];
    $totalUsers = $conn->query("SELECT COUNT(*) AS total FROM tbl_userdetails")->fetch_assoc()['total'];
    $totalReservations = $conn->query("SELECT COUNT(*) AS total FROM tbl_reservationdetails")->fetch_assoc()['total'];
    $pendingReservations = $conn->query("SELECT COUNT(*) AS total FROM tbl_reservationdetails WHERE reservation_status='Pending'")->fetch_assoc()['total'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Grand Budapest Hotel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">
</head>
<body class="bg-lightpink font-body">

    <div class="d-flex min-vh-100">

        <aside class="bg-darkbrown text-white flex-shrink-0" style="width: 260px; min-height: 100vh;">
            <div class="d-flex flex-column justify-content-between h-100 p-4">
                <div>
                    <div class="mb-5 text-center">
                        <img src="images/logo.png" alt="Grand Budapest" class="img-fluid" style="max-width: 120px;">
                        <div class="font-title fs-5 mt-3">GRAND BUDAPEST</div>
                        <div class="font-title text-light" style="font-size: 0.8rem; letter-spacing: 0.12em;">HOTEL</div>
                    </div>

                    <div class="mb-4 px-3 py-3 rounded-4 bg-brown d-flex align-items-center gap-3">
                        <img src="images/logo-profile-pink.png" alt="Administrator" style="width: 28px;">
                        <div>
                            <div class="font-title fw-bold"><?php echo htmlspecialchars($_SESSION['GBfullname']); ?></div>
                            <div class="small text-light"><?php echo htmlspecialchars($_SESSION['GBrole']); ?></div>
                        </div>
                    </div>

                    <nav class="d-grid gap-3">
                        <a href="?page=dashboard" class="btn <?php echo $page == 'dashboard' ? 'btn-light text-darkbrown' : 'pink-button text-dark'; ?> py-3 fw-semibold">Dashboard</a>
                        <a href="?page=rooms" class="btn <?php echo $page == 'rooms' ? 'btn-light text-darkbrown' : 'pink-button text-dark'; ?> py-3 fw-semibold">Rooms</a>
                        <a href="?page=reservations" class="btn <?php echo $page == 'reservations' ? 'btn-light text-darkbrown' : 'pink-button text-dark'; ?> py-3 fw-semibold">Reservations</a>
                        <a href="?page=amenities" class="btn <?php echo $page == 'amenities' ? 'btn-light text-darkbrown' : 'pink-button text-dark'; ?> py-3 fw-semibold">Amenities</a>
                        <a href="?page=users" class="btn <?php echo $page == 'users' ? 'btn-light text-darkbrown' : 'pink-button text-dark'; ?> py-3 fw-semibold">Users</a>
                        <a href="?page=logs" class="btn <?php echo $page == 'logs' ? 'btn-light text-darkbrown' : 'pink-button text-dark'; ?> py-3 fw-semibold">Logs</a>
                    </nav>
                </div>

                <form method="POST" action="">
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
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
                        <div>
                            <div class="font-title text-darkbrown fs-2 fw-bold">Dashboard</div>
                            <p class="mb-0 text-darkbrown">Welcome back, Admin! Here's what's happening today.</p>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-6 col-md-3"><div class="bg-white rounded-4 shadow-sm p-4 h-100"><div class="font-title fw-bold fs-2 text-darkbrown"><?php echo $totalRooms; ?></div><div class="text-muted">Total Rooms</div></div></div>
                        <div class="col-6 col-md-3"><div class="bg-white rounded-4 shadow-sm p-4 h-100"><div class="font-title fw-bold fs-2 text-darkbrown"><?php echo $totalReservations; ?></div><div class="text-muted">Reservations</div></div></div>
                        <div class="col-6 col-md-3"><div class="bg-white rounded-4 shadow-sm p-4 h-100"><div class="font-title fw-bold fs-2 text-darkbrown"><?php echo $pendingReservations; ?></div><div class="text-muted">Pending Requests</div></div></div>
                        <div class="col-6 col-md-3"><div class="bg-white rounded-4 shadow-sm p-4 h-100"><div class="font-title fw-bold fs-2 text-darkbrown"><?php echo $totalUsers; ?></div><div class="text-muted">Users</div></div></div>
                    </div>

                    <div class="row g-4">
                        <div class="col-12 col-xl-8">
                            <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h3 class="font-title fw-bold mb-1">Recent Reservations</h3>
                                    <a href="?page=reservations" class="btn btn-sm btn-outline-secondary rounded-pill px-3">View all</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr><th>Guest</th><th>Room</th><th>Check-in</th><th>Status</th><th class="text-end">Total</th></tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT r.*, rm.room_type FROM tbl_reservationdetails r 
                                                    INNER JOIN tbl_roomdetails rm ON r.room_id = rm.room_id 
                                                    ORDER BY r.reservation_id DESC LIMIT 5";
                                            $result = $conn->query($sql);
                                            while($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td class="fw-bold"><?php echo htmlspecialchars($row['full_name']); ?></td>
                                                <td><?php echo htmlspecialchars($row['room_type']); ?></td>
                                                <td><?php echo htmlspecialchars($row['check_in_date']); ?></td>
                                                <td><span class="badge bg-secondary px-3 py-2 rounded-pill"><?php echo htmlspecialchars($row['reservation_status']); ?></span></td>
                                                <td class="text-end fw-semibold">₱<?php echo number_format($row['total_price'], 2); ?></td>
                                            </tr>
                                            <?php } ?>
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
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else: 
                    // DYNAMIC SUB-FILE EXTRACTION ROUTER PATTERN
                    $allowed_pages = ['rooms', 'reservations', 'amenities', 'users', 'logs'];
                    if (in_array($page, $allowed_pages)) {
                        include("admin_dashboard/admin_" . $page . ".php");
                    } else {
                        echo "<div class='alert alert-danger'>Page not found.</div>";
                    }
                endif; ?>

            </div>
        </main>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>