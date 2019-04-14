<?php  
include('db-connect.php');
//echo($_SESSION['Email']);

      error_reporting(0); 

      
       
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

    <br>
    <div>


        <div class="container col-lg-7 col-md-9 col-sm-10 ">

            <div class="jumbotron " style="background-color:#abcbea; color:#090907; ">
                <h2 style="text-align:center">Fill out this form and contact us</h2>

                <form action="contact-confirm.php" method="post">

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>First Name:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="Enter First Name" id="fname" name="fname"
                            required>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Last Name:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="Enter Last Name" id="lname" name="lname"
                            required>
                    </div>


                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Email:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="example@example.com" id="email" name="email" required>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Phone Number:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="555-555-5555" id="tel" name="tel">
                    </div>


                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label>
                            <b>Please fill this form out and ask any questions.</b>
                        </label>

                        <textarea class="form-control" rows="8"  autocomplete="off"  id="essay" name="essay" onkeypress="return check_length(this, document.getElementById('words'),150);">
		                    </textarea>
                        <p>You wrote <span id="words">0</span> words.&nbsp;</p>
                    </div>
                    <div class="checkbox col-lg-12 col-md-12 col-sm-12">
                        <label><input type="checkbox" id="wantemails" name="remember"> Would you like to recieve promotional materials
                            via email?</label>
                    </div>

                    <button type="submit" class="btn btn-success " action="send-email.php">Submit</button>
                    <button type="button" class="btn btn-dark " onclick="reload()">Reset</button>
                </form>

            </div>

            <br>
        </div>
    </div>
</body>
<?php include_once("footer.php");?>

</html>