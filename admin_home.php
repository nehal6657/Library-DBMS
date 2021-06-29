<?php include('server1.php'); ?>
<?php

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
//  <!-- ===============================counting number of students book  =======================================================-->
$sql_query = "select count(*) as cntUser from students";
$row = mysqli_fetch_array(mysqli_query($db, $sql_query));
$count = $row['cntUser'];
$sql = "select count(*) as cntUser1 from students where type=0";
$row1 = mysqli_fetch_array(mysqli_query($db, $sql));
$count1 = $row1['cntUser1'];
$sql1 = "select count(*) as cntUser2 from students where type=1";
$row2 = mysqli_fetch_array(mysqli_query($db, $sql1));
$count2 = $row2['cntUser2'];
$sql2 = "select count(*) as cntUser3 from students where type=2";
$row3 = mysqli_fetch_array(mysqli_query($db, $sql2));
$count3 = $row3['cntUser3'];
$sql_query5 = "select count(*) as cntUser5 from book";
$row5 = mysqli_fetch_array(mysqli_query($db, $sql_query5));
$count5 = $row5['cntUser5'];
$sql_query6 = "select count(*) as cntUser6 from issues ";
$row6 = mysqli_fetch_array(mysqli_query($db, $sql_query6));
$count6 = $row6['cntUser6'];
$sql = "select count(*) as cnt from issuer NATURAL JOIN issues WHERE return_date < now() and Sid>0";
$ro = mysqli_fetch_array(mysqli_query($db, $sql));
$co = $ro['cnt'];
$sql1 = "select count(*) as cnt1 from issuer NATURAL JOIN issues WHERE return_date < now() and Sid=0";
$ro1 = mysqli_fetch_array(mysqli_query($db, $sql1));
$co1 = $ro1['cnt1'];
$sql2 = "select count(*) as cnt2 from issuer NATURAL JOIN issues WHERE  Sid>0";
$ro2 = mysqli_fetch_array(mysqli_query($db, $sql2));
$co2 = $ro2['cnt2'];
$sql3 = "select count(*) as cnt3 from issuer NATURAL JOIN issues WHERE  Sid=0";
$ro3 = mysqli_fetch_array(mysqli_query($db, $sql3));
$co3 = $ro3['cnt3'];
$sql_query8 = "select count(*) as cntUser8 from copy";
$row8 = mysqli_fetch_array(mysqli_query($db, $sql_query8));
$count8 = $row8['cntUser8'];


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
  <title>Admin home</title>
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
            <a id="dash">Dashboard</a>

          </li>
          <li>
            <div class="dropdown">
              <button class="dropbtn">Books</button>
              <div class="dropdown-content w-100">
                <a class="dropbtn1" id="hideshowbooks">Add Book</a>
                <a id="add_copy">Add copies</a>
                <a id="hsmanagebooks">View Books</a>
                <a id="edit_books">Edit Book</a>

              </div>
            </div>
          </li>

          <li>
            <div class="dropdown">
              <button class="dropbtn">My Profile</button>
              <div class="dropdown-content w-100">

                <a class="dropbtn1" onclick="addBook()" id="Profile">View Profile</a>
                <a class="dropbtn1" onclick="addBook()" id="Edit_profile">Edit Profile</a>
                <a class="dropbtn1" onclick="addBook()" id="Password">Change Password</a>

              </div>
            </div>
          </li>
          <li>
            <a class="dropbtn1" onclick="addBook()" id="Ins">Add Instructor</a>
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
                <a class="nav-link" href="index.php">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_logout.php">Log Out</a>
              </li>

            </ul>
          </div>
        </nav>
        <div class="main_site">
          <!--=======================dashboard===================================-->
          <div class="dashhh">
            <div class="container maxw">
              <div class="row">
                <div class="col m-1.2">
                  <div class="card s1">
                    <div class="card-header title2">
                      Number of registered Users
                    </div>
                    <div class="card-body">
                      <h4 class="card-text black">
                        <p class="black">
                          Number of Students : <strong><?php echo $count; ?> </strong>
                          <br>
                          BTech Students:<strong><?php echo $count1; ?> </strong>
                          <br>
                          MTech Students:<strong><?php echo $count2; ?> </strong>
                          <br>
                          PHD Students:<strong><?php echo $count3; ?> </strong>
                        </p>
                      </h4>

                      <a href="show.php">
                        <div class="btq d-flex align-self-end"><button type="button" class="btn btn-info s4">Show students </button>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col m-1.2">
                  <div class="card s1">
                    <div class="card-header title2">
                      Number of Books in library
                    </div>
                    <div class="card-body">
                      <h4 class="card-text">
                        <p class="black">
                          Total Number of Different Books:<strong><?php echo $count5; ?> </strong>
                          <br>
                          Total Number of Books in Library:<strong><?php echo $count8; ?> </strong>
                          <br>
                          Number of Books Available:<strong><?php echo $count8 - $count6; ?> </strong>
                        </p>
                      </h4>
                      <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                      <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                      <div class="btq d-flex align-self-end btn-holder"><button type="button" class="btn btn-info s4" id="hsmanagebooks1">Show all books</button></div>
                    </div>
                  </div>
                </div>
                <div class="w-100"></div>
                <div class="col m-1.2">
                  <div class="card s1">
                    <div class="card-header title2">
                      Number of Books overdue:
                    </div>
                    <div class="card-body">
                      <h4 class="card-text">
                        <p class="black">
                          Number of students:<strong><?php echo $co; ?> </strong>
                          <br>
                          Number of instructors:<strong><?php echo $co1; ?> </strong>


                        </p>
                      </h4>
                      <!-- <h4 class="card-text"> Number of students: </h4>
                      <h4 class="card-text"> Number of instructors: </h4> -->
                      <!-- <h5 class="card-text"> Number of students: </h5> -->
                      <!-- <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>-->
                      <!-- <p class="card-text">Shows all books available in library</p>  -->
                      <a href="Return.php">
                        <div class="btq d-flex align-items-end"><button type="button" class="btn btn-info s4">Show books overdue</button></div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col m-1.2">
                  <div class="card s1">
                    <div class="card-header title2">
                      Number of Books issued
                    </div>
                    <div class="card-body">

                      <h5 class="card-text">
                        <p class="black">
                          Number of students:<strong><?php echo $co2; ?> </strong>
                          <br>
                          Number of instructors:<strong><?php echo $co3; ?> </strong>


                        </p>
                      </h5>

                      <!-- <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                      <a href="isbooks.php">
                        <div class="btq d-flex align-items-end"><button type="button" class="btn btn-info s4">Show issued books</button></div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="btq1 d-flex justify-content-center">
              <form action="issue_books.php" method="post"><button type="submit" class="btn btn-primary s2" name="issuebooks1" data-inline="true">Issue Books</button></form>
              <form action="return_books.php" method="post"><button type="submit" class="btn btn-primary s2 ml-2" name="issuebooks1" data-inline="true">Return Book</button></form>

            </div>

          </div>
          <!--=======================dashboard end===================================-->

          <!--============== manage books ==========================-->
          <div class="managebooks" id="managebooks">
            <div class="main-card">
              <h2 id="title2" class="d-flex">Book details</h2>
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


          <!--============== manage books end ==========================-->


          <!--adding books-->
          <div class="addbooks mt-2" id="addbooks">
            <div class="form">
              <img src="./style/logo.png" alt="" height="90px" width="auto" />
              <h2 id="title2">Enter the Book details -></h2>
              <form method='post' action='admin_home.php'>
                <?php include('errors.php'); ?>
                <input type="text" placeholder="title of book" name="title" value="<?php echo $title; ?>" />
                <input type="text" placeholder="ISBN number" name="ISBN" value="<?php echo $ISBN; ?>" />
                <input type="text" placeholder="Author" name="Author" />
                <input type="text" placeholder="publisher name" name="publisher" value="<?php echo $publisher; ?>" />
                <input type="text" placeholder="edition of book" name="edition" />
                <!-- <input type="text" placeholder="Copy id" name="Cid" /> -->

                <p class="text-left"> <strong><b>Is refrence Book:</b></strong></p>
                <div class="text-left">

                  <label class="radio-inline"> Yes <input type="radio" name="reftype" value="1" checked></label>
                  <label class="radio-inline"> No <input type="radio" name="reftype" value="0"></label>

                </div>
                <br>
                <p class="text-left"> <strong><b>Is text Book:</b></strong></p>
                <div class="text-left">

                  <label class="radio-inline"> Yes <input type="radio" name="ttype" value="1" checked></label>
                  <label class="radio-inline"> No <input type="radio" name="ttype" value="0"></label>

                </div>
                <br>
                <button type="Submit" name="addBooks">create</button>

              </form>
            </div>
          </div>
          <!--adding books end-->

          <div class="insti mt-2" id="insti">
            <div class="form">
              <img src="./style/logo.png" alt="" height="90px" width="auto" />
              <h2 id="title2">Enter the Book details -></h2>
              <form method='post' action='admin_home.php'>
                <?php include('errors.php'); ?>
                
                <input type="text" placeholder="Instructor Name" name="name"  />
                <input type="text" placeholder="Instructor Email" name="email" />
                <input type="text" placeholder="Instructor username" name="use" />
                <input type="text" placeholder="Instructor Password" name="pas" />
                <!-- <input type="text" placeholder="Copy id" name="Cid" /> -->


                <br>
                <button type="Submit" name="addins">Add Instructor</button>

              </form>
            </div>
          </div>
          <!--adding copies-->
          <div class="addcopy mt-2" id="addcopy1">
            <div class="form">
              <img src="./style/logo.png" alt="" height="90px" width="auto" />
              <h2 id="title2">Enter the Book details -></h2>
              <form method='post' action='admin_home.php'>
                <?php include('errors.php'); ?>
                <input type="text" placeholder="ISBN number" name="ISBN" value="<?php echo $ISBN; ?>" />
                <input type="text" placeholder="Copy id" name="Cid" />

                <br>
                <button type="Submit" name="addcopy">create</button>

              </form>
            </div>
          </div>
          <!--adding copies end-->

          <!--editing password -->
          <div class="main_site  mt-2">

            <div class="Pass  mt-2" id="Pass">
              <div class="form">
                <img src="./style/logo.png" alt="" height="90px" width="auto" />
                <h2 id="title2 text-center">Change Password</h2>
                <div class="details text-left">

                  <p> <strong>Your Admin Id: </strong><?php echo $admin_id ?></p>
                  <form method='post' action='admin_home.php'>
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
          <!--editing  profile end-->

          <div class="edit  mt-2" id="edit">
            <div class="form">
              <img src="./style/logo.png" alt="" height="90px" width="auto" />
              <h2 id="title2 text-center">Enter the following details to update profile</h2>
              <div class="details text-left">

                <p> <strong>Your Admin Id: </strong><?php echo $admin_id ?></p>
                <form method='post' action='admin_home.php'>
                  <?php include('errors.php'); ?>
                  <label>Name</label>
                  <input type="text" name="Name" />
                  <label>Phone-Number</label>
                  <input type="text" name="Phone" />
                  <label>Email</label>
                  <input type="text" name="email" />


                  <button type="Submit" name="update">Edit</button>
              </div>

              </form>
            </div>
          </div>
          <!--adding Authors-->
          <div class="editbooks  mt-2" id="editbooks">
            <div class="form">
              <img src="./style/logo.png" alt="" height="90px" width="auto" />
              <h2 id="title2">Enter the Book details to edit with same ISBN number-></h2>
              <form method='post' action='admin_home.php'>
                <?php include('errors.php'); ?>
                <input type="text" placeholder="title of book" name="title" value="<?php echo $title; ?>" />
                <input type="text" placeholder="ISBN number" name="ISBN" value="<?php echo $ISBN; ?>" />
                <input type="text" placeholder="Author" name="Author" />

                <input type="text" placeholder="publisher name" name="publisher" value="<?php echo $publisher; ?>" />
                <input type="text" placeholder="edition of book" name="edition" />

                <p class="text-left"> <strong><b>Is refrence Book:</b></strong></p>
                <div class="text-left">

                  <label class="radio-inline"> Yes <input type="radio" name="reftype" value="1" checked></label>
                  <label class="radio-inline"> No <input type="radio" name="reftype" value="0"></label>

                </div>
                <br>
                <p class="text-left"> <strong><b>Is text Book:</b></strong></p>
                <div class="text-left">

                  <label class="radio-inline"> Yes <input type="radio" name="ttype" value="1" checked></label>
                  <label class="radio-inline"> No <input type="radio" name="ttype" value="0"></label>

                </div>
                <br>
                <button type="Submit" name="editbooks">Edit</button>

              </form>
            </div>
          </div>

          <!--adding authors end-->
          <div class="main_site">
          </div>
          <div class="View_deatails  mt-2" id="View_deatails">
            <div class="form">
              <img src="./style/logo.png" alt="" height="90px" width="auto" />
              <h2 id="title2 text-center">Your details </h2>
              <div class="details text-left">

                <p> <strong>AdminId: </strong><?php echo $admin_id ?></p>
                <p> <strong>Name: </strong><?php echo $admin_name ?></p>
                <p> <strong>Email: </strong><?php echo $admin_email ?></p>
                <p> <strong>phone-number: </strong><?php echo $phone ?></p>

              </div>

            </div>
          </div>

        </div>


        <!--------------------------------------------------viewing profile---------------------------------------------->

        <!--Manage  books -->
        <div class="manageAuth" id="manageAuth">
          <div class="main-card">
            <h2 id="title2" class="d-flex">Author details</h2>
            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th><strong>Book</strong></th>
                  <th><strong>Author Name</strong></th>

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
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['Author'] . "</td>";



                echo "</tr>";
              }
              mysqli_close($db);

              ?>
            </table>
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
      jQuery('.dashhh').toggle('hide');
    });
  });
</script>

<script>
  $('.insti').hide();
  jQuery(document).ready(function() {
    jQuery('#Ins').on('click', function(event) {
      jQuery('#insti').toggle('show');
      jQuery('.dashhh').toggle('hide');
    });
  });
</script>

<script>
  $('.edit').hide();
  jQuery(document).ready(function() {
    jQuery('#Edit_profile').on('click', function(event) {
      jQuery('#edit').toggle('show');
      jQuery('.dashhh').toggle('hide');
    });
  });

  jQuery(document).ready(function() {
    jQuery('#dash').on('click', function(event) {

      jQuery('.dashhh').toggle('show');
    });
  });
</script>
<script>
  $('.Pass').hide();
  jQuery(document).ready(function() {
    jQuery('#Password').on('click', function(event) {
      jQuery('#Pass').toggle('show');

      jQuery('.dashhh').toggle('hide');
    });
  });
</script>
<script>
  $('.addbooks').hide();
  jQuery(document).ready(function() {
    jQuery('#hideshowbooks').on('click', function(event) {
      jQuery('#addbooks').toggle('show');

      jQuery('.dashhh').toggle('hide');
    });
  });
  $('.addcopy').hide();
  jQuery(document).ready(function() {
    jQuery('#add_copy').on('click', function(event) {
      jQuery('.addcopy').toggle('show');

      jQuery('.dashhh').toggle('hide');
    });
  });

  $('.managebooks').hide();
  jQuery(document).ready(function() {
    jQuery('#hsmanagebooks').on('click', function(event) {
      jQuery('#managebooks').toggle('show');

      jQuery('.dashhh').toggle('hide');
    });
  });
  jQuery(document).ready(function() {
    jQuery('#hsmanagebooks1').on('click', function(event) {
      jQuery('#managebooks').toggle('show');

      jQuery('.dashhh').toggle('hide');
    });
  });
  $('.Auth').hide();
  jQuery(document).ready(function() {
    jQuery('#Adding_Author').on('click', function(event) {
      jQuery('#Auth').toggle('show');
      jQuery('.dashhh').toggle('hide');
    });
  });

  $('.manageAuth').hide();
  jQuery(document).ready(function() {
    jQuery('#Manage_auth').on('click', function(event) {
      jQuery('#manageAuth').toggle('show');
      jQuery('.dashhh').toggle('hide');
    });
  });

  $('.editbooks').hide();
  jQuery(document).ready(function() {
    jQuery('#edit_books').on('click', function(event) {
      jQuery('#editbooks').toggle('show');
      jQuery('.dashhh').toggle('hide');
    });
  });
</script>


</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>