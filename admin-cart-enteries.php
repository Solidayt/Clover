<!DOCTYPE html>
<html lang="en">
<?php  
include('db-connect.php');
include('db-connect.php');
  if($_SESSION['Email'] !="thomas.soliday@gmail.com"){
    header("Location:login.php");
  }

 //echo($_SESSION['Email']);
      error_reporting(0); 
      
      $id=$_GET["ProductID"];

    $sql= "SELECT * FROM Cart_Entry"; //sql statement that gets all products in a category
    $results = mysqli_query($db, $sql);


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

    <br>
    <main>
        <!--add the cart enteries from the database -->

        <br>
        <div class="container">
            <div class="jumbotron jumbotron-tax" style="background-color:#abcbea; color:#04080F; ">
                <table class="table table-borderless">
                    <thead class="thead-dark">
                        <tr>
                            <th>Email</th>
                            <th>Product ID</th>
                            <th>Quantity</th>
                            

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
                                
                               echo '<td >' . $row["useraccount_Email"] . '</td>';
                               echo '<td>' .  $row['Products_ProductID']. '</td>';
                               echo "<td>" . $row["Quantity"] . "</td>";
                              
                               echo "</tr>";
                         }
                                                     echo "</table>";
                                                    
                         
               
               ?>



            </div>
        </div>
    </main>
   
</body>

<?php include_once("footer.php");?>

</html>