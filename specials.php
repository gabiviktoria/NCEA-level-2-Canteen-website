<?php
/* Connect to the database */
$con = mysqli_connect("localhost", "esguerraga", "muddywish42", "esguerraga_canteen");

/* If connection fails, exit nicely */
if ($con == NULL) {
    echo "Failed to connect to MySQL:";
    exit();
} else {
    echo "Connected to database";
}

/* SQL query to return all meals and query the db */
$specialsquery = "SELECT products.ProductId, specials.SpecialPrice, ProductName, Dietary, Ingredients, Image FROM products, specials
WHERE products.ProductId = specials.ProductId 
AND CURDATE() between StartDate and EndDate
AND statusId = 1";
$specialsqueryresult = mysqli_query($con, $specialsquery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Specials</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="banner"><h1>Weekly Specials</h1></div>
    <div class="nav">
        <a href="main.php">Main</a>
        <a href="products.php">Products</a>
        <a href="specials.php">Weekly Specials</a>
    </div>

    <div class="product">
        <?php
        if ($row = mysqli_fetch_array($specialsqueryresult) < 1) { /* If there are no results found */
            echo "<em>"."It's the weekend right now. Please check in again on monday for the new weekly specials.". "</em>";
            }
            else {   /* fetch the result */
                while ($row = mysqli_fetch_array($specialsqueryresult)) {
                    foreach ($specialsqueryresult as $row) {
                        echo"<div class='image'><img src='images/". $row['Image'] ."'/></div>";
                        echo"<div class='productinfo'><a><em>". $row['ProductName']. "<br>". $row['Dietary']. "<br>$". $row['SpecialPrice'] ."</em></a></div>";
                        echo"<div class='ingredients'><p>Ingredients: <em>". $row['Ingredients'] ."</em></p></div>";
                    }
                }
            }
            ?>
        <br></div>
    </div>

    <div class="footer">
        <p>Location: Pipitea Street, Thorndon, Wellington <br> Opening hours: 9am - 4pm Mon - Fri<br> Phone number: <a href="tel:0273603716">0273603716</a><br><br>
            Images sourced from: <a href="https://www.coca-colajourney.co.nz/">Coca-Cola</a> / <a href="https://www.sanitarium.co.nz/">Sanitarium</a> /
            <a href="https://bluebird.co.nz/">Bluebird</a> / <a href="https://www.freepik.com/">Freepik</a></p>
    </div>
</body>
</html>