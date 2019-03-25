<?php 
 include('login-process.php');
?>
<html>

<head>
    <title>Login Page</title>
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
    <?php require_once("login-header.php");?>
    <br>



    <!-- this is the form i hope it works -->
    <!-- edit it does not work it just goes back to the login pagew and doesnt actually log in -->

    <div class="container ">
        <div class="container  col-sm-10 " >
            <div class="container jumbotron" style="background-color:#abcbea; color:#04080F; ">
                <div class="jumbotron-content" style="padding-bottom: 10px;" align="center">
                    <h2><b>Login</b></h2>
                </div>

                <div class="container" >

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
                        <p>
                            Not yet a member? <a href="reg.php">Sign up</a>
                        </p>
                    </form>







                </div>

            </div>

        </div>
    </div>
    <br><br>
</body>


<?php include_once("template_footer.php");?>

</html>