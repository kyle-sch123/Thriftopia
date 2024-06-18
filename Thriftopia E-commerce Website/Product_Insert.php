<?php
include("dbcon.php");
$sql ="DELETE FROM product";
mysqli_query($conn, $sql);
$sql = "CREATE TABLE IF NOT EXISTS product(
      Product_ID int,
      Name VARCHAR(350),
      Description VARCHAR(500),
      Price int,
      Image VARCHAR(350)
  )";
mysqli_query($conn, $sql);

$sql = "INSERT INTO product( Product_ID, Name, Description, Price, Image) 
            VALUES 
            (01,
            'Gucci Black Dress',
            'A small exotic black dress that will give the wearer unfathomable confidence and an endless supply of cooch',
            '175',
            'images/i4.jpg'
            ),
            (02,
            'Brown Puffer Jacker',
            'A brown puffer jacket that survived the first world war, and the cootch flood of 07',
            '258',
            'images/i20.jpg'
            ),
            (03,
            'White Maxi Dress',
            'Made from the finest of cotton sourced from across the land, only picked by the finest of hands and blessed with the prairs of a local priest',
            '150',
            'images/i2.jpg'
            ),
            (04,
            'Opelz Orange Dress',
            'The wearer of this dress will be granted Opelz blessing, providing a charisma and intelligence buff.',
            '140',
            'images/n1.jpg'

            ),
            (05,
            'Baby Blue Top',
            'Legend says that the top was originally white but the tears of a thousand orphans turned it blue!',
            '140',
            'images/n2.jpg'
            ),
            (06,
            'Blue Jeans',
            'Somewhere during the course of human evolution, people have prefered to wear cloths with holes and tears in it. And this jean perfectly represents it.',
            '200',
            'images/n3.jpg' 
            ),
            (07,
            'Black Addidas Golf Tee',
            'Quite ironic piece of clothing; Made from the hands of poverty to be wore by royalty.',
            '180',
            'images/n4.jpg'
            ),
            (08,
            'Pink Nike Compression Shirt',
            'Use what your mama gave ya! Typically worn by hot yoga moms.',
            '195',
            'images/n5.jpg'
            ),
            (09,
            'Brown High Heels',
            'Cinderalla wishes she could wear these daily. It is a personal gaurentee that it will make you feel like a goddess among men.',
            '150',
            'images/n6.jpg'
            ),
            (10,
            'Thriftopia x Ripndip Bracelet',
            'This limited edition bracelet was created with the purpose to defeat thanons, its said that the bracelt offers the wearer even more power than the infinity gauntlet.',
            '350',
            'images/rextra1.jpg'
            ),
            (11,
            'Thriftopia x RipnDip Hoodie',
            'This is totally not an item I stole just to fill the website up with more cool looking stuff.',
            '475',
            'images/n7.jpg'
            ),
            (12,
            'The One Ring',
            'Forged in the fires of mordor, the one ring allows the user to have ultimate control over all the other rings! And with the power of the nerm it can conquer middle earth!',
            '420',
            'images/n8.jpg'
            ),

            (13,
            'Nerm Hookah',
            'This cool ass physcedelic garden hookah set isnt available in our country. And it makes me sad.',
            '569',
            'images/n11.jpg'
            ),

            (14,
            'Nerm Alien Deck',
            'This shit was crafted by the most powerful nerm around... J-nerm infused it with the essence of skate to ensure that the riders is always tubular.',
            '669',
            'images/n10.jpg'
            ),

            (15,
            'Lord Nermal Lighter Cover',
            'Giver of light, taker of fright',
            '388',
            'images/n12.jpg'
            ),

            (16,
            'Brown Cord Jack',
            'Some might say, that this item turns you gay, others will ponder, if thats maybe the play... but still just know, cordiroy is fosho!',
            '350',
            'images/i5.jpg'
            ),

            (
            17,
            'Lord Alien Flippy Knitty Sweater (Black)',
            'Pump Powered Middle Fingers, there is actually a little hand pump located in the sweater sleave... unironnically making it one of the best sweaters you will ever see!',
            '1550',
            'images/l1.jpg'
            ),
            
            (
             18,
            'IS THIS REAL LIFE SWEATPANTS (BLACK)',
            'What I feel is nothing, No sorrow, no happiness, No fear, no comfort, Yet I smile and let it phase, Into an emotionless state.',
            '1880',
            'images/l2.jpg'
            )";

mysqli_query($conn, $sql);
mysqli_close($conn);
