<?php
session_start();
include("dbcon.php");
include("Product_Insert.php");
include("User_Insert.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thriftopia</title>
    <link rel="icon" type="image/x-icon" href="images/THRIFTOPIA LOGO.jpg">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <!-- FOR THE SALE COUNTDOWN - marquee -->
    <div class="marquee-container">
        <div class="marquee-content">
            <i class="fa fa-bullhorn" aria-hidden="true"></i>
            NEW DROP COMING SOON!
            <i class="fa fa-bullhorn" aria-hidden="true"></i>
            NEXT DROP IN: <span id="demo"></span>
            <i class="fa fa-bullhorn" aria-hidden="true"></i>
            NEW DROP COMING SOON!
            <i class="fa fa-bullhorn" aria-hidden="true"></i>


        </div>
    </div>
    <script defer src="countdown.js"> </script>
    <!-- END OF: FOR THE SALE COUNTDOWN - marquee -->


    <!--FOR STICKY HEADER/NAVBAR-->
    <header id="MyHeader">
        <a href="index.php"> <img src="images/T-logo.png" alt="Thriftopia's logo" class="nav_logo"></a>

        <nav>
            <ul class="nav_links">
                <li><a href="newdrop.html">New drop</a></li>

                <!--START OF THE DROP DOWN SORT MENU!-->

                <li class="dropdown" id="browse-section">

                    <a href="#" class="dropbtn">Browse</a>
                    <div class="dropdown-content">
                        <a href="index.php?filter=option1#all-sec">Price (Low To High)</a>
                        <a href="index.php?filter=option2#all-sec">Price (High To Low)</a>
                        <a href="index.php?filter=option3#all-sec">Newest To Oldest</a>
                        <a href="index.php?filter=option4#all-sec">Oldest To Newest</a>
                        <a href="index.php">Clear Filters</a>
                        <!-- Add more filter options as needed -->
                    </div>

                </li>

                <!--END OF THE DROP DOWN SORT MENU!-->
                <li><a href="sale.php">Sale</a></li>
            </ul>
        </nav>
        <!-- THIS IS WHERE THE LOGOS COME-IN-->
        <ul class="nav_icons">
            <li><a href="login.php"><i class="fa-solid fa-user"></i></a></li>

            <!--=====================DROP DOWN SEARCH BAR!=================-->
            <li class="dropdown" id="search-section">
                <a href="#" class="dropbtn"><i class="fa-solid fa-magnifying-glass"></i></a>
                <div class="dropdown-content" id="searchbar">
                    <form method="post" id="search-form">
                        <input type="text" name="search" id="search-input" placeholder="TYPE HERE" onkeyup="showResults(this.value)">
                    </form>
                    <div id="search-results"></div>
                </div>
            </li>

            <!--=====================END OF DROP DOWN SEARCH BAR!============-->

            <li><a href="cart.php"> <i class="fa-solid fa-bag-shopping"></i></a></li>

        </ul>
    </header>
    <!--END OF: FOR STICKY HEADER/NAVBAR-->

    <br>
    <!--THE START OF THE FIRST BANNER-->

    <div class="banner-container">
        <div class="section-1">
            <h1>FREE STANTARD SHIPPING*</h1>
            <h3> On Your First Order USE CODE: <b> URFREESHIP</b></h3>
            <h1 style="line-height: 0.4; font-style: normal;"> + </h1>
            <h3> First Return!</h3>
            <a href="index.php#all-sec"><button> SHOP NOW </button></a>
            <p> (*No Minimum. Coupon Is Valid For 7 Days only.) </p>
        </div>

        <div class="section-2">
            <a href="sale.php" class="Absolute-Center">
                <h1> SALE</h1>
            </a>
        </div>

        <div class="section-3">
            
                <p>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </p>

                <h1>
                    HIGHLY RECOMMENDED!
                </h1>

                <h3>
                    By guaranteeing satisfaction and delivering quality products Thriftopia has secured 5 star ratings
                    by over 300 users!
                </h3>

                <p>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </p>
            
        </div>
    </div>


    <!--END OF THE FIRST BANNER!-->
    <br>

    <br>
    <!-- START OF SPOTLIGHT -->
    <div class="spotlight-header-container">
        <span class="spotlight-header">
            <span class="material-symbols-outlined">
                highlight
            </span>
            SPOTLIGHT
            <span class="material-symbols-outlined">
                highlight
            </span>
        </span>
    </div>



    <section class="spotlight">
        <div class="product-grid">
            <article class="product">

                <a href="product.php?id=3">
                    <img src="images/i2.jpg" alt="Product Image 1">
                </a>
                <h3>White Maxi Dress (M)</h3>
                <p>R 150</p>
                <p1>ADD TO CART</p1>
                <p>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                </p>

            </article>

            <article class="product">
                <a href="product.php?id=16">
                    <img src="images/i5.jpg" alt="Product Image 2">
                </a>
                <h3> Brown Jacket (L)</h3>
                <p id="all-sec">R 350</p>
                <p1>ADD TO CART</p1>
                <p>

                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <span class="material-symbols-outlined">
                        star_half
                    </span>
                </p>

            </article>

            <article class="product">
                <a href="product.php?id=2">
                    <img src="images/i20.jpg" alt="Product Image 3">
                </a>
                <h3>Puffer Jacket (XL)</h3>
                <p>R 230 </p>
                <p1>ADD TO CART</p1>
                <p>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <span class="material-symbols-outlined">
                        star_half
                    </span>
                </p>

            </article>

            <article class="product">
                <a href="product.php?id=1">
                    <img src="images/i4.jpg" alt="Product Image 4">
                </a>
                <h3>Gucci Black Dress (S)</h3>
                <p>R 175</p>
                <p1>ADD TO CART</p1>
                <p>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                    <span class="material-symbols-outlined">
                        star
                    </span>
                </p>
            </article>
        </div>
    </section>
    <!-- END OF SPOTLIGHT -->
    <div class="spotlight-header-container">
        <span class="spotlight-header">
            ALL
        </span>
    </div>

    <!--START OF ALL SECTION -->
    <section>

        <?php
        include 'dbcon.php';

        //START OF FILTERS
        if (isset($_GET['filter'])) {
            $selected_filter = $_GET['filter'];

            // Process the selected filter and fetch/filter the data accordingly
            switch ($selected_filter) {
                case 'option1':
                    echo "<h3 class='filter-text'> Applied Filter: <b>Price (Low To High)</b> </h3>";
                    echo "<br>";

                    $sql = "SELECT * FROM product ORDER BY price";
                    $result = $conn->query($sql);
                    $num_products = $result->num_rows;  // Get the number of products

                    // Calculate number of columns based on number of products (adjust as needed)
                    $columns = ($num_products % 2 === 0) ? $num_products / 2 : (int)($num_products / 1) + 5;

                    // Loop through products and create product cards
                    for ($i = 0; $i < $num_products; $i += 3) {
                        echo "<div class='product-grid'>";
                        for ($j = $i; $j < $i + 3 && $j < $num_products; $j++) {
                            $row = $result->fetch_assoc();
                            echo "<article class='all-product'>";
                            echo "<a href='product.php?id=" . $row["Product_ID"] . "'>";
                            echo "<img src='" . $row["Image"] . "' alt='" . $row["Name"] . "'>";  // Assuming you have an image_url field
                            echo "</a>";
                            echo "<h3>" . $row["Name"] . "</h3>";
                            echo "<p>" . substr($row["Description"], 0, 100) . "..." . "</p>";  // Display a short description snippet
                            echo "<h2>" . "R " . $row["Price"] . "</h2>";
                            echo "</article>";

                            // Add a clearfix element after every row of cards (adjust as needed based on your CSS)

                        }
                        echo "</div>";
                        echo "<br>";
                    }
                    $conn->close();
                    break;

                case 'option2':
                    echo "<h3 class='filter-text'> Applied Filter: <b>Price (High To Low)</b> </h3>";
                    echo "<br>";
                    $sql = "SELECT * FROM product ORDER BY price DESC";
                    $result = $conn->query($sql);
                    $num_products = $result->num_rows;  // Get the number of products

                    // Calculate number of columns based on number of products (adjust as needed)
                    $columns = ($num_products % 2 === 0) ? $num_products / 2 : (int)($num_products / 1) + 5;

                    // Loop through products and create product cards
                    for ($i = 0; $i < $num_products; $i += 3) {
                        echo "<div class='product-grid'>";
                        for ($j = $i; $j < $i + 3 && $j < $num_products; $j++) {
                            $row = $result->fetch_assoc();
                            echo "<article class='all-product'>";
                            echo "<a href='product.php?id=" . $row["Product_ID"] . "'>";
                            echo "<img src='" . $row["Image"] . "' alt='" . $row["Name"] . "'>";  // Assuming you have an image_url field
                            echo "</a>";
                            echo "<h3>" . $row["Name"] . "</h3>";
                            echo "<p>" . substr($row["Description"], 0, 100) . "..." . "</p>";  // Display a short description snippet
                            echo "<h2>" . "R " . $row["Price"] . "</h2>";
                            echo "</article>";

                            // Add a clearfix element after every row of cards (adjust as needed based on your CSS)

                        }
                        echo "</div>";
                        echo "<br>";
                    }
                    $conn->close();
                    break;

                case 'option3':

                    echo "<h3 class='filter-text'> Applied Filter: <b>Newest To Oldest</b> </h3>";
                    echo "<br>";
                    $sql = "SELECT * FROM product ORDER BY Product_ID";
                    $result = $conn->query($sql);
                    $num_products = $result->num_rows;  // Get the number of products

                    // Calculate number of columns based on number of products (adjust as needed)
                    $columns = ($num_products % 2 === 0) ? $num_products / 2 : (int)($num_products / 1) + 5;

                    // Loop through products and create product cards
                    for ($i = 0; $i < $num_products; $i += 3) {
                        echo "<div class='product-grid'>";
                        for ($j = $i; $j < $i + 3 && $j < $num_products; $j++) {
                            $row = $result->fetch_assoc();
                            echo "<article class='all-product'>";
                            echo "<a href='product.php?id=" . $row["Product_ID"] . "'>";
                            echo "<img src='" . $row["Image"] . "' alt='" . $row["Name"] . "'>";  // Assuming you have an image_url field
                            echo "</a>";
                            echo "<h3>" . $row["Name"] . "</h3>";
                            echo "<p>" . substr($row["Description"], 0, 100) . "..." . "</p>";  // Display a short description snippet
                            echo "<h2>" . "R " . $row["Price"] . "</h2>";
                            echo "</article>";

                            // Add a clearfix element after every row of cards (adjust as needed based on your CSS)

                        }
                        echo "</div>";
                        echo "<br>";
                    }
                    $conn->close();

                    break;
                case 'option4':

                    echo "<h3 class='filter-text'> Applied Filter: <b>Oldest To Newest</b> </h3>";
                    echo "<br>";
                    $sql = "SELECT * FROM product ORDER BY Product_ID DESC";
                    $result = $conn->query($sql);
                    $num_products = $result->num_rows;  // Get the number of products

                    // Calculate number of columns based on number of products (adjust as needed)
                    $columns = ($num_products % 2 === 0) ? $num_products / 2 : (int)($num_products / 1) + 5;

                    // Loop through products and create product cards
                    for ($i = 0; $i < $num_products; $i += 3) {
                        echo "<div class='product-grid'>";
                        for ($j = $i; $j < $i + 3 && $j < $num_products; $j++) {
                            $row = $result->fetch_assoc();
                            echo "<article class='all-product'>";
                            echo "<a href='product.php?id=" . $row["Product_ID"] . "'>";
                            echo "<img src='" . $row["Image"] . "' alt='" . $row["Name"] . "'>";  // Assuming you have an image_url field
                            echo "</a>";
                            echo "<h3>" . $row["Name"] . "</h3>";
                            echo "<p>" . substr($row["Description"], 0, 100) . "..." . "</p>";  // Display a short description snippet
                            echo "<h2>" . "R " . $row["Price"] . "</h2>";
                            echo "</article>";

                            // Add a clearfix element after every row of cards (adjust as needed based on your CSS)

                        }
                        echo "</div>";
                        echo "<br>";
                    }
                    $conn->close();

                    break;
                default:
                    // Default case if no valid filter option is selected
                    // Code to fetch/filter data without applying any filter
                    break;
            }
        } else {
            // Code to fetch/filter data without applying any filter if no filter option is selected

            echo "<br><br>";
            $sql = "SELECT * FROM product";
            $result = $conn->query($sql);

            $num_products = $result->num_rows;  // Get the number of products

            // Calculate number of columns based on number of products (adjust as needed)
            $columns = ($num_products % 2 === 0) ? $num_products / 2 : (int)($num_products / 1) + 5;

            // Loop through products and create product cards
            for ($i = 0; $i < $num_products; $i += 3) {
                echo "<div class='product-grid'>";
                for ($j = $i; $j < $i + 3 && $j < $num_products; $j++) {
                    $row = $result->fetch_assoc();
                    echo "<article class='all-product'>";
                    echo "<a href='product.php?id=" . $row["Product_ID"] . "'>";
                    echo "<img src='" . $row["Image"] . "' alt='" . $row["Name"] . "'>";  // Assuming you have an image_url field
                    echo "</a>";
                    echo "<h3>" . $row["Name"] . "</h3>";
                    echo "<p>" . substr($row["Description"], 0, 100) . "..." . "</p>";  // Display a short description snippet
                    echo "<h2>" . "R " . $row["Price"] . "</h2>";
                    echo "</article>";

                    // Add a clearfix element after every row of cards (adjust as needed based on your CSS)

                }
                echo "</div>";
                echo "<br>";
            }
            $conn->close();
        }
        //END OF FILTERS
        ?>
        </div>

    </section>

    <!--END OF ALL SECTION -->

    <!-- START OF FOOTER -->
    <div class="footer">
        <div id="footer" style="background-color: white; opacity: 0.7;">
            <div class="all-grid">
                <div class="footer-col-1">
                    <h2 style="font-family: 'Montserrat', sans-serif; letter-spacing: 2px; font-size: 20px;">ABOUT US</h2>
                    <ul style="list-style: none; padding: 2px 5px 5px; margin-bottom: 0px;">
                        <li style="font-size: 15px;">
                            <a href="https://www.itscasualblog.com/">BECOME A FASHION BLOGGER</a>
                        </li>
                        <li style="font-size: 15px;">
                            <a href="https://www.investopedia.com/terms/s/socialresponsibility.asp"> RESPONSIBILITY </a>
                        </li>
                        <li style="font-size: 15px;">
                            <a href="https://www.shopriteholdings.co.za/careers.html"> CAREERS </a>
                        </li>
                    </ul>
                </div>

                <div class="footer-col-2">
                    <h2 style="font-family: 'Montserrat', sans-serif; letter-spacing: 2px; font-size: 20px;">CONTACT US</h2>
                    <ul style="list-style: none; padding: 2px 5px 5px; margin-bottom: 0px;">
                        <li style="font-size: 15px;">
                            <a href="https://www.geewiz.co.za/content/1-delivery">SHIPPING INFO</a>
                        </li>
                        <li style="font-size: 15px;">
                            <a href="https://www.shopify.com/za/blog/return-policy">RETURNS POLICY </a>
                        </li>
                        <li style="font-size: 15px;">
                            <a href="https://www.importatoy.co.za/pages/refund-policy">REFUND POLICY</a>
                        </li>
                        <li style="font-size: 15px;">
                            <a href="https://www.wikihow.com/Shop-Online"> HOW TO ORDER</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-col-3">
                    <h2 style="font-family: 'Montserrat', sans-serif; letter-spacing: 2px; font-size: 20px;">SOCIALS</h2>
                    <div style="display: gird; grid-template-rows: 1fr 1fr; grid-template-columns: 1fr 1fr 1fr; grid-gap: 5px;width: 200px;margin: 0 auto;">
                        <div>
                            <a href="https://x.com/thriftopia2_0"><i class="fa-brands fa-x-twitter"></i></a>
                        </div>

                        <div>
                            <a href="https://www.facebook.com/ThriftopiaKS/"><i class="fa-brands fa-facebook"></i></a>
                        </div>

                        <div>
                            <a href="https://www.instagram.com/thriftopia.za/"> <i class="fa-brands fa-instagram"></i></a>
                        </div>

                        <div>
                            <a href="https://www.tiktok.com/@thriftopia.za"><i class="fa-brands fa-tiktok"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END OF FOOTER -->


    <!-- JAVA SCRIPTS -->
    <script defer src="countdown.js"></script>
    <script defer src="Stickyheader.js"></script>
    <script defer src="search.js"></script>


</body>

</html>