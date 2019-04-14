<?php 
  session_start();
  include('db-connect.php');
    $email= $_SESSION['Email'];
    $sql= "SELECT * FROM Cart_Entry WHERE useraccount_Email='$email'"; //query all the products that are assigned to the users seession cart
    $results = mysqli_query($db, $sql);
    //$_SESSION['noDollar']= $_POST['noDollar'];
    $noDollar_total=$_SESSION['noDollar'];
    $payed=0;
  //echo $noDollar_total;

//create an order 
date_default_timezone_set('EST');
$today = date("Y-m-d H:i:s");
$sqlInsert = "INSERT INTO `Capstone`.`Order` (OrderID, useraccount_Email, Total, DateTime, Payed) values (default, '$email', '$noDollar_total', '$today', '$payed' )";
mysqli_query($db, $sqlInsert);
//foreach item in the array take it out of the cart entry and add it to the order entry
  foreach($_SESSION['cart_array'] as $each_item)
    {
        $product_id = $each_item['product_id'];
        $sql = "SELECT * FROM Cart_Entry WHERE useraccount_Email = '$email' && Products_ProductID = '$product_id'";
        $result = mysqli_query($db, $sql);

        while($row = mysqli_fetch_array($result))
        {
            $userEmail = $row["useraccount_Email"];
            $cartProdID = $row["Products_ProductID"];
            $quantity = $row["Quantity"];
        }
//THIS PART WORKS NOW
        //decrease inventory
        $sqlQuantity = "SELECT UnitsInStock FROM Products WHERE ProductId= '$product_id'";
        $getQuantity = mysqli_query($db, $sqlQuantity);

        while($row = mysqli_fetch_array($getQuantity))
        {
            $tempQuantity= $row["UnitsInStock"];
            //if the quantity in stock is 0 or 1 then throw error
        }
        //new quantity that will be updated
        echo $tempQuantity;
        $newQuantity = $tempQuantity- $quantity;
        echo $newQuantity;
        $sqlUpdate = "UPDATE Products SET UnitsInStock= '$newQuantity' WHERE ProductID = '$product_id'";
        mysqli_query($db, $sqlUpdate);


        //MOVE THE CART ENTRY TO THE ORDER ITEM 
        //add the cart_Entry items to order entry 
        //order entry has Order_OrderID
            //get the order number
            $orderNumber= "SELECT OrderID FROM `Order` WHERE useraccount_Email= '$email'";
            $getOrderNumber = mysqli_query($db, $orderNumber);
            //get the product price
            while($row = mysqli_fetch_array($getOrderNumber))
            {
                $orderID= $row["OrderID"];
               
            }
            echo $orderID;
            $productPrice = "SELECT Product_UnitPrice FROM Products WHERE ProductID ='$product_id'";
            $getProductPrice = mysqli_query($db, $productPrice);

            while($row = mysqli_fetch_array($getProductPrice))
            {
                $product_price= $row["Product_UnitPrice"];
               
            }
            $sqlMove = "INSERT INTO Order_Items (Order_OrderID, Products_ProductID, Quantity, Price) 
                        VALUES ('$orderID', '$product_id', '$quantity', '$product_price')";
            mysqli_query($db, $sqlMove);

//THIS ONE WORKS    
        //remove the items from cart entry
       $delete_CartEntry = "DELETE FROM Cart_Entry WHERE useraccount_Email= '$email' AND Products_ProductID='$product_id'";
      mysqli_query($db, $delete_CartEntry);



    }//end for each loop 

    unset($_SESSION['cart_array']);
   //unset the cart array
    
?>





<!DOCTYPE html>
<html lang="en">
<?php  
    echo($_SESSION['Email']);
    error_reporting(0); 
?>

<?php
require_once("header.php");
?>

<body style="background-image: url(/photos/dust_scratches.png)" class="body-font">

    <header class="bg-light " style="background-image: url(/photos/dust_scratches.png)">
        <div class="container " style="text-align:center;">
            <br>
            <h1 class="header-large" >Clover Cottage Creations</h1>

            <br>
        </div>

    </header>


    <?php
   if($_SESSION['Email']== "thomas.soliday@gmail.com")
   {
       require_once("admin-nav-logout.php");
   }
   else{
       if(isset($_SESSION['Email'])){
           require_once("logout-header.php");
           }else{  
           require_once("login-header.php");
           }
   }
    ?>
    <main>
        <br>
        <div class="container">
            <div class="jumbotron jumbotron-tax" style="background-color:#abcbea; color:#04080F; ">
                <h1 style="text-align:center">
                    Finish your order!
                </h1>
                <p style="text-align:center"> Your order has been placed. Please click the paypal button and finish your order.</p>

                <div style="text-align:center;">
                    <?php $cart="This is your cart from the website" ?>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="thomas.soliday@gmail.com">
                        <input type="hidden" name="lc" value="US">
                        <input type="hidden" name="item_name" value="Cart Items">
                        <input type="hidden" name="amount" value="<?php echo $noDollar_total ;?>">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="button_subtype" value="services">
                        <input type="hidden" name="no_note" value="0">
                        <input type="hidden" name="cn" value="Add special instructions to the seller:">
                        <input type="hidden" name="no_shipping" value="2">
                        <input type="hidden" name="tax_rate" value="5.000">
                        <input type="hidden" name="shipping" value="5.00">
                        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif"
                            border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1"
                            height="1">
                    </form>
                </div>
            </div>
        </div>
    </main>
    <button onclick="topFunction()" id="myBtn" class="mybtn" title="Go to top">Top</button>
</body>

<?php include_once("footer.php");?>

</html>

