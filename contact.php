<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clover Cottage Creations</title>
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

    <script>
        var maxwords = 500;
  function check_length(obj, cnt, maxwords)
{
    var ary = obj.value.split(" "); 
    var len = ary.length;
    cnt.innerHTML = len;
    return true;
} 
  </script>
    <script>
        function reload(){
			location.reload();
		}
  </script>
</head>

<body style="background-image: url(/photos/dust_scratches.png)">

    <header class="bg-light "style="background-image: url(/photos/dust_scratches.png);">
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
                <h2 style="text-align:center">Fill out this form and contact us</h2>
                <form action="homework2.html">

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>First Name:</b></label>
                        <input type="text" autocomplete="off" class="form-control" placeholder="Enter First Name" name="fname"
                            required>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Last Name:</b></label>
                        <input type="text" autocomplete="off" class="form-control" placeholder="Enter Last Name" name="lname"
                            required>
                    </div>


                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Email:</b></label>
                        <input type="email" autocomplete="off" class="form-control" placeholder="example@example.com"
                            name="email" required>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Phone Number:</b></label>
                        <input type="tel" autocomplete="off" class="form-control" placeholder="555-555-5555" name="tel">
                    </div>


                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label>
                            <b>Please fill this form out and ask any questions.</b>
                        </label>

                        <textarea class="form-control" rows="8" type="text" autocomplete="off" name="essay" onkeypress="return check_length(this, document.getElementById('words'),500);">
		                    </textarea>
                        <p>You wrote <span id="words">0</span> words.&nbsp;</p>
                    </div>
                    <div class="checkbox col-lg-12 col-md-12 col-sm-12">
                        <label><input type="checkbox" name="remember"> Would you like to recieve promotional materials
                            via email?</label>
                    </div>

                    <button type="submit" class="btn btn-success " action="submit.php">Submit</button>
                    <button type="button" class="btn btn-dark " onclick="reload()">Reset</button>
                </form>

            </div>

            <br>
        </div>
    </div>
</body>
<?php include_once("template_footer.php");?>

</html>