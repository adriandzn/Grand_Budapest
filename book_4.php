<?php
    $personalLabels = [
        'Name',
        'Gender',
        'Birth Date',
        'Email',
        'Contact Number',
        'Address'
    ];

    $personalValues = [
        'Adrian D. Dizon',
        'Male',
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
        'Total Amount'
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
        '<span class="text-success fw-bold">₱89,994.00</span>'
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
    <title>Book Now</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/book.css">

    <style>
        .green-button {
            font-size: 0.9rem;
            border: 3px solid #6bbe63;
            background-color: #8bf58b;
            color: #2b241f;
            font-weight: bold;
            border-radius: 100px;
            transition: all 0.3s ease;
        }
        .green-button:hover {
            background-color: #79d879;
            border: 3px solid #6bbe63;
            color: #2b241f;
        }

    </style>
    
</head>
<body class="bg-lightpink">

    <!-- NAVBAR -->
    <?php include 'navbar.php'; ?>

    <!-- Hero Section -->
    <section class="text-white py-5"
        style="background-image: url('images/index-hero.png'); 
        background-size: cover; 
        background-position: center; 
        background-color: rgba(0, 0, 0, 0.6); 
        background-blend-mode: multiply;">

        <div class="container py-4 ps-5">
            <div class="row">
                <div class="col">
                    <h1 class="display-3 font-title font-white fw-bold">Book Now</h1>
                </div>
            </div>
        </div>
    </section>


    <div class="container">

        <!-- Progress Bar -->
        <div class="my-5 px-2">
            <?php
                $current_step = 4;
                include 'progress.php'; 
            ?>
        </div>


        <!-- PERSONAL INFORMATION -->
        <div class="row justify-content-center mb-4">
            <div class="col-xl-10">
                <div class="bg-lightbrown rounded-5 shadow-sm p-4 p-lg-5">

                    <!-- Go Back Button -->
                    <div class="row">
                        <div class="col">
                            <a href="book_3.php" class="btn pink-button font-title d-flex align-items-center justify-content-center gap-2 px-4 py-2 shadow" style="width: fit-content;">
                                <img src="images/logo-go-back.png" alt="key" style="height:20px;">
                                Go Back    
                            </a>
                        </div>
                    </div>


                    <h2 class="font-title text-white fw-bold mb-3 mt-4">Personal Information</h2>
                    <div class="font-body text-white mb-4">Please review your details before paying.</div>

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

                    <h2 class="font-title text-white fw-bold mb-4">Room Reservation Details</h2>

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


        <form action="acknowledgement.php" method="post">

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


                        <div class="pt-5 form-check d-flex align-items-center gap-3">
                            <input type="checkbox" name="agree" id="agree" class="form-check-input p-3 m-0">

                            <label for="agree" class="form-check-label font-body fw-bold h5 m-0">
                                I have read and agreed to the policies of the hotel.
                            </label>
                        </div>

                    </div>
                </div>
            </div>



            <!-- PAYMENT METHOD -->
            <div class="row justify-content-center mb-5">
                <div class="col-xl-10">
                    <div class="bg-white rounded-5 shadow-sm p-4 p-lg-5">

                        <div class="row">
                            <div class="col font-title fw-bold h4">Payment Method</div>
                        </div>
                        

                        <div class="border rounded-5 overflow-hidden mt-4 shadow">

                            <!-- CARDS -->
                            <label class="d-flex align-items-center gap-4 px-4 py-3 border-bottom bg-light">
                                <input type="radio" name="payment_method" value="card" class="form-check-input m-0">

                                <div class="d-flex align-items-center gap-5">
                                    <img src="images/payment-visa.png" alt="Visa" style="height:20px;">
                                    <img src="images/payment-mastercard.png" alt="Mastercard" style="height:35px;">
                                </div>
                            </label>


                            <!-- MAYA -->
                            <label class="d-flex align-items-center gap-4 px-4 py-3 border-bottom bg-light">
                                <input type="radio" name="payment_method" value="maya" class="form-check-input m-0">
                                <img src="images/payment-maya.png" alt="Maya" style="height:20px;">
                            </label>


                            <!-- QRPH -->
                            <label class="d-flex align-items-center gap-4 px-4 py-3 border-bottom bg-light">
                                <input type="radio" name="payment_method" value="qrph" class="form-check-input m-0">
                                <img src="images/payment-qrph.png" alt="QRPH" style="height:20px;">
                            </label>


                            <!-- GCASH -->
                            <label class="d-flex align-items-center gap-4 px-4 py-3 bg-light">
                                <input type="radio" name="payment_method" value="gcash" class="form-check-input m-0">
                                <img src="images/payment-gcash.png" alt="GCash" style="height:20px;">
                            </label>

                        </div>
     
                        <div class="row mt-5">
                            <div class="col text-center">
                                <input type="submit" name="book4-next" value="Proceed to Payment" class="btn green-button px-5 py-3 font-title">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            


        </form>


    </div>


    <!-- FOOTER -->
    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>