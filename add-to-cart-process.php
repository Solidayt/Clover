<?php

?>

<?php


//start the cart and add a product to the cart
if(isset($_POST['pid']))
{
    $pid= $_POST['pid'];
    $found = false;
    $i = 0;
    $date =date('Y-m-d H:i:s');

    //if the cart is empty or not created then create it
    if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1)
    {
        $_SESSION['cart_array'] = array(0 => array("product_id" => $pid , "quantity" => 1));
        
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

                } //done if
            }//while done
        }//for done
        if($found==false)
        {
            array_push($_SESSION["cart_array"], array("product_id" => $pid, "quantity" => 1));
        }
    }
    header("location: cart-view.php");
    exit();
}

?>