<?php
// Pure indexed array matrix - no key value mappings used here
$dining_venues = [
    [
        'Buffet',
        'Breakfast, Lunch and Dinner',
        '6am to 10pm / Daily',
        'Indulge in a lavish buffet experience featuring a curated selection of international and local cuisine. From freshly baked pastries in the morning to flavorful main courses and decadent desserts in the evening, our buffet is designed to satisfy every palate.<br><br>Enjoy live cooking stations, seasonal specialties, and a warm, inviting ambiance perfect for families, couples, and groups.',
        'images/buffet_main.jpg',
        'images/buffet_sub1.jpg',
        'images/buffet_sub2.jpg',
        false // reverse
    ],
    [
        'Restaurant',
        'Breakfast, Lunch and Dinner',
        '6am to 10pm / Daily',
        'Experience fine dining at its finest in our signature restaurant. Our chefs craft each dish with precision, using high-quality ingredients to deliver a perfect balance of flavor and presentation.<br><br>Whether you\'re starting your day with a hearty breakfast or enjoying a romantic dinner, our restaurant offers a sophisticated setting paired with exceptional service.',
        'images/restaurant_main.jpg',
        'images/restaurant_sub1.jpg',
        'images/restaurant_sub2.jpg',
        true // reverse
    ],
    [
        'Bar',
        '24/7 Open',
        '', // empty hours string
        'Unwind and relax at our elegant bar, where timeless charm meets modern taste. Enjoy handcrafted cocktails, premium wines, and a wide selection of spirits in a cozy yet refined atmosphere.<br><br>Perfect for casual meetups or late-night nightcaps.',
        'images/bar_main.jpg',
        'images/bar_sub1.jpg',
        'images/bar_sub2.jpg',
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

    <header class="bg-dark py-3 px-4 text-warning">
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
    </header>

    <section class="bg-dark text-white py-5 border-top border-secondary">
        <div class="container py-4 ps-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-3 m-0">Dining</h1>
                    <p class="lead text-secondary text-uppercase tracking-widest fs-6">Amenities</p>
                </div>
            </div>
        </div>
    </section>

    <nav class="bg-dark border-top border-secondary py-2">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-auto">
                    <a href="#" class="text-danger text-decoration-none border-bottom border-danger pb-2 fw-semibold px-3">Dining</a>
                </div>
                <div class="col-auto">
                    <a href="#" class="text-muted text-decoration-none px-3">Activities</a>
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

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>