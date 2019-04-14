<?php
include('db-connect.php');

//echo $_SESSION['Email'];
error_reporting(E_ALL);
if(isset($_POST['pid']))
{
    echo "hello does this print";
}


ini_set('display_errors', '1');



?>
<?php


//start the cart and add a product to the cart
if(isset($_POST['pid']))
{
    $pid= $_POST['pid'];
    $found = false;
    $i = 0;
    $email= $_SESSION['Email'];

    //if the cart is empty or not created then create it
    if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1)
    {
        $_SESSION['cart_array'] = array(0 => array("product_id" => $pid , "quantity" => 1));
        //if they add a product add it to the database with their email and the product ID
        if(isset($_SESSION['cart_array']))
        {
            $queryInst= "INSERT INTO `Capstone`.`Cart_Entry` (useraccount_Email, Products_ProductID, Quantity) values('$email', '$pid', 1)";
            mysqli_query($db, $queryInst);
        }

    }
    else //run if the there at least one product
    {
        foreach($_SESSION["cart_array"] as $each_item)
        {
            $i++;
            while (list($key, $value) = each($each_item))
            {
                if ($key == "product_id" && $value == $pid)
                {
                    array_splice($_SESSION["cart_array"], $i-1, 1, array(array("product_id" => $pid, "quantity" => $each_item['quantity']+1)) );
                    $found=true;
                    //if the product is found then update query and update the quantity for that product
                    if(isset($_SESSION['cart_array']))
                         {
                             //change so once you add the same item it updates the quantity
                            $sql_Insert= "INSERT INTO `Capstone`.`Cart_Entry` (useraccount_Email, Products_ProductID, Quantity) values('$email', '$pid', 1)";
                             mysqli_query($db, $sql_Insert);
                         }

                } //done if
            }//while done
        }//for done
        if($found==false)
        {
            array_push($_SESSION["cart_array"], array("product_id" => $pid, "quantity" => 1));
            if(isset($_SESSION['cart_array']))
        {
            $sql_Insert= "INSERT INTO `Capstone`.`Cart_Entry` (useraccount_Email, Products_ProductID, Quantity) values('$email', '$pid', 1)";
            mysqli_query($db, $sql_Insert);
        }
        }
    }
    header("location: cart-view.php");
    exit();
}

?>



<?php
//empty their cart
$email= $_SESSION['Email'];
if(isset($_GET['empty_cart']) && $_GET['empty_cart'] == "emptycart")
{
    unset($_SESSION["cart_array"]);
    // delete the items from the database wwhere the email equals the session email
    $sql= "DELETE FROM Cart_Entry WHERE useraccount_Email= '$email'";
    mysqli_query($db, $sql);

}

?>

<?php
//adjust the quantity

if(isset($_POST['quantity_adjust']) && $_POST['quantity_adjust'] != "")
{
    $email=$_SESSION['Email'];
    $quantity_adjust = $_POST['quantity_adjust'];
    $quantity = $_POST['quantity'];
    //replace the values to be only numbers to prevent sql injection
    $quantity = preg_replace('/[^0-9]/', '', $quantity);

    //if the quantity is more than 10 replace quantity with 9
    if($quantity >10 )
    {
        $quantity = 9;
    }

    //if the quantity is less than 1 then make it 1
    if($quantity< 1)
    {
        $quantity = 1;
    }

    //if the quantity is nothing then make it 1 again
    if($quantity == "")
    {
        $quantity = 1;
    }

    $i = 0;

    //for each item in the cart adjust the quantity 
    foreach ($_SESSION["cart_array"] as $each_item) { 
        $i++;
        while (list($key, $value) = each($each_item)) {
            if ($key == "product_id" && $value == $quantity_adjust) {
                // That item is in cart already so let's adjust its quantity using array_splice()
                array_splice($_SESSION["cart_array"], $i-1, 1, array(array("product_id" => $quantity_adjust, "quantity" => $quantity)));

                //if they update the quantity in the cart then change the value in the database
                $sqlUpdate= "UPDATE Cart_Entry SET Quantity='$quantity' WHERE useraccount_Email='$email' AND Products_ProductID='$quantity_adjust' ";
                mysqli_query($db, $sqlUpdate);
            } // close if condition
        } // close while loop
    }
} 
    
?>

<?php
//remove the item from the cart

if(isset($_POST['remove_product_id']) && $_POST['remove_product_id'] != "")
{
    $remove_by_id = $_POST['remove_product_id'];
    $email=$_SESSION['Email'];
    //count the items in the array and remove the product by the ID
    if(count($_SESSION['cart_array']) <= 1)
    {
        unset($_SESSION['cart_array']);
        //sql query to get rid of the product in the database
        $sqlDelete="DELETE FROM Cart_Entry WHERE useraccount_Email= '$email' AND Products_ProductID='$remove_by_id'";
        mysqli_query($db, $sqlDelete);
    }
    else
    {
        unset($_SESSION['cart_array']["$remove_by_id"]);
        sort($_SESSION['cart_array']);
         //sql query to get rid of the product in the database
         $sqlDelete="DELETE FROM Cart_Entry WHERE useraccount_Email= '$email' AND Products_ProductID='$remove_by_id'";
         mysqli_query($db, $sqlDelete);
    }
}


?>

<?php
//display the cart

$output_cart = "";
$cart_total = "";
$paypal_btn = '';
$array_product_id = '';

if(!isset($_SESSION['cart_array']) || count($_SESSION['cart_array']) < 1)
{
    $output_cart = '<h2 align="center"> Your cart is empty. Please pick a product from the product page</h2>';
}
else
{
    //make the paypal button for the checkout
    
    $i = 0;

    foreach($_SESSION['cart_array'] as $each_item)
    {
        $product_id = $each_item['product_id'];
        $sql = "SELECT * FROM Products WHERE ProductID = '$product_id' LIMIT 1";
        $result = mysqli_query($db, $sql);

        while($row = mysqli_fetch_array($result))
        {
            $product_name = $row["ProductName"];
            $product_price = $row["Product_UnitPrice"];
            $product_detials = $row["Description"];
        }

        $product_total = $product_price * $each_item['quantity'];

        $cart_total = $product_total + $cart_total;
        
        setlocale(LC_MONETARY, "en_US.utf8");

        $product_total = money_format("%(#10n", $product_total);

        //paypal
        $weed = $i + 1;

        $array_product_id .= "$product_id" . $each_item['quantity'] . ",";
        //dynamically build a table by concatenating the strings using .=
        $output_cart .= "<tr>";
        $output_cart .= '<td><a href="product-view.php?ProductID=' . $product_id . '">' . $product_name . '</a></td>';
        $output_cart .= '<td>' . $product_detials . '</td>'; 
        $output_cart .= '<td>$' . $product_price . '</td>';
        //cart_output form for the quantity set the max length of it to be 2 do you cant inject
        $output_cart .= '<td><form action="cart-view.php" method="post"> 
                         <input name="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2">
                         <input name="buttonAdjust' . $product_id . '"class="btn btn-success btn-remove" type="submit" value="Change" >
                         <input name="quantity_adjust" type="hidden" value="' . $product_id . '">
                         </form></td>';

        $output_cart .= '<td>' . $product_price . '</td>';
        $output_cart .= '<td><form action="cart-view.php" method="post"><input name="deletebtn"' . $product_id . '" class="btn btn-danger btn-remove" type="submit" value="Remove"> 
                         <input name="remove_product_id" type="hidden" value="' .$i . '"></form></td>';

        $output_cart .= '</tr>';
        $i++;
              
        
    }
    setlocale(LC_MONETARY, "en_US.utf8");
    $noDollar_total= $cart_total;
    $_SESSION['noDollar']= $noDollar_total;
    $cart_total= money_format("%(#10n", $cart_total);

    $cart_total = '<div style="font-size:20px; margin-top:10px;" align="right"> Cart Total: ' . $cart_total . '</div>';
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<body class="body-font body-back">
    <header class="bg-light body-back">
        <div class="container body-back" style="text-align:center;">
            <br>
            <h1 class="header-large">Clover Cottage Creations</h1>

            <br>
        </div>

    </header>

    <div align="center">
        <?php include_once("logout-header.php");?>
        <div id="pageContent" class="container">
            <br>

            <div class="container">
                <div class="jumbotron jumbotron-tax">
                    <table class="table table-striped table-bordered" style="border-color:black; text-align:center;">
                        <tr>
                            <td><b>Product</b></td>
                            <td><b>Product Description</b></td>
                            <td><b>Unit Price</b></td>
                            <td><b>Quantity</b></td>
                            <td><b>Total</b></td>
                            <td><b>Remove</b></td>
                        </tr>
                        <!--display the output from the cart output -->
                        <?php echo $output_cart; ?>
                    </table>
                    <?php echo $cart_total; ?>
                    <br>
                    <br>
                    <div>
                        <?php $cart="This is your cart from the website" ?>
                        <form action="shipping-form.php" method="post">
                            <input type="hidden" name="noDollar" value="<?php echo $noDollar_total; ?>">

                            <input type="submit" class="btn btn-primary btn-remove" name="button" id="button"
                                value="Buy Now!">

                        </form>


                    </div>
                    <br><br>
                    <a href="cart-view.php?empty_cart=emptycart" class="btn btn-primary btn-remove ">Click Here to Empty
                        Your Shopping Cart</a>

                </div> <br />
           
</body>
<?php include_once("footer.php");?>
</html>