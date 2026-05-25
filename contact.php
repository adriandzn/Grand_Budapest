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

    <section class="position-relative overflow-hidden" style="min-height: 420px;">
        <img src="images/index-hero.png" alt="Grand Budapest hero" class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover" style="filter: brightness(0.65);">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
        <div class="position-absolute top-50 start-50 translate-middle w-100 text-center px-4">
            <p class="text-uppercase text-secondary small mb-2">Contact</p>
            <h1 class="display-4 fw-bold text-white font-title mb-3">Contact Us</h1>
            <p class="lead text-light mb-0">Got any inquiries, comments, or recommendations? Send us a message and we will get back to you within 24 hours.</p>
        </div>
    </section>

    <main class="container my-5">
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card rounded-4 shadow-sm border-0">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="mx-auto d-inline-flex align-items-center justify-content-center rounded-circle bg-lightpink" style="width: 100px; height: 100px;">
                                <img src="images/logo-phone-circle.png" alt="Contact icon" class="img-fluid" style="max-height: 48px;">
                            </div>
                            <h2 class="h4 fw-bold mt-4 mb-2 font-darkbrown">GRAND BUDAPEST LOBBY</h2>
                            <p class="text-secondary small mb-0">Feel free to reach out and message us, we would love to hear from you!</p>
                        </div>

                        <form>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-pill border border-darkpink" placeholder="Type here">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control rounded-pill border border-darkpink" placeholder="Type here">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Contact Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control rounded-pill border border-darkpink" placeholder="Type here">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Message <span class="text-danger">*</span></label>
                                <textarea class="form-control rounded-4 border border-darkpink" rows="6" placeholder="How can we help you?"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn rounded-pill px-5 py-3 bg-darkpink text-white fw-semibold">SEND</button>
                            </div>
                        </form>

                        <p class="text-center text-secondary small mt-4 mb-0">We typically respond within 24 hours.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card rounded-4 shadow-sm border-0 bg-darkbrown text-white mb-4">
                    <div class="card-body p-5">
                        <h3 class="h5 fw-bold text-white mb-4">Contact Information</h3>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <img src="images/logo-clock-pink.png" alt="Lobby hours" style="height: 28px; width: auto; margin-top: 4px;">
                            <div>
                                <p class="text-secondary small text-uppercase mb-1">Lobby Hours</p>
                                <p class="mb-0">Monday to Sunday<br>7:00AM - 11:00PM</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <img src="images/logo-phone-pink.png" alt="Mobile number" style="height: 28px; width: auto; margin-top: 4px;">
                            <div>
                                <p class="text-secondary small text-uppercase mb-1">Mobile Number</p>
                                <p class="mb-0">+63 975 714 1559</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3">
                            <img src="images/logo-mail-pink.png" alt="Email" style="height: 28px; width: auto; margin-top: 4px;">
                            <div>
                                <p class="text-secondary small text-uppercase mb-1">Email</p>
                                <p class="mb-0">reservations@grandbudapest.lb</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card rounded-4 shadow-sm border-0 bg-darkbrown text-white">
                    <div class="card-body p-5 text-center">
                        <h3 class="h5 fw-bold text-white mb-3">Socials</h3>
                        <p class="text-secondary small mb-4">Follow us to get more news and updates!</p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white bg-opacity-10 p-3">
                                <img src="images/logo-fb-pink.png" alt="Facebook" style="height: 22px; width: auto;">
                            </a>
                            <a href="#" class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white bg-opacity-10 p-3">
                                <img src="images/logo-ig-pink.png" alt="Instagram" style="height: 22px; width: auto;">
                            </a>
                            <a href="#" class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white bg-opacity-10 p-3">
                                <img src="images/logo-tiktok-pink.png" alt="TikTok" style="height: 22px; width: auto;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="row g-4 mt-5 align-items-center">
            <div class="col-lg-4">
                <div class="rounded-4 p-5 bg-darkbrown text-white h-100">
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <img src="images/logo-pin-pink.png" alt="Location" style="height: 32px; width: auto; margin-top: 6px;">
                        <div>
                            <p class="text-uppercase text-secondary small mb-2">Location</p>
                            <h3 class="h5 fw-bold mb-3 text-white">Where to Find Us?</h3>
                            <p class="small mb-1">1 Alpine Summit Drive</p>
                            <p class="small mb-1">Lutz, Zubrowka 1099</p>
                            <p class="small mb-0">Republic of Zubrowka</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm">
                    <iframe src="https://maps.google.com/maps?q=1%20Alpine%20Summit%20Drive%20Lutz%20Zubrowka%201099&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-darkbrown text-white py-4">
        <div class="container">
            <div class="row gy-3 align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-1 fw-semibold">GRAND BUDAPEST HOTEL</p>
                    <p class="small text-secondary mb-0">A sanctuary of elegance, hospitality, and timeless style in the heart of Zubrowka.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="small mb-1">Call us: +63 975 714 1559</p>
                    <p class="small mb-0">reservations@grandbudapest.lb</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
