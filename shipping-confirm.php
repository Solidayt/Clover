<!DOCTYPE html>
<html lang="en">
<?php  
include('db-connect.php');
//echo($_SESSION['Email']);

      error_reporting(0); 
      $address = mysqli_real_escape_string($db,$_POST['address']);
      //echo $essay;
      $city = mysqli_real_escape_string($db, $_POST['city']);
      //echo $fname;
      $state = mysqli_real_escape_string($db,$_POST['state']);
      //echo $lname;
      $zip = mysqli_real_escape_string($db,$_POST['zip']);
      //echo $tel;
      $email= $_SESSION['Email'];
      
     $sql= "INSERT INTO Shipping (useraccount_Email, Address, City, State, ZIP) VALUES ('$email', '$address' , '$city', '$state', '$zip') ";
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
                <h2 style="text-align:center">Thank you for adding shipping information!</h2>

                <br>

                <h2> Please finish your order by paying with paypal!</h2>
                <form action="order.php" method="post">
                           

                            <input type="submit" class="btn btn-primary btn-remove" name="button" id="button"
                                value="Order Now!">

                        </form>

               

            </div>

            <br>
        </div>
    </div>
</body>
<?php include_once("footer.php");?>

</html>