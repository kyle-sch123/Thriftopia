<?php
session_start();
include("dbcon.php");

$user = [];
$message = '';
if (isset($_SESSION['CurrentUser'])) {
    $username = $_SESSION['CurrentUser'];
    $sql = "SELECT user_name, Email, password, shipping_Address, UserType FROM user WHERE user_name = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        $_SESSION['message'] = "User not found.";
        header("Location: login.php");
        exit();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_profile'])) {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];
    $new_shipping_address = $_POST['shipping_address'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];


    if ($user['password'] === $current_password) {

        $update_sql = "UPDATE user SET user_name='$new_username', email='$new_email', shipping_Address='$new_shipping_address'";
        if (!empty($new_password)) {
            $update_sql .= ", password='$new_password'";
        }
        $update_sql .= " WHERE user_name='$username'";

        if ($conn->query($update_sql) === TRUE) {
            $_SESSION['CurrentUser'] = $new_username;
            $message = "Profile updated successfully!";

            $sql = "SELECT user_name, Email, password, shipping_Address, UserType FROM user WHERE user_name='$new_username'";
            $result = $conn->query($sql);
            $user = $result->fetch_assoc();
        } else {
            $message = "Error updating profile: " . $conn->error;
        }
    } else {
        $message = "Current password is incorrect.";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="icon" type="image/x-icon" href="images/THRIFTOPIA LOGO.jpg">

    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="profile.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
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

    <br>

    <div class="spotlight-header-container">
        <span class="spotlight-header">
            WELCOME, <?php echo $_SESSION['CurrentUser']; ?>
        </span>
    </div>

    <br>

    <div class="Absolute-Center">
        <div class="profile-container">
            <div class="account-details">
                <div class="account-details-header">
                    <p>Account Details</p>
                </div>
                <?php if (!empty($user)) : ?>
                    <h3> User name: </h3>
                    <h2><?php echo htmlspecialchars($user['user_name']); ?></h2>

                    <h3> Email: </h3>
                    <h2><?php echo htmlspecialchars($user['Email']); ?></h2>

                    <h3> Password: </h3>
                    <h2><?php echo htmlspecialchars($user['password']); ?></h2>

                    <h3> Shipping Address: </h3>
                    <h2><?php echo htmlspecialchars($user['shipping_Address']); ?></h2>
                    <?php if ($user['UserType'] === "Admin") : ?>

                        <div class="account-details-header">
                            <p1>This Account Has Admin Privileges!</p1> <br>
                            <a href="admin.php" class="admin-btn">Access Admin Panel</a>
                        </div>                        
                        


                    <?php endif; ?>
                <?php else : ?>
                    <p>No details found for the user!</p>
                <?php endif; ?>
            </div>
            <div class="sidepanel">
                <div class="edit-profile-header">
                    <h1>Edit Profile</h1>
                </div>

                <div class="edit-profile-header">
                    <form action="" method="POST" class="edit-profile-form">
                        <br>
                        <label for="username">Username:</label><br>
                        <input type="text" name="username" value="<?php echo htmlspecialchars($user['user_name']); ?>" required><br>

                        <label for="email">Email:</label><br>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($user['Email']); ?>" required><br>

                        <label for="shipping_address">Shipping Address:</label><br>
                        <input type="text" name="shipping_address" value="<?php echo htmlspecialchars($user['shipping_Address']); ?>" required><br>

                        <label for="current_password">Current Password:</label><br>
                        <input type="password" name="current_password" required><br>

                        <label for="new_password">New Password (optional):</label><br>
                        <input type="password" name="new_password"><br>

                        <center> <button type="submit" name="update_profile">Update Profile</button></center><br>
                    </form>
                </div>

                <div class="edit-profile-header">
                    <h1>LOGOUT</h1>
                </div>
                <!-- HERE GOES THE CODE FOR A LOGOUT BUTTON THAT WILL SIGN THE USER OUT -->
                <form action="logout.php" method="POST">
                    <button type="submit" name="logout">Logout</button>
                </form>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
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
</body>

</html>