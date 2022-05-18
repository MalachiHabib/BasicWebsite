<?php
require_once "DBFunctions.php";
$shoppingCart = new ShoppingCart();

$cust_id = $shoppingCart->getNewCustId($new_id);

// Adds Information to the database
if (isset($_POST['submit'])) {
    // Checks if cart has items
    if (! empty($shoppingCart->getCustCartItem($cust_id))){
        //Adds customer information
        $shoppingCart->addCustInfo($cust_id, $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['pnumber']);
        //Adds transaction information
        $shoppingCart->addTransInfo($cust_id, $_POST['ccname'], $_POST['ccnumber'], $_POST['valid_thru'], $_POST['cvv'], $_POST['charge']);
        //empties cart for current cust_id
        $shoppingCart->emptyCart($cust_id);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Invoice</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Brayden Fulwood">
    <link rel='stylesheet' href='styles\styleProductsShoppingCartFAQ.css' />
</head>
<body class = "checkout">
    <div class = "invoice_container">
        <h1>Thank you for your purchase</h1>
        <form action = "storefront/headerfooter.php" method = "get">
            <div>
                Your purchase has been processed, and a confirmation email will be sent to <?php echo $_POST['email']; ?>. 
                If you have any questions reguarding your purchase, please <a href="storefront/account.php">contact us.</a>
            </div>
            <div class = "submit">
                <input type="submit" class = "otherbtn" value="Return Home"/>
            </div>
        </form>
    </div>
</body>
</html>
