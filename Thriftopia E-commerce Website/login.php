<?php
require 'dbcon.php';

session_start(); // Start the session at the beginning

$CurrentUser ='';
$message = '';
$message2='';
$user_logged_in = false;

if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header("Location: profile.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];

        // CONFIRM IF THE PASSWORDS THE USER ENTERED IS IN AGREEMENT!
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];
        if ($pass1 == $pass2) {
            $password = $_POST['password1'];
            $sql = "INSERT INTO user (user_name, email, password) VALUES ('$username', '$email','$password')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['message'] = "User Registered Successfully!";
            } else {
                $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $_SESSION['message'] = "The passwords are not the same!";
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['login'])) {


        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT User_id, user_name, Email, password FROM user WHERE password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($password = $user['password']) {
                // Login successful (existing password format)                 

               
                $_SESSION['CurrentUser'] =$user['user_name'];
                $_SESSION['user_logged_in'] = true;
                $_SESSION['message2'] = "Welcome, you are now logged in!";
                

               header("Location: profile.php");
                exit();
            } else {
                // Login failed (potentially old password format)
                $_SESSION['message2'] = "Your password is wrong. Please reset your password if you are unsure!";
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['user_logged_in'] = false;
            $_SESSION['message2'] = "Your password is wrong. Please reset your password if you are unsure!";
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Sign Up Page</title>

    <link rel="icon" type="image/x-icon" href="images/THRIFTOPIA LOGO.jpg">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="login.css">
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

        <li><a href="cart.php"> <i class="fa-solid fa-bag-shopping"></i></a></li>

    </ul>
</header>

<body>
    <br><br>
    <div class="spotlight-header-container">
        <span class="spotlight-header">
            WELCOME
        </span>
    </div>
    <br><br>
    <div class="Absolute-Center">
        <div class="container">
            <div class="signup-section">
                <h1>Hello!</h1>
                <p>Please signup to continue</p>
                <br><br>
                <form action="" method="POST" class="signupform">
                    <label class="label">Full Name</label><br><br>
                    <input type="text" name="username" placeholder="John Doe" required><br>
                    <label class="label">Email Address </label><br><br>
                    <input type="email" name="email" placeholder="Johndoe@gmail.com" required><br>
                    <label class="label">Password</label><br><br>
                    <input type="password" name="password1" placeholder="Password" required><br>
                    <label class="label">Confirm Password</label><br><br>
                    <input type="password" name="password2" placeholder="Confirm Password" required><br>
                    <center><button type="submit" name="signup">Sign Up</button></center>
                </form>
                <?php
                if (isset($_SESSION['message'])) {

                    echo '<p class="message">' . $_SESSION['message'] . '</p>';

                    unset($_SESSION['message']);
                }
                ?>
            </div>
            <div class="login-section">
                <div class="login-center">
                    <img src="images/T-logo.png" alt="Thriftopia Logo!">
                    <h1>Thriftopia</h1>
                    <h3>Already have an account?</h3>

                    <form action="" method="POST" class="loginform" id="login-form">

                        <input type="text" name="email" placeholder="Email" required><br><br>

                        <input type="password" name="password" placeholder="Password" required><br><br>
                        <center><button type="submit" name="login">Login</button></center>
                    </form>
                    <?php
                    if (isset($_SESSION['message2'])) {

                        echo '<p class="message">' . $_SESSION['message2'] . '</p>';

                        unset($_SESSION['message2']);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <br><br>
    <br><br>
    <br><br>

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

    <script defer src="search.js"></script>
    <script defer src="Stickyheader.js"></script>
</body>

</html>