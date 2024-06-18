<?php
session_start();
include("dbcon.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle logo update
    if (isset($_POST['update_logo'])) {
        $logo = $_FILES['logo']['name'];
        $target = "images/" . basename($logo);
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $target)) {
            $message = "Logo updated successfully!";
        } else {
            $message = "Failed to upload logo.";
        }
    }


    if (isset($_POST['add_item'])) {
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $item_description = $_POST['item_description'];
        $item_image = $_FILES['item_image']['name'];
        $target = "images/" . basename($item_image);

        if (move_uploaded_file($_FILES['item_image']['tmp_name'], $target)) {
            $sql = "INSERT INTO product (name, description, price, image) VALUES ('$item_name', '$item_description', '$item_price', '$item_image')";
            if ($conn->query($sql) === TRUE) {
                $message = "Item added successfully!";
            } else {
                $message = "Error adding item: " . $conn->error;
            }
        } else {
            $message = "Failed to upload item image.";
        }
    }
    // Update item
    if (isset($_POST['update_item'])) {
        if (!empty($_POST['item_id'])) {
            $item_id = $_POST['item_id'];
            $item_name = $_POST['item_name'];
            $item_price = $_POST['item_price'];
            $sql = "UPDATE product SET Name='$item_name', Price='$item_price' WHERE Product_ID='$item_id'";
            if ($conn->query($sql) === TRUE) {
                $message = "Item updated successfully!";
            } else {
                $message = "Error updating item: " . $conn->error;
            }
        } else {
            $message = "Item ID is missing for update.";
        }
    }

    // Delete item
    if (isset($_POST['delete_item'])) {
        $item_id = $_POST['item_id'];
        $sql = "DELETE FROM product WHERE Product_ID='$item_id'";
        if ($conn->query($sql) === TRUE) {
            $message = "Item deleted successfully!";
        } else {
            $message = "Error deleting item: " . $conn->error;
        }
    }
}

// Fetch items for display
$sql = "SELECT * FROM product";
$items = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>


    <link rel="icon" type="image/x-icon" href="images/THRIFTOPIA LOGO.jpg">

    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="admin.css">

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


    <br><br>
    <!--=====================START OF BODY============-->

    <div class="spotlight-header-container">
        <span class="spotlight-header">
            ADMIN PANEL
        </span>
    </div>

    <br><br>
    <div class="admin-container">
        <div class="Absolute-Center">
            <div class="logo-section">
                <h2>Update Logo</h2>
                <form action="admin.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="logo" required>
                    <button type="submit" name="update_logo">Update Logo</button>
                </form>
            </div>
        </div>

        <br> <br>
        <div class="Absolute-Center">
            <div class="manageitems-section">
                <h2>Manage Items</h2>
                <form action="admin.php" method="POST">
                    <label for="item_name">Item Name:</label><br>
                    <input type="text" name="item_name" required><br>

                    <label for="item_price">Item Price:</label><br>
                    <input type="number" name="item_price" step="0.01" required><br>

                    <label for="item_description">Item Description:</label><br>
                    <input type="text" name="item_description" required><br>

                    <label for="item_image">Item Image:</label><br>
                    <input type="file" name="item_image" required><br>

                    <button type="submit" name="add_item">Add Item</button>
                </form>
            </div>
        </div>

        <div class="spotlight-header-container">
            <span class="spotlight-header">
                CURRENT ITEMS
            </span>
        </div>

        <div class="Current-items-section">
            <ul style="list-style: none;">
                <?php while ($item = $items->fetch_assoc()) : ?>
                    <li>
                        <div class="ci">
                            <?php echo "<img src=' " . $item['Image'] . "' class='p-image'><br>" ?>

                            <?php echo htmlspecialchars($item['Name']) . " - R" . htmlspecialchars($item['Price']); ?>

                            <form action="admin.php" method="POST" class="inline-form">
                                <label for="item_name">Product Name</label>
                                <input type="text" name="item_name" value="<?php echo ($item['Name']); ?>" required><br>

                                <label for="item_price">Product Price</label>
                                <input type="number" name="item_price" value="<?php echo ($item['Price']); ?>" step="0.01" required><br>

                                <button type="submit" name="update_item">Update</button>
                                <button type="submit" name="delete_item">Delete</button>
                            </form>
                            
                        </div>
                        <br>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>

    </div>




    <!--=====================END OF BODY!============-->
    <br><br><br><br><br>
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