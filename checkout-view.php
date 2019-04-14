<?php
session_start();
include('db-connect.php');
if(isset($_SESSION['cart_array']))
{
    echo 'hello';
}

echo($_SESSION['Email']);
echo($_SESSION['cart_array']);
?>

<?php
    foreach($_SESSION['cart_array'] as $each_item)
    {
        $product_id = $each_item['product_id'];
        echo $product_id . ",";
    }
    

    echo 'hello';
    $string = var_dump($_SESSION['cart_array']);

    echo "<br>";

    echo explode(";" , $string);
?>

<?php
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
   
    $i++;
          
    
}
?>