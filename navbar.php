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
            max-height: 60px;
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
            background-color: #a55b6f;
            border: 3px solid #6a3e4f;
            color: #2b241f;
        }


        .hamburger {
            display: none;
            font-size: 28px;
            cursor: pointer;
            color: #ffc093;
        }

        .hamburger:hover {
            color: #c29270;
        }
  
        .hamburger-menu {
            display: flex;
            flex-direction: column;
            background: #201b17;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            padding: 2rem 2rem;

            /* Animation */
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: opacity 0.25s ease, transform 0.25s ease;
        }

        .hamburger-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .hamburger-menu a {
            padding: 12px 20px;
            text-decoration: none;
            color: #ffc093;
            font-weight: bold;
        }

        .hamburger-menu a:hover {
            background: #2b241f;
        }
        
        @media (max-width: 1024px) {
            .left-section,
            .right-section {
                display: none !important;
            }

            .hamburger {
                display: block;
            }

            .container-fluid {
                justify-content: space-between !important;
            }
        }

    </style>



    
    <nav class="navbar bg-darkbrown shadow font-title">
        <div class="container-fluid d-flex justify-content-evenly align-items-center py-2 px-5">

            <!-- Hamburger Button -->
            <div class="hamburger" onclick="toggleMenu()">
                ☰
            </div>

            <!-- Left Section -->
            <ul class="navbar-nav d-flex flex-row gap-5 align-items-center left-section">
                <li class="nav-item"><a class="nav-link link" href="index.php">HOME</a></li>
                <li class="nav-item"><a class="nav-link link" href="rooms.php">ROOMS</a></li>
                <li class="nav-item"><a class="nav-link link" href="amenities_dining.php">AMENITIES</a></li>
                <li class="nav-item"><a class="nav-link link" href="#">ABOUT</a></li>
            </ul>

            <!-- Logo -->
            <ul class="navbar-nav px-4">
                <li class="nav-item">
                    <a class="nav-link link d-flex flex-column align-items-center" href="index.php"> 
                        <img src="images/logo.png" alt="logo" class="logo">
                        <div class="logo-text">GRAND BUDAPEST</div>
                        <div class="logo-subtext">HOTEL</div>
                    </a>
                </li>
            </ul>

            <!-- Right Section -->
            <ul class="navbar-nav d-flex flex-row gap-5 align-items-center right-section">
                <li class="nav-item"><a class="nav-link link" href="contact.php">CONTACT</a></li>
                <li class="nav-item"><a class="nav-link link" href="profile_overview.php">PROFILE</a></li>
                <li class="nav-item">
                    <a href="#" class="btn book-now d-flex flex-column align-items-center px-4">
                        BOOK NOW
                        <img src="images/logo-key-brown.png" alt="key" style="height:16px;">
                    </a>
                </li>
            </ul>

            <!-- Dropdown Menu -->
            <div class="hamburger-menu" id="hamburgerMenu">
                <a href="index.php" style="font-size: 0.9rem;">HOME</a>
                <a href="rooms.php" style="font-size: 0.9rem;">ROOMS</a>
                <a href="amenities_dining.php" style="font-size: 0.9rem;">AMENITIES</a>
                <a href="#" style="font-size: 0.9rem;">ABOUT</a>
                <a href="contact.php" style="font-size: 0.9rem;">CONTACT</a>
                <a href="profile_overview.php" style="font-size: 0.9rem;">PROFILE</a>
                <a href="#" style="font-size: 0.9rem;">BOOK NOW</a>
            </div>

        </div>
    </nav>

    <script>
        const menu = document.getElementById("hamburgerMenu");

        function toggleMenu() {
            menu.classList.toggle("show");
        }

        function handleResize() {
            if (window.innerWidth > 1024) {
                menu.classList.remove("show");
            }
        }

        window.addEventListener("resize", handleResize);
    </script>