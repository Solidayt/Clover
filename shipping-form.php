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

<!DOCTYPE html>
<html lang="en">

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
                <h2 style="text-align:center">Fill out the shipping information!</h2>

                <form action="shipping-confirm.php" method="post">

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Address:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="Address" id="address" name="address"
                            required>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>City:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="City" id="city" name="city"
                            required>
                    </div>


                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>State:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="Stare" id="state" name="state" required>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>ZIP:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="Zip" id="zip" name="zip">
                    </div>


                    <button type="submit" class="btn btn-success " action="shipping-confirm.php">Submit</button>
                    
                </form>

            </div>

            <br>
        </div>
    </div>
</body>
<?php include_once("footer.php");?>

</html>