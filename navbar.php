<link rel="stylesheet" href="css/navbar.css">

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
                <a href="book_1.php" class="btn book-now d-flex flex-column align-items-center px-4">
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
            <a href="book_1.php" style="font-size: 0.9rem;">BOOK NOW</a>
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