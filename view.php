<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "lib");
$Name = "";
$email = "";
$type = "";
$Sid = "";
$query = "select * from students where Username='$_SESSION[username]'";
$query_run = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
    $Name = $row['Name'];
    $email = $row['email'];
    $Sid = $row['Sid'];
    $type = $row['type'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" href="./style/logo.png" type="image/png">
    <title>Veiw details</title>
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
                    <a class="nav-link" href="#">View profile <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#">Log-out</a>
                </li>

            </ul>
        </div>
    </nav>



    <div class="form">


        <h2>
            HELLO
            <strong>
                <?php echo $_SESSION['username']; ?>
            </strong>

        </h2>

        
        <form>

            <label>Name</label>
            <input type="text" name="name" value="<?php echo $Name; ?>" disabled />
            <label>Sid</label>
            <input type="text" value="<?php echo $Sid; ?>" disabled />

            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>" disabled />

            <label> type of student</label>
            <input type="text" name="type" value="<?php echo $type; ?>" disabled />


        </form>

    </div>


    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>