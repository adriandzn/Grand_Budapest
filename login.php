<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/body.css">
</head>
<body  style="background-image: url('images/index-hero.png'); 
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

        <div class="row mb-4">
            <div class="col text-center fw-bold font-title">
                <h1 class="display-6 text-white">Login</h1>
            </div>
        </div>
        <form action="login.php" method=post>
        <!-- Email input -->
        <div class="form-outline mb-4 font-pink">
            <label class="form-label" for="form2Example1">Username</label>
            <input type="text" name="username" id="form2Example1" class="form-control rounded-5" placeholder="Type here" />
        </div>


         <!-- Password input -->
        <div class="form-outline mb-4 font-pink">
            <label class="form-label" for="form2Example2">Password</label>
            <input type="password" name="pass" id="form2Example2" class="form-control rounded-5" placeholder="Type here"/>
        </div>
        <!-- Submit button -->
         <div class="row justify-content-center">
        <input type="submit" name=sub value="Login" class="btn fw-bold bg-darkpink text font-body btn-block rounded-5 mb-4 w-50">
        </div>

        <div class="row text-center text-white font-body ">
            <div class = "col fs-4">
                Don't have an account? 
                <br>
                <a href="#" class="btn btn-link text-white fs-5 text-decoration-none">
                Register Here
                </a>
            </div>
            
        </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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















