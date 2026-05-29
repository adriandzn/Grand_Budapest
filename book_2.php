<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/body.css">
    <link rel="stylesheet" href="css/book.css">
</head>
<body class="bg-lightpink">

    <!-- NAVBAR -->
    <?php include 'navbar.php'; ?>

    <!-- Hero Section -->
    <section class="text-white py-5"
        style="background-image: url('images/index-hero.png'); 
        background-size: cover; 
        background-position: center; 
        background-color: rgba(0, 0, 0, 0.6); 
        background-blend-mode: multiply;">

        <div class="container py-4 ps-5">
            <div class="row">
                <div class="col">
                    <h1 class="display-3 font-title font-white fw-bold">Book Now</h1>
                </div>
            </div>
        </div>
    </section>


    <div class="container">

        <!-- Progress Bar -->
        <div class="my-5 px-2">
            <?php
                $current_step = 2;
                include 'progress.php'; 
            ?>
        </div>



        <!-- Select Your Room Area -->
        <div class="bg-lightbrown rounded-5 my-5 p-5 shadow" id="room-selection">

            <!-- Go Back Button -->
            <div class="row">
                <div class="col">
                    <a href="book_1.php" class="btn pink-button font-title d-flex align-items-center justify-content-center gap-2 px-4 py-2 shadow" style="width: fit-content;">
                        <img src="images/logo-go-back.png" alt="key" style="height:20px;">
                        Go Back    
                    </a>
                </div>
            </div>

            <div class="row pt-5">
                <div class="col font-title text-white h4 fw-bold">Select Your Room</div>
            </div>

            <!-- Standard Room -->
            <div class="row bg-white rounded-5 shadow mt-5">

                <!-- Image -->
                <div class="col-lg-4 col-md-12 col-12 px-4 py-4">
                    <img src="images/placeholder1.png" alt="Standard Room" class="img-fluid rounded-5" style="width: 100%; height: 100%; object-fit: cover;">
                </div>

                <!-- Details -->
                <div class="col-lg-4 col-md-6 col-12 px-4 py-4 d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col font-title h4 fw-bold">Standard Room</div>
                    </div>
                    <div class="row">
                        <div class="col font-body">Enjoy comfort and simplicity in our thoughtfully designed Standard Room. Perfect for solo travelers or couples, this space offers a relaxing atmosphere with essential amenities for a pleasant stay.</div>
                    </div>
                    <div class="row pt-3">
                        <div class="col font-body d-flex align-items-center gap-3 fw-bold">
                            <img src="images/logo-profile-brown.png" alt="person" style="height:20px;">
                            2 Adults
                        </div>
                    </div>
                </div>

                <!-- Price -->
                <div class="col-lg-4 col-md-6 col-12 px-4 py-4 d-flex flex-column align-items-center justify-content-center">
                    <div class="font-body h4 fw-bold">₱ 4,500.00</div>
                    <div class="font-body h5 fw-bold font-gray">per night</div>
                    <button type="button"
                        class="mt-3 btn pink-button font-title d-flex align-items-center px-5 py-2 shadow"
                        onclick="showRoomForm('standard-form')">
                        Select Room
                    </button>
                </div>
                
            </div>


            <!-- Deluxe Room -->
            <div class="row bg-white rounded-5 shadow mt-4">

                <!-- Image -->
                <div class="col-lg-4 col-md-12 col-12 px-4 py-4">
                    <img src="images/placeholder1.png" alt="Deluxe Room" class="img-fluid rounded-5" style="width: 100%; height: 100%; object-fit: cover;">
                </div>

                <!-- Details -->
                <div class="col-lg-4 col-md-6 col-12 px-4 py-4 d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col font-title h4 fw-bold">Deluxe Room</div>
                    </div>
                    <div class="row">
                        <div class="col font-body">Upgrade your stay with our Deluxe Room, featuring a more spacious layout and enhanced amenities. Ideal for guests who want both comfort and a touch of luxury.</div>
                    </div>
                    <div class="row pt-3">
                        <div class="col font-body d-flex align-items-center gap-3 fw-bold">
                            <img src="images/logo-profile-brown.png" alt="person" style="height:20px;">
                            2 Adults • 2 Children
                        </div>
                    </div>
                </div>

                <!-- Price -->
                <div class="col-lg-4 col-md-6 col-12 px-4 py-4 d-flex flex-column align-items-center justify-content-center">
                    <div class="font-body h4 fw-bold">₱ 8,599.00</div>
                    <div class="font-body h5 fw-bold font-gray">per night</div>
                    <button type="button"
                        class="mt-3 btn pink-button font-title d-flex align-items-center px-5 py-2 shadow"
                        onclick="showRoomForm('deluxe-form')">
                        Select Room
                    </button>
                </div>
                
            </div>
            

            <!-- Suite Room -->
            <div class="row bg-white rounded-5 shadow mt-4">

                <!-- Image -->
                <div class="col-lg-4 col-md-12 col-12 px-4 py-4">
                    <img src="images/placeholder1.png" alt="Suite Room" class="img-fluid rounded-5" style="width: 100%; height: 100%; object-fit: cover;">
                </div>

                <!-- Details -->
                <div class="col-lg-4 col-md-6 col-12 px-4 py-4 d-flex flex-column justify-content-center">
                    <div class="row">
                        <div class="col font-title h4 fw-bold">Suite Room</div>
                    </div>
                    <div class="row">
                        <div class="col font-body">Experience premium luxury in our Suite Room, designed for families or guests seeking the ultimate comfort. With elegant interiors and generous space, this room ensures a truly memorable stay.</div>
                    </div>
                    <div class="row pt-3">
                        <div class="col font-body d-flex align-items-center gap-3 fw-bold">
                            <img src="images/logo-profile-brown.png" alt="person" style="height:20px;">
                            4 Adults • 4 Children
                        </div>
                    </div>
                </div>

                <!-- Price -->
                <div class="col-lg-4 col-md-6 col-12 px-4 py-4 d-flex flex-column align-items-center justify-content-center">
                    <div class="font-body h4 fw-bold">₱ 14,999.00</div>
                    <div class="font-body h5 fw-bold font-gray">per night</div>
                    <button type="button"
                        class="mt-3 btn pink-button font-title d-flex align-items-center px-5 py-2 shadow"
                        onclick="showRoomForm('suite-form')">
                        Select Room
                    </button>
                </div>
            </div>
        </div>



        <!-- Standard Room Form -->
        <div class="select-room bg-lightbrown rounded-5 my-5 p-5 shadow d-none" id="standard-form">

            <!-- Go Back Button -->
            <div class="row">
                <div class="col">
                    <button type="button"
                        class="btn pink-button font-title d-flex align-items-center justify-content-center gap-2 px-4 py-2 shadow"
                        style="width: fit-content;"
                        onclick="goBackToRooms()">

                        <img src="images/logo-go-back.png" alt="key" style="height:20px;">
                        Go Back
                    </button>
                </div>
            </div>

            <!-- Room Info -->
            <div class="row bg-white rounded-5 shadow mt-5">

                <!-- Image -->
                <div class="col-6 px-4 py-4">
                    <img src="images/placeholder1.png" alt="Standard Room" class="img-fluid rounded-5" style="width: 100%; height: 100%; object-fit: cover;">
                </div>

                <!-- Details -->
                <div class="col-6 px-4 py-4 d-flex flex-column">
                    <div class="row pt-3">
                        <div class="col font-title h4 fw-bold">Standard Room</div>
                    </div>
                    <div class="row pt-2">
                        <div class="col font-body">Enjoy comfort and simplicity in our thoughtfully designed Standard Room. Perfect for solo travelers or couples, this space offers a relaxing atmosphere with essential amenities for a pleasant stay.</div>
                    </div>
                    <div class="row pt-4">
                        <div class="col d-flex flex-column align-items-center justify-content-center">
                            <div class="font-body h4 fw-bold">₱ 4,500.00</div>
                            <div class="font-body h5 fw-bold font-gray">per night</div>
                        </div>

                        <div class="col font-body d-flex flex-column align-items-center gap-2 fw-bold h5">
                            2 Adults
                            <img src="images/logo-profile-brown.png" alt="person" style="height:25px;">
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Number of Guests -->

            <div class="row bg-white rounded-5 shadow mt-5 p-4">
                <form action="book_3.php" method="post">
                    <div class="row pt-2">
                        <div class="col font-title h4 fw-bold">Number of Guests</div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-8">
                            <div class="row">
                                <!-- Adult -->
                                <div class="col">
                                    <label for="adult" class="form-label font-body h5 fw-bold">Adults</label>
                                    <select class="form-select rounded-pill bg-lightpink border-0 py-2 px-4 fw-bold" name="adult" id="adult" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>

                                <!-- Extra Pax -->
                                <div class="col">
                                    <label for="extra-pax" class="form-label font-body h5 fw-bold">Extra Pax</label>
                                    <select class="form-select rounded-pill bg-lightpink border-0 py-2 px-4 fw-bold" name="extra-pax" id="extra-pax" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row pt-4">
                                <div class="col font-body text-center">Extra Pax costs an additional <span class="fw-bold">₱1,500.00</span></div>
                            </div>
                        </div>

                        <!-- Next Button -->
                        <div class="col-4 d-flex align-items-center justify-content-center">
                            <input type="button" value="Next" name="book2-next" class="btn pink-button font-title px-5 py-2 shadow" style="width: 200px;">
                        </div>

                    </div>
                </form>
            </div>
        </div>



        <!-- Deluxe Room Form -->
        <div class="select-room bg-lightbrown rounded-5 my-5 p-5 shadow d-none" id="deluxe-form">

            <!-- Go Back Button -->
            <div class="row">
                <div class="col">
                    <button type="button"
                        class="btn pink-button font-title d-flex align-items-center justify-content-center gap-2 px-4 py-2 shadow"
                        style="width: fit-content;"
                        onclick="goBackToRooms()">

                        <img src="images/logo-go-back.png" alt="key" style="height:20px;">
                        Go Back
                    </button>
                </div>
            </div>

            <!-- Room Info -->
            <div class="row bg-white rounded-5 shadow mt-5">

                <!-- Image -->
                <div class="col-6 px-4 py-4">
                    <img src="images/placeholder1.png" alt="Deluxe Room" class="img-fluid rounded-5" style="width: 100%; height: 100%; object-fit: cover;">
                </div>

                <!-- Details -->
                <div class="col-6 px-4 py-4 d-flex flex-column">
                    <div class="row pt-3">
                        <div class="col font-title h4 fw-bold">Deluxe Room</div>
                    </div>
                    <div class="row pt-2">
                        <div class="col font-body">Upgrade your stay with our Deluxe Room, featuring a more spacious layout and enhanced amenities. Ideal for guests who want both comfort and a touch of luxury.</div>
                    </div>
                    <div class="row pt-4">
                        <div class="col d-flex flex-column align-items-center justify-content-center">
                            <div class="font-body h4 fw-bold">₱ 8,599.00</div>
                            <div class="font-body h5 fw-bold font-gray">per night</div>
                        </div>

                        <div class="col font-body d-flex flex-column align-items-center gap-2 fw-bold h5">
                            2 Adults • 2 Children
                            <img src="images/logo-profile-brown.png" alt="person" style="height:25px;">
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Number of Guests -->

            <div class="row bg-white rounded-5 shadow mt-5 p-4">
                <form action="book_3.php" method="post">
                    <div class="row pt-2">
                        <div class="col font-title h4 fw-bold">Number of Guests</div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-8">
                            <div class="row">
                                <!-- Adult -->
                                <div class="col">
                                    <label for="adult" class="form-label font-body h5 fw-bold">Adults</label>
                                    <select class="form-select rounded-pill bg-lightpink border-0 py-2 px-4 fw-bold" name="adult" id="adult" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>

                                <!-- Children -->
                                <div class="col">
                                    <label for="children" class="form-label font-body h5 fw-bold">Children</label>
                                    <select class="form-select rounded-pill bg-lightpink border-0 py-2 px-4 fw-bold" name="children" id="children" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>

                                <!-- Extra Pax -->
                                <div class="col">
                                    <label for="extra-pax" class="form-label font-body h5 fw-bold">Extra Pax</label>
                                    <select class="form-select rounded-pill bg-lightpink border-0 py-2 px-4 fw-bold" name="extra-pax" id="extra-pax" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row pt-4">
                                <div class="col font-body text-center">Extra Pax costs an additional <span class="fw-bold">₱1,500.00</span></div>
                            </div>
                        </div>

                        <!-- Next Button -->
                        <div class="col-4 d-flex align-items-center justify-content-center">
                            <input type="button" value="Next" name="book2-next" class="btn pink-button font-title px-5 py-2 shadow" style="width: 200px;">
                        </div>

                    </div>
                </form>
            </div>
        </div>



        <!-- Suite Room Form -->
        <div class="select-room bg-lightbrown rounded-5 my-5 p-5 shadow d-none" id="suite-form">

            <!-- Go Back Button -->
            <div class="row">
                <div class="col">
                    <button type="button"
                        class="btn pink-button font-title d-flex align-items-center justify-content-center gap-2 px-4 py-2 shadow"
                        style="width: fit-content;"
                        onclick="goBackToRooms()">

                        <img src="images/logo-go-back.png" alt="key" style="height:20px;">
                        Go Back
                    </button>
                </div>
            </div>

            <!-- Room Info -->
            <div class="row bg-white rounded-5 shadow mt-5">

                <!-- Image -->
                <div class="col-6 px-4 py-4">
                    <img src="images/placeholder1.png" alt="Deluxe Room" class="img-fluid rounded-5" style="width: 100%; height: 100%; object-fit: cover;">
                </div>

                <!-- Details -->
                <div class="col-6 px-4 py-4 d-flex flex-column">
                    <div class="row pt-3">
                        <div class="col font-title h4 fw-bold">Suite Room</div>
                    </div>
                    <div class="row pt-2">
                        <div class="col font-body">Experience premium luxury in our Suite Room, designed for families or guests seeking the ultimate comfort. With elegant interiors and generous space, this room ensures a truly memorable stay.</div>
                    </div>
                    <div class="row pt-4">
                        <div class="col d-flex flex-column align-items-center justify-content-center">
                            <div class="font-body h4 fw-bold">₱ 14,999.00</div>
                            <div class="font-body h5 fw-bold font-gray">per night</div>
                        </div>

                        <div class="col font-body d-flex flex-column align-items-center gap-2 fw-bold h5">
                            4 Adults • 4 Children
                            <img src="images/logo-profile-brown.png" alt="person" style="height:25px;">
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Number of Guests -->

            <div class="row bg-white rounded-5 shadow mt-5 p-4">
                <form action="book_3.php" method="post">
                    <div class="row pt-2">
                        <div class="col font-title h4 fw-bold">Number of Guests</div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-8">
                            <div class="row">
                                <!-- Adult -->
                                <div class="col">
                                    <label for="adult" class="form-label font-body h5 fw-bold">Adults</label>
                                    <select class="form-select rounded-pill bg-lightpink border-0 py-2 px-4 fw-bold" name="adult" id="adult" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>

                                <!-- Children -->
                                <div class="col">
                                    <label for="children" class="form-label font-body h5 fw-bold">Children</label>
                                    <select class="form-select rounded-pill bg-lightpink border-0 py-2 px-4 fw-bold" name="children" id="children" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="2">3</option>
                                        <option value="2">4</option>
                                    </select>
                                </div>

                                <!-- Extra Pax -->
                                <div class="col">
                                    <label for="extra-pax" class="form-label font-body h5 fw-bold">Extra Pax</label>
                                    <select class="form-select rounded-pill bg-lightpink border-0 py-2 px-4 fw-bold" name="extra-pax" id="extra-pax" required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row pt-4">
                                <div class="col font-body text-center">Extra Pax costs an additional <span class="fw-bold">₱1,500.00</span></div>
                            </div>
                        </div>

                        <!-- Next Button -->
                        <div class="col-4 d-flex align-items-center justify-content-center">
                            <input type="button" value="Next" name="book2-next" class="btn pink-button font-title px-5 py-2 shadow" style="width: 200px;">
                        </div>

                    </div>
                </form>
            </div>
        </div>


    </div>


    <!-- FOOTER -->
    <?php include 'footer.php'; ?>

    <script src="js/bootstrap.bundle.min.js"></script>

    <script>
        function showRoomForm(formId) {

            document.getElementById('room-selection').classList.add('d-none');

            document.getElementById('standard-form').classList.add('d-none');
            document.getElementById('deluxe-form').classList.add('d-none');
            document.getElementById('suite-form').classList.add('d-none');

            document.getElementById(formId).classList.remove('d-none');

            window.scrollTo({
                top: 550,
                behavior: 'smooth'
            });
        }

        function goBackToRooms() {

            document.getElementById('room-selection').classList.remove('d-none');

            document.getElementById('standard-form').classList.add('d-none');
            document.getElementById('deluxe-form').classList.add('d-none');
            document.getElementById('suite-form').classList.add('d-none');

            window.scrollTo({
                top: 550,
                behavior: 'smooth'
            });
        }
    </script>

</body>
</html>