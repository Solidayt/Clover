<?php  
include('db-connect.php');
echo($_SESSION['Email']);
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
    if(isset($_SESSION['Email'])){
    require_once("logout-header.php");
    }else{  
    require_once("login-header.php");
    }
    ?>


    <br>
    <div class="container col-xl-10 col-lg-10 col-md-9 col-sm-10 ">
        <div class="jumbotron" style="background-color:#abcbea; color:#090907; ">
            <h1 style="text-align:center;">Frequently asked Questions</h1>

            <h2>Here are some questions you might have</h2>


            <div id="accordion">

                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                            <b>How do you clean the coasters?</b>
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <b>DO NOT USE SOAP</b> or put the coaster in the dishwasher. Soaps leave residues that
                            stop the absorbency. Clean them with clorox.
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                            <b>Which side do you put your glass on?</b>
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            While many restaurants and bars use cork coasters they do not absorb moisture. We use
                            the cork to protect your furniture and the ceramic side is the side that absorbs the
                            moisture. So place your glass on the ceramic side.
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                            <b>What are the coasters made of?</b>
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            The coasters are made of a special blend of earthen ware that we make ourselves. Since
                            we make our own clay, we chose the materials that allow it to be absorbent and still
                            strong.
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapse4">
                            <b>How do you make the coasters?</b>
                        </a>
                    </div>
                    <div id="collapse4" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            We start with a blend of earthenware which we mix in our pug. Then the clay is rolled
                            out into slabs, the designs are pressed in and the coasters are cut, colored, dried and
                            then fired in a kiln for durability.
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapse5">
                            <b>Does the glass tip in to the design impressions?</b>
                        </a>
                    </div>
                    <div id="collapse5" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            The bases of glasses are large enough that they are not impacted by the depressions in
                            the images.
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapse6">
                            <b>How do the coasters work?</b>
                        </a>
                    </div>
                    <div id="collapse6" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            The ceramic material absorbs the moisture that drips of the cold drinks. The moisture
                            then evaporates back into the air so the coaster is always ready for use.
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapse7">
                            <b>Do the coasters stain?</b>
                        </a>
                    </div>
                    <div id="collapse7" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            The coasters will absorb any liquid including tea, coffee and soda which can cause
                            stains. However, our coasters are cleanable which removes these stains.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapse8">
                            <b>Do the coasters break?</b>
                        </a>
                    </div>
                    <div id="collapse8" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            The coasters are not unbreakable but are very strong. If you drop them on the carpet or
                            hardwood floor they will likely be fine. If they are dropped on tile or concrete, those
                            materials are less forgiving. We have seen the coasters bounce and we have seen them chip
                            on concrete.
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapse9">
                            <b>Do the coasters change color?</b>
                        </a>
                    </div>
                    <div id="collapse9" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            No the coasters do not change color when wet.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include_once("footer.php");?>

</html>