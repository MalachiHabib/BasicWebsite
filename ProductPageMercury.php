<?php error_reporting(0); ?>
<?php require_once "DBFunctions.php"; ?>
<?php
  $shoppingCart = new ShoppingCart();
  $cust_id = $shoppingCart->getNewCustId();
  $products = $shoppingCart->getAllProduct();
  if (! empty($_GET["action"])) {
    if ($_GET["action"] = "add") {
            $cartResult = $shoppingCart->getCartItemByProductID($products[0]["product_id"], $cust_id);
            if ($cartResult === null){
                $shoppingCart->addToCart($products[0]["product_id"], $cust_id);
            }
    }
  }
  ?>
<?php require "header.php"; ?>

<form action = "ProductPageMercury.php?action=add" method = "POST">
<main class="container">

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Product Detail</title>
    <meta charset="UTF-8" />
    <meta name="author" content="">
  </head>
  <h1 id="header"></h1>
  <img name="slide" width="400" height="200">
  <p id="description"></p>

  </div>
  <script>
    var i = 0; // Start Point
    var imagesArray = []; // Images Array
    var nameArray = []; // Name Array
    var descArray = []; // Description Array
    var priceArray = []; //Price Array
    var duration = 3000; // Time Between Switch


    // creates image array
    imagesArray[0] = "https://solarsystem.nasa.gov/system/resources/detail_files/771_PIA16853.jpg";
    imagesArray[1] = "https://solarsystem.nasa.gov/system/resources/detail_files/772_PIA13508_detail.jpg";
    imagesArray[2] = "https://solarsystem.nasa.gov/system/resources/detail_files/773_PIA16388_detail.jpg";


    nameArray[0] = "<?php echo $products[0]["name"]; ?>";
    nameArray[1] = "<?php echo $products[0]["name"]; ?>";
    nameArray[2] = "<?php echo $products[0]["name"]; ?>";


    descArray[0] = "<?php echo $products[0]["description"]; ?>";
    descArray[1] = "Yes Murcury, very cool";
    descArray[2] = "Buy this now";


    priceArray[0] = "<?php echo $products[0]["price"]; ?>";
    priceArray[1] = "<?php echo $products[0]["price"]; ?>";
    priceArray[2] = "<?php echo $products[0]["price"]; ?>";

    // change image function
    function slideShow() {
      document.slide.src = imagesArray[i];
      document.getElementById("header").textContent = nameArray[i];
      document.getElementById("description").textContent = descArray[i];
      document.getElementById("price").textContent = "$ " + priceArray[i];

      // Check If Index Is Under Max
      if (i < imagesArray.length - 1) {
        // Add 1 to Index
        i++;
      } else {
        // Reset Back To O
        i = 0;
      }

      // Run function every x seconds
      setTimeout("slideShow()", duration);
    }

    // Run function when page loads
    window.onload = slideShow;
  </script>

  <!-- Product Pricing -->
  <div class="product-price">
    <p id="price"></p>
    <input type="submit" class = "otherbtn" name="submit" value="Add to Cart"/>
  </form>
  <form action = "storefront/headerfooter.php" method = "POST">
                <div id = "To Home Page">
                    <input type="submit" class = "otherbtn" name="submit" value="To Home Page"/>
                </div>
  </form>
</main>
  
<?php require "footer.php"; ?>
