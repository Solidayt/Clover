<?php  
include('db-connect.php');
if($_SESSION['Email'] !="thomas.soliday@gmail.com"){
    header("Location:login.php");
  }
//echo($_SESSION['Email']);

      error_reporting(0); 

if(isset($_POST['add-item']))
{
          
      $prodID = mysqli_real_escape_string($db,$_POST['prodID']);
      //echo $essay;
      $prodName = mysqli_real_escape_string($db, $_POST['prodName']);

      $description = mysqli_real_escape_string($db,$_POST['description']);
      //echo $fname;
      $catID = mysqli_real_escape_string($db,$_POST['catID']);
      //echo $lname;
      $price = mysqli_real_escape_string($db,$_POST['price']);
      $price = preg_replace('/[^0-9]/', '', $price);
      //echo $tel;
      $quantity = mysqli_real_escape_string($db,$_POST['quantity']);
      $quantity = preg_replace('/[^0-9]/', '', $quantity);

      $pictureURL = mysqli_real_escape_string($db,$_POST['pictureURL']);

       //checks that information fields are filled out (not empty)
    if (empty($prodID)) { array_push($errors, "Product ID is required"); }
    if (empty($prodName)) { array_push($errors, "Product Name is required"); }
    if (empty($description)) { array_push($errors, "Description is required"); }
    if (empty($catID)) { array_push($errors, "Category ID is required"); }
    if (empty($price)) { array_push($errors, "Price is required"); }
    if (empty($quantity)) { array_push($errors, "quantity is required"); }

    //check if a product is already created with that ID
    $productID_check="SELECT ProductID FROM Products WHERE ProductID = '$prodID'";
    $result= mysqli_query($db, $productID_check);
    $productID= mysqli_fetch_assoc($result);

    if($productID)
    {
        if($productID['ProductID']===  $prodID)
        {
            array_push($errors, "Product ID already exists.");
        }
    }

        //if the error count is 0 them proceed to addint it to the cart
        if(count($errors) == 0)
        {
            $sql= "INSERT INTO Products (ProductID, ProductName, Description, CategoryID, Product_UnitPrice, UnitsInStock, ProductPicture) 
            VALUES ($prodID, '$prodName' , '$description', '$catID', '$price', '$quantity', '$pictureURL') ";
            mysqli_query($db, $sql);
            header('location: admin-add-item.php');

            echo
        }
}
      //echo $email;
      //date_default_timezone_set('EST');
      //$today = date("Y-m-d H:i:s");
     
       
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
                        <label><b>Description:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="Description" id="description" name="description" required>
                    </div>


                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Category ID:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="1-4" id="catID" name="catID" required>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Price:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="9.95" id="price" name="price" required>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Quantity:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="10" id="quantity" name="quantity">
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label><b>Picture URL:</b></label>
                        <input  autocomplete="off" class="form-control" placeholder="/photos/photo.jpg" id="pictureURL" name="pictureURL">
                    </div>


                   
                    

                    <button type="submit" class="btn btn-success " name="add-item">Submit</button>
                    <button type="button" class="btn btn-dark " onclick="reload()">Reset</button>
                </form>

            </div>

            <br>
        </div>
    </div>
</body>
<?php include_once("footer.php");?>

</html>