<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">
</head>

<body style="background-image: url('images/index-hero.png'); 
             background-size: cover; 
             background-position: center; 
             background-color: rgba(100, 100, 100, 0.6); 
             background-blend-mode: multiply; 
             min-height: 100vh; 
             background-attachment: fixed;
             border-bottom: 0px solid #6a3e4f;
            backdrop-filter: blur(5px);">
    <div class="d-flex justify-content-center align-items-center min-vh-100 p-3" style="background: rgba(0,0,0,0.55);">
        <div class="card border-0 shadow-lg text-white p-4 p-md-5 rounded-4 bg-darkbrown" style="width:100%; max-width:460px; ">

            <div class="text-center mb-4">
                <img src="images/logo.png" alt="Logo" class="img-fluid mb-3" style="width:90px;">
                <div class="d-block mb-2">
                    <img src="images/title-grandbudapest.png" alt="Title" style="max-width: 100%; height: auto;">
                </div>
                <div class="text-white-50 fw-semibold" style="letter-spacing:4px; font-size:0.85rem;">HOTEL</div>
            </div>

            <div class="text-center mb-4">
                <h1 class="fw-bold text-white mb-2 font-title">Register</h1>
            </div>

            <form action="login.php" method="post">
                <div class="mb-4">
                    <label class="form-label fw-semibold text-white font-body">Full Name</label>
                    <input type="text" name="fullname" id="fullname" class="form-control border-0 text-white px-4" placeholder="Type here" style="height:55px; border-radius:50px; background: rgba(230, 217, 217, 0.91);">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-white font-body">Username</label>
                    <input type="text" name="username" id="username" class="form-control border-0 text-white px-4" placeholder="Type here" style="height:55px; border-radius:50px; background: rgba(230, 217, 217, 0.91);">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-white font-body">Email</label>
                    <input type="email" name="email" id="email" class="form-control border-0 text-white px-4" placeholder="Type here" style="height:55px; border-radius:50px; background: rgba(230, 217, 217, 0.91);">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-white font-body">Create Your Password</label>
                    <input type="password" name="pass" id="password" class="form-control border-0 text-white px-4" placeholder="Type here" style="height:55px; border-radius:50px; background: rgba(230, 217, 217, 0.91);">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-white font-body">Confirm Your Password</label>
                    <input type="password" name="passwordconf" id="passwordconf" class="form-control border-0 text-white px-4" placeholder="Type here" style="height:55px; border-radius:50px; background: rgba(230, 217, 217, 0.91);">
                </div>

                <div class="d-grid mb-4">
                    <input type="submit" name="sub" value="Register" class="btn bg-darkpink text-dark font-body fw-semibold border-0 pink-button" style="height:55px; border-radius:50px;">
                </div>
            </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function previewImg(event) {
            var displayimg = document.getElementById("preview");
            displayimg.src = URL.createObjectURL(event.target.files[0]);
        }

    </script>

</body>
</html>
















<?php
//    require_once "verifyotpemail.php";
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
?>











