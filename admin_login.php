<?php include('server1.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" href="./style/logo.png" type="image/png">
    <title>Admin Login Page</title>
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
                    <a class="nav-link" href="register.php">Register for students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login as student</a>
                </li>

            </ul>
        </div>
    </nav>



    <div class="login-page">
        <div class="form">
            <form method="post" action="admin_login.php">
                <?php include('errors.php'); ?>
                <img src="./style/logo.png" width="30" height="30" class="d-inline-block align-top logo" alt="" />
                <h2 id="title2">Admin Login</h2>

                <input type="text" placeholder="admin_id" name="admin_id" />
                <input type="password" placeholder="password" name="password" />
                <button type="submit" name="admin_loginuser">login</button>

            </form>

        </div>
    </div>

    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>