<?php 
	session_start();

	// variable declaration FIrstName, LastName, Email, errors
    $fname = "";
    $lname = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	  $servername = "capstone.c0lusijucnqw.us-east-2.rds.amazonaws.com";
    $dbusername = "solidayt";
    $dbpassword = "Maryhadadog11";
    $dbname      =  "Capstone";

// Create connection from the variables above 
$db = new mysqli($servername, $dbusername, $dbpassword, $dbname);

	// register the user
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  
    //checks that information fields are filled out (not empty)
    if (empty($fname)) { array_push($errors, "First name is required"); }
    if (empty($lname)) { array_push($errors, "Last name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
    }
  
   //check if a user is already created
    $user_check_query = "SELECT * FROM useraccount WHERE Email='$email' ";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['Email'] === $email) {
        array_push($errors, "Email already exists");
      }
    }
  
    // if no errors ten register the user
    if (count($errors) == 0) {
      //encrypts the password with md5 CHANGE LATER TO SOMETHING MORE SECURE 
        $password = md5($password_1);
  
        $query = "INSERT INTO `Capstone`.`useraccount` (Email, Hashpass, FirstName, LastName)
                  VALUES('$email', '$password', '$fname', '$lname')";
        mysqli_query($db, $query);
        $_SESSION['Email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
  }
  





?>