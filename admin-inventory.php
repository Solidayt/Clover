<?php 
  
  include('db-connect.php');
  
  if(isset($_POST['quantity_adjust']))
{
    $email=$_SESSION['Email'];
    $quantity_adjust = $_POST['quantity_adjust'];
    echo $quantity_adjust;
    $quantity = $_POST['quantity'];
    echo $quantity;
    //replace the values to be only numbers to prevent sql injection
    $quantity = preg_replace('/[^0-9]/', '', $quantity);

    //if the quantity is more than 10 replace quantity with 9
    $sqlUpdate= "UPDATE Products SET UnitsInStock= '$quantity' WHERE ProductID='$quantity_adjust'";
    mysqli_query($db, $sqlUpdate);


} 
  
  if($_SESSION['Email'] !="thomas.soliday@gmail.com"){
    header("Location:login.php");
  }
    $sql= "SELECT * FROM Products"; //sql statement that gets all products in a category
    $results = mysqli_query($db, $sql);
  
    
    
?>





<!DOCTYPE html>
<html lang="en">
<?php  //echo($_SESSION['Email']);
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
                <table class="table table-borderless">
                    <thead class="thead-dark">
                        <tr>


                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price </th>
                            <th>Quantity</th>
                            <th>Add Quantity</th>

                        </tr>
                    </thead>
                    <?php
                    
                    if($results)
                    {
                        $rows= mysqli_num_rows($results);
                        printf("number: " . $rows);
                    }
                         while($row = mysqli_fetch_array($results)) 
                         {
                            $prodID=$row["ProductID"];   
                            echo "<tr>";
                                
                               
                               
                               echo "<td>" . $row["ProductName"] . "</td>";
                              echo "<td>" . $row["Description"] . "</td>";
                              echo "<td>" . $row["Product_UnitPrice"] . "</td>";
                              echo "<td>" . $row["UnitsInStock"] . "</td>";
                              echo '<td><form action="admin-inventory.php" method="post"> 
                              <input name="quantity" type="text" autocomplete="off" size="1" maxlength="2" required>
                              <input name="buttonAdjust' . $row['ProductID'] . '"class="btn btn-success btn-remove" type="submit" value="Change" >
                              <input name="quantity_adjust" type="hidden" value="' . $row['ProductID'] . '">
                              </form></td>';
                              
                               echo "</tr>";
                         }
                                                     echo "</table>";
                                                    
                         
               
               ?>



            </div>
        </div>
    </main>
    <button onclick="topFunction()" id="myBtn" class="mybtn" title="Go to top">Top</button>
</body>

<?php include_once("footer.php");?>

</html>