<?php
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
                            <a href="book_1.php" class="btn pink-button font-title d-flex align-items-center justify-content-center gap-2 px-4 py-2 shadow" style="width: fit-content;">
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

    </div>


    <!-- FOOTER -->
    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>