<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Grand Budapest</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">
</head>
<body  style="background-image: url('images/index-hero.png'); 
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
                                <img src="images/title-grandbudapest.png"
                                    alt="Title"
                                    class="img-fluid"
                                    style="max-width:250px;">
                                <p class="text-white mt-2 fs-5">
                                    HOTEL
                                </p>
                            </h1>
                        </div>
                    </div>

                    <!-- TITLE -->
                    <div class="row mb-4">
                        <div class="col text-center fw-bold font-title">
                            <h1 class="display-6 text-white">
                                Login
                            </h1>
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
                        <div class="row text-center text-white font-body">
                            <div class="col fs-5">
                                Don't have an account?
                                <br>
                                <a href="register.php"
                                    class="btn btn-link text-white fs-5 text-decoration-none fw-bold">
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