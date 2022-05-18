<?php 
require_once "..\DBFunctions.php";
error_reporting(0);

//Allows use of ShoppingCart functions inside the DBFunctions.php page
$shoppingCart = new ShoppingCart();

//Finds the next available cust_id that can be used and 'assigns' it to this customer
$cust_id = $shoppingCart->getNewCustId();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/headerfooterstyle.css?v=<?php echo time(); ?>">
    <script src="scripts/headerfooterscript.js" defer></script>
    <title>HEADER</title>
</head>
<body>
    
<nav id="dropdownnav">   

        <div class="dropdown">
        <button onclick="info()" class="dropdownbtn">Info</button>
            <div id="buttonTwo" class="ddcontent">
            <a href="RefundsandReturns.php" class="dropdownitem" id="returns-refunds">Returns + Refunds</a>
            <a href="FAQ.php" class="dropdownitem" id="faq">FAQ's</a>
            <a href="privacypolicy.php" class="dropdownitem" id="privacypolicy">Privacy Policy</a>
            </div>
        </div>

        <div class="dropdown">
        <button onclick="shopBy()" class="dropdownbtn">Shop By</button>
            <div id="buttonThree" class="ddcontent">
            <a href="headerfooter.php" class="dropdownitem" id=find-a-planet>Find a Planet</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="account.php"><button class="otherbtn" id="account">Account</button></a>
        </div>

        <div class="dropdown">
            <button onclick="Cart()" class="cartbtn" id="shopping-cart"><span class="cart-text"><span class="cart">Cart</span> <span class="item-count"> <?php echo "( ".$shoppingCart->countCartTotal($cust_id)." )";?> </span></span> </button>
            <div id="buttonFour" class="ddcontent-cart">
                <div id="cart-content">
                    <span id="pop-checkoutbtn"><a href ="..\ShoppingCart.php"><button class="checkoutbtn" id="checkout">To Cart</button></a></span>
                    <?php
                    //Gets all product information for the products that are in the customers cart (based on their cust_id)                 
                    $cartItem = $shoppingCart->getCustCartItem($cust_id);

                    //Only executes if the cart is not empty
                    if (! empty($cartItem)) { ?>
                        <table cellpadding="8" cellspacing="0">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>

                            <!-- for loop runs through each product in the cart -->
                            <?php foreach ($cartItem as $item) { ?>
				                <tr>
                                    <td><img src = "<?php echo "..\\".$item["image"]; ?>"></td>
                                    <td><?php echo $item["name"]; ?></td>
                                    <td><?php echo "$".$item["price"]; ?></td>
                                </tr>
				            <?php } ?>
                        </table>
                    <?php } ?> 
                </div>
            </div>
        </div>
</nav>
</head>
</body>
</html>