<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Grand Budapest Hotel - Rooms</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">

    <style>

        body{
            overflow-x: hidden;
        }

        .hero-section{
            background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)),
            url('images/index-hero.png');

            background-size: cover;
            background-position: center;
            min-height: 320px;

            display: flex;
            align-items: center;
        }

        .hero-title{
            font-size: 4rem;
            font-weight: 700;
        }

        .hero-subtitle{
            font-size: 1.3rem;
            letter-spacing: 2px;
        }

        .room-card{
            background-color: #5b4033;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .room-info{
            background-color: #ffffff;
            padding: 40px;
            height: 100%;
        }

        .room-gallery{
            padding: 35px;
        }

        .room-main-image{
            width: 100%;
            height: 260px;
            object-fit: cover;
            border-radius: 18px;
        }

        .room-thumbnail{
            width: 100%;
            height: 90px;
            object-fit: cover;
            border-radius: 14px;
        }

        .feature-item{
            font-size: 0.95rem;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .feature-item img{
            width: 22px;
        }

        .room-title{
            font-size: 2rem;
            font-weight: 700;
            color: #4d2f2f;
        }

        .room-description{
            color: #555;
            line-height: 1.7;
        }

        .room-price{
            font-size: 1.4rem;
            color: #d06c8f;
            font-weight: 700;
        }

        .section-label{
            font-size: 0.9rem;
            font-weight: 700;
            margin-top: 25px;
            margin-bottom: 15px;
            color: #4d2f2f;
        }

        .cta-section{
            background-color: #5b4033;
            border-radius: 25px;
            padding: 40px;
        }

        .cta-button{
            background-color: #f08cab;
            color: #000;
            border-radius: 50px;
            padding: 14px 30px;
            font-weight: 700;
            text-decoration: none;

            transition: 0.3s;
        }

        .cta-button:hover{
            background-color: #e27297;
            color: #000;
        }

        @media (max-width: 991px){

            .room-info{
                padding: 30px;
            }

            .room-gallery{
                padding: 25px;
            }

            .hero-title{
                font-size: 3rem;
            }

        }

        @media (max-width: 768px){

            .hero-title{
                font-size: 2.5rem;
            }

            .room-main-image{
                height: 220px;
            }

            .room-thumbnail{
                height: 75px;
            }

        }

    </style>

</head>

<body class="bg-lightpink">

    <!-- NAVBAR -->

    <?php include 'navbar.php'; ?>

    <!-- HERO SECTION -->

    <section class="hero-section text-white">

        <div class="container">

            <div class="row">

                <div class="col-lg-6">

                    <h1 class="hero-title font-title">
                        Rooms
                    </h1>

                    <p class="hero-subtitle">
                        Accommodations
                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- STANDARD ROOM -->

    <section class="py-5">

        <div class="container">

            <div class="room-card">

                <div class="row g-0 align-items-center">

                    <!-- LEFT -->

                    <div class="col-lg-5">

                        <div class="room-info">

                            <h2 class="room-title font-title">
                                Standard Room
                            </h2>

                            <p class="room-description mt-3">
                                Enjoy comfort and simplicity in our thoughtfully designed Standard Room.
                                Perfect for solo travelers or couples, this space offers a relaxing atmosphere
                                with essential comforts for a pleasant stay.
                            </p>

                            <p class="room-price mt-4">
                                ₱4,500.00 / night
                            </p>

                            <div class="section-label">
                                Details:
                            </div>

                            <div class="feature-item">
                                <img src="images/logo-profile-brown.png">
                                2 Adults
                            </div>

                            <div class="feature-item">
                                <img src="images/logo-bed-brown.png">
                                1 Queen Bed
                            </div>

                            <div class="section-label">
                                Features:
                            </div>

                            <div class="row">

                                <div class="col-6">

                                    <div class="feature-item">
                                        <img src="images/logo-wifi-brown.png">
                                        Free Wi-Fi
                                    </div>

                                    <div class="feature-item">
                                        <img src="images/logo-wind-brown.png">
                                        Air Conditioning
                                    </div>

                                </div>

                                <div class="col-6">

                                    <div class="feature-item">
                                        <img src="images/logo-tv-brown.png">
                                        Smart TV
                                    </div>

                                    <div class="feature-item">
                                        <img src="images/logo-toilet-brown.png">
                                        Private Bathroom
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- RIGHT -->

                    <div class="col-lg-7">

                        <div class="room-gallery">

                            <img src="images/index-hero.png"
                                class="room-main-image shadow">

                            <div class="row mt-3">

                                <div class="col-4">
                                    <img src="images/index-hero.png"
                                        class="room-thumbnail shadow">
                                </div>

                                <div class="col-4">
                                    <img src="images/index-hero.png"
                                        class="room-thumbnail shadow">
                                </div>

                                <div class="col-4">
                                    <img src="images/index-hero.png"
                                        class="room-thumbnail shadow">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- DELUXE ROOM -->

    <section class="pb-5">

        <div class="container">

            <div class="room-card">

                <div class="row g-0 align-items-center">

                    <div class="col-lg-5">

                        <div class="room-info">

                            <h2 class="room-title font-title">
                                Deluxe Room
                            </h2>

                            <p class="room-description mt-3">
                                Upgrade your stay with our Deluxe Room, featuring a more spacious layout
                                and enhanced amenities. Ideal for guests who want both comfort and luxury.
                            </p>

                            <p class="room-price mt-4">
                                ₱8,599.00 / night
                            </p>

                            <div class="section-label">
                                Details:
                            </div>

                            <div class="feature-item">
                                <img src="images/logo-profile-brown.png">
                                2 Adults • 2 Child
                            </div>

                            <div class="feature-item">
                                <img src="images/logo-bed-brown.png">
                                1 King Bed and 2 Twin Beds
                            </div>

                            <div class="section-label">
                                Features:
                            </div>

                            <div class="row">

                                <div class="col-6">

                                    <div class="feature-item">
                                        <img src="images/logo-wifi-brown.png">
                                        Free Wi-Fi
                                    </div>

                                    <div class="feature-item">
                                        <img src="images/logo-wind-brown.png">
                                        Air Conditioning
                                    </div>

                                    <div class="feature-item">
                                        <img src="images/logo-tv-brown.png">
                                        Smart TV
                                    </div>

                                </div>

                                <div class="col-6">

                                    <div class="feature-item">
                                        <img src="images/logo-toilet-brown.png">
                                        Private Bathroom
                                    </div>

                                    <div class="feature-item">
                                        <img src="images/logo-sun-brown.png">
                                        Balcony
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-7">

                        <div class="room-gallery">

                            <img src="images/index-hero.png"
                                class="room-main-image shadow">

                            <div class="row mt-3">

                                <div class="col-4">
                                    <img src="images/index-hero.png"
                                        class="room-thumbnail shadow">
                                </div>

                                <div class="col-4">
                                    <img src="images/index-hero.png"
                                        class="room-thumbnail shadow">
                                </div>

                                <div class="col-4">
                                    <img src="images/index-hero.png"
                                        class="room-thumbnail shadow">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- SUITE ROOM -->

    <section>

        <div class="container">

            <div class="room-card">

                <div class="row g-0 align-items-center">

                    <div class="col-lg-5">

                        <div class="room-info">

                            <h2 class="room-title font-title">
                                Suite Room
                            </h2>

                            <p class="room-description mt-3">
                                Experience premium luxury in our Suite Room, designed for families
                                or guests seeking ultimate comfort. Spacious interiors and elegant
                                amenities ensure a truly memorable stay.
                            </p>

                            <p class="room-price mt-4">
                                ₱14,999.00 / night
                            </p>

                            <div class="section-label">
                                Details:
                            </div>

                            <div class="feature-item">
                                <img src="images/logo-profile-brown.png">
                                4 Adults • 4 Child
                            </div>

                            <div class="feature-item">
                                <img src="images/logo-bed-brown.png">
                                2 King Beds and 2 Twin Beds
                            </div>

                            <div class="section-label">
                                Features:
                            </div>

                            <div class="row">

                                <div class="col-6">

                                    <div class="feature-item">
                                        <img src="images/logo-wifi-brown.png">
                                        Free Wi-Fi
                                    </div>

                                    <div class="feature-item">
                                        <img src="images/logo-wind-brown.png">
                                        Air Conditioning
                                    </div>

                                    <div class="feature-item">
                                        <img src="images/logo-tv-brown.png">
                                        Smart TV
                                    </div>

                                </div>

                                <div class="col-6">

                                    <div class="feature-item">
                                        <img src="images/logo-wine-brown.png">
                                        Mini Bar
                                    </div>

                                    <div class="feature-item">
                                        <img src="images/logo-toilet-brown.png">
                                        Private Bathroom
                                    </div>

                                    <div class="feature-item">
                                        <img src="images/logo-sun-brown.png">
                                        Balcony
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-7">

                        <div class="room-gallery">

                            <img src="images/index-hero.png"
                                class="room-main-image shadow">

                            <div class="row mt-3">

                                <div class="col-4">
                                    <img src="images/index-hero.png"
                                        class="room-thumbnail shadow">
                                </div>

                                <div class="col-4">
                                    <img src="images/index-hero.png"
                                        class="room-thumbnail shadow">
                                </div>

                                <div class="col-4">
                                    <img src="images/index-hero.png"
                                        class="room-thumbnail shadow">
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

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

                <a href="#" class="btn pink-button font-title d-flex flex-column align-items-center px-2 py-3 shadow">
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