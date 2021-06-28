<?php include('serv.php') ?>



<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "lib");
$name = "";
$email = "";
$type = "";
$Sid = "";
$username = "";
$issuer = " ";
$query = "select * from students where Username='$_SESSION[username]'";
$query_run = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
    $username = $row['Username'];
    $name = $row['Name'];
    $email = $row['email'];
    $Sid = $row['Sid'];
    $type = $row['type'];
}
$_SESSION['Sid'] = $Sid; // Setting sid for session variable


// $db = mysqli_connect("localhost", "root", "", "lib");
//$query = "SELECT * from students NATURAL join issuer where Sid = '$_SESSION[Sid]'";
//echo $Sid;
$query1 = "select * from students NATURAL JOIN issuer where Sid='$_SESSION[Sid]'";
$query_run1 = mysqli_query($db, $query1);
//$x ="";
while ($row = mysqli_fetch_assoc($query_run1)) {
    $issuer = $row['issuer_id'];
}
$_SESSION['iss'] = $issuer; // Setting sid for session variable

$query2 = "select count(*) as cnt from issues NATURAL JOIN issuer where issuer_id='$issuer'";
$row2 = mysqli_fetch_array(mysqli_query($db, $query2));
$count2 = $row2['cnt'];

$query3 = "select count(*) as cnt1 from issues NATURAL JOIN issuer where issuer_id='$issuer' and return_date<now()";
$row3 = mysqli_fetch_array(mysqli_query($db, $query3));
$count3 = $row3['cnt1'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/style_student.css">
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
                        <p class="text-left" id="title2">
                            Welcome <strong><?php echo $_SESSION['username']; ?> !</strong>
                        </p>
                    </h3>
                </div>

                <ul class="list-unstyled components">

                    <li>
                        <a id="hsmaindash">Dashboard</a>

                    </li>
                    <li>
                        <a onclick="managebooks()" id="hsmanagebooks">View Books</a>

                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn">My_profile</button>
                            <div class="dropdown-content w-100">
                                <a class="dropbtn1" onclick="addBook()" id="Profile">View_Profile</a>
                                <a class="dropbtn1" onclick="addBook()" id="Edit_profile">Edit Profile</a>
                                <a class="dropbtn1" onclick="addBook()" id="Password">Change Password</a>

                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="index.php">Information</a>
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
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#">Features</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="Logout.php">Log Out</a>
                            </li>

                        </ul>
                    </div>
                </nav>
                <div class="main_site">
                    <div class="View_deatails" id="View_deatails">
                        <div class="form">
                            <img src="./style/logo.png" alt="" height="90px" width="auto" />
                            <h2 id="title2 text-center">Your details </h2>
                            <div class="details text-left">

                                <p> <strong>Student Id: </strong><?php echo $Sid ?></p>
                                <p> <strong>Name: </strong><?php echo $name ?></p>
                                <p> <strong>User Name: </strong><?php echo $username ?></p>
                                <p> <strong>Student type: </strong><?php $type1 = "";
                                                                    if ($type == 0) {
                                                                        echo "BTech";
                                                                    } else if ($type == 1) {
                                                                        echo  "MTech";
                                                                    } else if ($type == 2) {
                                                                        echo "PhD";
                                                                    }
                                                                    // echo $type 
                                                                    ?></p>
                                <p> <strong>Email id: </strong> <?php echo $email ?></p>
                                <p> <strong>Issuer id: </strong> <?php echo $issuer ?></p>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- ===============================VIEW end =======================================================-->

                <div class="main_site">
                    <div class="Sdash">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Quick Search for books" aria-describedby="basic-addon2" />
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button"><img src="./style/search.png" alt="" height="22px" width="auto" /></button>
                            </div>
                        </div>
                    </div>

                    <div class="managebooks" id="managebooks">
                        <div class="main-card">
                            <h2 id="title2" class="d-flex">Books present in library</h2>
                            <table class="table table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th><strong>ISBN</strong></th>
                                        <th><strong>Title</strong></th>
                                        <th><strong>Author</strong></th>
                                        <th><strong>Total Copy</strong></th>
                                        <th><strong>Available Copy</strong></th>
                                        <th><strong>Publisher</strong></th>
                                        <th><strong>Edition</strong></th>
                                        <th><strong>Is refrence book?</strong></th>
                                        <th><strong>Is text book?</strong></th>
                                    </tr>
                                </thead>
                                <?php
                                $db = mysqli_connect("localhost", "root", "", "lib");
                                // if (!$db) {
                                //   die('Could not connect: ' . mysql_error());
                                // }
                                $sql_query = "select * from book";
                                $result = mysqli_query($db, $sql_query);
                                while ($row = mysqli_fetch_array($result)) {
                                    $g = $row['ISBN'];
                                    $sql = "select count(*) as val from book NATURAL JOIN copy WHERE ISBN = '$g'";
                                    $rw1 = mysqli_fetch_array(mysqli_query($db, $sql));
                                    $cn1 = $rw1['val'];
                                    $sq2 = "select count(*) as val1 from book NATURAL JOIN issues WHERE ISBN = '$g'";
                                    $rw2 = mysqli_fetch_array(mysqli_query($db, $sq2));
                                    $cn2 = $rw2['val1'];
                                    $a = $cn1 - $cn2;

                                    echo "<tr>";
                                    echo "<td>" . $row['ISBN'] . "</td>";
                                    echo "<td>" . $row['title'] . "</td>";

                                    echo "<td>" . $row['Author'] . "</td>";
                                    echo "<td>" . $cn1 . "</td>";
                                    echo "<td>" . $a . "</td>";

                                    echo "<td>" . $row['publisher'] . "</td>";
                                    echo "<td>" . $row['edition'] . "</td>";

                                    if ($row['ref_flag'] == 1) {
                                        echo "<td> Yes </td>";
                                    } else {
                                        echo "<td> No </td>";
                                    }
                                    if ($row['t_flag'] == 1) {
                                        echo "<td> Yes </td>";
                                    } else {
                                        echo "<td> No </td>";
                                    }

                                    echo "</tr>";
                                }
                                mysqli_close($db);

                                ?>
                            </table>
                        </div>
                    </div>




                    <div class="main-card">
                        <div class="card-header p-0 mt-0">
                            Books Currently issued
                        </div>
                        <div class="card-body">
                            <h5 class="card-title title2"></h5>
                            <p class="black">Number of issued books:<strong><?php echo $count2; ?> </strong></p>
                            <a href="st_is.php" class="btn btn-primary">View all books</a>
                        </div>
                    </div>
                    <div class="main-card">
                        <div class="card-header p-0 mt-0">
                            Books to return
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">
                            <p class="black">Number of Overdue books:<strong><?php echo $count3; ?> </strong></p>

                            <a href="st_o.php" class="btn btn-primary">View all overdue Books</a>
                        </div>
                    </div>

                </div>
                <div class="View_deatails" id="View_deatails">
                    <div class="form">
                        <img src="./style/logo.png" alt="" height="90px" width="auto" />
                        <h2 id="title2 text-center">Your details </h2>
                        <div class="details text-left">

                            <p> <strong>Student Id: </strong><?php echo $Sid ?></p>
                            <p> <strong>Name: </strong><?php echo $name ?></p>
                            <p> <strong>User Name: </strong><?php echo $username ?></p>
                            <p> <strong>Student type: </strong><?php
                                                                $type1 = "";
                                                                if ($type === 0) {
                                                                    $type1 = "BTech";
                                                                } else if ($type === 1) {
                                                                    $type1 = "MTech";
                                                                } else if ($type === 2) {
                                                                    $type1 = "PhD";
                                                                }
                                                                echo $type1 ?></p>
                            <p> <strong>Email id: </strong> <?php echo $email ?></p>
                            <p> <strong>Email id: </strong> <?php echo $email ?></p>
                        </div>

                    </div>
                </div>

                <div class="edit" id="edit">
                    <div class="form">
                        <img src="./style/logo.png" alt="" height="90px" width="auto" />
                        <h2 id="title2 text-center">Enter the following details to update profile</h2>
                        <div class="details text-left">

                            <p> <strong>Your Student Id: </strong><?php echo $Sid ?></p>
                            <form method='post' action='student_home.php'>
                                <?php include('errors.php'); ?>
                                <label>username</label>
                                <input type="text" name="Username" />
                                <label>Name</label>
                                <input type="text" name="Name" />
                                <label>Email</label>
                                <input type="text" name="email" />

                                <label> Type of student:</label><br>
                                <label class="radio-inline">BTech <input type="radio" name="type" value="0" checked></label>
                                <label class="radio-inline">MTech <input type="radio" name="type" value="1"></label>
                                <label class="radio-inline">PhD. <input type="radio" name="type" value="2"></label>
                                <br>
                                <button type="Submit" name="update">Edit</button>
                        </div>

                        </form>
                    </div>
                </div>

            </div>

            <!-- ===============================editing end =======================================================-->
            <div class="main_site">

                <div class="Pass" id="Pass">
                    <div class="form">
                        <img src="./style/logo.png" alt="" height="90px" width="auto" />
                        <h2 id="title2 text-center">Change Password</h2>
                        <div class="details text-left">

                            <p> <strong>Your Student Id: </strong><?php echo $Sid ?></p>
                            <form method='post' action='student_home.php'>
                                <?php include('errors.php'); ?>
                                <label>Old Password</label>
                                <input type="text" name="old" />
                                <label>New Password</label>
                                <input type="text" name="New" />
                                <label>Confirm password</label>
                                <input type="text" name="New1" />


                                <button type="Submit" name="change">change</button>
                        </div>

                        </form>
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
    $('.maindash').hide();
</script>

<script>
    $('.edit').hide();
    jQuery(document).ready(function() {
        jQuery('#Edit_profile').on('click', function(event) {
            jQuery('#edit').toggle('show');
        });
    });
    $('.maindash').hide();
</script>
<script>
    $('.Pass').hide();
    jQuery(document).ready(function() {
        jQuery('#Password').on('click', function(event) {
            jQuery('#Pass').toggle('show');
        });
    });
    $('.maindash').hide();
</script>
<script>
    $('.managebooks').hide();
    jQuery(document).ready(function() {
        jQuery('#hsmanagebooks').on('click', function(event) {
            jQuery('#managebooks1').toggle('show');
        });
    });
    $('.maindash').hide();
</script>
<script>
    $('.maindash').show();
    jQuery(document).ready(function() {
        jQuery('#hsmaindash').on('click', function(event) {
            jQuery('#maindash').toggle('show');
            $('.managebooks').hide();
            $('.Pass').hide();
            $('.edit').hide();
            $('.View_deatails').hide();
            jQuery('#managebooks').toggle('show');
        });
    });
</script>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>