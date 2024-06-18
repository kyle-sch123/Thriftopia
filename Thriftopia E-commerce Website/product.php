<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>More Info</title>
  <link rel="icon" type="image/x-icon" href="images/THRIFTOPIA LOGO.jpg">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="product.css">
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
  <br>
  <div class="spotlight-header-container">
    <span class="spotlight-header">
      TAKE A CLOSER LOOK👀
    </span>
  </div>
  <br><br>

  <div class="Absolute-Center">
    <?php
    include 'dbcon.php';
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE Product_ID = $product_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<div class='description'>";
      echo "<h1 id ='price-header'> R" . $row["Price"] . "</h1>";
      echo "<h1>" . $row["Name"] . "</h1>";
      echo "<h3>DETAILS</h3>";
      echo "<p>" . $row["Description"] . "<br>" . "Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur quas sit fugiat dolor sint doloremque molestiae est necessitatibus animi dolore! Dolore impedit maxime sint, dolores laboriosam nobis quia porro vitae?
    " . "</p>";
      echo "</div>";
      echo "<div class='product_image'>";
      echo "<img src='" . $row["Image"] . "' alt='" . $row["Name"] . "'>";
      echo "</div>";

      echo "<div class='product_checkout'>";
      echo "<h2>Price: R " . $row["Price"] . "</h2>";
    ?>
      <form action="cart.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <input type="number" name="quantity" min="1" value="1" class="number-input"><br><br>
        <button type="submit" name="add_to_cart" class="btn">Add to Cart</button>
      </form>
      <?php
      echo "<br> <a href='index.php#all-sec'>CONTINUE SHOPPING</a><br><br><br> ";
      echo "<div class='spotlight-header-container'>";
      echo "<span class='spotlight-header'>";
      echo "ALL PURCHASES ARE FINAL";
      echo "</span>";
      echo "</div>";
      echo "</div>";
      ?>
    <?php
    } else {
      echo "Product not found!";
    }

    $conn->close();
    ?>

  </div>
   <center><a class="button-simulation" href="index.php">⬅️<u>GO BACK</u>⬅️ </a></center>
    
  

  <br>

  <!--DONT LOOK AT THIS -->
  <br><br><br><br><br>
  <br><br><br>
  
  <!--STOP LOOKING LOOK AT THIS -->

  <footer>
    <div style="background-color: white; opacity: 0.7;">
      <div class="all-grid">
        <div class="footer-col-1">
          <h2 style="font-family: 'Montserrat', sans-serif; letter-spacing: 2px; font-size: 20px;">ABOUT US</h2>
          <ul style="list-style: none; padding: 2px 5px 5px; margin-bottom: 0px;">
            <li style="font-size: 15px;">
              FASHION BLOGGER
            </li>
            <li style="font-size: 15px;">
              SOCIAL RESPONSIBILITY
            </li>
            <li style="font-size: 15px;">
              CAREERS
            </li>
          </ul>
        </div>

        <div class="footer-col-2">
          <h2 style="font-family: 'Montserrat', sans-serif; letter-spacing: 2px; font-size: 20px;">CONTACT US</h2>
          <ul style="list-style: none; padding: 2px 5px 5px; margin-bottom: 0px;">
            <li style="font-size: 15px;">
              SHIPPING INFO
            </li>
            <li style="font-size: 15px;">
              RETURNS POLICY </li>
            <li style="font-size: 15px;">
              REFUND POLICY
            </li>
            <li style="font-size: 15px;">
              HOW TO ORDER
            </li>
          </ul>
        </div>

        <div class="footer-col-3">
          <h2 style="font-family: 'Montserrat', sans-serif; letter-spacing: 2px; font-size: 20px;">SOCIALS</h2>
          <div style="display: gird; grid-template-rows: 1fr 1fr; grid-template-columns: 1fr 1fr 1fr; grid-gap: 5px;width: 200px;margin: 0 auto;">
            <div>
              <i class="fa-brands fa-x-twitter"></i>
            </div>

            <div>
              <i class="fa-brands fa-facebook"></i>
            </div>

            <div>
              <i class="fa-brands fa-instagram"></i>
            </div>

            <div>
              <i class="fa-brands fa-tiktok"></i>
            </div>

          </div>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>