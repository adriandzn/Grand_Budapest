<?php

$userInfo = [
    'Adrian Dizon'
];

$bookingRooms = [
    'Deluxe Room',
    'Suite Room',
    'Standard Room'
];

$bookingIds = [
    '#123456',
    '#123456',
    '#123456'
];

$bookingStatus = [
    'Confirmed',
    'Completed',
    'Completed'
];

$bookingDates = [
    'May 25 - 31, 2026',
    'December 26 - 28, 2025',
    'February 14 - 15, 2024'
];

$bookingGuests = [
    '8 Guests',
    '6 Guests',
    '2 Guests'
];

$bookingImages = [
    'images/index-hero.png',
    'images/index-hero.png',
    'images/index-hero.png'
];

$bookingStatusClass = [
    'bg-success text-white',
    'bg-dark text-white',
    'bg-dark text-white'
];

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile Bookings - Grand Budapest Hotel</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">

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

                    <h1 class="display-5 font-title font-white mb-5">
                        Greetings,
                        <span class="display-5 font-title font-pink">
                            <?php echo $userInfo[0]; ?>
                        </span>!
                    </h1>

                    <a href="#"
                        class="btn btn-light rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2 text-darkbrown">

                        <img src="images/logo-logout-brown.png"
                            alt="Log out"
                            style="height:20px; width:auto;">

                        Log Out

                    </a>

                </div>

            </div>

        </div>

    </section>

    <!-- Navigation -->

    <nav class="bg-darkbrown py-3">

        <div class="container">

            <div class="row justify-content-center text-center gap-5">

                <div class="col-auto mx-5">

                    <a href="profile_overview.php"
                        class="font-white font-title text-decoration-none pb-1 fw-semibold px-3">

                        Overview

                    </a>

                </div>

                <div class="col-auto mx-5">

                    <a href="profile_booking.php"
                        class="font-pink font-title text-decoration-none pb-1 fw-semibold px-3">

                        All Bookings

                    </a>

                </div>

            </div>

        </div>

    </nav>

    <!-- MAIN CONTENT -->

    <main class="container my-5" id="booking-list">


        

        <!-- BOOKINGS -->

        <div class="row g-4">

            <?php for($i = 0; $i < count($bookingRooms); $i++): ?>

            <div class="col-12">

                <div class="card rounded-4 shadow-sm border-0 overflow-hidden">

                    <div class="row g-0 align-items-center">

                        <!-- IMAGE -->

                        <div class="col-lg-4">

                            <div class="position-relative"
                                style="min-height:240px;
                                background:url('<?php echo $bookingImages[$i]; ?>')
                                center/cover no-repeat;">

                                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25"></div>

                            </div>

                        </div>

                        <!-- CONTENT -->

                        <div class="col-lg-8">

                            <div class="card-body py-4 px-4 px-md-5 bg-white">

                                <!-- TOP -->

                                <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-4">

                                    <div>

                                        <h3 class="h3 fw-bold text-darkbrown mb-2">

                                            <?php echo $bookingRooms[$i]; ?>

                                        </h3>

                                        <p class="text-secondary fs-5 mb-0">

                                            Booking <?php echo $bookingIds[$i]; ?>

                                        </p>

                                    </div>

                                    <span class="badge rounded-pill px-4 py-2 fs-6 <?php echo $bookingStatusClass[$i]; ?>">

                                        <?php echo $bookingStatus[$i]; ?>

                                    </span>

                                </div>

                                <!-- DETAILS -->

                                <div class="row g-3 align-items-center mb-4">

                                    <div class="col-md-6 d-flex align-items-center gap-3 text-darkbrown">

                                        <img src="images/logo-calendar-pink.png"
                                            alt="Dates"
                                            style="height:24px; width:auto;">

                                        <span class="fs-5">

                                            <?php echo $bookingDates[$i]; ?>

                                        </span>

                                    </div>

                                    <div class="col-md-6 d-flex align-items-center gap-3 text-darkbrown">

                                        <img src="images/logo-profile-pink.png"
                                            alt="Guests"
                                            style="height:24px; width:auto;">

                                        <span class="fs-5">

                                            <?php echo $bookingGuests[$i]; ?>

                                        </span>

                                    </div>

                                </div>

                                <!-- BUTTON -->

                                <div class="text-md-end">

                                    <a href="profile_viewbooking.php"
                                        class="btn rounded-pill px-4 py-3 bg-darkpink text-white fw-semibold fs-5">

                                        View Booking

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <?php endfor; ?>

        </div>

    </main>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>
