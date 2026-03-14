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
/* SQL query to return categories and query the database */
$allcategoriesquery = "SELECT CategoryId, CategoryName FROM categories";
$allcategoriesresult = mysqli_query($con, $allcategoriesquery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main</title>
    <link href="style.css" rel="stylesheet">

    <!-- following code is from www.w3schools.com that creates my photo slideshow -->
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }
    </script>
</head>
<body>
<div class="container">
    <div class="banner"><h1>WGC Canteen</h1></div>
    <div class="nav">
        <a href="main.php">Main</a>
        <a href="products.php">Products</a>
        <a href="specials.php">Weekly Specials</a>
    </div>

    <div class="filter">
            <!-- Dropdown Categories form -->
            <form name="categories_form" id="categories_form" method="get" action="products.php">
                <select name="category_sel" id="category_sel">
                    <!-- Options -->
                    <?php
                    /* Display the query results into an option tag */
                    while($all_categories_record = mysqli_fetch_assoc($allcategoriesresult)){
                        echo "<option value='".$all_categories_record['CategoryId']."'>";
                        echo $all_categories_record['CategoryName'];  // Show the category name in the option
                        echo "</option>";
                    }
                    ?>
                    </select>
                    <!-- Show categories button -->
                    <input type="submit" name="category_button" value="Show products"/>
                </form>
            </div>

    <!-- Slideshow container (also from www.w3schools.com)-->
    <div class="gallery">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="images/chickenwrap.jpg" style="width:100%" alt="Product 1">
        </div>
        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="images/upandgo.jpg" style="width:100%" alt="Product 2">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="images/apple.jpg" style="width:100%" alt="Product 3">
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <div class="about">
        <h2>About Us</h2>
        <p>Welcome to the Wellington Girls’ College Canteen website. On here you can find information about all the different products we sell. This includes their prices, ingredients and extra dietary information. Our goal is to provide healthy and inclusive food options in order to cater to as many special dietary needs as possible. We sell vegan, nut free and gluten free options to make sure all students have food available to them. All of our products are priced below $5 to ensure that everyone can afford a some filling lunch. You can also check on our weekly specials page to see which food and drink item is discounted for the current week. If you have any issues or questions please feel free to contact us through one of the links below. </p>
    </div>

    <div class="footer">
        <p>Location: Pipitea Street, Thorndon, Wellington <br> Opening hours: 9am - 4pm Mon - Fri<br> Phone number: <a href="tel:0273603716">0273603716</a><br><br>
            Images sourced from: <a href="https://www.coca-colajourney.co.nz/">Coca-Cola</a> / <a href="https://www.sanitarium.co.nz/">Sanitarium</a> /
            <a href="https://bluebird.co.nz/">Bluebird</a> / <a href="https://www.freepik.com/">Freepik</a></p>
    </div>
</div>
</body>
</html>