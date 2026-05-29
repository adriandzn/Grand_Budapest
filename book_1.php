<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">
</head>
<body class="bg-lightpink">

    <!-- NAVBAR -->
    <?php include 'navbar.php'; ?>

    <!-- Hero Section -->
    <section class="text-white py-5"
        style="background-image: url('images/index-hero.png'); 
        background-size: cover; 
        background-position: center; 
        background-color: rgba(0,0,0,0.6); 
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

        <!-- PROGRESS BAR -->
        <!-- <?php include 'progress.php'; ?> -->

        <!-- BOOKING CARD -->
        <div class="booking-card shadow-lg">
            <h1 class="fw-bold mb-5 text-white">
                Choose Your Dates
            </h1>
            <div class="row g-4 align-items-end">

                <!-- CHECK IN -->
                <div class="col-lg-4">
                    <label class="form-label text-white fw-bold">
                        Check-in
                    </label>
                    <input type="date" class="form-control custom-input">
                </div>

                <!-- CHECK OUT -->
                <div class="col-lg-4">
                    <label class="form-label text-white fw-bold">
                        Check-out
                    </label>
                    <input type="date" class="form-control custom-input">
                </div>

                <!-- NIGHTS -->
                <div class="col-lg-4">
                    <div class="nights-box text-center">
                        6 nights
                    </div>
                </div>

            </div>

            <!-- NOTE -->
            <div class="mt-5 text-white">
                <p class="fw-bold mb-1">
                    Note:
                </p>
                <p>
                    Check-in: 02:00 PM |
                    Check-out: 12:00 PM
                </p>
            </div>

            <!-- BUTTON -->
            <div class="text-center mt-5">
                <button class="btn next-btn px-5 py-2">
                    Next
                </button>
            </div>

        </div>

    </div>




    <!-- FOOTER -->
    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>