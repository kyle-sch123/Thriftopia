<?php 
include("dbcon.php");
$sql ="CREATE TABLE IF NOT EXISTS user(User_ID int, User_name VARCHAR(350), Email VARCHAR(450), Password VARCHAR(350), Shipping_Address VARCHAR(500), UserType VARCHAR(20))";
mysqli_query($conn, $sql);


$sql= "INSERT IGNORE INTO `user` (`User_ID`, `User_name`, `Email`, `Password`, `Shipping_Address`, `UserType`) VALUES ('1', 'Kyle_Sch', 'kyleschaffner39@gmail.com', 'password123', '249 Brian Ellwood Street', 'Admin'), ('2', 'Albert_Hof', 'ChemDaddy@yahoo.com', 'lysergic_acid_diethylamide1938', 'Sandoz Laboratories ', 'Buyer');";
mysqli_query($conn, $sql);  
    
mysqli_close($conn);
?>