<?php include('db-connect.php');
// Login the user

$email    = "";


	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM useraccount WHERE Email='$email' AND Hashpass='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['Email'] = $email;
				$_SESSION['success'] = "You are logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination. Please try again.");
			}
		}
    }
    
    ?>