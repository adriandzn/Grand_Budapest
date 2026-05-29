<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Budapest Hotel</title>
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
             border-bottom: 0px solid #6a3e4f;">

    <div class="d-flex justify-content-center align-items-center min-vh-100 p-3" style="background: rgba(0,0,0,0.55);">
        <div class="card border-0 shadow-lg text-white p-4 p-md-5 rounded-4" style="width:100%; max-width:460px; background: rgba(34, 24, 19, 0.92); backdrop-filter: blur(14px);">

            <div class="text-center mb-4">
                <img src="images/logo.png" alt="Logo" class="img-fluid mb-3" style="width:90px;">
                <div class="d-block mb-2">
                    <img src="images/title-grandbudapest.png" alt="Title" style="max-width: 100%; height: auto;">
                </div>
                <div class="text-white-50 fw-semibold" style="letter-spacing:4px; font-size:0.85rem;">HOTEL</div>
            </div>

            <div class="text-center mb-4">
                <h1 class="fw-bold text-white mb-2 font-title">Login</h1>
            </div>

            <form action="login.php" method="post">
                <div class="mb-4">
                    <label class="form-label fw-semibold text-white font-body">Username</label>
                    <input type="text" name="username" id="form2Example1" class="form-control border-0 text-white px-4" placeholder="Type here" style="height:55px; border-radius:50px; background: rgba(230, 217, 217, 0.91);">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-white font-body">Password</label>
                    <input type="password" name="pass" id="form2Example1" class="form-control border-0 text-white px-4" placeholder="Type here" style="height:55px; border-radius:50px; background: rgba(230, 217, 217, 0.91);">
                </div>

                <div class="d-grid mb-4">
                    <input type="submit" name="sub" value="Login" class="btn bg-darkpink text-dark font-body fw-semibold border-0 pink-button" style="height:55px; border-radius:50px;">
                </div>

                <div class="text-center">
                    <p class="mb-1 text-white">Don't have an account?</p>
                    <a href="register.php" class="text-decoration-none fw-semibold font-body text-white fs-6">Register Here</a>
                </div>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<?php
require_once "dbaseconnection.php";


session_start();








if(isset($_POST['sub'])){


 $JAusername = $_POST['username'];
 $JApassword = md5($_POST['pass']);

$loginsql = "SELECT * from tbl_userdetails_ja WHERE username = '$JAusername' AND pass = '$JApassword' AND statusja = 'Active'";
$result = $conn -> query($loginsql);

if($result->num_rows ==1){
$fieldnames = $result->fetch_assoc();

$JAusertype = $fieldnames['user_typeja'];
$JAlastname = $fieldnames['last_name'];
$JAfirstname = $fieldnames['first_name'];
$JAimage_path = $fieldnames['img_pathja'];
$JAid = $fieldnames['user_id'];

//session variables = value
        $_SESSION['JAusertype'] = $JAusertype;
        $_SESSION['JAfullname'] = $JAfirstname . " " . $JAlastname;
        $_SESSION['JAimagepath'] = $JAimage_path;
        $_SESSION['JAid'] = $JAid;


        $logsql = "Insert into tbl_logsja (user_id, action, datetime) VALUES ('".$_SESSION['JAid']."', 'Logged In',NOW())";
        $conn -> query($logsql);




        echo $JAusertype . " " . $JAlastname;








        if ($JAusertype == "Administrator"){
            header("location:admindashboard.php");
        }
        else if($JAusertype == "Employee"){
        ?>
        <script>
            window.location.href = "employeedashboard.php";
        </script>
        <?php
        }




    }
    else{

 ?>
        <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Invalid Username/Password",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        <?php
    }
}
?>















