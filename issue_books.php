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
  <title>Admin</title>
</head>

<body>



  <!-- ===============================sidebar =======================================================-->


  <div class="wrapper side1">

    <div class="wrapper">
      <!-- Sidebar Holder -->
      <nav id="sidebar">
        <div class="sidebar-header">
          <h3>
            <p class="text-left" id="title3">
              Welcome <strong><?php echo $admin_name; ?> !</strong>
            </p>
          </h3>
        </div>

        <ul class="list-unstyled components">

          <li class="active">
            <a href="#menu">Dashboard</a>

          </li>
          <li>
            <div class="dropdown">
              <button class="dropbtn">Books</button>
              <div class="dropdown-content w-100">
                <a class="dropbtn1" onclick="addBook()" id="hideshowbooks">Add Book</a>
                <a onclick="managebooks()" id="hsmanagebooks">View Books</a>
                <a onclick="managebooks()" id="deletebook">Delete Book</a>
                <a onclick="managebooks()" id="edit_books">Edit Book</a>

              </div>
            </div>
          </li>
          <li>
            <div class="dropdown">
              <button class="dropbtn">Authors</button>
              <div class="dropdown-content w-100">
                <a id="Adding_Author">Add Authors</a>
                <a id="Manage_auth">Manage Authors</a>

              </div>
            </div>
          </li>
          <li>
            <div class="dropdown">
              <button class="dropbtn">My Prrofile</button>
              <div class="dropdown-content w-100">

                <a class="dropbtn1" onclick="addBook()" id="Profile">View_Profile</a>
                <a class="dropbtn1" onclick="addBook()" id="Edit_profile">Edit Profile</a>
                <a class="dropbtn1" onclick="addBook()" id="Password">Change Password</a>

              </div>
            </div>
          </li>
          <li>
            <a href="inform.php">Information</a>
          </li>


        </ul>
      </nav>
      <!-- ===============================sidebar end =======================================================-->


      <!-- Page Content Holder -->
      <div id="content">


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
                <a class="nav-link" href="#">Features</a>
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
                <?php // initializing variables
                    // $ISBN="";
                    // $C_id="";
                    // $Issuer_id="";
                    // $typ="";
                    // $errors = array();
                    // // connect to the database
                    // $db = mysqli_connect("localhost", "root", "", "lib");
                    // $_SESSION['conn'] = $db;

                    // // ------------------------------ISSUE BOOKS------------------------------------
                    // if (isset($_POST['issueBooks'])) {
                    //     // receive all input values from the form
                    //     $ISBN = mysqli_real_escape_string($db, $_POST['ISBN']);
                    //     $C_id = mysqli_real_escape_string($db, $_POST['Copyid']);
                    //     $Issuer_id = mysqli_real_escape_string($db, $_POST['Issuerid']);
                    //     //$typ =

                    //     $typ = $_POST['type'];
                    //     echo $typ;
                    //     echo "nehal";



                    //     // form validation: ensure that the form is correctly filled ...
                    //     // by adding (array_push()) corresponding error unto $errors array
                    //     if (empty($ISBN)){
                    //         array_push($errors, "ISBN of book is required");
                    //     }
                    //     if (empty($C_id)) {
                    //         array_push($errors, "Copy id is required");
                    //     }
                    //     if (empty($Issuer_id)) {
                    //         array_push($errors, "Issuer id is required");
                    //     }


                    //     // first check the database to make sure 
                    //     // a user does not already exist with the same username and/or email
                    //     $book_check_query = "SELECT * FROM `copy` WHERE C_id = '$C_id' and ISBN ='$ISBN'";
                    //     $result = mysqli_query($db, $book_check_query);
                    //     $res = mysqli_fetch_assoc($result);
                    //     if(!$res){
                    //         array_push($errors, "no such book exists!!");
                    //     }
                    //     $x="";
                    //     while ($row = mysqli_fetch_assoc($result)) {
                    //         $x = $row['isIssued'];        
                    //     }
                    //     if($x){
                    //         array_push($errors, "book is already issued!");   
                    //     }
                    //     $t=10;

                    //     array_push($errors, $typ); 
                    //     // Finally, register user if there are no errors in the form
                    //     if (count($errors) == 0) {
                    //         // $password = md5($password_1); //encrypt the password before saving in the database
                    //         if($typ == 0) {$query = "INSERT INTO issues" . " (issuer_id,ISBN,C_id,issue_date,return_date) 
                    //             VALUES" . "('$Issuer_id','$ISBN', '$C_id',now(),now()+INTERVAL 10 DAY)";}
                    //         else if ($typ==1 || $typ==2) {$query = "INSERT INTO issues" . " (issuer_id,ISBN,C_id,issue_date,return_date) 
                    //             VALUES" . "('$Issuer_id','$ISBN', '$C_id',now(),now()+INTERVAL 15 DAY)";}
                    //         else{
                    //             $query = "INSERT INTO issues" . " (issuer_id,ISBN,C_id,issue_date,return_date) 
                    //             VALUES" . "('$Issuer_id','$ISBN', '$C_id',now(),now()+INTERVAL 20 DAY)";
                    //         }
                    //         $query = "INSERT INTO issues" . " (issuer_id,ISBN,C_id,issue_date,return_date) VALUES" . "('$Issuer_id','$ISBN', '$C_id',now(),now()+INTERVAL 10 DAY)";
                    //         mysqli_query($db, $query);  
                    //         header('location: issue_books.php');   
                    //         echo $typ;
                    //     }
                    // }
                    ?>
                <input type="text" placeholder="ISBN number:" name="ISBN" />
                <input type="number" placeholder="Copy id:" name="Copyid" />
                <!-- <p class="text-left"> <strong><b>Is Book Available:</b></strong></p>
                <div class="text-left">

                  <label class="radio-inline"> Yes   <input type="radio" name="Avail" value="1" checked></label><br>
                  <label class="radio-inline"> No    <input type="radio" name="Avail" value="0"></label>

                </div> -->
                <input type="number" placeholder="Issuer id:" name="Issuerid" />
                <p class="text-left"> <strong><b>Type of issuer:</b></strong></p>
                <div class="text-left">

                  <label class="radio-inline"> Student - BTech<input type="radio" name="type" value="0" checked></label><br>
                  <label class="radio-inline"> Student - MTech <input type="radio" name="type" value="1"></label><br>
                  <label class="radio-inline"> Student - PhD <input type="radio" name="type" value="2"></label><br>
                  <label class="radio-inline"> instructor <input type="radio" name="type" value="3"></label><br>


                </div> 
                <br>
                
                <button type="Submit" name="issueBooks">Issue</button>

              </form>
            </div>
          
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


<script type="text/javascript">
  $(document).ready(function() {


    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
  });
</script>
<script>
  $('.View_deatails').hide();
  jQuery(document).ready(function() {
    jQuery('#Profile').on('click', function(event) {
      jQuery('#View_deatails').toggle('show');
    });
  });
</script>

<script>
  $('.edit').hide();
  jQuery(document).ready(function() {
    jQuery('#Edit_profile').on('click', function(event) {
      jQuery('#edit').toggle('show');
    });
  });
</script>
<script>
  $('.Pass').hide();
  jQuery(document).ready(function() {
    jQuery('#Password').on('click', function(event) {
      jQuery('#Pass').toggle('show');
    });
  });
</script>
<script>
  $('.addbooks').hide();
  jQuery(document).ready(function() {
    jQuery('#hideshowbooks').on('click', function(event) {
      jQuery('#addbooks').toggle('show');
    });
  });

  $('.managebooks').hide();
  jQuery(document).ready(function() {
    jQuery('#hsmanagebooks').on('click', function(event) {
      jQuery('#managebooks').toggle('show');
    });
  });
  jQuery(document).ready(function() {
    jQuery('#hsmanagebooks1').on('click', function(event) {
      jQuery('#managebooks').toggle('show');
    });
  });
  $('.Auth').hide();
  jQuery(document).ready(function() {
    jQuery('#Adding_Author').on('click', function(event) {
      jQuery('#Auth').toggle('show');
    });
  });

  $('.manageAuth').hide();
  jQuery(document).ready(function() {
    jQuery('#Manage_auth').on('click', function(event) {
      jQuery('#manageAuth').toggle('show');
    });
  });
  $('.del').hide();
  jQuery(document).ready(function() {
    jQuery('#deletebook').on('click', function(event) {
      jQuery('#del').toggle('show');
    });
  });

  $('.editbooks').hide();
  jQuery(document).ready(function() {
    jQuery('#edit_books').on('click', function(event) {
      jQuery('#editbooks').toggle('show');
    });
  });
</script>


</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>