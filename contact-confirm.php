<!DOCTYPE html>
<html lang="en">
<?php  
include('db-connect.php');
echo($_SESSION['Email']);

      error_reporting(0); 
      $essay = mysqli_real_escape_string($db,$_POST['essay']);
      //echo $essay;
      $fname = mysqli_real_escape_string($db, $_POST['fname']);
      //echo $fname;
      $lname = mysqli_real_escape_string($db,$_POST['lname']);
      //echo $lname;
      $tel = mysqli_real_escape_string($db,$_POST['tel']);
      //echo $tel;
      $email = mysqli_real_escape_string($db,$_POST['email']);
      //echo $email;
      date_default_timezone_set('EST');
      $today = date("Y-m-d H:i:s");
     $sql= "INSERT INTO Comments (idComments, TextArea, FirstName, LastName, PhoneNumber, Email, DateTime) VALUES (default, '$essay' , '$fname', '$lname', '$tel', '$email', '$today') ";
     mysqli_query($db, $sql);
       
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

    <br>
    <div>


        <div class="container col-lg-7 col-md-9 col-sm-10 ">

            <div class="jumbotron " style="background-color:#abcbea; color:#090907; ">
                <h2 style="text-align:center">Thank you for contacting us!</h2>

               

            </div>

            <br>
        </div>
    </div>
</body>
<?php include_once("footer.php");?>

</html>