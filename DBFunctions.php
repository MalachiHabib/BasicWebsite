<?php
require_once "DBHost.php";

class DBFunctions extends DBHOST{
    function Connect(){
        $connect = $this->conn;
        if ($connect == null) {
            new Database();
        }
    }

    //Updates the database with a new SQL statment
    function DBUpdate($stmt, $values = array()){
        $SQL = $this->conn->prepare($stmt);
        if (! empty($values)) {
            $valueType = "";
            foreach ($values as $stmt_value) {
                $valueType .= $stmt_value["valueType"];
            }
            $flexValues[] = & $valueType;
            foreach ($values as $index => $stmt_value) {
                $flexValues[] = & $values[$index]["value"];
            }
            call_user_func_array(array($SQL, 'bind_param'), $flexValues);
        }
        $SQL->execute();
    }

    //Returns values from the database matching the given SQL statment
    function DBReturn($stmt, $values = array()){
        $SQL = $this->conn->prepare($stmt);
        if (! empty($values)) {
            $valueType = "";
            foreach ($values as $stmt_value) {
                $valueType .= $stmt_value["valueType"];
            }
            $flexValues[] = & $valueType;
            foreach ($values as $index => $stmt_value) {
                $flexValues[] = & $values[$index]["value"];
            }
            call_user_func_array(array($SQL, 'bind_param'), $flexValues);
        }
        $SQL->execute();
        $result = $SQL->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultArray[] = $row;
            }
        }
        
        if (! empty($resultArray)) {
            return $resultArray;
        }
    }
}

class ShoppingCart extends DBFunctions{
    //Gets all data for Products from products 
    function getAllProduct(){
        $SQL = "SELECT * FROM products";
        $productResult = $this->DBReturn($SQL);
        return $productResult;
    }

    //Use the cust_id to find which products are in the cart and gets all data for Products from products  
    function getCustCartItem($cust_id){
        $SQL = "SELECT products.*, cart.id AS cart_id FROM products, cart WHERE 
            products.product_id = cart.product_id AND cart.cust_id = $cust_id";
        $cartResult = $this->DBReturn($SQL);
        return $cartResult;
    }

    // Only relavent to the cart.php page
    function getCustCartItemCartPage($cust_id){
        $SQL = "SELECT products.image, products.name, products.price FROM products, cart WHERE products.product_id = cart.product_id AND cart.cust_id = $cust_id";
        $cartResult = $this->DBReturn($SQL);
        return $cartResult;
    }

    //Gets all data for Product from products matching the given planrt_type
    function getProductByType($planet_type){
        $SQL = "SELECT * FROM products WHERE planet_type = ?";
        $parameters = array(array("valueType" => "s", "value" => $planet_type));
        $Result = $this->DBReturn($SQL, $parameters);
        return $Result;
    }

    //Gets all data for Product from products matching the given name
    function getProductByName($name){
        $SQL = "SELECT * FROM products WHERE name = ?";
        $parameters = array(array("valueType" => "s", "value" => $name));
        $Result = $this->DBReturn($SQL, $parameters);
        return $Result;
    }
    
    //Gets one Products data that matches the product_id from the cart matching the cust_id
    function getCartItemByProductID($product_id, $cust_id){
        $SQL = "SELECT * FROM cart WHERE product_id = $product_id AND cust_id = $cust_id";
        $cartResult = $this->DBReturn($SQL);
        return $cartResult;
    }

    //Adds a Product to the current customers cart according to thier cust_id 
    function addToCart($product_id, $cust_id){
        $SQL = "INSERT INTO cart (product_id,cust_id) VALUES ($product_id, $cust_id)";
        $this->DBUpdate($SQL);
    }

    //deletes a cart item matching the cart_id 
    function deleteCartItem($cart_id){
        $SQL = "DELETE FROM cart WHERE id = $cart_id";
        $this->DBUpdate($SQL);
    }

    //deletes all cart items for the given cust_id
    function emptyCart($cust_id){
        $SQL = "DELETE FROM cart WHERE cust_id = $cust_id";
        $this->DBUpdate($SQL);
    }

    //returns the next available cust_id that can be used
    function getNewCustId(){
        $SQL = "SELECT cust_id FROM cust_info";
        $result = $this->DBReturn($SQL);
        if(!empty($result)){
            return (sizeof($result)) + 1;
        }
        else{
            return 1;
        }
    }
    //gets the total price of the cart for the given cust_id
    function getTotal($cust_id){
        $SQL = "SELECT SUM(price) FROM products WHERE product_id IN (SELECT product_id FROM cart WHERE cust_id = $cust_id)";
        $result = $this->DBReturn($SQL);
        return $result;
    }

    //Counts how many items are in the cart
    function countCartTotal($cust_id){
        $SQL = "SELECT * FROM cart WHERE cust_id = $cust_id";
        $result = $this->DBReturn($SQL);
        if(!empty($result)){
            return (sizeof($result));
        }
        else{
            return 0;
        }
    }

    // Adds Customer Information to the database on the invoice page
    function addCustInfo($cust_id, $fname, $lname, $email, $pnumber){
        $SQL = "INSERT INTO cust_info (cust_id,fname,lname,email,pnumber) VALUES (?, ?, ?, ?, ?)";
        $parameters = array(array("valueType" => "i", "value" => $cust_id),
                            array("valueType" => "s", "value" => $fname),
                            array("valueType" => "s", "value" => $lname),
                            array("valueType" => "s", "value" => $email),    
                            array("valueType" => "i", "value" => $pnumber)
                        );
        $this->DBUpdate($SQL, $parameters);
    }

    // Adds Transaction Information to the database on the invoice page
    function addTransInfo($cust_id, $ccname, $ccnumber, $valid_thru, $cvv, $charge){
        $SQL = "INSERT INTO transaction_history (cust_id,ccname,ccnumber,valid_thru,cvv,charge) VALUES (?, ?, ?, ?, ?, ?)";
        $parameters = array(array("valueType" => "i", "value" => $cust_id),
                            array("valueType" => "s", "value" => $ccname),
                            array("valueType" => "i", "value" => $ccnumber),
                            array("valueType" => "i", "value" => $valid_thru),    
                            array("valueType" => "i", "value" => $cvv),
                            array("valueType" => "s", "value" => $charge)
                        );
        $this->DBUpdate($SQL, $parameters);
    }
}  
?>