<?php
    session_start();

    if (isset($_POST['book1-next'])) {
        $GBcheckin = $_POST['checkin'];
        $GBcheckout = $_POST['checkout'];
        
        $checkinDate = new DateTime($GBcheckin);
        $checkoutDate = new DateTime($GBcheckout);
        $today = new DateTime(date("Y-m-d"));


        if ($checkinDate < $today) {
            ?>
            <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Check in date must start today.",
                    showConfirmButton: false,
                    timer: 3000
                });
            });
            </script>
            <?php
        } else if ($checkoutDate <= $checkinDate) {
            ?>
            <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Check out date must be at least one day after the check in date.",
                    showConfirmButton: false,
                    timer: 3000
                });
            });
            </script>
            <?php
        } else {
            $interval = $checkinDate->diff($checkoutDate);
            $GBnights = $interval->days;

            // SESSION VARIABLES
            $_SESSION['GBcheckin'] = $GBcheckin;
            $_SESSION['GBcheckout'] = $GBcheckout;
            $_SESSION['GBnights'] = $GBnights;

            header("location:book_2.php");
        }

    }

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
                $current_step = 1;
                include 'progress.php'; 
            ?>
        </div>

        <form action="" method="post">

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
                        <div id="displayNights" class="rounded-5 py-3 px-4 font-body fw-bold font-darkbrown text-center bg-lightpink shadow">
                            0 night/s
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
                        <input type="submit" name="book1-next" class="btn pink-button font-title d-flex align-items-center px-5 py-2 shadow" value="Next" style=" min-width: 200px;">
                    </div>
                </div>

            </div>

        </form>

    </div>


    <!-- FOOTER -->
    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>

    <script>
        const checkin = document.getElementById('checkin');
        const checkout = document.getElementById('checkout');
        const displayNights = document.getElementById('displayNights');

        function calculateNights() {
            const checkinDate = new Date(checkin.value);
            const checkoutDate = new Date(checkout.value);

            if (checkoutDate > checkinDate) {
                const difference = (checkoutDate - checkinDate) / (1000 * 60 * 60 * 24);

                displayNights.textContent = difference + " night/s";
            } else {
                displayNights.textContent = "0 night/s";
            }
        }

        checkin.addEventListener('change', calculateNights);
        checkout.addEventListener('change', calculateNights);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>