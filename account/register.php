<?php
	// Include config file
	require_once 'config.php';


	// Define variables and initialize with empty values
	$username = $firstname = $lastname = $password = $confirm_password = "";

	$username_err = $firstname_err = $lastname_err = $password_err = $confirm_password_err = "";

	// Process submitted form data
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		// Check if username is empty
		if (empty(trim($_POST['username']))) {
			$username_err = "Please enter a username.";

			// Check if username already exist
		} else {

			// Prepare a select statement
			$sql = 'SELECT id FROM users WHERE username = ?';

			if ($stmt = $mysql_db->prepare($sql)) {
				// Set parmater
				$param_username = trim($_POST['username']);

				// Bind param variable to prepares statement
				$stmt->bind_param('s', $param_username);

				// Attempt to execute statement
				if ($stmt->execute()) {
					
					// Store executed result
					$stmt->store_result();

					if ($stmt->num_rows == 1) {
						$username_err = 'This username is already taken.';
					} else {
						$username = trim($_POST['username']);
					}
				} else {
					"Oops! ${$username}, something went wrong. Please try again later.";
				}

				// Close statement
				$stmt->close();
			} else {

				// Close db connction
				$mysql_db->close();
			}
		}

		// Validate password
	    if(empty(trim($_POST["password"]))){
	        $password_err = "Please enter a password.";     
	    } elseif(strlen(trim($_POST["password"])) < 6){
	        $password_err = "Password must have atleast 6 characters.";
	    } else{
	        $password = trim($_POST["password"]);
	    }
    
	    // Validate confirm password
	    if(empty(trim($_POST["confirm_password"]))){
	        $confirm_password_err = "Please confirm password.";     
	    } else{
	        $confirm_password = trim($_POST["confirm_password"]);
	        if(empty($password_err) && ($password != $confirm_password)){
	            $confirm_password_err = "Password did not match.";
	        }
	    }

		// validate user first name
		if(empty($_POST["firstname"])){
	        $firstname_err = "Please enter a firstname.";     
	    } else{
	        $firstname = strip_tags($_POST["firstname"]);
	    }

		// validate user first name
		if(empty(trim($_POST["lastname"]))){
	        $lastname_err = "Please enter a lastname.";     
	    } else{
	        $lastname = strip_tags($_POST["lastname"]);
	    }

	    // Check input error before inserting into database

	    if (empty($username_err) && empty($password_err) && empty($confirm_err)) {

			$userId = rand().$username;
			$time = time();
	    	// Prepare insert statement
			$sql = 'INSERT INTO users (username, userid, firstname,lastname, password, date_added) VALUES (?,?,?,?,?,?)';

			if ($stmt = $mysql_db->prepare($sql)) {
				// Set parmater
				$param_username = $username;
				$param_userid = $userId;
				$param_firstname = $firstname;
				$param_lastname = $lastname;
				$param_dateadded = $time;
				$param_password = password_hash($password, PASSWORD_DEFAULT); // Created a password

				// Bind param variable to prepares statement
				$stmt->bind_param('ssssss', $param_username, $param_userid, $param_firstname, $param_lastname, $param_password, $param_dateadded);

				// Attempt to execute
				if ($stmt->execute()) {
					// Redirect to login page
					header('location: ./login.php');
					// echo "Will  redirect to login page";
				} else {
					echo "Something went wrong. Try signing in again.";
				}

				// Close statement
				$stmt->close();	
			}

			// Close connection
			$mysql_db->close();
	    }
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link href="../assets/img/favicon.png" rel="icon">
  	<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
	<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
	<style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Poppins', sans-serif
	}

	body {
		background: #ecf0f3
	}

	.wrapper {
		max-width: 350px;
		min-height: 500px;
		margin: 80px auto;
		padding: 40px 30px 30px 30px;
		background-color: #ecf0f3;
		border-radius: 15px;
		box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff
	}

	.logo {
		width: 120px;
		margin: 5% auto;
	}

	.logo img {
		width: 120px;
		height: 20px;
	}

	.wrapper .name {
		font-weight: 600;
		font-size: 1.4rem;
		letter-spacing: 1.3px;
		padding-left: 10px;
		color: #555
	}

	.wrapper .form-field input {
		width: 100%;
		display: block;
		border: none;
		outline: none;
		background: none;
		font-size: 1.2rem;
		color: #666;
		padding: 10px 15px 10px 10px
	}

	.wrapper .form-field {
		padding-left: 10px;
		margin-bottom: 20px;
		border-radius: 20px;
		box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff
	}

	.wrapper .form-field .fas {
		color: #555
	}

	.wrapper .btn {
		box-shadow: none;
		width: 100%;
		height: 40px;
		background-color: #03A9F4;
		color: #fff;
		border-radius: 25px;
		box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
		letter-spacing: 1.3px
	}

	.wrapper .btn:hover {
		background-color: #039BE5
	}

	.wrapper a {
		text-decoration: none;
		font-size: 0.8rem;
		color: #03A9F4
	}

	.wrapper a:hover {
		color: #039BE5
	}

	@media(max-width: 380px) {
		.wrapper {
			margin: 30px 20px;
			padding: 40px 15px 15px 15px
		}
	}
  </style>
</head>
<body>
	<main>
		<div class="wrapper">
			<div class="logo"> <img src="../assets/img/logo.png" alt="" width="120px"> </div>
			<div class="mx-auto text-center font-bold text-primary"> Register </div>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="p-3 mt-3">
				<div class="form-field d-flex align-items-center <?php (!empty($username_err))?'has_error':'';?>"> 
					<span class="help-block far fa-user"><?php echo $username_err;?></span> 
					<input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username ?>"> 
				</div>
				<div class="form-field d-flex align-items-center <?php (!empty($firstname_err))?'has_error':'';?>"> 
					<span class="help-block far fa-user"><?php echo $firstname_err;?></span> 
					<input type="text" name="firstname" id="firstname" placeholder="Firstname" value="<?php echo $firstname ?>"> 
				</div>
				<div class="form-field d-flex align-items-center <?php (!empty($lastname_err))?'has_error':'';?>"> 
					<span class="help-block far fa-user"><?php echo $lastname_err;?></span> 
					<input type="text" name="lastname" id="lastname" placeholder="Lastname" value="<?php echo $lastname ?>"> 
				</div>
				<div class="form-field d-flex align-items-center <?php (!empty($password_err))?'has_error':'';?>"> 
					<span class="help-block fas fa-key"><?php echo $password_err;?></span> 
					<input type="password" name="password" id="pwd" placeholder="Password" value="<?php echo $password ?>"> 
				</div>
				<div class="form-field d-flex align-items-center <?php (!empty($confirm_password_err))?'has_error':'';?>"> 
					<span class="help-block fas fa-key"><?php echo $confirm_password_err;?></span> 
					<input type="password" name="confirm_password" id="pwd" placeholder="confirm_password" value="<?php echo $password ?>"> 
				</div> 
				<button type="submit" class="btn mt-3">Register</button>
			</form>
			<p> Already have an account? <a href="login.php">Login</a></p> </div>
		</div>
	</main>
</body>
</html>