<?php 
  
  include('db-connect.php');

    $sql= "SELECT * FROM Products WHERE CategoryID=3"; //sql statement that gets all products in a category
    $results = mysqli_query($db, $sql);
    //$productCount = mysql_num_rows($result);

  
    //while($row =mysql_fetch_row($sql))
   // {
   //     echo( $row[i])
   // }
    //for or while count all the rows and create a loop that creates a table witht he products
    // for(i=0, i<$product_array, i++)

   // for($i=0 ; $i<=$productCount; $i++)
//{

//}

?>




<!DOCTYPE html>
<html lang="en">
<?php  echo($_SESSION['Email']);
      error_reporting(0); 
    ?>

<?php
require_once("header.php");
?>

<body style="background-image: url(/photos/dust_scratches.png)"  class="body-font">

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
    <main>
    <br>
        <div class="container">
            <div class="jumbotron jumbotron-tax" style="background-color:#abcbea; color:#04080F; ">
                <table class="table">
                    <tr>
                    <th>Image</th>
                        <th>Go to the page</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price </th>
                        
                    </tr>
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
                                
                               echo '<td >' . '<img src="'.   $row["ProductPicture"] . '" height=200 width=300>'. '</td>';
                               echo '<td>' . '<a href="http://thomassoliday.com/product-view.php?ProductID=' . $prodID . '"'. 'class="btn btn-primary">View</a>';
                               echo "<td>" . $row["ProductName"] . "</td>";
                              echo "<td>" . $row["Description"] . "</td>";
                              echo "<td>" . $row["Product_UnitPrice"] . "</td>";
                              
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