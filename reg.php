<?php 
include('db-connect.php');
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

    <!--end the nav portion -->
    <br>
    <div class="container">
        <div class="container col-6">
            <div class="container jumbotron" style="background-color:#abcbea; color:#04080F; ">
            <div class="jumbotron-content" style="padding-bottom: 10px;" align="center">
                    <h2><b>Register</b></h2>
                </div>

                <div class="container">

                <!-- registration form -->
                    <form method="post" action="reg.php">
                        
                        <div class=" form-group">
                        <?php include('errors.php'); ?>
                            <label>First Name</label>

                            <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
                        </div>
                        <div class=" form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
                        </div>
                        <div class=" form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                        </div>
                        <div class=" form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password_1">
                        </div>
                        <div class=" form-group">
                            <label>Confirm password</label>
                            <input type="password" class="form-control" name="password_2">
                        </div>
                        <div class="input-group">
                            <button type="submit" class="btn" name="reg_user">Register</button>
                        </div>
                        <br>
                        <p>
                            Already a member? <a href="login.php">Sign in</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<?php include_once("footer.php");?>
</html>