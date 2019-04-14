<?php 
 include('login-process.php');
?>
<html>
<!DOCTYPE html>
<html lang="en">
<?php  echo($_SESSION['Email']);
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
    if(isset($_SESSION['Email'])){
    require_once("logout-header.php");
    }else{  
    require_once("login-header.php");
    }
    ?>

    <!-- this is the form i hope it works -->
    <!-- edit it does not work it just goes back to the login pagew and doesnt actually log in -->
    <main>
<br>
        <div class="container ">
            <div class="container  col-sm-10 ">
                <div class="container jumbotron" style="background-color:#abcbea; color:#04080F; ">
                    <div class="jumbotron-content" style="padding-bottom: 10px;" align="center">
                        <h2><b>Login</b></h2>
                    </div>

                    <div class="container">

                        <form method="post" action="login.php">
                            <?php include('errors.php'); ?>

                            <div class="form-group">
                                <label>Email :</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password : </label>

                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="input-group">
                                <input type="hidden" name="login_user" value="login_user">
                                <button type="submit" class="btn" name="login_user">Login</button>
                            </div>
                            <br>
                            <p  style="text-align:center;">
                                Not yet a member? <a href="reg.php">Sign up</a>
                            </p>
                        </form>







                    </div>

                </div>

            </div>
        </div>
        <br><br>
    </main>
</body>


<?php include_once("footer.php");?>

</html>