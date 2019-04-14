<?php 
  
  include('db-connect.php');
  if($_SESSION['Email'] !="thomas.soliday@gmail.com"){
    header("Location:login.php");
  }
    $sql= "SELECT * FROM Comments"; //sql statement that gets all products in a category
    $results = mysqli_query($db, $sql);
    //echo $_POST['remove_comment_id'];

    if(isset($_POST['remove_comment_id']) )
    {
        $remove_comment_id = $_POST['remove_comment_id'];
        $email=$_SESSION['Email'];
        //count the items in the array and remove the product by the ID
    
         $sqlDelete = "DELETE FROM `Comments` WHERE idComments= '$remove_comment_id'";
         mysqli_query($db, $sqlDelete);
    }
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
                           
                            
                            <th>Comment ID</th>
                            <th>Email </th>
                            <th>First Name </th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>Comment</th>
                            <th> Date </th>
                            <th>Delete </th>

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
                                
                               
                               
                               echo "<td>" . $row["idComments"] . "</td>";
                               echo "<td>" . $row["Email"] . "</td>";
                              echo "<td>" . $row["FirstName"] . "</td>";
                              echo "<td>" . $row["LastName"] . "</td>";
                              echo "<td>" . $row["PhoneNumber"] . "</td>";
                              echo "<td>" . $row["TextArea"] . "</td>";
                              echo "<td>" . $row["DateTime"] . "</td>";
                              
                              echo '<td><form action="admin-contact.php" method="post"><input name="delete"' . $row["idComments"] . '" class="btn btn-danger btn-remove" type="submit" value="Delete"> 
                              <input name="remove_comment_id" type="hidden" value="' .$row["idComments"] . '"></form></td>';
                              
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