<?php
    session_start();

    if (isset($_POST['book3-next'])) {
        $GBreservename = $_POST['firstName'] . " " . $_POST['lastName'];
        $GBgender = $_POST['gender'];
        $GBbirthday = $_POST['birthday'];
        $GBaddress = $_POST['address'];
        $GBemail = $_POST['email'];
        $GBcontact = $_POST['contact'];
        $GBrequest = $_POST['request'];

        // SESSION VARIABLES
        $_SESSION['GBreservename'] = $GBreservename;
        $_SESSION['GBgender'] = $GBgender;
        $_SESSION['GBbirthday'] = $GBbirthday;
        $_SESSION['GBaddress'] = $GBaddress;
        $_SESSION['GBemail'] = $GBemail;
        $_SESSION['GBcontact'] = $GBcontact;
        $_SESSION['GBrequest'] = $GBrequest;

        header("location:book_4.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Book Now - Guest Information</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/book.css">

</head>

<body class="bg-lightpink font-body">

    <!-- NAVBAR -->
    <?php include 'navbar.php'; ?>

    <!-- HERO SECTION -->
    <section class="position-relative overflow-hidden">
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

        <div class="position-absolute top-50 start-0 translate-middle-y w-100">
            <div class="container">
                <h1 class="display-2 fw-bold font-title text-white mb-2">
                    Book Now
                </h1>
            </div>
        </div>

    </section>

    <!-- Progress Bar -->
    <section class="py-5">
        <div class="container">
            <?php
                $current_step = 3;
                include 'progress.php';
            ?>
        </div>
    </section>

    <!-- Form Section -->
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
                        <form action="" method="post">

                            <!-- ROW 1 -->
                            <div class="row g-4 mb-3">

                                <!-- First Name -->
                                <div class="col-lg-6">

                                    <label class="text-white fw-semibold mb-2 font-body medium" for="firstName">
                                        First Name
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        name="firstName"
                                        id="firstName"
                                        type="text"
                                        class="form-control rounded-pill border-0 px-4 py-3 shadow-sm"
                                        placeholder="Enter your first name"
                                        required>
                                </div>

                                <!-- Last Name -->
                                <div class="col-lg-6">
                                    <label class="text-white fw-semibold mb-2 font-body medium" for="lastName">
                                        Last Name
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        name="lastName"
                                        id="lastName"
                                        type="text"
                                        class="form-control rounded-pill border-0 px-4 py-3 shadow-sm"
                                        placeholder="Enter your last name"
                                        required>
                                </div>

                            </div>

                            <!-- ROW 2 -->
                            <div class="row g-4 mb-3">

                                <!-- Gender -->
                                <div class="col-lg-6">
                                    <label class="text-white fw-semibold mb-2 font-body medium" for="gender">
                                        Gender
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select
                                        name="gender"
                                        id="gender"
                                        class="form-select rounded-pill border-0 px-4 py-3 shadow-sm"
                                        required>
                                        <option value="" selected disabled>
                                            Select Gender
                                        </option>
                                        <option value="Male">
                                            Male
                                        </option>
                                        <option value="Female">
                                            Female
                                        </option>
                                        <option value="Others">
                                            Others
                                        </option>
                                    </select>
                                </div>

                                <!-- Birthday -->
                                <div class="col-lg-6">
                                    <label class="text-white fw-semibold mb-2 font-body medium" for="birthday">
                                        Birth Date
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        name="birthday"
                                        id="birthday"
                                        type="date"
                                        class="form-control rounded-pill border-0 px-4 py-3 shadow-sm"
                                        max="<?php echo date('Y-m-d'); ?>"
                                        required>
                                </div>

                            </div>

                            <!-- ROW 3 -->
                            <!-- Address -->
                            <div class="mb-4">
                                <label class="text-white fw-semibold mb-2 font-body medium" for="address">
                                    Address
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    name="address"
                                    id="address"
                                    type="text"
                                    class="form-control rounded-pill border-0 px-4 py-3 shadow-sm"
                                    placeholder="Enter your complete address"
                                    required>
                            </div>

                            <!-- ROW 4 -->
                            <!-- Email -->
                            <div class="mb-3">               
                                <label class="text-white fw-semibold mb-2 font-body medium" for="email">
                                    Email
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    name="email"
                                    id="email"
                                    type="email"
                                    class="form-control rounded-pill border-0 px-4 py-3 shadow-sm"
                                    placeholder="Enter your email address"
                                    required>                       
                            </div>

                            <!-- ROW 5 -->
                            <!-- Contact -->
                            <div class="mb-4">
                                <label class="text-white fw-semibold mb-2 font-body medium" for="contact">
                                    Contact Number
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    name="contact"
                                    id="contact"
                                    type="tel"
                                    pattern="09[0-9]{9}"
                                    class="form-control rounded-pill border-0 px-4 py-3 shadow-sm"
                                    placeholder="ex. 09178493021"
                                    required>
                            </div>

                            <!-- ROW 6 -->
                            <!-- Request -->
                            <div class="mb-5">
                                <label class="text-white fw-semibold mb-2 font-body medium" for="request">
                                    Special Request
                                </label>

                                <textarea
                                    name="request"
                                    id="request"
                                    class="form-control rounded-4 border-0 p-4 shadow-sm"
                                    rows="5"
                                    placeholder="Let us know if you have any special request or preferences."></textarea>
                            </div>

                            <!-- NEXT BUTTON -->
                            <div class="text-center mt-5">
                                <div class="row">
                                    <div class="col d-flex justify-content-center">
                                        <input type="submit" name="book3-next" class="btn pink-button font-title d-flex align-items-center px-5 py-2 shadow" value="Next" style=" min-width: 200px;">
                                    </div>
                                </div>

                                <p class="text-white font-body medium mt-4 mb-0">
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