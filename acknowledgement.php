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
                <div class="col">
                    <h1 class="display-3 font-title">Book Now</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- ACKNOWLEDGEMENT CONTENT -->
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="bg-brown rounded-5 shadow p-5">

                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle" 
                            style="width: 100px; height: 100px; background-color: #b9f0b5;">
                            <img src="images/logo-check-brown.png"
                            alt="Checkmark"
                            class="img-fluid"
                            style="height: 50px;">
                        </div>
                    </div>

                    <h2 class="text-white text-center font-title mb-3">Booking Request Sent!</h2>
                    <p class="text-light text-center mb-4">
                        Thank you for choosing Grand Budapest. We have received your booking request and will get back to you shortly.
                    </p>

                    <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
                        <div class="row text-center gy-3">
                            <div class="col-md-6 d-flex align-items-center justify-content-center gap-2">
                                <img src="images/logo-phone-pink.png" alt="Phone" style="height: 20px;">
                                <span class="text-dark">+63 975 714 1559</span>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-center gap-2">
                                <img src="images/logo-mail-pink.png" alt="Email" style="height: 20px;">
                                <span class="text-dark">reservations@grandbudapest.zb</span>
                            </div>
                        </div>
                    </div>

                    <p class="text-light text-center mb-5">
                        You can go to your Profile Page to view your reservation status, booking details, and history anytime.
                    </p>

                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="profile_overview.php" class="btn bg-darkpink font-darkbrown fw-bold rounded-pill px-5 py-3 shadow-sm">
                            Go to Profile
                        </a>
                        <a href="index.php" class="btn border bg-darkpink font-darkbrown fw-bold border-pink rounded-pill px-5 py-3 shadow-sm"">
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
