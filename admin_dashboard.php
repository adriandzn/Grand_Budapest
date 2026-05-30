<?php
require_once "dbaseconnection.php";
session_start();
?>
<?php

$totalRooms = $conn->query("SELECT COUNT(*) AS total FROM tbl_roomdetails")
                   ->fetch_assoc()['total'];

$totalUsers = $conn->query("SELECT COUNT(*) AS total FROM tbl_userdetails")
                   ->fetch_assoc()['total'];

$totalReservations = $conn->query("SELECT COUNT(*) AS total FROM tbl_reservationdetails")
                          ->fetch_assoc()['total'];

$pendingReservations = $conn->query("
    SELECT COUNT(*) AS total
    FROM tbl_reservationdetails
    WHERE reservation_status='Pending'
")->fetch_assoc()['total'];

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

        <!-- SIDEBAR -->

        <aside class="bg-darkbrown text-white flex-shrink-0"
            style="width: 260px; min-height: 100vh;">

            <div class="d-flex flex-column justify-content-between h-100 p-4">

                <div>

                    <!-- LOGO -->

                    <div class="mb-5 text-center">

                        <img src="images/logo.png"
                            alt="Grand Budapest"
                            class="img-fluid"
                            style="max-width: 120px;">

                        <div class="font-title fs-5 mt-3">
                            GRAND BUDAPEST
                        </div>

                        <div class="font-title text-light"
                            style="font-size: 0.8rem; letter-spacing: 0.12em;">

                            HOTEL

                        </div>

                    </div>

                    <!-- ADMIN CARD -->

                    <div class="mb-4 px-3 py-3 rounded-4 bg-brown d-flex align-items-center gap-3">

                        <img src="images/logo-profile-pink.png"
                            alt="Administrator"
                            style="width: 28px;">

                        <div>

                            <div class="font-title fw-bold">
                                Administrator
                            </div>

                            <div class="small text-light">
                                Welcome back
                            </div>

                        </div>

                    </div>

                    <!-- NAVIGATION -->

                    <nav class="d-grid gap-3">

                        <a href="#"
                            class="btn pink-button text-dark py-3 fw-semibold">

                            Dashboard

                        </a>

                        <a href="#"
                            class="btn pink-button text-dark py-3 fw-semibold">

                            Rooms

                        </a>

                        <a href="#"
                            class="btn pink-button text-dark py-3 fw-semibold">

                            Reservations

                        </a>

                        <a href="#"
                            class="btn pink-button text-dark py-3 fw-semibold">

                            Amenities

                        </a>

                        <a href="#"
                            class="btn pink-button text-dark py-3 fw-semibold">

                            Users

                        </a>

                        <a href="#"
                            class="btn pink-button text-dark py-3 fw-semibold">

                            Reports

                        </a>

                        <a href="#"
                            class="btn pink-button text-dark py-3 fw-semibold">

                            Logs

                        </a>

                        <a href="#"
                            class="btn pink-button text-dark py-3 fw-semibold">

                            Settings

                        </a>

                    </nav>

                </div>

                <!-- LOGOUT -->

                <a href="#"
                    class="btn btn-outline-light rounded-pill py-3 mt-4 fw-semibold">

                    ← Logout

                </a>

            </div>

        </aside>

        <!-- MAIN CONTENT -->

        <main class="flex-grow-1 bg-lightpink min-vh-100">

            <div class="container-fluid py-4 px-4 px-md-5">

                <!-- TOP SECTION -->

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">

                    <div>

                        <div class="font-title text-darkbrown fs-2 fw-bold">
                            Dashboard
                        </div>

                        <p class="mb-0 text-darkbrown">
                            Welcome back, Admin! Here's what's happening today.
                        </p>

                    </div>

                    <div class="d-flex gap-2 flex-wrap">

                        <button class="btn pink-button text-dark px-4 py-2 fw-semibold">
                            New Report
                        </button>

                        <button class="btn pink-button text-dark px-4 py-2 fw-semibold">
                            Add Room
                        </button>

                    </div>

                </div>

                <!-- STATS -->

                <div class="row g-3 mb-4">

                    <div class="col-6 col-md-3">

                        <div class="bg-white rounded-4 shadow-sm p-4 h-100">

                            <div class="font-title fw-bold fs-2 text-darkbrown">
    <?php echo $totalRooms; ?>
</div>
<div class="text-muted">Total Rooms</div>

                        </div>

                    </div>

                    <div class="col-6 col-md-3">

                        <div class="bg-white rounded-4 shadow-sm p-4 h-100">

                            <div class="font-title fw-bold fs-2 text-darkbrown">
    <?php echo $totalReservations; ?>
</div>
<div class="text-muted">Reservations</div>

                        </div>

                    </div>

                    <div class="col-6 col-md-3">

                        <div class="bg-white rounded-4 shadow-sm p-4 h-100">

                            <div class="font-title fw-bold fs-2 text-darkbrown">
    <?php echo $pendingReservations; ?>
</div>
<div class="text-muted">Pending Requests</div>

                        </div>

                    </div>

                    <div class="col-6 col-md-3">

                        <div class="bg-white rounded-4 shadow-sm p-4 h-100">

                            <div class="font-title fw-bold fs-2 text-darkbrown">
    <?php echo $totalUsers; ?>
</div>
<div class="text-muted">Users</div>

                        </div>

                    </div>

                </div>

                <!-- MAIN GRID -->

                <div class="row g-4">

                    <!-- RESERVATIONS -->

                    <div class="col-12 col-xl-8">

                        <div class="bg-white rounded-4 shadow-sm p-4 h-100">

                            <div class="d-flex justify-content-between align-items-center mb-4">

                                <div>

                                    <h3 class="font-title fw-bold mb-1">
                                        Reservation Overview
                                    </h3>

                                    <p class="text-muted mb-0">
                                        Latest booking activity and status summary.
                                    </p>

                                </div>

                                <button class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                    View all
                                </button>

                            </div>
                            <?php

$logs = $conn->query("
SELECT l.*, u.full_name
FROM tbl_logs l
INNER JOIN tbl_userdetails u
ON l.user_id = u.user_id
ORDER BY log_id DESC
LIMIT 5
");

while($log = $logs->fetch_assoc()){

    echo "<p>";
    echo $log['full_name'];
    echo " - ";
    echo $log['action'];
    echo " - ";
    echo $log['date_time'];
    echo "</p>";
}
?>

                            <!-- TABLE -->

                            <div class="table-responsive">

                                <table class="table align-middle">

                                    <thead>

                                        <tr>

                                            <th>Guest</th>
                                            <th>Room</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th class="text-end">Total</th>

                                        </tr>

                                    </thead>

                                    <tbody>

<?php

$sql = "
SELECT r.*, rm.room_type
FROM tbl_reservationdetails r
INNER JOIN tbl_roomdetails rm
ON r.room_id = rm.room_id
ORDER BY r.reservation_id DESC
LIMIT 10
";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {

?>

<tr>

    <td class="fw-bold">
        <?php echo $row['full_name']; ?>
    </td>

    <td>
        <?php echo $row['room_type']; ?>
    </td>

    <td>
        <?php echo $row['check_in_date']; ?>
    </td>

    <td>
        <?php echo $row['reservation_status']; ?>
    </td>

    <td class="text-end fw-semibold">
        ₱<?php echo number_format($row['total_price'], 2); ?>
    </td>

</tr>

<?php
}
?>

</tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                    <!-- QUICK ACTIONS -->

                    <div class="col-12 col-xl-4">

                        <div class="bg-brown rounded-4 shadow-sm p-4 text-white h-100">

                            <h3 class="font-title fw-bold mb-4">
                                Quick Actions
                            </h3>

                            <div class="d-grid gap-3">

                                <a href="#"
                                    class="btn btn-outline-light rounded-4 py-3 text-start">

                                    Confirm Reservation

                                </a>

                                <a href="#"
                                    class="btn btn-outline-light rounded-4 py-3 text-start">

                                    Update Room Status

                                </a>

                                <a href="#"
                                    class="btn btn-outline-light rounded-4 py-3 text-start">

                                    Send Guest Message

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </main>

    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
