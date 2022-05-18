<!-- Allows use of the DBFunctions.php page to get database results -->
<?php 
error_reporting(0);
require_once "..\DBFunctions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="storefront/style/headerfooterstyle.css">
<meta charset="utf-8"/>
<meta name="author" content="Melanie"/>
<script src="scripts/headerfooterscript.js" defer></script>
<title>|Cosmic Assets|</title>


<div id=productintro>
    <h2>COSMIC ASSETS</h2>
    <p>Because Elon Musk didn't think to do it first</p>
</div>
<?php  require_once "header.php";?>
<body>

<div class="hero-container" id="hero-image-one">
    <div id="hero">
        <h1 class="hero-text">New Product in Soon? </h1>
        <h3 class="hero-text">Project Lucy Launches</h3>
        <a href="https://www.nasa.gov/press-release/nasa-ula-launch-lucy-mission-to-fossils-of-planet-formation/" >
        <button class="slideshowbtn" id="read-more">Read More!</button></a>
    </div>
</div>

<div class="filter-options-one">
	<div class="SortByPrice">
        <b class="filter-title">Sort by Price</b>
    <div class="low">
        
        <label id="lowrange">low
	    <div class="priceSlider">
	        <input type="range" class="priceRange" min="0" max="100" value="0">
	    </div>
		<div class="value"></div></label>
	</div>   
    
    <div class="high">
        <label id="highrange">high 
	    <div class="priceSlider">
	        <input type="range" class="priceRange" min="0" max="10000000" value="10000000">
	    </div>
		<div class="value"></div></label>
	</div> 

    <a href="#"><button class="otherbtn" id="PriceSort">Sort by Price</button></a>
    </div>    
</div>
    <div class="filter-options-two">
    <div class=sortByType>
        <b class="filter-title">Sort by Type</b>
        <div id= "toprow">
        <label class="sortcheckbox">
        <input type="radio" name="rbutton" id="Rock-Planet">
        <span class="radio_class"></span>Rock Planet
        </label>
        <label class="sortcheckbox">
        <input type="radio" name="rbutton" id="Gas-Giant">
        <span class="radio_class"></span>Gas Giant
        </label>
        </div>
        <div id= "bottomrow">
            <label class="sortcheckbox">
            <input type="radio" name="rbutton" id="Ice-Giant">
            <span class="radio_class"></span>Ice Giant
            </label>
            <label class="sortcheckbox">
            <input type="radio" name="rbutton" id="Dwarf-Planet">
            <span class="radio_class"></span>Dwarf Planet
            </label>
        </div>       
    </div>
    <a href="#"><button class="otherbtn" id="TypeSort">Sort by Type</button></a>
</div>
<div class="product-line">
    <?php 
    //Gets the product information for all products in the database
    $products = $shoppingCart->getAllProduct();
    if(!empty($products)){

        //Creates a product-box foreach product 
        foreach ($products as $index){ ?>

            <div class="product-box">
                <p class="product-title"><span class="product-name"><?php echo $index["name"]; ?></span> | <span class="product-price"><?php echo "$".$index["price"]; ?></span></p>
                <div class="product-image" id="<?php echo "homepage-photo-".$index["name"];?>"></div>
                <a href= "../ProductPageMercury.php"><button class="seemorebtn" id="checkout-Jupiter">See More</button></a>
            </div>

    <?php
        }
    }
    ?>
</div>

<?php  require_once "footer.php";?>
</body>
</html>
