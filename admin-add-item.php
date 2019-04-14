<?php  
include('db-connect.php');
if($_SESSION['Email'] !="thomas.soliday@gmail.com"){
    header("Location:login.php");
  }
//echo($_SESSION['Email']);

      error_reporting(0); 

      error_reporting(0); 
      $prodID = mysqli_real_escape_string($db,$_POST['prodID']);
      //echo $essay;
      $prodName = mysqli_real_escape_string($db, $_POST['prodName']);
      //echo $fname;
      $catID = mysqli_real_escape_string($db,$_POST['catID']);
      //echo $lname;
      $price = mysqli_real_escape_string($db,$_POST['price']);
      //echo $tel;
      $quantity = mysqli_real_escape_string($db,$_POST['quantity']);
      $quantity = preg_replace('/[^0-9]/', '', $quantity);

      $pictureURL = mysqli_real_escape_string($db,$_POST['pictureURL']);
      //echo $email;
      date_default_timezone_set('EST');
      $today = date("Y-m-d H:i:s");
     $sql= "INSERT INTO Products (ProductID, ProductName, Description, CategoryID, Product_UnitPrice, UnitsInStock, ProductPicture) 
            VALUES ($prodID, '$prodName' , '$description', '$catID', '$price', '$quantity', '$pictureURL') ";
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
                <h2 style="text-align:center">Fill out this form to add a product!</h2>

                <form action="admin-add-item.php" method="post">

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Product ID:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="product id" id="prodID" name="prodID"
                            required>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Product Name:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="product name" id="prodName" name="prodName"
                            required>
                    </div>


                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Category ID:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="1-4" id="catID" name="catID" required>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Price:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="9.95" id="price" name="price">
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Quantity:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="10" id="quantity" name="quantity">
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Picture URL:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="/photos/photo.jpg" id="pictureURL" name="pictureURL">
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