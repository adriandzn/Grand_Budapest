<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Registration - Grand Budapest</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/body.css">

    <style>
        .logo-text {
            font-size: 0.9rem;
            letter-spacing: 3px;
            line-height: 1.2;
            color: #FFC093;
            font-weight: bold;
        }
        .logo-subtext {
            font-size: 0.7rem;
            letter-spacing: 4px;
            margin-top: 2px;
            color: #FFC093;
            font-weight: bold;
        }
        .go-back-button-pink {
            font-size: 0.9rem;
            font-weight: bold;
            border-radius: 100px;
            transition: all 0.3s ease;
        }
        .go-back-button-pink img {
            transition: all 0.3s ease;
        }
        .go-back-button-pink:hover {
            color: #975265;
        }
        .go-back-button-pink:hover img {
            opacity: 40%;
        }
    </style>
</head>

<body style="
    background-image: url('images/index-hero.png');
    background-size: cover;
    background-position: center;
    background-color: rgba(10, 10, 10, 0.75);
    background-blend-mode: multiply;
    min-height: 100vh;
    background-attachment: fixed;
    backdrop-filter: blur(5px);
">

    <!-- MAIN CONTAINER -->
    <div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="row justify-content-center w-100">      
            <div class="col-11 col-sm-10 col-md-8 col-lg-6 col-xl-4">

                <!-- LOGIN CARD -->
                <div class="rounded-5 p-4 p-md-5 bg-brown shadow-lg">

                    <!-- Go Back Button -->
                    <div class="row">
                        <div class="col">
                            <a href="login.php"
                            class="btn font-title font-pink fw-bold d-flex align-items-center justify-content-start gap-2 mb-4 go-back-button-pink"
                            style="width: fit-content;">

                                <img src="images/logo-go-back-pink.png"
                                    alt="logo-go-back-pink"
                                    style="height:20px;">

                                Go Back
                            </a>
                        </div>
                    </div>

                    <!-- LOGO -->
                    <div class="row">
                        <div class="col text-center">
                            <h1>
                                <img src="images/logo.png"
                                    alt="Logo"
                                    class="img-fluid mb-3"
                                    style="width:120px;">
                                <br>
                                <div class="logo-text font-title">GRAND BUDAPEST</div>
                                <div class="logo-subtext font-title" >HOTEL</div>
                            </h1>
                        </div>
                    </div>

                    <!-- TITLE -->
                    <div class="row mb-4 mt-5">
                        <div class="col text-center fw-bold font-title">
                            <div class="h2 fw-bold text-white">
                                Register
                            </div>
                        </div>
                    </div>


                    <!-- FORM -->
                    <form action="" method="post">

                        <!-- FIRSTNAME -->
                        <div class="row mt-4">
                            <div class="col">
                                <label for="firstName"
                                    class="form-label font-body font-pink fw-semibold fs-6">
                                    First Name
                                </label>

                                <input
                                    type="text"
                                    name="firstName"
                                    id="firstName"
                                    class="form-control rounded-pill border-0 px-4 py-2"
                                    placeholder="Enter your first name"
                                    style="font-size: 14px;"
                                >
                            </div>
                        </div>

                        <!-- LASTNAME -->
                        <div class="row mt-4">
                            <div class="col">
                                <label for="lastName"
                                    class="form-label font-body font-pink fw-semibold fs-6">
                                    Last Name
                                </label>

                                <input
                                    type="text"
                                    name="lastName"
                                    id="lastName"
                                    class="form-control rounded-pill border-0 px-4 py-2"
                                    placeholder="Enter your last name"
                                    style="font-size: 14px;"
                                >
                            </div>
                        </div>

                        <!-- USERNAME -->
                        <div class="row mt-3">
                            <div class="col">
                                <label for="username"
                                    class="form-label font-body font-pink fw-semibold fs-6">
                                    Username
                                </label>

                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    class="form-control rounded-pill border-0 px-4 py-2"
                                    placeholder="Create a username for your account"
                                    style="font-size: 14px;"
                                >
                            </div>
                        </div>

                        <!-- EMAIL -->
                        <div class="row mt-3">
                            <div class="col">
                                <label for="email"
                                    class="form-label font-body font-pink fw-semibold fs-6">
                                    Email Address
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control rounded-pill border-0 px-4 py-2"
                                    placeholder="Enter your email address"
                                    style="font-size: 14px;"
                                >
                            </div>
                        </div>

                        <!-- PASSWORD -->
                        <div class="row mt-3">
                            <div class="col">
                                <label for="password"
                                    class="form-label font-body font-pink fw-semibold fs-6">
                                    Create Your Password
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control rounded-pill border-0 px-4 py-2"
                                    placeholder="Create a password for your account"
                                    style="font-size: 14px;"
                                >
                            </div>
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div class="row mt-3">
                            <div class="col">
                                <label for="passwordconf"
                                    class="form-label font-body font-pink fw-semibold fs-6">
                                    Confirm Your Password
                                </label>

                                <input
                                    type="password"
                                    name="passwordconf"
                                    id="passwordconf"
                                    class="form-control rounded-pill border-0 px-4 py-2"
                                    placeholder="Type here"
                                    style="font-size: 14px;"
                                >
                            </div>
                        </div>

                        <!-- SUBMIT -->
                        <div class="row mt-5">
                            <div class="col text-center">
                                <input
                                    type="submit"
                                    name="submit"
                                    value="Register"
                                    class="btn fw-bold font-title bg-darkpink rounded-pill py-3 w-100 pink-button shadow-sm">
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>


<?php
    require_once "verifyotpemail.php";
    require_once "dbaseconnection.php";

    if (isset($_POST['submit'])) {
       
        $GBfullname = $_POST['firstName'] . " " . $_POST['lastName'];
        $GBusername = $_POST['username'];
        $GBpassword = md5($_POST['password']);
        $GBemail = $_POST['email'];
        $GBotp = rand(000000,999999);

        // String Query and Transfer to MySQL
        $insertsql = "INSERT INTO tbl_userdetails (full_name, role, username, password, email, otp, status) VALUES ('$GBfullname', 'Customer', '$GBusername', '$GBpassword', '$GBemail', $GBotp, 'Pending')";

        $result = $conn -> query($insertsql);

        // Check if saved
        if ($result == True) {
            send_verification($GBfullname, $GBemail, $GBotp);
            ?>
            <script>
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Success! You are now registered.",
                    showConfirmButton: false,
                    timer: 1500
                }).then (() => {
                    window.location.href = "otpverification.php";
                })
            </script>
            <?php
        } else {
            echo $conn -> error;
        }
    }
?>