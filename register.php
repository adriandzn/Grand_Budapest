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
                    <style>
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

                    <form action="" method="POST">

                        <!-- FULLNAME -->

                        <div class="row mt-4">

                            <div class="col">

                                <label for="fullName"
                                    class="form-label font-body font-pink fw-semibold fs-6">

                                    Fullname

                                </label>

                                <input
                                    type="text"
                                    name="Fullname"
                                    id="fullName"
                                    class="form-control rounded-pill border-0 px-4 py-2"
                                    placeholder="Type here"
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
                                    name="Uname"
                                    id="username"
                                    class="form-control rounded-pill border-0 px-4 py-2"
                                    placeholder="Type here"
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
                                    placeholder="Type here"
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
                                    name="pass"
                                    id="password"
                                    class="form-control rounded-pill border-0 px-4 py-2"
                                    placeholder="Type here"
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
                                    name="passconf"
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
                                    name="submitButton"
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
    <script>
        function previewImg(event) {
            var displayimg = document.getElementById("preview");
            displayimg.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

</body>
</html>
















<!-- <?php
   require_once "verifyotpemail.php";
   require_once "dbaseconnection.php";










    if (isset($_POST['submitButton'])) {
       
        $JAFirstName = $_POST['Fname'];
        $JALastName = $_POST['Lname'];
        $JAEmail = $_POST['email'];
        $JAUsername = $_POST['Uname'];
        $JAPassword = md5($_POST['pass']);
        $JAContactNumber = $_POST['contact'];
        $JABirthday = $_POST['Bdate'];
        $JAGender = $_POST['gen'];
        $JACountry = $_POST['country'];
        $JAcomms = $_POST['comms'];
        $JAimagepath = "imagesja/" . $_FILES['upload_img']['name'];
        $JAfullname = $_POST['Fname'] . " ". $_POST['Lname'];








        copy($_FILES['upload_img']['tmp_name'], $JAimagepath);


        $JAotp = rand(000000,999999);
        // String Query
        $insertsql = "Insert into tbl_userdetails_ja (first_name, last_name, email, username, pass, contact, birthday, gender, country, comments, img_pathja, user_typeja, otpja, statusja) values ('$JAFirstName', '$JALastName', '$JAEmail', '$JAUsername', '$JAPassword', '$JAContactNumber', '$JABirthday', '$JAGender', '$JACountry', '$JAcomms', '$JAimagepath', 'Employee', $JAotp, 'Pending')";
       
        // Convert string to an actual query and transfer it to mysql
        $result = $conn -> query($insertsql);
















        // Check if saved
        if ($result == True) {
            send_verification($JAfullname, $JAEmail, $JAotp);
        ?>
            <script>
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Success! You are now registered.",
                    showConfirmButton: false,
                    timer: 1500
                }).then (() => {
                    window.location.href = "OTPverification.php";
                })
            </script>
        <?php
        } else {
            echo $conn -> error;
        }
    }
?> -->