<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="icon" type="image/x-icon" href="images/THRIFTOPIA LOGO.jpg">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
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

        <li><a href="#"> <i class="fa-solid fa-bag-shopping"></i></a></li>

    </ul>
</header>
<br>
<div class="spotlight-header-container">
    <span class="spotlight-header">
        🛒 WHAT'S THE DAMAGAE? 🛒
    </span>
</div>
<br>
<body>

    <br>
    <?php
    session_start();
    include("dbcon.php");

    // Clear the cart
    if (isset($_POST['clear_cart'])) {
        unset($_SESSION['cart']);

        $total_price = 0;
        header("Location: product.php?id=" . $_POST['product_id']);
        exit();
    }

    // Add item to cart
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // Check if the cart session variable exists, if not, create it
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Check if the item is already in the cart
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = $quantity;
        }

        // Redirect to the cart page
        header("Location: cart.php");
        exit();
    }

    // Handle checkout
    if (isset($_POST['checkout'])) {
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
            echo "<div class='animation'>";
            echo "<p>Thank you for your purchase!</p>";
            echo "</div>";
            unset($_SESSION['cart']); // Clear the cart after checkout
        } else {
            echo "<p class='Absolute-Center'> <a href='login.php'>Please log in</a>" . " " . " to proceed with the checkout.</p>";
        }
    }
    // Display the cart items
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {


        $total_price = 0;
        echo "<div class='Absolute-Center'>";
        echo "<div class= 'cart-container'>";
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            echo "<div class='cart-item'>";
            $sql = "SELECT * FROM product WHERE Product_ID = $product_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $product_name = $row["Name"];
                $price = $row["Price"];
                $total = $price * $quantity;
                $total_price += $total;
                echo "<div><img src=' " . $image = $row["Image"] . "' alt='product-img' class ='cart-img'></div>" . " <div style='margin-left: 5px; margin-top: 5px'>" . "<h1>" . $product_name . "</h1>" . "<h3> Quantity: <b>" . $quantity . "</b> </h3>" . "<h4> R" . $price . "</h4>" . "<p> TOTAL: R" . $total . "</p>" . "<br></div>";
            }
            echo "</div>";

            echo "<br>";
        }
        echo "</div>";

        echo "</div>";
        //echo "<tr><td colspan='3'>Total Price</td><td>R" . $total_price . "</td></tr>";
        echo "<div class='Absolute-Center'>";
        
        echo "<h2 class='grandtotal'> GRAND TOTAL: R" . $total_price ."</h2>";
        
        echo"</div>";

        //echo " <div class='Absolute-Center'>"; //CENTERS BUTTONS 

        echo "<div class='spotlight-header-container'>"; //DIV CONTAINING SPAN
        echo "<span class='spotlight-header'>"; //SPAN CONTAINING BUTTONS 
        //echo "<div>";
        echo "<button onclick='history.back()' class='btn'>⬅️Go Back</button> ";

        echo "<form method='post' action='cart.php'>";
        echo "<input type='hidden' name='product_id' value='$product_id'>";

        echo "<button type='submit' name='clear_cart' class='btn'>Clear Cart</button>";
        echo "</form>";

        echo "<form method='post' action='cart.php'>";
        echo "<button type='submit' name='checkout' class='btn'>Checkout🛒</button>";
        echo "</form>";
        // echo "</div>";
        echo "</span>";

        echo "</div>"; //END OF DIV CONTAINING BUTTONS
        echo"<br><br><br><br><br><br><br><br><br><br>";
        //echo "</div>"; //END OF CENTER 
    } else {

        echo "<h1 id='cart-empty-heading'>Your Shopping Cart is empty</h1>";
        echo "<a href='index.php#all-section' class='button-simulation' id='center'> Let's Fix That!</a>";
        echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    }

    $conn->close();
    ?>

    <br><br><br>
    <br><br><br>
    <br><br><br>
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

    <script defer src="Stickyheader.js"></script>
    <script defer src="search.js"></script>

</body>

</html>