<?php
// Define the dining venues data dynamically
$dining_venues = [
    [
        'title'       => 'Buffet',
        'subtitle'    => 'Breakfast, Lunch and Dinner',
        'hours'       => '6am to 10pm / Daily',
        'description' => 'Indulge in a lavish buffet experience featuring a curated selection of international and local cuisine. From freshly baked pastries in the morning to flavorful main courses and decadent desserts in the evening, our buffet is designed to satisfy every palate.<br><br>Enjoy live cooking stations, seasonal specialties, and a warm, inviting ambiance perfect for families, couples, and groups.',
        'image_main'  => 'images/buffet_main.jpg',
        'image_sub1'  => 'images/buffet_sub1.jpg',
        'image_sub2'  => 'images/buffet_sub2.jpg',
        'reverse'     => false // Image on Left, Text on Right
    ],
    [
        'title'       => 'Restaurant',
        'subtitle'    => 'Breakfast, Lunch and Dinner',
        'hours'       => '6am to 10pm / Daily',
        'description' => 'Experience fine dining at its finest in our signature restaurant. Our chefs craft each dish with precision, using high-quality ingredients to deliver a perfect balance of flavor and presentation.<br><br>Whether you\'re starting your day with a hearty breakfast or enjoying a romantic dinner, our restaurant offers a sophisticated setting paired with exceptional service.',
        'image_main'  => 'images/restaurant_main.jpg',
        'image_sub1'  => 'images/restaurant_sub1.jpg',
        'image_sub2'  => 'images/restaurant_sub2.jpg',
        'reverse'     => true // Image on Right, Text on Left
    ],
    [
        'title'       => 'Bar',
        'subtitle'    => '24/7 Open',
        'hours'       => '',
        'description' => 'Unwind and relax at our elegant bar, where timeless charm meets modern taste. Enjoy handcrafted cocktails, premium wines, and a wide selection of spirits in a cozy yet refined atmosphere.<br><br>Perfect for casual meetups or late-night nightcaps.',
        'image_main'  => 'images/bar_main.jpg',
        'image_sub1'  => 'images/bar_sub1.jpg',
        'image_sub2'  => 'images/bar_sub2.jpg',
        'reverse'     => false
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Amenities</title>
    </head>
    <body>
    <main class="container my-5 py-4">
        <div class="d-flex flex-column gap-5">
            
            <?php foreach ($dining_venues as $venue): ?>
                <div class="amenity-card">
                    <div class="row g-0 <?php echo $venue['reverse'] ? 'flex-row-reverse' : ''; ?>">
                        
                        <div class="col-lg-7 card-gallery p-4 p-md-5">
                            <div class="gallery-grid">
                                <img src="<?php echo $venue['image_main']; ?>" alt="Main View" class="main-img">
                                <img src="<?php echo $venue['image_sub1']; ?>" alt="Sub View 1" class="sub-img">
                                <img src="<?php echo $venue['image_sub2']; ?>" alt="Sub View 2" class="sub-img">
                            </div>
                        </div>

                        <div class="col-lg-5 card-info p-4 p-md-5 d-flex flex-column justify-content-center">
                            <h2 class="mb-3"><?php echo $venue['title']; ?></h2>
                            <h4 class="mb-1"><?php echo $venue['subtitle']; ?></h4>
                            
                            <?php if(!empty($venue['hours'])): ?>
                                <div class="hours mb-4"><?php echo $venue['hours']; ?></div>
                            <?php else: ?>
                                <div class="mb-4"></div>
                            <?php endif; ?>
                            
                            <p class="m-0"><?php echo $venue['description']; ?></p>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </main>

    </body>
</html>