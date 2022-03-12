<?php
  // Initialize sessions
  session_start();

  // Check if the user is already logged in, if yes then redirect him to welcome page
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
  }

  // Include config file
  require_once "config.php";

  // Define variables and initialize with empty values
  $username = $password = '';
  $username_err = $password_err = '';

  // Process submitted form data
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if username is empty
    if(empty(trim($_POST['username']))){
      $username_err = 'Please enter username.';
    } else{
      $username = trim($_POST['username']);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
      $password_err = 'Please enter your password.';
    } else{
      $password = trim($_POST['password']);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
      // Prepare a select statement
      $sql = 'SELECT id, username, userid, firstname, lastname, password FROM users WHERE username = ?';

      if ($stmt = $mysql_db->prepare($sql)) {

        // Set parmater
        $param_username = $username;

        // Bind param to statement
        $stmt->bind_param('s', $param_username);

        // Attempt to execute
        if ($stmt->execute()) {

          // Store result
          $stmt->store_result();

          // Check if username exists. Verify user exists then verify
          if ($stmt->num_rows == 1) {
            // Bind result into variables
            $stmt->bind_result($id, $username, $userid, $firstname, $lastname, $hashed_password);

            if ($stmt->fetch()) {
              if (password_verify($password, $hashed_password)) {

                // Start a new session
                session_start();

                // Store data in sessions
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;
                $_SESSION['userid'] = $userid;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;

                // Redirect to user to page
                header('location: index.php');
              } else {
                // Display an error for passord mismatch
                $password_err = 'Invalid password';
              }
            }
          } else {
            $username_err = "Username does not exists.";
          }
        } else {
          echo "Oops! Something went wrong please try again";
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
  <title>Sign in</title>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
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
        <div class="mx-auto text-center font-bold text-primary"> Login </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="p-3 mt-3">
            <div class="help-block far fa-user"><?php echo $username_err;?></div>
            <div class="help-block fas fa-key"><?php echo $password_err;?></div> 
            <div class="form-field d-flex align-items-center <?php (!empty($username_err))?'has_error':'';?>"> 
              <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username ?>"> 
            </div>
            <div class="form-field d-flex align-items-center <?php (!empty($password_err))?'has_error':'';?>"> 
              <input type="password" name="password" id="pwd" placeholder="Password" value="<?php echo $password ?>"> 
            </div> 
            <button type="submit" class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6"> <a href="password_reset.php">Forget password?</a> <p> Don't have an account? <a href="register.php">Sign up</a></p> </div>
    </div>
  </main>
</body>
</html>