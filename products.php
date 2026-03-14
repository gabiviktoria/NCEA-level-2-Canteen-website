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
/* Get from the category id from main page else set as meals */
if(isset($_GET['category_sel'])) {
    $category_id = $_GET['category_sel'];
} else {
    $category_id = 1;
}

/* SQL query to return products in the same category */
$productsquery = "SELECT ProductId, categories.categoryId, ProductName, ProductPrice, Dietary, Ingredients, Image 
FROM products, categories 
WHERE categories.categoryId = '" .$category_id . "'
AND products.categoryId = categories.categoryId
AND statusId = 1";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="banner"><h1>Products</h1></div>
    <div class="nav">
        <a href="main.php">Main</a>
        <a href="products.php">Products</a>
        <a href="specials.php">Weekly Specials</a>
    </div>

    <div class="filter">
        <!--Form for user to input text and search for a product-->
        <form action="?" method="post">
            <input type="text" name="search">
            <input type="submit" name="submit" value="Search">
        </form>
    </div>

    <!--Print search result is search form was used or default print products in given category-->
    <div class="product">
        <?php
        if(isset($_POST['search'])){
            $search = $_POST['search'];

            /* SQL Query to return products of similar text and query the db */
            $search_query = "SELECT * FROM products WHERE products.ProductName LIKE '%$search%'";
            $search_result = mysqli_query($con, $search_query);
            $search_records = mysqli_num_rows($search_result);

            /* If there are no results found */
            if($search_records == 0){
                echo "There was no results found!";
            } else {    /* Print all results found */
                while ($result_row = mysqli_fetch_array($search_result)) {
                    foreach ($search_result as $result_row) {
                        echo "<div class='image'><img src='images/" . $result_row['Image'] . "'/></div>";
                        echo "<div class='productinfo'><a><em>" . $result_row['ProductName'] . "<br>" . $result_row['Dietary'] . "<br>$" . $result_row['ProductPrice'] . "</em></a></div>";
                        echo "<div class='ingredients'><p>Ingredients: <em>" . $result_row['Ingredients'] . "</em></p></div>";
                    }
                }
            }
        } else { /* If there are no results found */
            $productsqueryresult = mysqli_query($con, $productsquery);
            if ($row = mysqli_fetch_array($productsqueryresult) < 1) {
                echo "<em>" . "No products available at the moment." . "</em>";
            }
            else { /* fetch the result */
                while ($row = mysqli_fetch_array($productsqueryresult)) {
                    foreach ($productsqueryresult as $row) {
                        echo"<div class='image'><img src='images/". $row['Image'] ."'/></div>";
                        echo"<div class='productinfo'><a><em>". $row['ProductName']. "<br>". $row['Dietary']. "<br>$". $row['ProductPrice'] ."</em></a></div>";
                        echo"<div class='ingredients'><p>Ingredients: <em>". $row['Ingredients'] ."</em></p></div>";
                    }
                }
            }
        }
        ?><br>
        </div>
</div>

<div class="footer">
    <p>Location: Pipitea Street, Thorndon, Wellington <br> Opening hours: 9am - 4pm Mon - Fri<br> Phone number: <a href="tel:0273603716">0273603716</a><br><br>
        Images sourced from: <a href="https://www.coca-colajourney.co.nz/">Coca-Cola</a> / <a href="https://www.sanitarium.co.nz/">Sanitarium</a> /
        <a href="https://bluebird.co.nz/">Bluebird</a> / <a href="https://www.freepik.com/">Freepik</a></p>
</div>
</body>
</html>