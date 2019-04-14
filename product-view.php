<?php  
include('db-connect.php');
include('login-process.php');
//echo($_SESSION['Email']);
      error_reporting(0); 
      
      $id=$_GET["ProductID"];

    $sql= "SELECT * FROM Products WHERE ProductID= '$id'"; //sql statement that gets all products in a category
    $results = mysqli_query($db, $sql);


    ?>
<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">


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
    <br>
    <main>
        <div class="container">
            <div class="jumbotron jumbotron-tax" >
                <table class="table table-striped table-bordered" style="border-color:black;">
                    <tr>
                        <th>Image</th>

                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price </th>
                        <th>Add to cart </th>
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
                                
                               echo '<td >' . '<img src="'.   $row["ProductPicture"] . '" height=200 width=300>'. '</td>';
                              // echo '<td>' . '<a href="http://thomassoliday.com/product-view.php?ProductID=' . $prodID . '"'. 'class="btn btn-primary">View</a></td>';
                               echo "<td>" . $row["ProductName"] . "</td>";
                              echo "<td>" . $row["Description"] . "</td>";
                              echo "<td>" . $row["Product_UnitPrice"] . "</td>";
                              if(isset($_SESSION['Email'])){
                                echo "<td>". '<form id="form1" name="form1" method="post" action="cart-view.php">  
                                <input type="hidden" name="pid" id="pid" value="' . $id . '">
                                <input type="submit" class="btn btn-primary btn-remove" name="button" id="button" value="Add to cart"> </td>';
                                }else{  
                                echo "<td>" . '<a href="http://thomassoliday.com/login.php" '. ' class="btn btn-primary">Login</a></td>';
                                }
                              
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

<?php include_once("footer.php");?>

</html>