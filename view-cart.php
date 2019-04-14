<?php 
include('db-connect.php');
$productID=$_GET["ProductID"];

$sql= "SELECT * FROM Products WHERE ProductID= '$productID'"; //sql statement that gets all products in a category
    $results = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<?php  echo($_SESSION['Email']);
      error_reporting(0); 
    ?>

<?php
require_once("header.php");
?>

<body style="background-image: url(/photos/dust_scratches.png)" class="body-font">

    <header class="bg-light " style="background-image: url(/photos/dust_scratches.png)">
        <div class="container " style="text-align:center;">
            <br>
            <h1 class="header-large">Clover Cottage Creations</h1>

            <br>
        </div>

    </header>


    <?php
    if(isset($_SESSION['Email'])){
    require_once("logout-header.php");
    }else{  
    require_once("login-header.php");
    }
    ?>


    <br>
    <main>
        <div class="container">
            <div class="jumbotron jumbotron-tax" style="background-color:#abcbea; color:#04080F; ">
                <h2 align="center">Cart</h2>
                <table class="table table-striped table-bordered" style="border-color:black;">
                    <tr>
                        <th>Image</th>

                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price </th>
                        <th>Quantity</th>
                        <th>Delete from Cart</th>
                    </tr>



                    <?php                 
//view a single product
//use get to pull the product Id and generate the page from that product ID
?>


                    <?php
                    
                    if($results<=1)
                    {
                        while($row = mysqli_fetch_array($results)) 
                         {
                            $prodID=$row["ProductID"];   
                            echo "<tr>";
                                //image
                               echo '<td >' . '<img src="'.   $row["ProductPicture"] . '" height=200 width=300>'. '</td>';
                              // echo '<td>' . '<a href="http://thomassoliday.com/product-view.php?ProductID=' . $prodID . '"'. 'class="btn btn-primary">View</a></td>';

                              //product Name
                               echo "<td>" . $row["ProductName"] . "</td>";
                               //description
                              echo "<td>" . $row["Description"] . "</td>";
                              //price
                              echo "<td>" . $row["Product_UnitPrice"] . "</td>";
                              //quantity
                              echo "<td>" . $row["UnitsInStock"] . '</td>';
                              
                               echo "</tr>";
                         }
                                                     echo "</table>";
                    }else
                    {
                        echo "No product exists";
                    }
                        
                                                    
                         
               
               ?>
            </div>
        </div>
    </main>

</body>

</html>