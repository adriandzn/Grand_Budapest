<?php
$activities = [
    ['Gym', 'Strong. Focused. Energized.', '6am to 10pm / Daily', 'images/index-hero.png'],
    ['Spa', 'Relax. Renew. Restore.', '10am to 9pm / Daily', 'images/index-hero.png'],
    ['Pool', 'Calm. Refresh. Unwind.', '7am to 8pm / Daily', 'images/index-hero.png'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities Amenities - Grand Budapest Hotel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">
</head>
<body class="bg-darkbrown font-body text-white">
    <section class="position-relative">
        <img src="images/index-hero.png" alt="Activities hero" class="img-fluid w-100">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-75"></div>
        <div class="position-absolute top-50 start-0 translate-middle-y w-100">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-7">
                        <p class="text-uppercase text-secondary small mb-2">Amenities</p>
                        <h1 class="display-3 fw-bold font-title mb-0">Activities</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <nav class="bg-darkbrown border-top border-secondary border-bottom border-secondary py-3">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-auto">
                    <a href="amenities_dining.php" class="text-white text-decoration-none px-3 py-2">Dining</a>
                </div>
                <div class="col-auto">
                    <a href="amenities_activities.php" class="text-pink text-decoration-none px-3 py-2 border-bottom border-pink">Activities</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <div class="row g-4">
            <?php foreach ($activities as $activity): ?>
                <?php [$name, $subtitle, $hours, $image] = $activity; ?>
                <div class="col-lg-4">
                    <div class="card rounded-4 shadow-sm border-0 overflow-hidden">
                        <img src="<?php echo $image; ?>" class="card-img-top" alt="<?php echo $name; ?>">
                        <div class="card-body bg-white">
                            <h3 class="h4 font-title text-dark mb-3"><?php echo $name; ?></h3>
                            <p class="text-secondary small mb-2"><?php echo $subtitle; ?></p>
                            <p class="text-dark small mb-0"><strong><?php echo $hours; ?></strong></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <section class="my-5">
            <div class="rounded-4 p-4 p-md-5 bg-dark bg-opacity-75">
                <div class="row align-items-center gy-4">
                    <div class="col-lg-8">
                        <p class="text-uppercase text-secondary small mb-2">Ready To Experience Timeless Elegance?</p>
                        <h2 class="h2 text-white fw-bold mb-3">Discover exclusive wellness and leisure experiences built for unforgettable stays.</h2>
                        <p class="text-light small mb-0">Book now and enjoy curated activities, signature treatments, and premium amenities in a beautifully restored grand hotel setting.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="#" class="btn rounded-pill px-5 py-3 bg-lightpink font-darkbrown">Book Now</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-dark py-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4">
                    <h5 class="font-title text-white mb-3">GRAND BUDAPEST HOTEL</h5>
                    <p class="small text-secondary mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur efficitur, metus et varius dignissim, neque quam dignissim neque, aliquet finibus urna ligula porttitor pharetra pellentesque.</p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-white mb-3">Hotel Location</h6>
                    <p class="small text-secondary mb-1">1 Alpine Summit Drive</p>
                    <p class="small text-secondary mb-1">Lutz, Zubrowka 1099</p>
                    <p class="small text-secondary mb-0">Republic of Zubrowka</p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-white mb-3">Contact Us</h6>
                    <p class="small text-secondary mb-1">+63 975 714 1559</p>
                    <p class="small text-secondary mb-0">reservations@grandbudapest.lb</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
