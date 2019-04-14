<?php
session_start();
error_reporting(E_ALL);

ini_set('display_errors', '1');

include('db-connect.php');

?>
<?php

//////////////////////////////////////////////////////////////
///     Stat the cart files   add a file to the cart page  ///
//////////////////////////////////////////////////////////////
if(isset($_POST['pid']))
{
    $pid= $_POST['pid'];
    $found = false;
    $i = 0;

    //if the cart is empty or not created then create it
    if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1)
    {
        $_SESSION['cart_array'] = array(0 => array("product_id" => $pid , "quantity" => 1));

    }
    else //run if the there at least one product
    {
        foreach($_SESSION["cart-array"] as $each_item)
        {
            $i++;
            while (list($key, $value) = each($each_item))
            {
                if ($key == "product_id" && $value == $pid)
                {
                    array_splice($_SESSION["cart_array"], $i-1, 1, array(array("product_id" => $pid, "quantity" => $each_item['quantity']+1)) );
                    $found==true;

                } //done if
            }//while done
        }//for done
        if($found==false)
        {
            array_push($_SESSION["cart_array"], array("product_id" => $pid, "quantity" => 1));
        }
    }
    header("location: cart.php");
    exit();
}

?>



<?php
//empty their cart

if(isset($_GET['empty_cart']) && $_GET['empty_cart'] == "emptycart")
{
    unset($_SESSION["cart_array"]);
}

?>

<?php
//adjust the quantity

if(isset($_POST['quantity_adjust']) && $_POST['quantity_adjust'])
{
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
    foreach($_SESSION['cart_array'] as $each_item)
    {
        $i++;

        while(list($key, $value) = each($each_item))
        {
            if ($key == "product_id" && $value == $quantity_adjust)
            {
                //if tthe item is there already there then just change the quantity in the cart
                array_splice($_SESSION['cart_array'], $i-1, 1, array(array('product_id' => $quantity_adjust, "quantity" => $quantity)));
            }
        }
    } //end the for each
}
?>

<?php
//remove the item from the cart

if(isset($_POST['remove_product_id']) && $_POST['remove_product_id'] != "")
{
    $remove_by_id = $_POST['remove_product_id'];
    //count the items in the array and remove the product by the ID
    if(count($_SESSION['cart_array']) <= 1)
    {
        unset($_SESSION['cart_array']);
    }
    else
    {
        unset($_SESSION['cart_array']["$remove_by_id"]);
        sort($_SESSION['cart_array']);
    }
}


?>

<?php
//display the cart

$outputcart = "";
$cartTotal = "";
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

        $product_total = money_format("$%i", $product_total);

        //paypal
        $weed = $i + 1;

        $array_product_id .= "prduct_id" . $each_item['quantity'] . ",";
        //dynamically build a table by concatenating the strings using .=
        $cart_output .= "<tr>";
        $cart_output .= '<td><a href="product-view.php?ProductID=' . $product_id . '">' . $product_name . '</a></td>';
        $cart_output .= '<td>' . $product_detials . '</td>'; 
        $cart_output .= '<td>$' . $product_price . '</td>';
        //cart_output form for the quantity set the max length of it to be 2 do you cant inject
        $cart_output .= '<td><form action="cart.php" method="post"> 
                         <input name="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2">
                         <input name="buttonAdjust' . $product_id . '"class="btn btn-primary" type="submit" value="Change" >
                         <input name="quantity_adjust" type="hidden" value="' . $product_id . '">
                         </form></td>';

        $cart_output .= '<td>' . $product_price . '</td>';
        $cart_output .= '<td><form action="cart.php" method="post"><input name="deletebtn"' . $product_id . '" class="btn btn-danger btn-remove" type="submit" value="Remove"> 
                         <input name="remove_product_id" type="hidden" value="' .$i . '"></form></td>';

        $cart_output .= '</tr>';
        $i++;
              
        
    }
    setlocale(LC_MONETARY, "en_US.utf8");
    $cartTotal= money_format("$%i", $cartTotal);

    $cartTotal = '<div style="font-size:20px; margin-top:10px;" align="right"> Cart Total: ' . $cartTotal . '</div>';
}

?>

<!DOCTYPE html>
<html>
<?php include('header.php'); ?>

<body>
    <header class="bg-light " style="background-image: url(/photos/dust_scratches.png)">
        <div class="container " style="text-align:center;">
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
                    <table class="table table-striped table-bordered" style="border-color:black;">
                        <tr>
                            <td><strong>Product</strong></td>
                            <td><strong>Product Description</strong></td>
                            <td><strong>Unit Price</strong></td>
                            <td><strong>Quantity</strong></td>
                            <td><strong>Total</strong></td>
                            <td><strong>Remove</strong></td>
                        </tr>
                        <?php echo $cartOutput; ?>
                    </table>
                    <?php echo $cartTotal; ?>
                    <br>
                    <br>
                    <a href="cart.php?empty_cart=emptycart">Click Here to Empty Your Shopping Cart</a>
                </div>
            </div>
            <br />
        </div>
        <?php include_once("footer.php");?>
    </div>
</body>

</html>