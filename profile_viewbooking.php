<?php
$personalInfo = [
    ['Name', 'Adrian D. Dizon'],
    ['Gender', 'Male'],
    ['Nationality', 'Filipino'],
    ['Birth Date', 'February 28, 2005'],
    ['Email', 'adrian.dizon.cics@ust.edu.ph'],
    ['Contact Number', '09123456789'],
    ['Address', 'Brookshire, Capital City'],
];

$reservationDetails = [
    ['Check-in Date', 'May 25, 2026'],
    ['Check-out Date', 'May 31, 2026'],
    ['No. of Days', '6 days'],
    ['Room Type', 'Suite Room'],
    ['Room Price', '₱14,999.00 per night'],
    ['Guests', "Adult: 4<br>Children: 4<br>Additional Guest: 0<br>TOTAL: 8"],
    ['Total Room Price', '₱89,994.00'],
    ['Additional Guest Fee', 'N/A'],
    ['Total Amount', '<span class="text-success fw-bold">₱89,994.00</span>'],
    ['Payment Method', 'Credit Card'],
];

$policies = [
    ['Cancellation Policy', 'Free cancellation up to 24 hours before check-in. Late cancellations may incur a fee. Kindly contact us in case of cancellations/modifications.'],
    ['No-show Policy', 'Failure to arrive without notice will result in a one-night charge.'],
    ['Payment Policy', 'Full or partial payment may be required to confirm booking. Accepted payment methods apply.'],
    ['Refund Policy', 'Refunds are processed based on the cancellation terms and may take several business days.'],
    ['Guest Policy', 'Valid ID required upon check-in. Only registered guests are allowed to stay.'],
    ['Smoking Policy', 'This is a non-smoking property. Violations may incur penalties.'],
    ['Pet Policy', 'Pets are not allowed within the hotel.'],
    ['Damage Policy', 'Guests are responsible for any damage to hotel property.'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details - Grand Budapest Hotel</title>
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
                    <a href="contact.php" class="text-white text-decoration-none">CONTACT</a>
                    <a href="profile_overview.php" class="text-white text-decoration-none">PROFILE</a>
                </div>
                <a href="#" class="btn rounded-pill px-4 py-2 bg-darkpink text-white fw-semibold">BOOK NOW</a>
            </div>
        </div>

        <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-4" style="max-width:940px;">
            <p class="text-uppercase text-secondary small mb-2">Profile</p>
            <h1 class="display-4 fw-bold font-title mb-3">Greetings, <span class="text-pink">Adrian Dizon</span>!</h1>
            <a href="profile_booking.php" class="btn rounded-pill px-5 py-3 bg-lightpink font-darkbrown fw-semibold">View Bookings</a>
        </div>
    </section>

    <main class="container my-5">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-10">
                <a href="profile_booking.php" class="btn btn-outline-dark rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2">
                    <img src="images/logo-proceed-brown.png" alt="Go back" style="height:20px; width:auto;">
                    Go Back
                </a>
            </div>
        </div>

        <div class="row justify-content-center mb-4">
            <div class="col-lg-10">
                <div class="rounded-4 shadow-sm bg-white p-4 p-md-5">
                    <div class="row align-items-center gy-4">
                        <div class="col-lg-4">
                            <img src="images/index-hero.png" alt="Deluxe Room" class="img-fluid rounded-4 w-100">
                        </div>
                        <div class="col-lg-8">
                            <div class="d-flex flex-column h-100 justify-content-between gap-4">
                                <div>
                                    <h2 class="h3 fw-bold font-title text-darkbrown mb-2">Deluxe Room</h2>
                                    <p class="text-secondary mb-2">Booking #123456</p>
                                    <span class="badge rounded-pill bg-success text-white py-2 px-3">Confirmed</span>
                                </div>
                                <div class="row g-3 text-darkbrown">
                                    <div class="col-sm-6 d-flex align-items-center gap-2">
                                        <img src="images/logo-calendar-pink.png" alt="Booking dates" style="height:24px; width:auto;">
                                        <span>May 25 - 31, 2026</span>
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-center gap-2">
                                        <img src="images/logo-profile-pink.png" alt="Guests" style="height:24px; width:auto;">
                                        <span>8 Guests</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-lg-6">
                <div class="rounded-4 shadow-sm bg-darkbrown text-white p-4">
                    <h2 class="h4 fw-bold font-title mb-4">Personal Information</h2>
                    <div class="table-responsive">
                        <table class="table table-borderless text-white mb-0">
                            <tbody>
                                <?php foreach ($personalInfo as [$label, $value]): ?>
                                    <tr>
                                        <th class="text-start align-top py-3" style="width: 40%;"><?php echo $label; ?></th>
                                        <td class="text-start align-top py-3"><?php echo $value; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="rounded-4 shadow-sm bg-darkbrown text-white p-4">
                    <h2 class="h4 fw-bold font-title mb-4">Room Reservation Details</h2>
                    <div class="table-responsive">
                        <table class="table table-borderless text-white mb-0">
                            <tbody>
                                <?php foreach ($reservationDetails as [$label, $value]): ?>
                                    <tr>
                                        <th class="text-start align-top py-3" style="width: 40%;"><?php echo $label; ?></th>
                                        <td class="text-start align-top py-3"><?php echo $value; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-4">
            <div class="col-lg-10">
                <div class="rounded-4 shadow-sm bg-white p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="h5 fw-bold font-title mb-0">Policies</h2>
                        <div class="text-end text-darkbrown small">
                            <strong>Check-in:</strong> 02:00 PM<br>
                            <strong>Check-out:</strong> 12:00 PM
                        </div>
                    </div>
                    <div class="row g-3">
                        <?php foreach ($policies as [$title, $description]): ?>
                            <div class="col-12">
                                <div class="border-bottom border-secondary pb-3">
                                    <p class="fw-bold text-darkbrown mb-1"><?php echo $title; ?></p>
                                    <p class="small text-secondary mb-0"><?php echo $description; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <div class="rounded-4 shadow-sm bg-white p-4 p-md-5">
                    <p class="text-center text-pink fw-semibold mb-4">In case of inquiries, booking modifications, or booking cancellations, kindly contact us:</p>
                    <div class="row g-4 mb-5">
                        <div class="col-md-4 text-center text-md-start">
                            <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3 mb-3">
                                <img src="images/logo-clock-pink.png" alt="Lobby hours" style="height:28px; width:auto;">
                                <div>
                                    <p class="text-uppercase text-secondary small mb-1">Lobby Hours</p>
                                    <p class="mb-0">Monday to Sunday<br>7:00AM - 11:00PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center text-md-start">
                            <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3 mb-3">
                                <img src="images/logo-phone-pink.png" alt="Mobile number" style="height:28px; width:auto;">
                                <div>
                                    <p class="text-uppercase text-secondary small mb-1">Mobile Number</p>
                                    <p class="mb-0">+63 975 714 1559</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center text-md-start">
                            <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3 mb-3">
                                <img src="images/logo-mail-pink.png" alt="Email" style="height:28px; width:auto;">
                                <div>
                                    <p class="text-uppercase text-secondary small mb-1">Email</p>
                                    <p class="mb-0">reservations@grandbudapest.lb</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-7">
                            <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm">
                                <iframe src="https://maps.google.com/maps?q=1%20Alpine%20Summit%20Drive%20Lutz%20Zubrowka%201099&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="rounded-4 p-4 bg-darkbrown text-white h-100">
                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <img src="images/logo-pin-pink.png" alt="Location" style="height:32px; width:auto; margin-top:4px;">
                                    <div>
                                        <p class="text-uppercase text-secondary small mb-2">Location</p>
                                        <h3 class="h5 fw-bold mb-3">Grand Budapest Hotel</h3>
                                        <p class="small mb-1">1 Alpine Summit Drive</p>
                                        <p class="small mb-1">Lutz, Zubrowka 1099</p>
                                        <p class="small mb-0">Republic of Zubrowka</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-darkbrown text-white py-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    <h5 class="font-title mb-3">GRAND BUDAPEST HOTEL</h5>
                    <p class="small text-secondary mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur efficitur, metus et varius dignissim.</p>
                </div>
                <div class="col-md-4">
                    <h6 class="mb-3">Hotel Location</h6>
                    <p class="small text-secondary mb-1">1 Alpine Summit Drive</p>
                    <p class="small text-secondary mb-1">Lutz, Zubrowka 1099</p>
                    <p class="small text-secondary mb-0">Republic of Zubrowka</p>
                </div>
                <div class="col-md-4">
                    <h6 class="mb-3">Contact Us</h6>
                    <p class="small text-secondary mb-1">+63 975 714 1559</p>
                    <p class="small text-secondary mb-0">reservations@grandbudapest.lb</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
