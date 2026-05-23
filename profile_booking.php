<?php
$bookings = [
    [
        'room' => 'Deluxe Room',
        'bookingId' => '#123456',
        'status' => 'Confirmed',
        'dates' => 'May 25 - 31, 2026',
        'guests' => '8 Guests',
        'image' => 'images/index-hero.png',
        'statusClass' => 'bg-success text-white'
    ],
    [
        'room' => 'Suite Room',
        'bookingId' => '#123456',
        'status' => 'Completed',
        'dates' => 'December 26 - 28, 2025',
        'guests' => '6 Guests',
        'image' => 'images/index-hero.png',
        'statusClass' => 'bg-dark text-white'
    ],
    [
        'room' => 'Standard Room',
        'bookingId' => '#123456',
        'status' => 'Completed',
        'dates' => 'February 14 - 15, 2024',
        'guests' => '2 Guests',
        'image' => 'images/index-hero.png',
        'statusClass' => 'bg-dark text-white'
    ],
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
    <section class="position-relative overflow-hidden" style="min-height:520px;">
        <img src="images/index-hero.png" alt="Grand Budapest hero" class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover" style="filter: brightness(0.60);">
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
            <a href="#booking-list" class="btn rounded-pill px-5 py-3 bg-lightpink font-darkbrown fw-semibold">View All Bookings</a>
        </div>
    </section>

    <main class="container my-5" id="booking-list">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-10">
                <div class="rounded-4 overflow-hidden shadow-sm bg-darkbrown text-white">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 p-4">
                        <div>
                            <h2 class="h3 fw-bold mb-2 font-title">All Bookings</h2>
                            <p class="mb-0 text-secondary">Browse your reservations and manage your stay details from one place.</p>
                        </div>
                        <a href="#" class="btn btn-outline-light rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2">
                            <img src="images/logo-logout-white.png" alt="Log out" style="height:20px; width:auto; filter: invert(1);">
                            Log Out
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($bookings as $booking): ?>
                <div class="col-12">
                    <div class="card rounded-4 shadow-sm border-0 overflow-hidden">
                        <div class="row g-0 align-items-center">
                            <div class="col-lg-4">
                                <div class="position-relative" style="min-height:240px; background: url('<?php echo $booking['image']; ?>') center/cover no-repeat;">
                                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-25"></div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body py-4 px-4 px-md-5 bg-white">
                                    <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3 mb-3">
                                        <div>
                                            <h3 class="h4 fw-bold text-darkbrown mb-2"><?php echo $booking['room']; ?></h3>
                                            <p class="text-secondary small mb-0">Booking <?php echo $booking['bookingId']; ?></p>
                                        </div>
                                        <span class="badge rounded-pill px-3 py-2 <?php echo $booking['statusClass']; ?>"><?php echo $booking['status']; ?></span>
                                    </div>

                                    <div class="row g-3 align-items-center mb-4">
                                        <div class="col-md-6 d-flex align-items-center gap-2 text-darkbrown">
                                            <img src="images/logo-calendar-pink.png" alt="Dates" style="height:24px; width:auto;">
                                            <span class="small"><?php echo $booking['dates']; ?></span>
                                        </div>
                                        <div class="col-md-6 d-flex align-items-center gap-2 text-darkbrown">
                                            <img src="images/logo-profile-pink.png" alt="Guests" style="height:24px; width:auto;">
                                            <span class="small"><?php echo $booking['guests']; ?></span>
                                        </div>
                                    </div>

                                    <div class="text-md-end">
                                        <a href="profile_viewbooking.php" class="btn rounded-pill px-4 py-2 bg-darkpink text-white fw-semibold">View Booking</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="bg-darkbrown text-white py-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    <img src="images/logo.png" alt="Grand Budapest logo" style="height: 48px; width: auto; margin-bottom: 1rem;">
                    <p class="small text-secondary mb-0">Grand Budapest Hotel brings elegant hospitality, timeless design, and unforgettable stays to every guest.</p>
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
