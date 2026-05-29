<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Request Sent - Grand Budapest Hotel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">
</head>
<body class="bg-lightpink font-body">

    <!-- NAVBAR -->
    <?php include 'navbar.php'; ?>

    <!-- HERO BANNER -->
    <section class="text-white py-5"
        style="background-image: url('images/index-hero.png'); background-size: cover; background-position: center; background-color: rgba(0, 0, 0, 0.55); background-blend-mode: multiply;">
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-6 display-md-3 font-title fw-bold mb-0">Book Now</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- ACKNOWLEDGEMENT CONTENT -->
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="bg-brown rounded-5 shadow p-4 p-md-5">

                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle" 
                            style="width: 90px; height: 90px; background-color: #abe5a5; min-width: 90px; min-height: 90px;">
                            <img src="images/logo-check-brown.png"
                                alt="Checkmark"
                                class="img-fluid"
                                style="height: 45px;">
                        </div>
                    </div>

                    <h2 class="text-white text-center font-title mb-3">Booking Request Sent!</h2>
                    <p class="text-light text-center font-body mb-2">
                        Thank you for choosing Grand Budapest.
                    </p>
                    <p class="text-white text-center mb-4 font-body">
                        We have received your booking request and will get back to you shortly.
                    </p>

                    <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
                        <div class="row text-center gy-3">
                            <div class="col-12">
                                <h5 class="font-darkbrown fw-bold mb-0">
                                    Need help? Contact us at:
                                </h5>
                            </div>
                            <div class="col-12 col-md-5 d-flex align-items-center justify-content-center gap-2">
                                <img src="images/logo-phone-pink.png" alt="Phone" style="height: 15px;">
                                <span class="font-darkbrown font-body">+63 975 714 1559</span>
                            </div>
                            <div class="col-12 col-md-7 d-flex align-items-center justify-content-center gap-2">
                                <img src="images/logo-mail-pink.png" alt="Email" style="height: 25px;">
                                <span class="font-darkbrown font-body">reservations@grandbudapest.zb</span>
                            </div>
                        </div>
                    </div>

                    <p class="text-white text-center font-body mb-5">
                        You can go to your Profile Page to view your reservation status, booking details, and history anytime.
                    </p>

                    <div class="d-flex justify-content-center gap-4 flex-wrap">
                        <a href="profile_overview.php" class="btn book-now font-title d-flex flex-column align-items-center px-5 py-2 shadow">
                            Go to Profile
                        </a>
                        <a href="index.php" class="btn book-now font-title d-flex flex-column align-items-center px-5 py-2 shadow">
                            Back to Home
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
