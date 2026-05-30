<?php
    require_once "dbaseconnection.php";
    session_start();


    // Get Reservations
    $reservesql = "SELECT r.reservation_id, r.room_id, r.check_in_date, r.check_out_date, r.reservation_status, d.room_type FROM tbl_reservationdetails r INNER JOIN tbl_roomdetails d ON r.room_id = d.room_id WHERE r.user_id = " . $_SESSION['GBid'] . " ORDER BY r.reservation_id DESC";

    $result = $conn->query($reservesql);


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
    <title>Profile Bookings - Grand Budapest Hotel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">

    <style>
        .booking-btn {
            background-color: #de7994;
        }
        .booking-btn:hover {
            background-color: #a35b6e;
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

        <div class="container py-4 ps-lg-5">
            <div class="row">
                <div class="col">
                    <h1 class="display-3 font-title font-white fw-bold mb-2">
                        Profile
                    </h1>

                    <h1 class="display-5 font-title font-white mb-5 fw-bold">
                        Greetings,
                        <span class="display-5 font-title font-pink fw-bold">
                            <?php echo $_SESSION['GBfullname']; ?>
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

    <!-- NAVIGATION -->
    <nav class="bg-darkbrown py-3">
        <div class="container">
            <div class="row justify-content-center text-center gap-5 gap-md-5">
                <div class="col-auto mx-5">
                    <a href="profile_overview.php"
                        class="font-white font-title text-decoration-none fw-semibold px-3">
                        Overview
                    </a>
                </div>

                <div class="col-auto mx-5">
                    <a href="profile_booking.php"
                        class="font-pink font-title text-decoration-none fw-semibold px-3">
                        All Bookings
                    </a>
                </div>
            </div>
        </div>
    </nav>


    <!-- MAIN CONTENT -->
    <main class="container my-5" id="booking-list">

        <div class="row g-4">

            <?php if ($result->num_rows > 0): ?>

                <?php while($booking = $result->fetch_assoc()): ?>
                    <div class="col-12">

                        <div class="card rounded-4 shadow-sm border-0 overflow-hidden">
                            <div class="row g-0 h-100">

                                <!-- IMAGE -->
                                <div class="col-lg-4">
                                    <div class="h-100">
                                        <?php
                                            if ($booking['room_type'] == "Standard") {
                                                $image = "images/hotel_pictures/standard1.png";
                                            }
                                            elseif ($booking['room_type'] == "Deluxe") {
                                                $image = "images/hotel_pictures/deluxe1.jpg";
                                            }
                                            elseif ($booking['room_type'] == "Suite") {
                                                $image = "images/hotel_pictures/suite1.jpg";
                                            }
                                        ?>
                                        <img src="<?php echo $image; ?>" alt="room" class="w-100 h-100 object-fit-cover" style="max-height: 270px;">
                                    </div>
                                </div>

                                <!-- CONTENT -->
                                <div class="col-lg-8">
                                    <div class="card-body py-4 px-4 px-md-5 bg-white h-100 d-flex flex-column justify-content-between">

                                        <!-- TOP -->
                                        <div>
                                            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">

                                                <!-- Room Type and Room ID -->
                                                <div>
                                                    <h3 class="h3 fw-bold text-darkbrown mb-2">
                                                        <?php echo $booking['room_type']; ?> Room
                                                    </h3>

                                                    <p class="text-secondary fs-5 mb-0">
                                                        Reservation ID #<?php echo $booking['reservation_id']; ?>
                                                    </p>
                                                </div>

                                                <!-- Reservation Status -->
                                                <?php
                                                    $statusClass = "bg-secondary text-white";
                                                    switch($booking['reservation_status']) {
                                                        case "Confirmed":
                                                            $statusClass = "bg-success text-white";
                                                            break;
                                                        case "Pending":
                                                            $statusClass = "bg-warning text-dark";
                                                            break;
                                                        case "Cancelled":
                                                            $statusClass = "bg-danger text-white";
                                                            break;
                                                        case "Completed":
                                                            $statusClass = "bg-black text-white";
                                                            break;
                                                    }
                                                ?>
                                                <span class="badge rounded-pill px-4 py-2 fs-6 <?php echo $statusClass; ?>">
                                                    <?php echo $booking['reservation_status']; ?>
                                                </span>

                                            </div>

                                            <!-- Date -->
                                            <div class="row g-3 align-items-center mb-4">
                                                <div class="col-md-6 d-flex align-items-center gap-3 text-darkbrown">
                                                    <img src="images/logo-calendar-pink.png"
                                                        alt="Dates"
                                                        style="height:24px; width:auto;">

                                                    <span class="fs-5">
                                                        <?php
                                                            echo date("F j, Y", strtotime($booking['check_in_date']));
                                                            echo " - ";
                                                            echo date("F j, Y", strtotime($booking['check_out_date']));
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- BUTTON -->
                                        <div class="text-md-end">
                                            <a href="profile_viewbooking.php?id=<?php echo $booking['reservation_id']; ?>"
                                                class="btn booking-btn rounded-pill px-4 py-3 text-white fw-semibold fs-5 shadow">
                                                View Booking
                                            </a>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                <?php endwhile; ?>

            <?php else: ?>

                <div class="col-12">
                    <div class="card rounded-4 shadow-sm border-0">
                        <div class="card-body text-center py-5">
                            <h3 class="fw-bold text-darkbrown mb-3">
                                No Reservations Found
                            </h3>

                            <p class="text-secondary mb-4">
                                You currently have no reservations.
                            </p>

                            <a href="book_1.php"
                                class="btn booking-btn rounded-pill px-4 py-3 text-white fw-semibold">
                                Book a Room
                            </a>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
            
        </div>

    </main>

    <!-- FOOTER -->
    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>