<?php
include("dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SALE</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="sale.css">
  <link rel="icon" type="image/x-icon" href="images/THRIFTOPIA LOGO.jpg">

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

          <a href="index.php#browse-section" class="dropbtn">Browse</a>
          <div class="dropdown-content">
            <a href="index.php?filter=option1#all-sec">Price (Low To High)</a>
            <a href="index.php?filter=option2#all-sec">Price (High To Low)</a>
            <a href="index.php?filter=option3#all-sec">Newest To Oldest</a>
            <a href="index.php?filter=option4#all-sec">Oldest To Newest</a>
            <a href="index.php">Clear Filters</a>
          </div>

        </li>

        <!--END OF THE DROP DOWN SORT MENU!-->
        <li><a href="sale.php"><b style="font-weight: 900;">Sale</b></a></li>
      </ul>
    </nav>
    <!-- THIS IS WHERE THE LOGOS COME-IN-->
    <ul class="nav_icons">
      <li><a href="login.php"><i class="fa-solid fa-user"></i></a></li>

      <li class="dropdown" id="search-section">
        <a href="#" class="dropbtn"><i class="fa-solid fa-magnifying-glass"></i></a>
        <div class="dropdown-content" id="searchbar">
          <form method="post" id="search-form">
            <input type="text" name="search" id="search-input" placeholder="TYPE HERE" onkeyup="showResults(this.value)">
          </form>
          <div id="search-results"></div>
        </div>
      </li>


      <li><a href="cart.php"> <i class="fa-solid fa-bag-shopping"></i></a></li>
    </ul>
  </header>

  <br>
  <div class="absolute-center">
    <div class="spotlight-header-container">
      <span class="spotlight-header">
        SALE
      </span>
    </div>
  </div>


  <br>
  <?php
  include 'dbcon.php';
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT Product_Id, Name, Description, Price, Image, Sale FROM product WHERE Sale =  1";
  $result = $conn->query($sql);

  $items = [];
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $items[] = $row;
    }
  } else {
    echo "No items found.";
  }
  $conn->close();
  ?>

  
  <div class="Absolute-Center">
    <div class="slideshow-container">
      <?php foreach ($items as $index => $item) : ?>
        <div class="mySlides fade">
          <br>
          <a src= "product.php?id=<?php echo $item['Product_Id'] ?>">
            <img src="<?php echo $item['Image']; ?>" class="slide-img">
          </a>
          <br>
          <span class="text-header"><?php echo $item['Name']; ?></span>
          <div class="text">
            <?php echo $item['Description']; ?>
            <br>
            <?php echo '<s>' . 'R' . $item['Price'] . '</s>' ?>
            <br>
            <?php echo '<b>' . 'NOW: R' . $item['Price'] - ($item['Price'] * 0.15) . '</b>' ?>
            <div class="discount-badge">15% OFF</div>
          </div>

        </div>
      <?php endforeach; ?>

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
  </div>


  <script defer src="slideshow.js"></script>


  <br>
  <br>
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
  </div>
  </div>

  <script defer src="search.js"></script>
</body>

</html>