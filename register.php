<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" href="./style/logo.png" type="image/png">
    <title>Register Page</title>
</head>
<body>
    

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark main-nav">
        <img src="./style/logo.png" alt="logo">
        <h3 id="title3">Library Management System</h3>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_login.php">Login As admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login As students</a>
          </li>

        </ul>
      </div>
    </nav>

        

      <div class="form">
        <img src="./style/logo.png" alt="" height="90px" width="auto"/>
          <h2 id="title2">Sign Up Form</h2>
          <form method='post' action='register.php'>
            <?php include('errors.php'); ?>
            <input type="text" placeholder="name" name="name" value="<?php echo $name; ?>" />

            <input type="text" placeholder="username" name="username" value="<?php echo $username; ?>" />
            <input type="text" placeholder="email address" name="email" value="<?php echo $email; ?>" />
            <input type="password" placeholder="password" name="password" />
            <input type="password" placeholder="re-type password" name="password2" />
            <p class="text-left"> <strong><b>Please select type of student:</b></strong></p>
            <div class="text-left">
              
              <label class="radio-inline">BTech  <input type="radio" name="type" value="0" checked></label>
              <label class="radio-inline">MTech  <input type="radio" name="type" value="1"></label>
              <label class="radio-inline">PhD.  <input type="radio" name="type" value="1"></label>
            </div>
            <br>
            <br>

            <button name="reg_user">create</button>
            <p class=" message">Already registered? <a href="login.php">Sign In</a></p>
        </form>
        
    </div>
          
        
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>








