<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">

    <style>
        .link {
            font-size: 0.9rem;
            color: #ffc093;
            font-weight: bold;
        }
        .link:hover {
            color: #a07658;
        }

        .logo {
            max-height: 70px;
            margin-bottom: 5px;
        }
        .logo-text {
            font-size: 0.7rem;
            letter-spacing: 3px;
            line-height: 1.2;
        }
        .logo-subtext {
            font-size: 0.5rem;
            letter-spacing: 4px;
            margin-top: 2px;
        }

        .book-now {
            font-size: 0.9rem;
            border: 3px solid #6a3e4f;
            background-color: #de7994;
            color: #2b241f;
            font-weight: bold;
            border-radius: 100px;
            transition: all 0.3s ease;
        }
        .book-now:hover {
            background-color: #b46378;
            border: 3px solid #6a3e4f;
            color: #2b241f;
        }
    </style>

</head>
<body>
    
    <nav class="navbar bg-darkbrown shadow font-title">
        <div class="container-fluid py-2 px-5 mx-5">

            <!-- Left Section -->
            <ul class="navbar-nav d-flex flex-row gap-5 align-items-center">
                <li class="nav-item"><a class="nav-link link" href="#">HOME</a></li>
                <li class="nav-item"><a class="nav-link link" href="#">ROOMS</a></li>
                <li class="nav-item"><a class="nav-link link" href="#">AMENITIES</a></li>
                <li class="nav-item"><a class="nav-link link" href="#">ABOUT</a></li>
            </ul>

            <!-- Logo -->
            <ul class="navbar-nav px-4">
                <li class="nav-item">
                    <a class="nav-link link d-flex flex-column align-items-center" href="#"> 
                        <img src="images/logo.png" alt="logo" class="logo">
                        <div class="logo-text">GRAND BUDAPEST</div>
                        <div class="logo-subtext">HOTEL</div>
                    </a>
                </li>
            </ul>

            <!-- Right Section -->
            <ul class="navbar-nav d-flex flex-row gap-5 align-items-center">
                <li class="nav-item"><a class="nav-link link" href="#">CONTACT</a></li>
                <li class="nav-item"><a class="nav-link link" href="#">PROFILE</a></li>
                <li class="nav-item">
                    <a href="#" class="btn book-now d-flex flex-column align-items-center px-4">
                        BOOK NOW
                        <img src="images/logo-key-brown.png" alt="key" style="height:18px;">
                    </a>
                </li>
            </ul>

        </div>
    </nav>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>