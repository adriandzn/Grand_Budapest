<?php

$venueNames = [
    "Buffet",
    "Restaurant",
    "Bar"
];

$venueSubtitles = [
    "Breakfast, Lunch and Dinner",
    "Breakfast, Lunch and Dinner",
    "24/7 Open"
];

$venueHours = [
    "6am to 10pm / Daily",
    "6am to 10pm / Daily",
    ""
];

$venueDescriptions = [
    "Indulge in a lavish buffet experience featuring a curated selection of international and local cuisine. From freshly baked pastries in the morning to flavorful main courses and decadent desserts in the evening, our buffet is designed to satisfy every palate.<br><br>Enjoy live cooking stations, seasonal specialties, and a warm, inviting ambiance perfect for families, couples, and groups.",

    "Experience fine dining at its finest in our signature restaurant. Our chefs craft each dish with precision, using high-quality ingredients to deliver a perfect balance of flavor and presentation.<br><br>Whether you're starting your day with a hearty breakfast or enjoying a romantic dinner, our restaurant offers a sophisticated setting paired with exceptional service.",

    "Unwind and relax at our elegant bar, where timeless charm meets modern taste. Enjoy handcrafted cocktails, premium wines, and a wide selection of spirits in a cozy yet refined atmosphere.<br><br>Perfect for casual meetups or late-night nightcaps."
];

$venueMainImages = [
    "images/index-hero.png",
    "images/index-hero.png",
    "images/index-hero.png"
];

$venueSubImage1 = [
    "images/index-hero.png",
    "images/index-hero.png",
    "images/index-hero.png"
];

$venueSubImage2 = [
    "images/index-hero.png",
    "images/index-hero.png",
    "images/index-hero.png"
];

$venueReverse = [
    false,
    true,
    false
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dining Amenities - Grand Budapest Hotel</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">
</head>

<body class="bg-lightpink bg-opacity-25">

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
                    <h1 class="display-3 font-title font-white">
                        Dining
                    </h1>

                    <p class="lead font-white font-title">
                        Amenities
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation -->

    <nav class="bg-darkbrown py-3">
        <div class="container">

            <div class="row justify-content-center text-center gap-5">

                <div class="col-auto mx-5">
                    <a href="amenities_dining.php"
                        class="font-pink font-title text-decoration-none pb-1 fw-semibold px-3">
                        Dining
                    </a>
                </div>

                <div class="col-auto mx-5">
                    <a href="amenities_activities.php"
                        class="font-white font-title text-decoration-none pb-1 fw-semibold px-3">
                        Activities
                    </a>
                </div>

            </div>

        </div>
    </nav>

    <!-- Main Content -->

    <main class="container my-5">

        <div class="row g-5">

            <?php for($i = 0; $i < count($venueNames); $i++): ?>

            <div class="col-12">

                <div class="row g-0 bg-white rounded-3 shadow overflow-hidden <?php echo $venueReverse[$i] ? 'flex-row-reverse' : ''; ?>">

                    <!-- Images -->

                    <div class="col-lg-7 p-4 p-md-5 d-flex align-items-center bg-lightbrown"
                        >

                        <div class="row g-3 w-100 m-0">

                            <div class="col-7 p-0">
                                <img src="<?php echo $venueMainImages[$i]; ?>"
                                    alt="Main Display"
                                    class="img-fluid rounded-2 object-fit-cover w-100"
                                    style="height: 290px;">
                            </div>

                            <div class="col-5 p-0 ps-3">

                                <div class="row g-3 m-0">

                                    <div class="col-12 p-0">
                                        <img src="<?php echo $venueSubImage1[$i]; ?>"
                                            alt="Detail View 1"
                                            class="img-fluid rounded-2 object-fit-cover w-100"
                                            style="height: 137px;">
                                    </div>

                                    <div class="col-12 p-0">
                                        <img src="<?php echo $venueSubImage2[$i]; ?>"
                                            alt="Detail View 2"
                                            class="img-fluid rounded-2 object-fit-cover w-100"
                                            style="height: 137px;">
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Text Content -->

                    <div class="col-lg-5 p-4 p-md-5 bg-white text-dark d-flex flex-column justify-content-center">

                        <div class="row">

                            <div class="col-12">

                                <h2 class="display-5 font-title mb-2">
                                    <?php echo $venueNames[$i]; ?>
                                </h2>

                                <h5 class="font-body mb-1">
                                    <?php echo $venueSubtitles[$i]; ?>
                                </h5>

                                <?php if(!empty($venueHours[$i])): ?>

                                    <p class="small text-muted fst-italic mb-4">
                                        <?php echo $venueHours[$i]; ?>
                                    </p>

                                <?php else: ?>

                                    <div class="mb-4"></div>

                                <?php endif; ?>

                                <p class="medium fw-normal m-0">
                                    <?php echo $venueDescriptions[$i]; ?>
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <?php endfor; ?>

        </div>

    </main>

    <!-- CTA Section -->

    <section class="my-5">

    <div class="container">

        <div class="row align-items-center rounded-4 px-5 py-3 bg-lightbrown">

            <!-- Logo -->

            <div class="col-lg-2 text-center text-lg-start mb-4 mb-lg-0">

                <img src="images/logo.png"
                    alt="Grand Budapest Logo"
                    class="img-fluid"
                    style="max-height: 90px;">

            </div>

            <!-- Text -->

            <div class="col-lg-7 text-center text-lg-start mb-4 mb-lg-0">

                <h2 class="h2 text-white fw-bold my-3">
                    Ready To Experience Timeless Elegance?
                </h2>

                <p class="text-light small mb-3">
                    Book now and enjoy curated activities, signature treatments,
                    and premium amenities in a beautifully restored grand hotel setting.
                </p>

            </div>

            <!-- Button -->

            <div class="col-lg-3 text-center text-lg-end">

                <a href="#"
                    class="btn rounded-pill px-5 py-3 bg-lightpink font-darkbrown fw-semibold border border-darkpink">

                    Book Now

                </a>

            </div>

        </div>

    </div>

</section>

    <!-- FOOTER -->
    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>