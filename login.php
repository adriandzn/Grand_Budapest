<?php
    require_once "dbaseconnection.php";
    session_start();

    if(isset($_POST['sub'])){

        $GBusername = $_POST['username'];
        $GBpassword = md5($_POST['pass']);

        // String Query and Transfer to MySQL
        $loginsql = "SELECT * FROM tbl_userdetails WHERE username = '$GBusername' AND password = '$GBpassword' AND status = 'Active'";
        
        $result = $conn -> query($loginsql);


        // VALID Log In Credentials
        if($result -> num_rows == 1) {
            $fieldnames = $result -> fetch_assoc();

            $GBid = $fieldnames['user_id'];
            $GBfullname = $fieldnames['full_name'];
            $GBrole = $fieldnames['role'];
            $GBusername = $fieldnames['username'];
            $GBemail = $fieldnames['email'];


            // SESSION VARIABLES
            $_SESSION['GBid'] = $GBid;
            $_SESSION['GBfullname'] = $GBfullname;
            $_SESSION['GBrole'] = $GBrole;
            $_SESSION['GBusername'] = $GBusername;
            $_SESSION['GBemail'] = $GBemail;
            

            // LOGS - Logging In
            $logsql = "INSERT INTO tbl_logs (user_id, action, date_time) VALUES ('" . $_SESSION['GBid'] . "', 'Logged In', NOW())";
            $conn -> query($logsql);


            // Identify User ROLE and direct to corresponding page
            if ($GBrole == "Admin") {
                ?>
                    <script>
                        window.location.href = "admin_dashboard.php";
                    </script>
                <?php
            } else if ($GBrole == "Employee") {
                ?>
                    <script>
                        window.location.href = "employee_dashboard.php";
                    </script>
                <?php
            } else if ($GBrole == "Customer") {
                ?>
                    <script>
                        window.location.href = "index.php";
                    </script>
                <?php
            }


        // INVALID Log In Credentials
        } else {
            ?>
            <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Invalid Username/Password/Not Verified",
                    showConfirmButton: false,
                    timer: 1500
                });
            });
            </script>
            <?php
        }
    }

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Grand Budapest</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
        .register {
            color: white;
            transition: color 0.3s ease;
        }
        .register:hover {
            color: #afafaf;
        }
    </style>
</head>

<body style="background-image: url('images/index-hero.png'); 
    background-size: cover; 
    background-position: center; 
    background-color: rgba(10, 10, 10, 0.75); 
    background-blend-mode: multiply; 
    min-height: 100vh; 
    background-attachment: fixed;
    border-bottom: 0px solid #6a3e4f;
    backdrop-filter: blur(5px);">

    <div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="row justify-content-center w-100">      
            <div class="col-11 col-sm-10 col-md-8 col-lg-6 col-xl-4">

                <!-- LOGIN CARD -->
                <div class="rounded-5 p-4 p-md-5 bg-brown shadow-lg">

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
                            <div class="h2 fw-bold text-white">Login</div>
                        </div>
                    </div>


                    <!-- FORM -->
                    <form action="login.php" method="post">

                        <!-- USERNAME -->
                        <div class="form-outline mb-4">
                            <label
                                class="form-label font-body fs-6 font-pink fw-semibold">
                                Username
                            </label>

                            <input
                                type="text"
                                name="username"
                                class="form-control rounded-5 px-4 py-2 border-0 shadow-sm"
                                placeholder="Type here"
                                style="font-size: 14px;"/>
                        </div>

                        <!-- PASSWORD -->
                        <div class="form-outline mb-4">
                            <label
                                class="form-label font-body fs-6 font-pink fw-semibold">
                                Password
                            </label>

                            <input
                                type="password"
                                name="pass"
                                class="form-control rounded-5 px-4 py-2 border-0 shadow-sm"
                                placeholder="Type here"
                                style="font-size: 14px;"/>
                                
                        </div>

                        <!-- LOGIN BUTTON -->
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8 text-center">
                                <input
                                    type="submit"
                                    name="sub"
                                    value="Login"
                                    class="btn fw-bold font-title bg-darkpink font-body rounded-5 mb-4 pink-button w-100 py-2 pink-button fs-5">
                            </div>
                        </div>

                        
                        <!-- REGISTER -->
                        <div class="row text-center text-white">
                            <div class="col fs-5">
                                <div class="my-3 font-title">Don't have an account?</div>
                                <a href="register.php"
                                    class="font-body text-decoration-none fw-bold register">
                                    Register Here
                                </a>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>