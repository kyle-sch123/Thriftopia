<?php
include("dbcon.php");

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    $sql = "SELECT Product_id, name FROM product WHERE name LIKE '%$query%' LIMIT 10";  // Adjust table and field names as necessary
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['Product_id'];
            $product_name = $row['name'];
            echo "<a href='product.php?id=$id' class='search-results'>$product_name</a><br>";
        }
    } else {
        echo "No results found.";
    }
}
