<?php
    require_once "dbaseconnection.php";
    session_start();

    $userInfo = [
        $_SESSION['GBfullname'],
        $_SESSION['GBusername'],
        $_SESSION['GBemail'],
    ];


    // Get most recent reservation
    $reservesql = "SELECT r.reservation_id, r.check_in_date, r.check_out_date, r.reservation_status, d.room_type FROM tbl_reservationdetails r INNER JOIN tbl_roomdetails d ON r.room_id = d.room_id WHERE r.user_id = " . $_SESSION['GBid'] . " ORDER BY r.reservation_id DESC LIMIT 1";

    $result = $conn->query($reservesql);
    $latestBooking = $result->fetch_assoc();


    // Image and Status
    if ($latestBooking) {
        if ($latestBooking['room_type'] == "Standard") {
            $roomImage = "images/hotel_pictures/standard1.png";
        }
        elseif ($latestBooking['room_type'] == "Deluxe") {
            $roomImage = "images/hotel_pictures/deluxe1.jpg";
        }
        elseif ($latestBooking['room_type'] == "Suite") {
            $roomImage = "images/hotel_pictures/suite1.jpg";
        }

        $statusClass = "bg-secondary text-white";

        switch ($latestBooking['reservation_status']) {
            case "Confirmed":
                $statusClass = "bg-success text-white";
                break;

            case "Pending":
                $statusClass = "bg-warning text-dark";
                break;
        }
    }




    //Log Out Button
    if (isset($_POST['logout'])) {

        // LOGS - Logging Out
        if (isset($_SESSION['GBid'])) {
            $logsql = "INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('" . $_SESSION['GBid'] . "', 'Logged Out', NOW())";
            $conn->query($logsql);
        }

        // Abort Session
        session_abort();

        // Go Back to Log In Page
        header("location:login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Overview - Grand Budapest Hotel</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">

    <style>
        .booking-btn {
            background-color: #de7994;
            color: #2b241f;
        }
        .booking-btn:hover {
            background-color: #a35b6e;
            color: #2b241f;
        }
    </style>
</head>

<body class="bg-lightpink font-body">

    <!-- NAVBAR -->
    <?php include 'navbar.php'; ?>

    <!-- HERO SECTION -->
    <section class="text-white py-5"
        style="background-image: url('images/index-hero.png'); 
        background-size: cover; 
        background-position: center; 
        background-color: rgba(0,0,0,0.6); 
        background-blend-mode: multiply;">

        <div class="container py-4 ps-5">

            <div class="row">

                <div class="col">

                    <h1 class="display-3 font-title font-white fw-bold mb-2">
                        Profile
                    </h1>

                    <h1 class="display-5 font-title font-white mb-5 fw-bold">
                        Greetings,
                        <span class="display-5 font-title font-pink fw-bold">
                            <?php echo $userInfo[0]; ?>
                        </span>!
                    </h1>

                    <form method="post">
                        <button type="submit"
                            name="logout"
                            class="btn btn-light rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2 text-darkbrown">
                            <img src="images/logo-logout-brown.png"
                                alt="Log out"
                                style="height:20px; width:auto;">
                            Log Out
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </section>

    <!-- Navigation -->
    <nav class="bg-darkbrown py-3">
        <div class="container">
            <div class="row justify-content-center text-center gap-5 gap-md-5">

                <div class="col-auto mx-5">
                    <a href="profile_overview.php"
                        class="font-pink font-title text-decoration-none pb-1 fw-semibold px-3">
                        Overview
                    </a>
                </div>

                <div class="col-auto mx-5">
                    <a href="profile_booking.php"
                        class="font-white font-title text-decoration-none pb-1 fw-semibold px-3">
                        All Bookings
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN SECTION -->
    <main class="container my-5" id="profile">

        <div class="row g-4">

            <!-- ACCOUNT INFORMATION -->
            <div class="col-lg-6">

                <div class="card rounded-4 shadow-sm border-0">

                    <div class="card-body p-5">

                        <div class="d-flex align-items-center gap-3 mb-5">
                            <div>
                                <h3 class="h4 fw-bold mb-0">
                                    Account Information
                                </h3>
                            </div>
                        </div>

                        <div class="row">

                            <!-- LABELS -->
                            <div class="col-5">
                                <ul class="list-unstyled mb-0">

                                    <li class="d-flex align-items-center mb-4">
                                        <p class="text-secondary mb-0 fs-5">
                                            Full Name
                                        </p>
                                    </li>

                                    <li class="d-flex align-items-center mb-4">
                                        <p class="text-secondary mb-0 fs-5">
                                            Username
                                        </p>
                                    </li>

                                    <li class="d-flex align-items-center mb-4">
                                        <p class="text-secondary mb-0 fs-5">
                                            Email
                                        </p>
                                    </li>
                                </ul>

                            </div>

                            <!-- VALUES -->
                            <div class="col-7">

                                <ul class="list-unstyled mb-0">
                                    <li class="mb-4">
                                        <p class="mb-0 fw-semibold fs-5">
                                            <?php echo $userInfo[0]; ?>
                                        </p>
                                    </li>

                                    <li class="mb-4">
                                        <p class="mb-0 fw-semibold fs-5">
                                            <?php echo $userInfo[1]; ?>
                                        </p>
                                    </li>

                                    <li class="mb-4">
                                        <p class="mb-0 fw-semibold fs-5">
                                            <?php echo $userInfo[2]; ?>
                                        </p>
                                    </li>
                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <?php if($latestBooking): ?>

                <!-- UPCOMING STAY -->
                <div class="col-lg-6">

                    <div class="card rounded-4 shadow-sm border-0 bg-lightbrown text-white">

                        <div class="card-body p-5">

                            <div class="d-flex align-items-center justify-content-between mb-4">

                                <div>
                                    <h3 class="h4 fw-bold mb-0">
                                        Upcoming Stay
                                    </h3>
                                </div>

                                <?php if($latestBooking): ?>
                                    <span class="badge rounded-pill px-4 py-2 fs-6 <?php echo $statusClass; ?>">
                                        <?php echo $latestBooking['reservation_status']; ?>
                                    </span>
                                <?php endif; ?>

                            </div>

                            <!-- IMAGE -->

                            <div class="rounded-4 overflow-hidden mb-4"
                                style="min-height:220px;
                                background:url('<?php echo $roomImage; ?>')
                                center/cover no-repeat;">
                            </div>

                            <!-- BOOKING INFO -->

                            <h4 class="h3 text-pink fw-bold mb-2">
                                <?php echo $latestBooking['room_type']; ?> Room
                            </h4>

                            <p class=" fs-5 mb-4">
                                Reservation ID #<?php echo $latestBooking['reservation_id']; ?>
                            </p>

                            <div class="d-flex align-items-center gap-3 mb-4">
                                <img src="images/logo-calendar-pink.png"
                                    alt="Dates"
                                    style="height:22px; width:auto;">

                                <span class="fs-5">
                                    <?php
                                        echo date("F j, Y", strtotime($latestBooking['check_in_date']));
                                        echo " - ";
                                        echo date("F j, Y", strtotime($latestBooking['check_out_date']));
                                    ?>
                                </span>
                            </div>

                            <a href="profile_viewbooking.php?id=<?php echo $latestBooking['reservation_id']; ?>"
                                class="btn booking-btn rounded-pill px-5 py-3 fw-semibold fs-5 shadow">
                                View Booking
                            </a>

                        </div>

                    </div>

                </div>

            <?php else: ?>
                <div class="card-body col-lg-6 p-5 bg-lightbrown text-white rounded-4">
                    <h3 class="h4 fw-bold mb-3">Upcoming Stay</h3>
                    <h5 class="mb-5">You currently have no reservations.</h5>
                    <a href="book_1.php"
                        class="btn booking-btn rounded-pill px-4 py-3 text-white fw-semibold">
                        Book a Room
                    </a>
                </div>
            <?php endif; ?>

        </div>

    </main>

    <!-- FOOTER -->
    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>