<?php
$user = [
    'fullName' => 'Adrian Dizon',
    'username' => 'adriandzn',
    'email' => 'adrian.dizon.cics@ust.edu.ph',
    'password' => '•••••••',
];

$booking = [
    'room' => 'Deluxe Room',
    'bookingId' => '#123456',
    'status' => 'Confirmed',
    'dates' => 'May 25 - 31, 2026',
    'guests' => '8 Guests',
    'image' => 'images/index-hero.png',
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

    <section class="text-white py-5 border-top border-secondary"
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
                        Greetings, <span class="display-5 font-title font-pink"><?php echo $user['fullName'];?></span>!
                    </h1>
                    <a href="#" class="btn btn-light rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2 text-darkbrown">
                                <img src="images/logo-logout-brown.png" alt="Log out" style="height:20px; width:auto;">
                                Log Out
                            </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation -->

    <nav class="bg-darkbrown border-top border-secondary py-3">
        <div class="container">

            <div class="row justify-content-center text-center gap-5">

                <div class="col-auto mx-5">
                    <a href="amenities_dining.php"
                        class="font-pink font-title text-decoration-none pb-1 fw-semibold px-3">
                        Overview
                    </a>
                </div>

                <div class="col-auto mx-5">
                    <a href="amenities_activities.php"
                        class="font-white font-title text-decoration-none pb-1 fw-semibold px-3">
                        All Bookings
                    </a>
                </div>

            </div>

        </div>
    </nav>

    <!-- Main Section -->

    <main class="container my-5" id="profile">
        <!-- <div class="row justify-content-center mb-4">
            <div class="col-lg-8">
                <div class="rounded-4 overflow-hidden shadow-sm bg-darkbrown text-white">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 p-4">
                        <div>
                            <h2 class="h3 fw-bold mb-2 font-title">Profile Overview</h2>
                            <p class="mb-0 text-secondary">Manage your account, bookings, and personal details in one place.</p>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-outline-light rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2">
                                <img src="images/logo-edit-white.png" alt="Edit profile" style="height:20px; width:auto;">
                                Edit Profile
                            </a>
                            <a href="#" class="btn btn-light rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2 text-darkbrown">
                                <img src="images/logo-logout-white.png" alt="Log out" style="height:20px; width:auto; filter: invert(1);">
                                Log Out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card rounded-4 shadow-sm border-0">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="rounded-circle bg-lightpink d-flex align-items-center justify-content-center" style="width:56px; height:56px;">
                                <img src="images/logo-profile-pink.png" alt="Profile icon" style="height:28px; width:auto;">
                            </div>
                            <div>
                                <h3 class="h5 fw-bold mb-1">Account Information</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex align-items-center mb-3">
                                        <img src="images/logo-edit-pink.png" alt="Full name" style="height:18px; width:auto;" class="me-3">
                                        <div>
                                            <p class="text-secondary small mb-0">Full Name</p>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <img src="images/logo-edit-pink.png" alt="Username" style="height:18px; width:auto;" class="me-3">
                                        <div>
                                            <p class="text-secondary small mb-0">Username</p>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <img src="images/logo-edit-pink.png" alt="Email" style="height:18px; width:auto;" class="me-3">
                                        <div>
                                            <p class="text-secondary small mb-0">Email</p>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <img src="images/logo-edit-pink.png" alt="Password" style="height:18px; width:auto;" class="me-3">
                                        <div>
                                            <p class="text-secondary small mb-0">Password</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-3">
                                        <p class="mb-0 fw-semibold"><?php echo $user['fullName']; ?></p>
                                    </li>
                                    <li class="mb-3">
                                        <p class="mb-0 fw-semibold"><?php echo $user['username']; ?></p>
                                    </li>
                                    <li class="mb-3">
                                        <p class="mb-0 fw-semibold"><?php echo $user['email']; ?></p>
                                    </li>
                                    <li>
                                        <p class="mb-0 fw-semibold"><?php echo $user['password']; ?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card rounded-4 shadow-sm border-0 bg-darkbrown text-white">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <h3 class="h5 fw-bold mb-1">Upcoming Stay</h3>
                            </div>
                            <span class="badge rounded-pill bg-success text-white"><?php echo $booking['status']; ?></span>
                        </div>

                        <div class="rounded-4 overflow-hidden mb-4" style="min-height:220px; background:url('<?php echo $booking['image']; ?>') center/cover no-repeat;"></div>

                        <h4 class="h5 text-pink fw-bold mb-2"><?php echo $booking['room']; ?></h4>
                        <p class="text-secondary small mb-3">Booking <?php echo $booking['bookingId']; ?></p>

                        <div class="d-flex align-items-center gap-3 text-secondary mb-2">
                            <img src="images/logo-calendar-pink.png" alt="Dates" style="height:20px; width:auto;">
                            <span><?php echo $booking['dates']; ?></span>
                        </div>
                        <div class="d-flex align-items-center gap-3 text-secondary mb-4">
                            <img src="images/logo-profile-pink.png" alt="Guests" style="height:20px; width:auto;">
                            <span><?php echo $booking['guests']; ?></span>
                        </div>

                        <a href="profile_viewbooking.php" class="btn rounded-pill px-5 py-3 bg-lightpink text-darkbrown fw-semibold">View Booking</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
