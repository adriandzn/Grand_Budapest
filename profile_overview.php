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
    <section class="position-relative overflow-hidden" style="min-height:520px;">
        <img src="images/index-hero.png" alt="Grand Budapest hero" class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover" style="filter: brightness(0.55);">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-60"></div>
        <div class="position-absolute top-0 start-0 w-100 px-4 py-4">
            <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center gap-3">
                <a href="index.php" class="text-white text-decoration-none d-inline-flex align-items-center gap-2">
                    <img src="images/logo.png" alt="Grand Budapest logo" style="height: 40px; width: auto;">
                    <span class="fw-semibold">GRAND BUDAPEST HOTEL</span>
                </a>
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a href="index.php" class="text-white text-decoration-none">HOME</a>
                    <a href="index.php#rooms" class="text-white text-decoration-none">ROOMS</a>
                    <a href="amenities_activities.php" class="text-white text-decoration-none">AMENITIES</a>
                    <a href="contact.php" class="text-white text-decoration-none">ABOUT</a>
                    <a href="contact.php" class="text-white text-decoration-none">CONTACT</a>
                    <a href="profile_overview.php" class="text-white text-decoration-none">PROFILE</a>
                </div>
                <a href="#" class="btn rounded-pill px-4 py-2 bg-darkpink text-white fw-semibold">BOOK NOW</a>
            </div>
        </div>

        <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-4" style="max-width:940px;">
            <p class="text-uppercase text-secondary small mb-2">Profile</p>
            <h1 class="display-4 fw-bold font-title mb-3">Greetings, <span class="text-pink">Adrian Dizon</span>!</h1>
            <a href="#profile" class="btn rounded-pill px-5 py-3 bg-lightpink font-darkbrown fw-semibold">View Profile</a>
        </div>
    </section>

    <main class="container my-5" id="profile">
        <div class="row justify-content-center mb-4">
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
        </div>

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
                                <p class="text-secondary small mb-0">Your personal details are safe and secure.</p>
                            </div>
                        </div>

                        <div class="mb-3 d-flex align-items-center gap-3">
                            <img src="images/logo-profile-pink.png" alt="Full name" style="height:24px; width:auto;">
                            <div>
                                <p class="text-secondary small mb-1">Full Name</p>
                                <p class="mb-0 fw-semibold"><?php echo $user['fullName']; ?></p>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center gap-3">
                            <img src="images/logo-calendar-pink.png" alt="Username" style="height:24px; width:auto;">
                            <div>
                                <p class="text-secondary small mb-1">Username</p>
                                <p class="mb-0 fw-semibold"><?php echo $user['username']; ?></p>
                            </div>
                        </div>
                        <div class="mb-3 d-flex align-items-center gap-3">
                            <img src="images/logo-mail-pink.png" alt="Email" style="height:24px; width:auto;">
                            <div>
                                <p class="text-secondary small mb-1">Email</p>
                                <p class="mb-0 fw-semibold"><?php echo $user['email']; ?></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <img src="images/logo-lock-brown.png" alt="Password" style="height:24px; width:auto; filter: brightness(0) invert(1);">
                            <div>
                                <p class="text-secondary small mb-1">Password</p>
                                <p class="mb-0 fw-semibold"><?php echo $user['password']; ?></p>
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
                                <p class="text-secondary small mb-0">Get ready for your next visit.</p>
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

    <footer class="bg-darkbrown text-white py-4">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    <h5 class="font-title text-white mb-3">GRAND BUDAPEST HOTEL</h5>
                    <p class="small text-secondary mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur efficitur, metus et varius dignissim.</p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-white mb-3">Hotel Location</h6>
                    <p class="small text-secondary mb-1">1 Alpine Summit Drive</p>
                    <p class="small text-secondary mb-1">Lutz, Zubrowka 1099</p>
                    <p class="small text-secondary mb-0">Republic of Zubrowka</p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-white mb-3">Contact Us</h6>
                    <p class="small text-secondary mb-1">+63 975 714 1559</p>
                    <p class="small text-secondary mb-0">reservations@grandbudapest.lb</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
