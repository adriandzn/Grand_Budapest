<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Book Now - Guest Information</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">

</head>

<body class="bg-lightpink font-body">

    <!-- NAVBAR -->

    <?php include 'navbar.php'; ?>

    <!-- HERO SECTION -->

    <section class="position-relative overflow-hidden">

        <!-- BACKGROUND -->

        <div
            style="
                background-image:url('images/index-hero.png');
                background-size:cover;
                background-position:center;
                min-height:320px;
                position:relative;
            ">

            <div
                class="position-absolute top-0 start-0 w-100 h-100"
                style="background-color:rgba(0,0,0,0.65);">
            </div>

        </div>

        <!-- HERO CONTENT -->

        <div class="position-absolute top-50 start-0 translate-middle-y w-100">

            <div class="container">

                <h1 class="display-2 fw-bold font-title text-white mb-2">
                    Book Now
                </h1>

            </div>

        </div>

    </section>

    <!-- PROGRESS -->

    <section class="py-5">

        <div class="container">

            <?php
                $current_step = 3;
                include 'progress.php';
            ?>

        </div>

    </section>

    <!-- FORM SECTION -->

    <section class="pb-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-xl-11">

                    <div class="bg-lightbrown rounded-5 shadow-lg p-4 p-md-5">

                        <!-- GO BACK -->

                        <div class="mb-5">

                            <a href="book_2.php"
                                class="btn bg-darkpink rounded-pill px-4 py-2 fw-semibold text-dark d-inline-flex align-items-center gap-2 shadow-sm pink-button">

                                <img
                                    src="images/logo-proceed-brown.png"
                                    alt="Back"
                                    style="
                                        width:16px;
                                        transform:scaleX(-1);
                                    ">

                                Go Back

                            </a>

                        </div>

                        <!-- TITLE -->

                        <div class="mb-5">

                            <h2 class="text-white font-title fw-bold mb-0"
                                style="font-size:2.3rem;">

                                Guest Information

                            </h2>

                        </div>

                        <!-- FORM -->

                        <form action="book_4.php" method="post">

                            <!-- ROW 1 -->

                            <div class="row g-4 mb-3">

                                <div class="col-lg-6">

                                    <label class="text-white fw-semibold mb-2 small">

                                        First Name
                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        class="form-control rounded-pill border-0 px-4 py-3 shadow-sm"
                                        placeholder="Type Here"
                                        required>

                                </div>

                                <div class="col-lg-6">

                                    <label class="text-white fw-semibold mb-2 small">

                                        Last Name
                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        class="form-control rounded-pill border-0 px-4 py-3 shadow-sm"
                                        placeholder="Type Here"
                                        required>

                                </div>

                            </div>

                            <!-- ROW 2 -->

                            <div class="row g-4 mb-3">

                                <div class="col-lg-4">

                                    <label class="text-white fw-semibold mb-2 small">

                                        Gender
                                        <span class="text-danger">*</span>

                                    </label>

                                    <select
                                        class="form-select rounded-pill border-0 px-4 py-3 shadow-sm"
                                        required>

                                        <option selected disabled>
                                            Select Gender
                                        </option>

                                        <option>
                                            Male
                                        </option>

                                        <option>
                                            Female
                                        </option>

                                    </select>

                                </div>

                                <div class="col-lg-4">

                                    <label class="text-white fw-semibold mb-2 small">

                                        Birth Date
                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="date"
                                        class="form-control rounded-pill border-0 px-4 py-3 shadow-sm"
                                        required>

                                </div>

                                <div class="col-lg-4">

                                    <label class="text-white fw-semibold mb-2 small">

                                        Nationality
                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="text"
                                        class="form-control rounded-pill border-0 px-4 py-3 shadow-sm"
                                        placeholder="Select Nationality"
                                        required>

                                </div>

                            </div>

                            <!-- ADDRESS -->

                            <div class="mb-4">

                                <label class="text-white fw-semibold mb-2 small">

                                    Address
                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    class="form-control rounded-pill border-0 px-4 py-3 shadow-sm"
                                    placeholder="Enter your complete address"
                                    required>

                            </div>

                            <!-- EMAIL -->

                            <div class="row g-4 mb-3">

                                <div class="col-lg-6">

                                    <label class="text-white fw-semibold mb-2 small">

                                        Email
                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="email"
                                        class="form-control rounded-pill border-0 px-4 py-3 shadow-sm"
                                        placeholder="Enter your email address"
                                        required>

                                </div>

                                <div class="col-lg-6">

                                    <label class="text-white fw-semibold mb-2 small">

                                        Confirm Email
                                        <span class="text-danger">*</span>

                                    </label>

                                    <input
                                        type="email"
                                        class="form-control rounded-pill border-0 px-4 py-3 shadow-sm"
                                        placeholder="Retype your email address"
                                        required>

                                </div>

                            </div>

                            <!-- CONTACT -->

                            <div class="mb-4">

                                <label class="text-white fw-semibold mb-2 small">

                                    Contact Number
                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    class="form-control rounded-pill border-0 px-4 py-3 shadow-sm"
                                    placeholder="+63 Enter your mobile number"
                                    required>

                            </div>

                            <!-- REQUEST -->

                            <div class="mb-5">

                                <label class="text-white fw-semibold mb-2 small">

                                    Special Request

                                </label>

                                <textarea
                                    class="form-control rounded-4 border-0 p-4 shadow-sm"
                                    rows="5"
                                    placeholder="Let us know if you have any special request or preferences."></textarea>

                            </div>

                            <!-- BUTTON -->

                            <div class="text-center mt-5">

                                <button
                                    type="submit"
                                    class="btn bg-darkpink text-dark fw-bold rounded-pill px-5 py-3 shadow-sm pink-button gap-3 font-body">

                                    Next

                                </button>

                                <p class="text-white small mt-4 mb-0">

                                    Your information is secure and will be used only in this booking.

                                </p>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- FOOTER -->

    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>