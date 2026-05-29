<?php

$userInfo = [
    'Adrian Dizon',
    'adriandzn',
    'adrian.dizon.cics@ust.edu.ph',
    '•••••••'
];

$bookingInfo = [
    'Deluxe Room',
    '#123456',
    'Confirmed',
    'May 25 - 31, 2026',
    '8 Guests',
    'images/index-hero.png'
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Overview - Grand Budapest Hotel</title>

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

                    <h1 class="display-5 font-title font-white mb-5 fw-bold">
                        Greetings,
                        <span class="display-5 font-title font-pink fw-bold">
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

                            <div class="rounded-circle bg-lightpink d-flex align-items-center justify-content-center"
                                style="width:56px; height:56px;">

                                <img src="images/logo-profile-pink.png"
                                    alt="Profile icon"
                                    style="height:28px; width:auto;">

                            </div>

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

                                        <img src="images/logo-edit-pink.png"
                                            alt="Full name"
                                            style="height:18px; width:auto;"
                                            class="me-3">

                                        <p class="text-secondary mb-0 fs-5">
                                            Full Name
                                        </p>

                                    </li>

                                    <li class="d-flex align-items-center mb-4">

                                        <img src="images/logo-edit-pink.png"
                                            alt="Username"
                                            style="height:18px; width:auto;"
                                            class="me-3">

                                        <p class="text-secondary mb-0 fs-5">
                                            Username
                                        </p>

                                    </li>

                                    <li class="d-flex align-items-center mb-4">

                                        <img src="images/logo-edit-pink.png"
                                            alt="Email"
                                            style="height:18px; width:auto;"
                                            class="me-3">

                                        <p class="text-secondary mb-0 fs-5">
                                            Email
                                        </p>

                                    </li>

                                    <li class="d-flex align-items-center">

                                        <img src="images/logo-edit-pink.png"
                                            alt="Password"
                                            style="height:18px; width:auto;"
                                            class="me-3">

                                        <p class="text-secondary mb-0 fs-5">
                                            Password
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

                                    <li>

                                        <p class="mb-0 fw-semibold fs-5">
                                            <?php echo $userInfo[3]; ?>
                                        </p>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

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

                            <span class="badge rounded-pill bg-success text-white px-4 py-2 fs-6">

                                <?php echo $bookingInfo[2]; ?>

                            </span>

                        </div>

                        <!-- IMAGE -->

                        <div class="rounded-4 overflow-hidden mb-4"
                            style="min-height:220px;
                            background:url('<?php echo $bookingInfo[5]; ?>')
                            center/cover no-repeat;">

                        </div>

                        <!-- BOOKING INFO -->

                        <h4 class="h3 text-pink fw-bold mb-2">

                            <?php echo $bookingInfo[0]; ?>

                        </h4>

                        <p class=" fs-5 mb-4">

                            Booking <?php echo $bookingInfo[1]; ?>

                        </p>

                        <div class="d-flex align-items-center gap-3 mb-3">

                            <img src="images/logo-calendar-pink.png"
                                alt="Dates"
                                style="height:22px; width:auto;">

                            <span class="fs-5">
                                <?php echo $bookingInfo[3]; ?>
                            </span>

                        </div>

                        <div class="d-flex align-items-center gap-3 mb-5">

                            <img src="images/logo-profile-pink.png"
                                alt="Guests"
                                style="height:22px; width:auto;">

                            <span class="fs-5">
                                <?php echo $bookingInfo[4]; ?>
                            </span>

                        </div>

                        <a href="profile_viewbooking.php"
                            class="btn rounded-pill px-5 py-3 bg-lightpink text-darkbrown fw-semibold fs-5">

                            View Booking

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>