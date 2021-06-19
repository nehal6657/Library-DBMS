<?php include('server.php');?>

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
          <p class="text-left" id="title2">
            Welcome <strong><?php echo $_SESSION['username']; ?> !</strong>
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
              <button class="dropbtn1" onclick="addBook()" id="hideshowbooks">Add Book</button>
              <a href="#">Manage Books</a>

            </div>
          </div> 
        </li>
        <li>
        <div class="dropdown">
            <button class="dropbtn">Authors</button>
            <div class="dropdown-content w-100">
              <a href="#">Add Authors</a>
              <a href="#">Manage Authors</a>

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
                  <a class="nav-link" href="#">Pricing</a>
                </li>

              </ul>
            </div>
          </nav>
          <div class="main_site">
            <div class="addbooks" id="addbooks">
              <div class="form">
                <img src="./style/logo.png" alt="" height="90px" width="auto"/>
                  <h2 id="title2">Enter the Book details -></h2>
                  <form method='post' action='admin_home1.php'>
                    <?php include('errors.php'); ?>
                    <input type="text" placeholder="title of book" name="name"/>
                    <input type="number" placeholder="ISBN number" name="ISBN" />
                    <input type="text" placeholder="publisher name" name="publisher" />
                    <input type="number" placeholder="edition" name="edition" />
                    <p class="text-left"> <strong><b>Is refrence Book:</b></strong></p>
                    <div class="text-left">
              
                      <label class="radio-inline">  Yes  <input type="radio" name="reftype" value="1" checked></label>
                      <label class="radio-inline">  No  <input type="radio" name="reftype" value="0"></label>
              
                    </div>
                    <br>
                    <p class="text-left"> <strong><b>Is text Book:</b></strong></p>
                    <div class="text-left">
              
                      <label class="radio-inline">  Yes    <input type="radio" name="ttype" value="1" checked></label>
                      <label class="radio-inline">  No     <input type="radio" name="ttype" value="0"></label>
              
                    </div>
                    <br>
                    <button type="Submit" name="addBooks">create</button>
              
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
    //$('.addbooks').hide();
    jQuery(document).ready(function(){
    jQuery('#hideshowbooks').on('click', function(event) {        
        jQuery('#addbooks').toggle('show');
      });
    });
  </script>

  </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
</body>

</html>