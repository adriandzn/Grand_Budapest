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
                $current_step = 2;
                include 'progress.php'; 
            ?>
        </div>

        <form action="book_3.php" method="post">

            <!-- Select Your Room Area -->
            <div class="bg-lightbrown rounded-5 my-5 p-5 shadow">

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
                    <div class="col px-3 py-3">
                        <img src="images/placeholder1.png" alt="Standard Room" class="img-fluid rounded-5 m-4" style="width: 300px; height: 200px; object-fit: cover;">
                    </div>
                    <div class="col px-3"></div>
                    <div class="col px-3"></div>
                </div>

                <!-- Deluxe Room -->
                <div class="row">
                    <div class="col"></div>
                </div>
                
                <!-- Suite Room -->
                <div class="row">
                    <div class="col"></div>
                </div>
                
            </div>
            
        </form>

    </div>


    <!-- FOOTER -->
    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>