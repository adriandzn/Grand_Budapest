<?php

$userInfo = [
    'Adrian Dizon'
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

    <!-- MAIN CONTENT -->

    <main class="container my-5">

        <!-- GO BACK -->

        <div class="row justify-content-center mb-4">

            <div class="col-lg-10">

                <a href="profile_booking.php"
                    class="btn btn-outline-dark rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2">

                    <img src="images/logo-proceed-brown.png"
                        alt="Go back"
                        style="height:20px; width:auto;">

                    Go Back

                </a>

            </div>

        </div>

        <!-- BOOKING CARD -->

        <div class="row justify-content-center mb-4">

            <div class="col-lg-10">

                <div class="rounded-4 shadow-sm bg-white p-4 p-md-5">

                    <div class="row align-items-center gy-4">

                        <div class="col-lg-4">

                            <img src="images/index-hero.png"
                                alt="Deluxe Room"
                                class="img-fluid rounded-4 w-100">

                        </div>

                        <div class="col-lg-8">

                            <div class="d-flex flex-column h-100 justify-content-between gap-4">

                                <div>

                                    <h2 class="h3 fw-bold font-title text-darkbrown mb-2">
                                        Deluxe Room
                                    </h2>

                                    <p class="text-secondary mb-2">
                                        Booking #123456
                                    </p>

                                    <span class="badge rounded-pill bg-success text-white py-2 px-3">
                                        Confirmed
                                    </span>

                                </div>

                                <div class="row g-3 text-darkbrown">

                                    <div class="col-sm-6 d-flex align-items-center gap-2">

                                        <img src="images/logo-calendar-pink.png"
                                            alt="Booking dates"
                                            style="height:24px; width:auto;">

                                        <span>May 25 - 31, 2026</span>

                                    </div>

                                    <div class="col-sm-6 d-flex align-items-center gap-2">

                                        <img src="images/logo-profile-pink.png"
                                            alt="Guests"
                                            style="height:24px; width:auto;">

                                        <span>8 Guests</span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- PERSONAL INFO + RESERVATION -->

        <div class="row g-4 mb-4">

            <!-- PERSONAL INFO -->

            <div class="col-lg-6">

                <div class="rounded-4 shadow-sm bg-darkbrown text-white p-4">

                    <h2 class="h4 fw-bold font-title mb-4">
                        Personal Information
                    </h2>

                    <div class="table-responsive">

                        <table class="table table-borderless text-white mb-0">

                            <tbody>

                                <?php for($i = 0; $i < count($personalLabels); $i++): ?>

                                <tr>

                                    <th class="text-start align-top py-3"
                                        style="width: 40%;">

                                        <?php echo $personalLabels[$i]; ?>

                                    </th>

                                    <td class="text-start align-top py-3">

                                        <?php echo $personalValues[$i]; ?>

                                    </td>

                                </tr>

                                <?php endfor; ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <!-- RESERVATION DETAILS -->

            <div class="col-lg-6">

                <div class="rounded-4 shadow-sm bg-darkbrown text-white p-4">

                    <h2 class="h4 fw-bold font-title mb-4">
                        Room Reservation Details
                    </h2>

                    <div class="table-responsive">

                        <table class="table table-borderless text-white mb-0">

                            <tbody>

                                <?php for($i = 0; $i < count($reservationLabels); $i++): ?>

                                <tr>

                                    <th class="text-start align-top py-3"
                                        style="width: 40%;">

                                        <?php echo $reservationLabels[$i]; ?>

                                    </th>

                                    <td class="text-start align-top py-3">

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

            <div class="col-lg-10">

                <div class="rounded-4 shadow-sm bg-white p-4 p-md-5">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h2 class="h5 fw-bold font-title mb-0">
                            Policies
                        </h2>

                        <div class="text-end text-darkbrown small">

                            <strong>Check-in:</strong> 02:00 PM<br>

                            <strong>Check-out:</strong> 12:00 PM

                        </div>

                    </div>

                    <div class="row g-3">

                        <?php for($i = 0; $i < count($policyTitles); $i++): ?>

                        <div class="col-12">

                            <div class="border-bottom border-secondary pb-3">

                                <p class="fw-bold text-darkbrown mb-1">

                                    <?php echo $policyTitles[$i]; ?>

                                </p>

                                <p class="small text-secondary mb-0">

                                    <?php echo $policyDescriptions[$i]; ?>

                                </p>

                            </div>

                        </div>

                        <?php endfor; ?>

                    </div>

                </div>

            </div>

        </div>

    </main>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>
