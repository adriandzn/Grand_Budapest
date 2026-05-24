<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">
</head>
<body>
    
    <section class="bg-darkbrown shadow">
        <div class="container">

            <div class="row p-4 text-center">

                <!-- Left Section -->
                <div class="col-5 px-3 font-lightbrown font-title fw-bold d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col"><a href="index.php" class="nav-link">HOME</a></div>
                        <div class="col"><a href="rooms.php" class="nav-link">ROOMS</a></div>
                        <div class="col"><a href="amenities_dining.php" class="nav-link">AMENITIES</a></div>
                        <div class="col"><a href="about.php" class="nav-link">ABOUT</a></div>
                    </div>
                </div>

                <!-- Logo -->
                <div class="col-2 px-3 font-lightbrown font-title fw-bold d-flex flex-column justify-content-center">
                    <a href="index.php" class="nav-link">
                        <div class="row">
                            <div class="col">
                                <img src="images/logo.png" alt="logo" class="img-fluid w-50">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">GRAND BUDAPEST</div>
                        </div>
                        <div class="row">
                            <div class="col">HOTEL</div>
                        </div>
                    </a>
                </div>

                <!-- Right Section -->
                <div class="col-5 px-3 font-lightbrown font-title fw-bold d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col"><a href="contact.php" class="nav-link">CONTACT</a></div>
                        <div class="col"><a href="profile_overview.php" class="nav-link">PROFILE</a></div>
                        <div class="col"><a href="book.php" class="nav-link"></a>BOOK NOW</div>
                    </div>
                </div>

            </div>

        </div>
    </section> 

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>