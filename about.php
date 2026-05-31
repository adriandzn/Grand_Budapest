<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Budapest Hotel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">
</head>

<body class = "bg-lightpink">
    
    <!-- NAVBAR -->
    <?php include 'navbar.php'; ?>

    <!-- Hero Section -->
    <section class="text-white py-5"
        style="background-image: url('images/index-hero.png'); 
        background-size: cover; 
        background-position: center; 
        background-color: rgba(0,0,0,0.6); 
        background-blend-mode: multiply;
        border-bottom: 0px solid #6a3e4f;">

        <div class="container py-4 ps-5">
            <div class="row">
                <div class="col">
                    <h1 class="display-3 font-title font-white fw-bold">About</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- A Timeless Icon -->
    <section >
        <div class="container mt-5">
            <div class="row g-0 rounded-4 overflow-hidden shadow">
            
            <div class="col-md-5">
                <img src="images/hotel_pictures/grand-budapest-mountainview.jpg" alt="Grand Budapest Hotel" class="w-100 h-100 object-fit-cover">
            </div>

                <div class="col p-5 bg-lightbrown">
                    <h1 class="text-start font-pink font-title mb-3">A Timeless Icon</h1>
                    <p class = "text-white font-body">
                        At the heart of our story lies a grand establishment nestled in the fictional European country of Zubrowka. Though imagined, our hotel reflects the charm and sophistication of a bygone era—an age defined by refined service, cultural richness, and unforgettable characters.
                    </p>
                    <p class = "text-white font-body">
                        Inspired by the works of Stefan Zweig and brought to life by visionary director Wes Anderson, our story captures the spirit of early 20th-century Europe. It is a tribute to a time when grand hotels were more than just places to stay—they were centers of society, art, and human connection.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Legacy -->
    <section >
        <div class="container mt-5">
            <div class="row g-0 rounded-4 overflow-hidden shadow">
                <div class="col p-5 bg-lightbrown">
                    <h1 class="text-start font-pink font-title mb-3">Our Legacy</h1>
                    <p class = "text-white font-body">
                        Our journey begins in the 1930s, during the golden age of the hotel under the exceptional concierge Monsieur Gustave H. Known for his unmatched dedication to service, he upheld the values that define us to this day: attention to detail, loyalty, and a commitment to excellence.
                    </p>
                    <p class = "text-white font-body">
                        Through decades marked by political change and uncertainty, the hotel has endured. From its peak as a luxurious destination for the elite to quieter, more reflective years, our legacy is one of resilience and transformation.
                    </p>
                </div>

                <div class="col-md-5">
                <img src="images/hotel_pictures/lobby.jpg" alt="Grand Budapest Hotel" class="w-100 h-100 object-fit-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- The Creators -->
    <section class="my-5">
    <div class="container">
        <h1 class="text-center font-title fw-bold mb-5">The Creators</h1>

        <div class="row row-cols-1 row-cols-md-2 g-5 justify-content-center">
            
            <div class="col">
                <div class="bg-lightbrown p-5 rounded-5 text-center h-100 shadow">
                    <img src="images/hotel_pictures/creator-wes.jpg" alt="wes anderson" 
                         class="rounded-circle mx-auto d-block mb-4 object-fit-cover" 
                         style="width: 160px; height: 160px;">
                    
                    <h2 class="font-pink font-title">Wes Anderson</h2>
                    <p class="font-pink font-body">Filmmaker</p>
                    
                    <p class="text-white font-body">
                        Wes Anderson is the filmmaker behind The Grand Budapest Hotel, known for his distinctive visual style, precise symmetry, and carefully crafted storytelling. In The Grand Budapest Hotel, he brings a whimsical yet emotional world to life through detailed sets, rich color palettes, and a unique sense of charm that defines the film's identity.
                    </p>
                </div>
            </div>
            
            <div class="col">
                <div class="bg-lightbrown p-5 rounded-5 text-center h-100 shadow">
                    <img src="images/hotel_pictures/creator-gustave.jpg" alt="gustave" 
                         class="rounded-circle mx-auto d-block mb-4 object-fit-cover" 
                         style="width: 160px; height: 160px;">
                    
                    <h2 class="font-pink font-title">M. Gustave</h2>
                    <p class="font-pink font-body">Founder</p>
                    
                    <p class="text-white font-body">
                        The heart and soul of the establishment. He is a paragon of service, a lover of blonde poetry, and a devotee of L'Air de Panache. He serves the elderly, the wealthy, and the insecure with unparalleled poise.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
    
    <?php include 'footer.php'; ?>
    
    <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>