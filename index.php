<?php 
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<?php  echo($_SESSION['Email']);
      error_reporting(0); 
    ?>

<?php
require_once("header.php");
?>

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


    <div class="container   ">
        <br>
        <div id="mycarousel" class="carousel slide " data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                <li data-target="#mycarousel" data-slide-to="1"></li>
                <li data-target="#mycarousel" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/photos/car1.jpg" alt="car coasters" width="1100" height="500">
                </div>
                <div class="carousel-item">
                    <img src="/photos/craftshow_After.jpg" alt="craft show" width="1100" height="500">
                </div>
                <div class="carousel-item ">
                    <img src="/photos/leaf3.jpg" alt="botanical coasters" width="1100" height="500">
                </div>
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#mycarousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#mycarousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
    </div>

    <br><br>
    <div>


        <div class="container col-xl-10 col-lg-10 col-md-10 col-sm-10 ">

            <div class="jumbotron" style="background-color:#abcbea; color:#04080F; ">
                <div class="container-fluid">
                    <h1 style="text-align: center;">Handmade Absorbant Coasters!</h1>
                    <p>Each coaster is handmade and individually hand colored. The seashore designs are created using a
                        blend of real shells, coral and our original artwork which are pressed into our special blend
                        of clay and kiln fired for durability. </p>
                    <p>The design in our botanical coasters are made with real leaves and wildflowers hand-picked from
                        our surrounding woodlands, artistically arranged and pressed into our clay. The colors are hand
                        blended into each leaf and wildflower to create a unique work of art that has become our
                        signature item. These coasters are perfect around for yourself and for any gift occasion.</p>



                </div>
            </div>
            <br>
        </div>
        <div class="container col-xl-10 col-lg-10 col-md-10 col-sm-10 ">

            <div class="jumbotron " style="background-color:#abcbea; color:#04080F; ">
                <div class="container-fluid">
                    <h1 style="text-align: center;">Featured Products</h1>



                    <div class="row" style="text-align:center; font-weight:bold;">
                        <div class="col">Specialty Products</div>
                        <div class="col">Coasters</div>
                        <div class="col">Car Coasters</div>

                    </div>
                    <div class="row">
                        <div class="col"><img src="/photos/image002.jpg" class="img-respons"></div>
                        <div class="col"><img src="/photos/leaf2.jpg" class="img-respons"></div>
                        <div class="col"> <img src="/photos/carrooster.jpg" class="img-respons"></div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</body>

<?php include_once("template_footer.php");?>

</html>