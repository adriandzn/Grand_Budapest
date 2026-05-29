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
                $current_step = 1;
                include 'progress.php'; 
            ?>
        </div>

        <form action="book_2.php" method="post">

            <!-- Choose Your Dates -->
            <div class="bg-lightbrown rounded-5 my-5 p-5 shadow">

                <div class="row">
                    <div class="col font-title text-white h4 fw-bold">Choose Your Dates</div>
                </div>

                <!-- Check in and Check out Dates -->
                <div class="row pt-3 g-4">

                    <div class="col-lg-5 col-12">
                        <label for="checkin" class="form-label font-body text-white">Check-in</label>
                        <input type="date" class="form-control rounded-5 border-0 py-3 px-4 shadow" id="checkin" name="checkin" required>
                    </div>

                    <div class="col-lg-5 col-12">
                        <label for="checkout" class="form-label font-body text-white">Check-out</label>
                        <input type="date" class="form-control rounded-5 border-0 py-3 px-4 shadow" id="checkout" name="checkout" required>
                    </div>

                    <div class="col-lg-2 col-12 d-flex align-items-end justify-content-center">
                        <div class="rounded-5 py-3 px-4 font-body fw-bold font-darkbrown text-center bg-lightpink shadow">
                            6 night/s
                        </div>
                    </div>

                </div>

                <div class="row pt-5 font-body text-white">
                    <div class="row">
                        <div class="col">
                            Note:
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Check-in: 02:00 PM | Check-out: 12:00 PM
                        </div>
                    </div>
                </div>

                <!-- Next Button -->
                <div class="row pt-5">
                    <div class="col d-flex justify-content-center">
                        <input type="submit" name="next" class="btn pink-button font-title d-flex align-items-center px-5 py-2 shadow" value="Next" style=" min-width: 200px;">
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