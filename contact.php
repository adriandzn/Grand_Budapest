<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Us - Grand Budapest Hotel</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">

</head>

<body class="bg-lightpink font-body">

    <!-- NAVBAR -->

    <?php include 'navbar.php'; ?>

    <!-- HERO SECTION -->

    <section class="text-white py-5 border-top border-secondary"
        style="background-image: url('images/index-hero.png'); 
        background-size: cover; 
        background-position: center; 
        background-color: rgba(0,0,0,0.6); 
        background-blend-mode: multiply;">

        <div class="container py-4 ps-5">
            <div class="row">
                <div class="col">
                    <h1 class="display-3 font-title font-white">
                        Contact Us
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->

    <main class="container-fluid px-4 px-lg-5 py-5">

        <div class="row g-5 align-items-start">

            <!-- LEFT FORM -->

            <div class="col-lg-7">

                <div class="bg-white rounded-4 shadow p-4 p-lg-5 h-100">

                    <!-- TOP ICON -->

                    <div class="text-center mb-4">

                        <img src="images/logo-phone-circle.png"
                            alt="Phone Icon"
                            class="img-fluid mb-3"
                            style="height: 80px;">

                        <h2 class="fw-bold font-title font-darkbrown mb-4">
                            GRAND BUDAPEST LOBBY
                        </h2>

                        <p class="small text-muted lh-base fs-5">
                            Got any inquiries, comments, or recommendations?<br>
                            Feel free to reach out and message us, we would love<br>
                            to hear from you!
                        </p>

                    </div>

                    <!-- FORM -->

                    <form>

                        <div class="mb-4">

                            <label class="fw-semibold fs-5 mb-3">
                                Full Name <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                class="form-control rounded-pill py-3 px-4 border-darkpink fs-5"
                                placeholder="Type here">

                        </div>

                        <div class="mb-4">

                            <label class="fw-semibold fs-5 mb-3">
                                Email <span class="text-danger">*</span>
                            </label>

                            <input type="email"
                                class="form-control rounded-pill py-3 px-4 border-darkpink fs-5"
                                placeholder="Type here">

                        </div>

                        <div class="mb-4">

                            <label class="fw-semibold fs-5 mb-3">
                                Contact Number <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                class="form-control rounded-pill py-3 px-4 border-darkpink fs-5"
                                placeholder="Type here">

                        </div>

                        <div class="mb-4">

                            <label class="fw-semibold fs-5 mb-3">
                                Message <span class="text-danger">*</span>
                            </label>

                            <textarea class="form-control rounded-4 border-darkpink p-4 fs-5"
                                rows="6"
                                placeholder="How can we help you?"></textarea>

                        </div>

                        <!-- BUTTON -->

                        <div class="text-center mt-5">

                            <button type="submit"
                                class="btn bg-darkpink text-dark fw-bold rounded-pill px-5 py-3 shadow-sm fs-5">

                                SEND

                            </button>

                        </div>

                    </form>

                    <p class="small text-muted text-center mt-4 mb-0">
                        We typically respond within 24 hours.
                    </p>

                </div>

            </div>

            <!-- RIGHT SIDE -->

            <div class="col-lg-5">

                <!-- CONTACT INFO -->

                <div class="bg-lightbrown rounded-4 shadow p-5 text-white mb-5">

                    <h2 class="fw-bold font-title text-center mb-5">
                        Contact Information
                    </h2>

                    <!-- HOURS -->

                    <div class="d-flex align-items-start mb-5">

                        <img src="images/logo-clock-pink.png"
                            alt="Clock"
                            style="width: 50px;"
                            class="me-4">

                        <div>

                            <h5 class="text-pink fw-bold mb-3">
                                Lobby Hours
                            </h5>

                            <p class="mb-1 fw-semibold">
                                Monday to Sunday
                            </p>

                            <p class="mb-0 fw-semibold">
                                7:00AM - 11:00PM
                            </p>

                        </div>

                    </div>

                    <!-- PHONE -->

                    <div class="d-flex align-items-start mb-5">

                        <img src="images/logo-phone-pink.png"
                            alt="Phone"
                            style="width: 50px;"
                            class="me-4">

                        <div>

                            <h5 class="text-pink fw-bold mb-3">
                                Mobile Number
                            </h5>

                            <p class="mb-0 fw-semibold">
                                +63 975 714 1559
                            </p>

                        </div>

                    </div>

                    <!-- EMAIL -->

                    <div class="d-flex align-items-start">

                        <img src="images/logo-mail-pink.png"
                            alt="Email"
                            style="width: 50px;"
                            class="me-4">

                        <div>

                            <h5 class="text-pink fw-bold mb-3">
                                Email
                            </h5>

                            <p class="mb-0 fw-semibold">
                                reservations@grandbudapest.zb
                            </p>

                        </div>

                    </div>

                </div>

                <!-- SOCIALS -->

                <div class="bg-lightbrown rounded-4 shadow p-5 text-center text-white">

                    <h2 class="fw-bold font-title mb-3">
                        Socials
                    </h2>

                    <p class="fw-semibold mb-5">
                        Follow us to get more news and updates!
                    </p>

                    <div class="d-flex justify-content-center gap-5">

                        <img src="images/logo-fb-pink.png"
                            alt="Facebook"
                            style="height: 55px;">

                        <img src="images/logo-ig-pink.png"
                            alt="Instagram"
                            style="height: 55px;">

                        <img src="images/logo-tiktok-pink.png"
                            alt="TikTok"
                            style="height: 55px;">

                    </div>

                </div>

            </div>

        </div>

        <!-- LOCATION SECTION -->

        <section class="mt-5">

            <div class="bg-lightbrown rounded-4 p-5 text-white">

                <div class="row align-items-center g-5">

                    <!-- LEFT -->

                    <div class="col-lg-4">

                        <h2 class="display-5 fw-bold font-title mb-5">
                            Where to Find Us?
                        </h2>

                        <div class="d-flex align-items-start">

                            <img src="images/logo-pin-pink.png"
                                alt="Location"
                                style="width: 70px;"
                                class="me-4">

                            <div>

                                <h5 class="text-pink fw-bold mb-4">
                                    Location:
                                </h5>

                                <p class="fw-semibold fs-5 mb-2">
                                    1 Alpine Summit Drive
                                </p>

                                <p class="fw-semibold fs-5 mb-2">
                                    Lutz, Zubrowka 1099
                                </p>

                                <p class="fw-semibold fs-5 mb-0">
                                    Republic of Zubrowka
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- RIGHT -->

                    <div class="col-lg-8">

                        <div class="rounded-4 overflow-hidden shadow">

                            <iframe
                                src="https://maps.google.com/maps?q=1%20Alpine%20Summit%20Drive%20Lutz%20Zubrowka%201099&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                width="100%"
                                height="420"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy">
                            </iframe>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>