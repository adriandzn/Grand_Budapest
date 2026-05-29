<?php

$activityNames = [
    'Gym',
    'Spa',
    'Pool'
];

$activitySubtitles = [
    'Strong. Focused. Energized.',
    'Relax. Renew. Restore.',
    'Calm. Refresh. Unwind.'
];

$activityHours = [
    '6am to 10pm / Daily',
    '10am to 9pm / Daily',
    '7am to 8pm / Daily'
];

$activityImages = [
    'images/index-hero.png',
    'images/index-hero.png',
    'images/index-hero.png'
];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Activities Amenities - Grand Budapest Hotel
    </title>

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
                        Activities
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
                        class="font-white font-title text-decoration-none pb-1 fw-semibold px-3">
                        Dining
                    </a>
                </div>

                <div class="col-auto mx-5">
                    <a href="amenities_activities.php"
                        class="font-pink font-title text-decoration-none pb-1 fw-semibold px-3">
                        Activities
                    </a>
                </div>

            </div>

        </div>
    </nav>

    <!-- Activities Cards -->

    <main class="container my-5">

        <div class="row g-4">

            <?php for ($i = 0; $i < count($activityNames); $i++): ?>

                <div class="col-lg-4 col-md-6">

                    <div class="card border-0 rounded-4 overflow-hidden h-100 bg-white shadow">

                        <!-- Image -->

                        <img src="<?php echo $activityImages[$i]; ?>"
                            class="card-img-top object-fit-cover"
                            alt="<?php echo $activityNames[$i]; ?>"
                            style="height: 240px;">

                        <!-- Card Body -->

                        <div class="card-body p-4 bg-white">

                            <h3 class="display-6 font-title text-dark mb-2">
                                <?php echo $activityNames[$i]; ?>
                            </h3>

                            <p class="text-muted small mb-3 lh-base">
                                <?php echo $activitySubtitles[$i]; ?>
                            </p>

                            <p class="small fw-semibold text-dark mb-0">
                                <?php echo $activityHours[$i]; ?>
                            </p>

                        </div>

                    </div>

                </div>

            <?php endfor; ?>

        </div>

    </main>

    <!-- CTA Section -->

    <section class="my-5">

        <div class="container">

            <div class="row align-items-center rounded-4 px-5 py-4 bg-lightbrown">

                <!-- Logo -->

                <div class="col-lg-2 text-center text-lg-start mb-4 mb-lg-0">

                    <img src="images/logo.png"
                        alt="Grand Budapest Logo"
                        class="img-fluid"
                        style="max-height: 90px;">

                </div>

                <!-- Text -->

                <div class="col-lg-7 text-center text-lg-start mb-4 mb-lg-0">

                    <h2 class="h2 text-white fw-bold mb-3">
                        Ready To Experience Timeless Elegance?
                    </h2>

                    <p class="text-light small mb-0">
                        Book now and enjoy curated activities, signature treatments,
                        and premium amenities in a beautifully restored grand hotel setting.
                    </p>

                </div>

                <!-- Button -->

                <div class="col-lg-3 text-center text-lg-end">

                    <a href="#" class="btn book-now font-title d-flex flex-column align-items-center px-2 py-3 shadow">
                        BOOK NOW
                        <img src="images/logo-key-brown.png" alt="key" style="height:18px;">
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