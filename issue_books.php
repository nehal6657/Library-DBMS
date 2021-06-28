<?php include('server1.php'); 
include('issue.php');

$db = mysqli_connect("localhost", "root", "", "lib");
$admin_name = "";
$admin_id = "";
$admin_email = "";
$phone = "";

$query = "select * from admins where admin_id='$_SESSION[admin_id]'";
$query_run = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
  $admin_name = $row['admin_name'];
  $admin_id = $row['admin_id'];
  $admin_email = $row['admin_email'];
  $phone = $row['phone_number'];
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
  <title>Admin Issue Books</title>
</head>

<body>




      <!-- Page Content Holder -->
      


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
                <a class="nav-link" href="index.php">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_logout.php">Log Out</a>
              </li>

            </ul>
          </div>
        </nav>
        <div class="main_site w-100">
          <div class="issueBooks">
          <div class="form w-85 f1">
              <img src="./style/logo.png" alt="" height="90px" width="auto" />
              <h2 id="title2 " class="text-center" style="font-size:x-large">Enter the following details </h2>
              <form method='post' action='issue_books.php'>
                <?php include('errors.php'); ?>
                <br>
                
                <input type="text" placeholder="ISBN number:" name="ISBN" />
                <input type="number" placeholder="Copy id:" name="Copyid" />
                
                <input type="number" placeholder="Issuer id:" name="Issuerid" />
                
                <br>
                
                <button type="Submit" name="issueBooks">Issue</button>

              </form>
              <br>
              <div class="btq1 d-flex justify-content-center pb-0 mb-0"><a href="admin_home.php"><button type="submit" class="btn btn-primary s2">Go Back</button></a></div>
                    
            </div>
          
          </div>


        </div>
      </div>

    </div>




</body>

</html>



<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>