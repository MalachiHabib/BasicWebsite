<?php require_once "header.php"; ?>
<?php
require_once "DBFunctions.php";

$shoppingCart = new ShoppingCart();
$cust_id = $shoppingCart->getNewCustId($new_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Brayden Fulwood">
    <link href="styles\styleProductsShoppingCartFAQ.css" type="text/css" rel="stylesheet" />
</head>

<body class = "checkout">
    <div class = "checkout_container">
        <h1 id = "H1_Checkout">Checkout</h1>
        <h2 id = "H2_Checkout">Please fill out the following information</h2>
        <form action = "invoice.php" method = "POST">
            <h3 id = "H3_Checkout">1. Invoice Details</h3>
            <div class = "half_page">
                <lable>First Name</lable>
                <input input type="text" name="fname" id="fname" onkeydown="return /[a-z, ]/i.test(event.key)" required/>
            </div>
            <div class = "half_page">    
                <lable>Last Name</lable>
                <input input type="text" name="lname" id="lname" onkeydown="return /[a-z, ]/i.test(event.key)" required/>
            </div>
            <div class = "full_page">    
                <lable>Email</lable>
                <input input type="email" name="email" id="email" required/>
            </div>
            <div class = "full_page">    
                <lable>Phone Number</lable>
                <input input type="tel" name="pnumber" id="pnumber" maxlength="10" minlength="8" required/>
            </div>

            <h3 id = "H3_Checkout">2. Payment Details</h3>
            <div class = "full_page">    
                <lable>Card Name</lable>
                <input input type="text" name="ccname" id="ccname" required/>
            </div>
            <div class = "half_page">    
                <lable>Card Number</lable>
                <input input type="tel" name="ccnumber" id="ccnumber" maxlength="16" placeholder="xxxx xxxx xxxx xxxx" required/>
            </div>
            <div class = "one_quater_page">    
                <lable>Valid Thru</lable>
                <input input type="text" name="valid_thru" id="valid_thru" maxlength="4" placeholder="MMYY" required/>
            </div>
            <div class = "one_quater_page">    
                <lable>CVV</lable>
                <input input type="text" name="cvv" id="cvv" maxlength="3" placeholder="123" required/>
            </div>
            <div class = "submit">
                <input type="submit" class = "otherbtn" name ="submit" value="Checkout"/>
            </div>
            <input type = "hidden" name = "charge" id = "charge" value = "<?php echo "$".$shoppingCart->getTotal($cust_id)[0]["SUM(price)"]; ?>">
        </form>
    </div> 
    <?php require_once "footer.php"; ?>
</body>
</html>
