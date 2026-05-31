<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/body.css">

    <style>
        .logo-text {
            font-size: 0.9rem;
            letter-spacing: 3px;
            line-height: 1.2;
            font-weight: bold;
        }
        .logo-subtext {
            font-size: 0.7rem;
            letter-spacing: 4px;
            margin-top: 2px;
            font-weight: bold;
        }
    </style>

</head>

<body class="bg-lightpink">

    <div class="container d-flex justify-content-center">

        <div class="mt-5 border rounded p-5 bg-white text-center" style="max-width: 400px;">

            <!-- LOGO -->
            <div class="row">
                <div class="col">
                    <h1>
                        <img src="images/logo.png"
                            alt="Logo"
                            class="img-fluid mb-2"
                            style="width:80px;">
                        <br>
                        <div class="logo-text font-title">GRAND BUDAPEST</div>
                        <div class="logo-subtext font-title" >HOTEL</div>
                    </h1>
                </div>
            </div>

            <!-- MAIN -->
            <div class="row mb-5 mt-4">
                <div class="col fw-bold">
                    <span class="display-5 font-title font-brown">OTP Verification</span>
                </div>
            </div>

            <div class="row my-3">
                <div class="col fw-bold">
                    <span class="font-body h5">One time password (OTP) was sent to your email</span>
                </div>
            </div>

            <form action="otpverification.php" method="post">
                <div class="form-outline mb-4">
                    <label class="form-label mt-3 font-body h5" for="form2Example1">Enter the OTP Number to verify</label>
                    <input type="text" name="otp" id="form2Example1" class="form-control" required />
                </div>
                <input type="submit" name="ver" value="Verify" class="btn pink-button btn-block w-100 mb-4">
            </form>

        </div>    

    </div>
    
    

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>


<?php
    require_once "dbaseconnection.php";

    if(isset($_POST['ver'])){


    $GBuserotp = $_POST['otp'];


    $otpsql = "SELECT * FROM tbl_userdetails where otp = '" . $GBuserotp . "'";
    $result = $conn->query($otpsql);


    if ($result->num_rows ==1) {
        $updatesql = "UPDATE tbl_userdetails SET otp = NULL, status = 'Active' WHERE otp = '" . $GBuserotp . "'";
        $conn->query($updatesql);

        ?>
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Your account is now verified!",
                showConfirmButton: false,
                timer: 1500
            }).then(()=>{
                window.location.href = "login.php";
            })
        </script>
        <?php

    } else {
        //if no otp matched
        ?>
        <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Invalid OTP",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        <?php
    }

    }
?>