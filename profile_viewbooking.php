<?php

$userInfo = [
    'Adrian Dizon'
];

$bookingInfo = [
    'roomName' => 'Deluxe Room',
    'bookingID' => '#123456',
    'status' => 'Confirmed',
    'statusClass' => 'bg-success',
    'dates' => 'May 25 - 31, 2026',
    'guests' => '8 Guests',
    'image' => 'images/index-hero.png'
];

$personalLabels = [
    'Name',
    'Gender',
    'Nationality',
    'Birth Date',
    'Email',
    'Contact Number',
    'Address'
];

$personalValues = [
    'Adrian D. Dizon',
    'Male',
    'Filipino',
    'February 28, 2005',
    'adrian.dizon.cics@ust.edu.ph',
    '09123456789',
    'Brookshire, Capital City'
];

$reservationLabels = [
    'Check-in Date',
    'Check-out Date',
    'No. of Days',
    'Room Type',
    'Room Price',
    'Guests',
    'Total Room Price',
    'Additional Guest Fee',
    'Total Amount',
    'Payment Method'
];

$reservationValues = [
    'May 25, 2026',
    'May 31, 2026',
    '6 days',
    'Suite Room',
    '₱14,999.00 per night',
    'Adult: 4<br>Children: 4<br>Additional Guest: 0<br>TOTAL: 8',
    '₱89,994.00',
    'N/A',
    '<span class="text-success fw-bold">₱89,994.00</span>',
    'Credit Card'
];

$policyTitles = [
    'Cancellation Policy',
    'No-show Policy',
    'Payment Policy',
    'Refund Policy',
    'Guest Policy',
    'Smoking Policy',
    'Pet Policy',
    'Damage Policy'
];

$policyDescriptions = [
    'Free cancellation up to 24 hours before check-in. Late cancellations may incur a fee. Kindly contact us in case of cancellations/modifications.',
    'Failure to arrive without notice will result in a one-night charge.',
    'Full or partial payment may be required to confirm booking. Accepted payment methods apply.',
    'Refunds are processed based on the cancellation terms and may take several business days.',
    'Valid ID required upon check-in. Only registered guests are allowed to stay.',
    'This is a non-smoking property. Violations may incur penalties.',
    'Pets are not allowed within the hotel.',
    'Guests are responsible for any damage to hotel property.'
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
                        class="btn btn-light rounded-pill px-4 py-2 d-inline-flex align-items-center gap-4 text-darkbrown">

                        <img src="images/logo-logout-brown.png"
                            alt="Log out"
                            style="height:20px; width:auto;">

                        Log Out

                    </a>

                </div>

            </div>

        </div>

    </section>

    <!-- HERO -->

    <section class="bg-darkbrown py-3">

        <div class="container">

            <div class="row justify-content-center text-center">

                <div class="col-auto mx-5">
                    <a href="profile_overview.php"
                        class="font-white font-title text-decoration-none fw-semibold">
                        Overview
                    </a>
                </div>

                <div class="col-auto mx-5">
                    <a href="profile_booking.php"
                        class="font-pink font-title text-decoration-none fw-semibold">
                        All Bookings
                    </a>
                </div>

            </div>

        </div>

    </section>

    <!-- MAIN -->

    <main class="container py-5">

        <!-- BOOKING CARD -->

        <div class="row justify-content-center mb-4">

            <div class="col-xl-10">

                <div class="bg-white rounded-5 shadow-sm p-4 p-lg-5">

                    <div class="mb-4">

                        <a href="profile_booking.php"
                            class="btn rounded-pill px-4 py-2 bg-darkpink text-darkbrown fw-semibold pink-button">

                            <img src="images/logo-proceed-brown.png"
                                alt="Go Back"
                                style="height:18px; width:auto; transform: scaleX(-1);"
                                class="me-2">

                            Go Back

                        </a>

                    </div>

                    <div class="row align-items-center gy-4">

                        <!-- IMAGE -->

                        <div class="col-lg-4">

                            <img src="<?php echo $bookingInfo['image']; ?>"
                                alt="Room"
                                class="img-fluid rounded-4 w-100 shadow-sm">

                        </div>

                        <!-- DETAILS -->

                        <div class="col-lg-8">

                            <div class="row gy-4">

                                <div class="col-md-6">

                                    <h2 class="h3 fw-bold font-title font-pink mb-2">
                                        <?php echo $bookingInfo['roomName']; ?>
                                    </h2>

                                    <p class="small fw-semibold text-darkbrown mb-2">
                                        Booking <?php echo $bookingInfo['bookingID']; ?>
                                    </p>

                                    <span class="badge rounded-pill px-4 py-2 <?php echo $bookingInfo['statusClass']; ?>">
                                        <?php echo $bookingInfo['status']; ?>
                                    </span>

                                </div>

                                <div class="col-md-6">

                                    <div class="d-flex align-items-center mb-3">

                                        <img src="images/logo-calendar-pink.png"
                                            alt="Calendar"
                                            style="height:22px; width:auto;"
                                            class="me-3">

                                        <span class="small fw-semibold text-darkbrown">
                                            <?php echo $bookingInfo['dates']; ?>
                                        </span>

                                    </div>

                                    <div class="d-flex align-items-center">

                                        <img src="images/logo-profile-pink.png"
                                            alt="Guests"
                                            style="height:22px; width:auto;"
                                            class="me-3">

                                        <span class="small fw-semibold text-darkbrown">
                                            <?php echo $bookingInfo['guests']; ?>
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- PERSONAL INFORMATION -->

        <div class="row justify-content-center mb-4">

            <div class="col-xl-10">

                <div class="bg-lightbrown rounded-5 shadow-sm p-4 p-lg-5">

                    <h2 class="font-title text-white fw-bold mb-4">
                        Personal Information
                    </h2>

                    <div class="table-responsive">

                        <table class="table bg-white rounded-4 overflow-hidden align-middle mb-0">

                            <tbody>

                                <?php for($i = 0; $i < count($personalLabels); $i++): ?>

                                <tr>

                                    <th class="px-4 py-3 text-darkbrown bg-white"
                                        style="width:40%;">

                                        <?php echo $personalLabels[$i]; ?>

                                    </th>

                                    <td class="px-4 py-3 bg-white">

                                        <?php echo $personalValues[$i]; ?>

                                    </td>

                                </tr>

                                <?php endfor; ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        <!-- RESERVATION DETAILS -->

        <div class="row justify-content-center mb-4">

            <div class="col-xl-10">

                <div class="bg-lightbrown rounded-5 shadow-sm p-4 p-lg-5">

                    <h2 class="font-title text-white fw-bold mb-4">
                        Room Reservation Details
                    </h2>

                    <div class="table-responsive">

                        <table class="table bg-white rounded-4 overflow-hidden align-middle mb-0">

                            <tbody>

                                <?php for($i = 0; $i < count($reservationLabels); $i++): ?>

                                <tr>

                                    <th class="px-4 py-3 text-darkbrown bg-white"
                                        style="width:40%;">

                                        <?php echo $reservationLabels[$i]; ?>

                                    </th>

                                    <td class="px-4 py-3 bg-white">

                                        <?php echo $reservationValues[$i]; ?>

                                    </td>

                                </tr>

                                <?php endfor; ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        <!-- POLICIES -->

        <div class="row justify-content-center mb-4">

            <div class="col-xl-10">

                <div class="bg-white rounded-5 shadow-sm p-4 p-lg-5">

                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

                        <h2 class="font-title font-pink fw-bold mb-3 mb-md-0">
                            Policies
                        </h2>

                        <div class="small text-darkbrown text-md-end">

                            <strong>Check-in:</strong> 02:00 PM |
                            <strong>Check-out:</strong> 12:00 PM

                        </div>

                    </div>

                    <?php for($i = 0; $i < count($policyTitles); $i++): ?>

                    <div class="border-top pt-3 mt-3">

                        <h6 class="fw-bold font-pink mb-1">

                            <?php echo $policyTitles[$i]; ?>

                        </h6>

                        <p class="small mb-0">

                            <?php echo $policyDescriptions[$i]; ?>

                        </p>

                    </div>

                    <?php endfor; ?>

                </div>

            </div>

        </div>

        <!-- CONTACT -->

        <div class="row justify-content-center mb-5">

            <div class="col-xl-10">

                <div class="bg-white rounded-5 shadow-sm p-4 p-lg-5">

                    <p class="text-center font-pink fw-semibold mb-5">
                        In case of inquiries, booking modifications, or booking cancellations, kindly contact us:
                    </p>

                    <div class="row text-center mb-5 gy-4">

                        <div class="col-md-4">

                            <img src="images/logo-clock-pink.png"
                                alt=""
                                style="height:32px;"
                                class="mb-3">

                            <h6 class="font-pink fw-bold">
                                Lobby Hours
                            </h6>

                            <p class="small mb-0">
                                Monday to Sunday<br>
                                7:00AM - 11:00PM
                            </p>

                        </div>

                        <div class="col-md-4">

                            <img src="images/logo-phone-pink.png"
                                alt=""
                                style="height:32px;"
                                class="mb-3">

                            <h6 class="font-pink fw-bold">
                                Mobile Number
                            </h6>

                            <p class="small mb-0">
                                +63 975 714 1559
                            </p>

                        </div>

                        <div class="col-md-4">

                            <img src="images/logo-mail-pink.png"
                                alt=""
                                style="height:32px;"
                                class="mb-3">

                            <h6 class="font-pink fw-bold">
                                Email
                            </h6>

                            <p class="small mb-0">
                                reservations@grandbudapest.lb
                            </p>

                        </div>

                    </div>

                    <hr class="mb-5">

                    <div class="row align-items-center gy-4">

                        <div class="col-lg-7">

                            <div class="ratio ratio-16x9 rounded-4 overflow-hidden border">

                                <iframe
                                    src="https://maps.google.com/maps?q=1%20Alpine%20Summit%20Drive&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    allowfullscreen=""
                                    loading="lazy">

                                </iframe>

                            </div>

                        </div>

                        <div class="col-lg-5">

                            <div class="d-flex align-items-start gap-3">

                                <img src="images/logo-pin-pink.png"
                                    alt=""
                                    style="height:40px;">

                                <div>

                                    <h6 class="font-pink fw-bold mb-3">
                                        Location
                                    </h6>

                                    <p class="mb-1 fw-semibold">
                                        1 Alpine Summit Drive
                                    </p>

                                    <p class="mb-1 fw-semibold">
                                        Lutz, Zubrowka 1099
                                    </p>

                                    <p class="mb-0 fw-semibold">
                                        Republic of Zubrowka
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- GO BACK -->

        <div class="text-center">

            <a href="profile_booking.php"
                class="btn rounded-pill px-5 py-2 bg-darkpink text-darkbrown fw-semibold pink-button">

                <img src="images/logo-proceed-brown.png"
                    alt=""
                    style="height:18px; transform: scaleX(-1);"
                    class="me-2">

                Go Back

            </a>

        </div>

    </main>

    <!-- FOOTER -->

    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>