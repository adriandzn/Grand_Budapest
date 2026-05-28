<?php
// Pure indexed array matrix - no key value mappings used here
$dining_venues = [
    [
        'Buffet',
        'Breakfast, Lunch and Dinner',
        '6am to 10pm / Daily',
        'Indulge in a lavish buffet experience featuring a curated selection of international and local cuisine. From freshly baked pastries in the morning to flavorful main courses and decadent desserts in the evening, our buffet is designed to satisfy every palate.<br><br>Enjoy live cooking stations, seasonal specialties, and a warm, inviting ambiance perfect for families, couples, and groups.',
        'images/index-hero.png',
        'images/index-hero.png',
        'images/index-hero.png',
        false // reverse
    ],
    [
        'Restaurant',
        'Breakfast, Lunch and Dinner',
        '6am to 10pm / Daily',
        'Experience fine dining at its finest in our signature restaurant. Our chefs craft each dish with precision, using high-quality ingredients to deliver a perfect balance of flavor and presentation.<br><br>Whether you\'re starting your day with a hearty breakfast or enjoying a romantic dinner, our restaurant offers a sophisticated setting paired with exceptional service.',
        'images/index-hero.png',
        'images/index-hero.png',
        'images/index-hero.png',
        true // reverse
    ],
    [
        'Bar',
        '24/7 Open',
        '', // empty hours string
        'Unwind and relax at our elegant bar, where timeless charm meets modern taste. Enjoy handcrafted cocktails, premium wines, and a wide selection of spirits in a cozy yet refined atmosphere.<br><br>Perfect for casual meetups or late-night nightcaps.',
        'images/index-hero.png',
        'images/index-hero.png',
        'images/index-hero.png',
        false // reverse
    ]
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
<body class="bg-danger bg-opacity-25">

    <!-- <header class="bg-dark py-3 px-4 text-warning">
        <div class="container">
            <div class="row align-items-center text-center text-md-start">
                <div class="col-md-4">
                    <div class="row text-center text-uppercase small g-2">
                        <div class="col-3"><a href="#" class="text-warning text-decoration-none">Home</a></div>
                        <div class="col-3"><a href="#" class="text-warning text-decoration-none">Rooms</a></div>
                        <div class="col-3"><a href="#" class="text-warning text-decoration-none">Amenities</a></div>
                        <div class="col-3"><a href="#" class="text-warning text-decoration-none">About</a></div>
                    </div>
                </div>
                <div class="col-md-4 text-center my-3 my-md-0">
                    <p class="h6 m-0 fw-bold">👑 GB 👑</p>
                    <p class="m-0 text-uppercase tracking-wider" style="font-size: 10px;">Grand Budapest Hotel</p>
                </div>
                <div class="col-md-4">
                    <div class="row align-items-center text-center text-uppercase small g-2">
                        <div class="col-4"><a href="#" class="text-warning text-decoration-none">Contact</a></div>
                        <div class="col-4"><a href="#" class="text-warning text-decoration-none">Profile</a></div>
                        <div class="col-4">
                            <a href="#" class="btn btn-sm btn-danger rounded-pill fw-semibold text-dark text-nowrap px-3">Book Now 🔑</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header> -->

    <section class="text-white py-5 border-top border-secondary" style="background-image: url('images/index-hero.png'); background-size: cover; background-position: center; background-color: rgba(0,0,0,0.6); background-blend-mode: multiply;">
        <div class="container py-4 ps-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-3 m-0 font-title font-white">Dining</h1>
                    <p class="lead font-white font-title tracking-widest fs-9">Amenities</p>
                </div>
            </div>
        </div>
    </section>

    <nav class="bg-darkbrown border-top border-secondary py-3">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-auto">
                    <a href="#" class="font-pink font-title text-decoration-none border-bottom border-white pb-1 fw-semibold px-3">Dining</a>
                </div>
                <div class="col-auto">
                    <a href="#" class="font-white font-title text-decoration-none pb-1 fw-semibold px-3">Activities</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <div class="row g-5">
            
            <?php foreach ($dining_venues as $venue): ?>
                <?php 
                // Unpack the sequential array elements directly into variables instead of using key names
                [$name, $subtitle, $hours, $description, $image_main, $image_sub1, $image_sub2, $reverse] = $venue; 
                ?>
                <div class="col-12">
                    <div class="row g-0 bg-white rounded-3 shadow overflow-hidden <?php echo $reverse ? 'flex-row-reverse' : ''; ?>">
                        
                        <div class="col-lg-7 p-4 p-md-5 d-flex align-items-center" style="background-color: #4a372c !important;">
                            <div class="row g-3 w-100 m-0">
                                <div class="col-7 p-0">
                                    <img src="<?php echo $image_main; ?>" alt="Main Display" class="img-fluid rounded-2 object-fit-cover w-100" style="height: 290px;">
                                </div>
                                <div class="col-5 p-0 ps-3">
                                    <div class="row g-3 m-0">
                                        <div class="col-12 p-0">
                                            <img src="<?php echo $image_sub1; ?>" alt="Detail View 1" class="img-fluid rounded-2 object-fit-cover w-100" style="height: 137px;">
                                        </div>
                                        <div class="col-12 p-0">
                                            <img src="<?php echo $image_sub2; ?>" alt="Detail View 2" class="img-fluid rounded-2 object-fit-cover w-100" style="height: 137px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 p-4 p-md-5 bg-white text-dark d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="display-5 text-dark mb-2"><?php echo $name; ?></h2>
                                    <h6 class="text-uppercase text-secondary tracking-wide mb-1"><?php echo $subtitle; ?></h6>
                                    
                                    <?php if(!empty($hours)): ?>
                                        <p class="small text-muted fst-italic mb-4"><?php echo $hours; ?></p>
                                    <?php else: ?>
                                        <div class="mb-4"></div>
                                    <?php endif; ?>
                                    
                                    <p class="text-muted lh-base small m-0"><?php echo $description; ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </main>

    <section class="container my-5">
        <div class="row g-3 align-items-center justify-content-between rounded-4 p-4 p-md-5" style="background: #462f28;">
            <div class="col-lg-8">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <img src="images/logo.png" alt="Grand Budapest logo" class="img-fluid" style="max-height: 72px;">
                    </div>
                    <div class="col">
                        <div class="p-4 p-md-5 rounded-4" style="background: rgba(255,255,255,0.06); backdrop-filter: blur(10px);">
                            <p class="text-uppercase text-secondary small mb-2 tracking-widest">Ready To Experience Timeless Elegance?</p>
                            <h2 class="display-6 text-white fw-bold mb-3">Reserve your table or room and indulge in a luxurious dining and hospitality experience like no other.</h2>
                            <p class="text-light mb-0">Enjoy royal service, refined menus, and an atmosphere crafted for unforgettable moments.</p>
                        </div>
                        <div class="mt-3 d-flex align-items-center gap-3">
                            <img src="images/logo-key-brown.png" alt="Key accent logo" style="height: 40px; width: auto;">
                            <p class="text-white mb-0 small">Book with us today and unlock the Grand Budapest Hotel experience.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <a href="#" class="btn rounded-pill px-5 py-3 fw-semibold d-inline-flex align-items-center justify-content-center" style="background: #f497c1; color: #1f1f1f;">
                    <img src="images/logo-key-brown.png" alt="Book now key" style="height: 18px; width: auto; margin-right: 0.75rem;">
                    Book Now
                </a>
            </div>
        </div>
    </section>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>