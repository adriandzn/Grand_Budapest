<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/body.css">
</head>

<body style="background-image: url('images/index-hero.png'); 
             background-size: cover; 
             background-position: center; 
             background-color: rgba(100, 100, 100, 0.6); 
             background-blend-mode: multiply; 
             min-height: 100vh; 
             background-attachment: fixed;
             border-bottom: 0px solid #6a3e4f;">
    <div class="container mt-5 w-25  rounded p-5 bg-brown">

        <div class="row">
            <div class="col text-center">
                <h1>
                    <img src="images/logo.png" alt="Logo" class="w-50 h-auto mb-2">
                    <img src="images/title-grandbudapest.png" alt="Title" style="max-width: 100%; height: auto;">
                    HOTEL
                </h1>
               
            </div>
        </div>

        <div class="row">
            <div class="col text-center text-white fw-bold font-title">
                <p class="h2">Make an Account</p>
            </div>
        </div>

            <!-- Fullname -->
            <div class="row mt-3">
                <div class="col">
                    <label for="firstName" class=" text-white form-label">Fullname</label>
                    <input type="text" name="Fullname" id="fullName" class="form-control rounded-5" placeholder="Type here">
                </div>   
            </div>


            <!-- Username -->
            <div class="row mt-3">
                <div class="col">
                    <label for="username" class="text-white form-label">Username</label>
                    <input type="text" name="Uname" id="username" class="form-control rounded-5" placeholder="Type here">
                </div>
            </div>

            <!-- Email JAdress -->
            <div class="row mt-3">
                <div class="col">
                    <label for="email" class="text-white form-label">Email address</label>
                    <input type="text" name="email" id="email" class="form-control rounded-5" placeholder="Type here">
                </div>
            </div>


        <!-- Password -->
            <div class="row mt-3">
                <div class="col">
                    <label for="password" class="text-white form-label">Create Your Password</label>
                    <input type="password" name="pass" id="password" class="form-control rounded-5" placeholder="Type here">
                </div>
            </div>

        <!-- Password Confirmation -->
            <div class="row mt-3">
                <div class="col">
                    <label for="password" class="text-white form-label">Confirm Your Password</label>
                    <input type="password" name="passconf" id="passwordconf" class="form-control rounded-5" placeholder="Type here">
                </div>
            </div>


            <!-- Submit -->
            <div class="row mt-5">
                <div class="col text-center">
                    <input type="submit" name="submitButton" value="Register" class="btn fw-bold font-title bg-darkpink rounded-5 w-75">
                </div>
            </div>

        </form>
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
















<?php
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
?>











