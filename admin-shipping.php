<?php 
  
  include('db-connect.php');
  if($_SESSION['Email'] !="thomas.soliday@gmail.com"){
    header("Location:login.php");
  }
    $sql= "SELECT * FROM Shipping"; //sql statement that gets all products in a category
    $results = mysqli_query($db, $sql);
    //echo $_POST['remove_comment_id'];

   
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
                           
                            
                            <th>Email</th>
                            <th>Address </th>
                            <th>City </th>
                            <th>State</th>
                            <th>zip</th>
                            

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
                            $commentID=$row["idComments"];   
                            echo "<tr>";
                                
                               
                               
                               echo "<td>" . $row["useraccount_Email"] . "</td>";
                               echo "<td>" . $row["Address"] . "</td>";
                              echo "<td>" . $row["City"] . "</td>";
                              echo "<td>" . $row["State"] . "</td>";
                              echo "<td>" . $row["ZIP"] . "</td>";
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