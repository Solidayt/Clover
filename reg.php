<?php 
include('db-connect.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="capstone.css">


</head>

<body style="background-image: url(/photos/dust_scratches.png)">
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
<?php include_once("template_footer.php");?>
</html>