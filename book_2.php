<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/progress.css">
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
                $current_step = 2;
                include 'progress.php'; 
            ?>
        </div>

        <form action="book_3.php" method="post">

            <!-- Select Your Room Area -->
            <div class="bg-lightbrown rounded-5 my-5 p-5 shadow" id="select-room">

                <!-- Go Back Button -->
                <div class="row">
                    <div class="col">
                        <a href="book_1.php" class="btn pink-button font-title d-flex align-items-center justify-content-center gap-2 px-4 py-2 shadow" style="width: fit-content;">
                            <img src="images/logo-go-back.png" alt="key" style="height:20px;">
                            Go Back    
                        </a>
                    </div>
                </div>

                <div class="row pt-5">
                    <div class="col font-title text-white h4 fw-bold">Select Your Room</div>
                </div>

                <!-- Standard Room -->
                <div class="row bg-white rounded-5 shadow mt-5">

                    <!-- Image -->
                    <div class="col-lg-4 col-md-12 col-12 px-4 py-4">
                        <img src="images/placeholder1.png" alt="Standard Room" class="img-fluid rounded-5" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <!-- Details -->
                    <div class="col-lg-4 col-md-6 col-12 px-4 py-4 d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col font-title h4 fw-bold">Standard Room</div>
                        </div>
                        <div class="row">
                            <div class="col font-body">Enjoy comfort and simplicity in our thoughtfully designed Standard Room. Perfect for solo travelers or couples, this space offers a relaxing atmosphere with essential amenities for a pleasant stay.</div>
                        </div>
                        <div class="row pt-3">
                            <div class="col font-body d-flex align-items-center gap-3 fw-bold">
                                <img src="images/logo-profile-brown.png" alt="person" style="height:20px;">
                                2 Adults
                            </div>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="col-lg-4 col-md-6 col-12 px-4 py-4 d-flex flex-column align-items-center justify-content-center">
                        <div class="font-body h4 fw-bold">₱ 4,500.00</div>
                        <div class="font-body h5 fw-bold font-gray">per night</div>
                        <div class="mt-3 btn pink-button font-title d-flex align-items-center px-5 py-2 shadow">Select Room</div>
                    </div>
                    
                </div>


                <!-- Deluxe Room -->
                <div class="row bg-white rounded-5 shadow mt-4">

                    <!-- Image -->
                    <div class="col-lg-4 col-md-12 col-12 px-4 py-4">
                        <img src="images/placeholder1.png" alt="Deluxe Room" class="img-fluid rounded-5" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <!-- Details -->
                    <div class="col-lg-4 col-md-6 col-12 px-4 py-4 d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col font-title h4 fw-bold">Deluxe Room</div>
                        </div>
                        <div class="row">
                            <div class="col font-body">Upgrade your stay with our Deluxe Room, featuring a more spacious layout and enhanced amenities. Ideal for guests who want both comfort and a touch of luxury.</div>
                        </div>
                        <div class="row pt-3">
                            <div class="col font-body d-flex align-items-center gap-3 fw-bold">
                                <img src="images/logo-profile-brown.png" alt="person" style="height:20px;">
                                2 Adults • 2 Children
                            </div>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="col-lg-4 col-md-6 col-12 px-4 py-4 d-flex flex-column align-items-center justify-content-center">
                        <div class="font-body h4 fw-bold">₱ 8,599.00</div>
                        <div class="font-body h5 fw-bold font-gray">per night</div>
                        <div class="mt-3 btn pink-button font-title d-flex align-items-center px-5 py-2 shadow">Select Room</div>
                    </div>
                    
                </div>
                

                <!-- Suite Room -->
                <div class="row bg-white rounded-5 shadow mt-4">

                    <!-- Image -->
                    <div class="col-lg-4 col-md-12 col-12 px-4 py-4">
                        <img src="images/placeholder1.png" alt="Suite Room" class="img-fluid rounded-5" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <!-- Details -->
                    <div class="col-lg-4 col-md-6 col-12 px-4 py-4 d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col font-title h4 fw-bold">Suite Room</div>
                        </div>
                        <div class="row">
                            <div class="col font-body">Experience premium luxury in our Suite Room, designed for families or guests seeking the ultimate comfort. With elegant interiors and generous space, this room ensures a truly memorable stay.</div>
                        </div>
                        <div class="row pt-3">
                            <div class="col font-body d-flex align-items-center gap-3 fw-bold">
                                <img src="images/logo-profile-brown.png" alt="person" style="height:20px;">
                                4 Adults • 4 Children
                            </div>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="col-lg-4 col-md-6 col-12 px-4 py-4 d-flex flex-column align-items-center justify-content-center">
                        <div class="font-body h4 fw-bold">₱ 14,999.00</div>
                        <div class="font-body h5 fw-bold font-gray">per night</div>
                        <div class="mt-3 btn pink-button font-title d-flex align-items-center px-5 py-2 shadow">Select Room</div>
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