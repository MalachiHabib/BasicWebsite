
<?php require_once "header.php"; ?>
<?php
require_once "DBFunctions.php";
$shoppingCart = new ShoppingCart();

// Gets new Customer ID
$cust_id = $shoppingCart->getNewCustId($new_id);

if (! empty($_GET["action"])) {
    // Delete single entry from the cart
    if ($_GET["action"] = "remove") {
        $shoppingCart->deleteCartItem($_GET["id"]);
    }
}

?>
<HTML>
<HEAD>
<TITLE>Planets</TITLE>
<link rel="stylesheet" href="styles/styleProductsShoppingCartFAQ.css"/>
</HEAD>
<BODY class = "CartBody">
    <div id = "CartContent">
    <div id="Cart">
        <div class="CartHeader">
            <div class="CartTitle">Cart Summary</div>
        </div>
        <?php $cartItem = $shoppingCart->getCustCartItem($cust_id);
        if (! empty($cartItem)) { ?>	
            <table cellpadding="10" cellspacing="0">
                <tbody>
                    <tr>
                        <th id = "left">Product</th>
                        <th></th>
                        <th id = "centre">Remove From Cart?</th>
                        <th id = "centre">Price</th>
                    </tr>	
                    <?php foreach ($cartItem as $item) { ?>
				        <tr>
                            <td id = "left"><img src = "<?php echo $item["image"]; ?>"></td>
                            <td id = "left"><?php echo $item["name"]; ?></td>
                            <td id = "centre"><a href="ShoppingCart.php?action=remove&id=<?php echo $item["cart_id"]; ?>" class="RemoveItem">Remove</a></td>
                            <td id = "centre"><?php echo "$".$item["price"]; ?></td>
                        </tr>
				    <?php 
                    } 
                    ?>
                    <tr>
                        <td colspan="4" align=right><?php echo "Total:  $".$shoppingCart->getTotal($cust_id)[0]["SUM(price)"]; ?></td>
                    </tr>
                </tbody>
            </table>		
        <?php 
        } 
        ?>
    </div>
    <div id = "buttons">
        <form action = "ProductPageMercury.php" method = "POST">
            <div id = "ToProducts">
                <input type="submit" class = "otherbtn" name="submit" value="Back to product"/>
            </div>
        </form>
        <?php if(! empty($shoppingCart->getCustCartItem($cust_id))){?>
            <form action = "checkout.php" method = "POST">
                <div id = "ToCheckout">
                    <input type="submit" class = "otherbtn" name="submit" value="To Checkout"/>
                </div>
            </form>
        <?php } ?>
    </div>
    </div>
    <?php require_once "footer.php"; ?>
</BODY>
</HTML>
