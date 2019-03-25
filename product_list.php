<?php
include('db_connect.php');


$columncount = 0;
$dynamicList = '<table width="744" border="0" cellpadding="6"><tr>';
while($row = sqlsrv_fetch_array($stmt)){ 
         $id = $row["productID"];
         $product_name = $row["product_name"];
         $product_price = $row["product_price"];
         $dynamicList .= '<td width="135"><a href="$_"><img src="images/products/Men/' . $id . '.jpg" alt="' . $product_name . '" width="129" height="169" border="0"></a></td>
<td width="593" valign="top">' . $product_name . '<br>
  £' . $product_price . '<br>
  <a href="product_details.php?productID=' . $id . '">View Product Details</a></td>';

  if($columncount == 3){
    $dynamicList .= '</tr><tr>';
    $columncount = 0;
  }else
    $columncount++; 
 }

$dynamicList .= '</tr></table>';

echo $dynamicList;




?>