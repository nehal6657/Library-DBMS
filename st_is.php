<?php
session_start();
$iss= $_SESSION['iss'];
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
    <title>Admin Show </title>
</head>

<body>

    <!-- ===============================sidebar end =======================================================-->


    <!-- Page Content Holder -->

    <!-- <div id="content"> -->


        <nav class="navbar navbar-expand-lg navbar-dark bg-dark main-nav">
            <img src="./style/logo.png" alt="logo">
            <h3 id="title3">Library Management System</h3>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="admin_home.php">Home <span class="sr-only">(current)</span></a>
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


        <!-- ===============================sidebar =======================================================-->
        <div class="managebooks" id="managebooks">
            <div class="main-card">
                <h2 id="title2" class="d-flex">Issued Book details</h2>
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th><strong>Issuer_id:</strong></th>
                            <th><strong>ISBN:</strong></th>
                            <th><strong>CId:</strong></th>

                            <th><strong>Issuedate :</strong></th>
                            <th><strong>Return date:</strong></th>
                            <th><strong>Type:</strong></th>


                        </tr>
                    </thead>
                    <?php
                    $db = mysqli_connect("localhost", "root", "", "lib");
                    // if (!$db) {
                    //   die('Could not connect: ' . mysql_error());
                    // }
                    $sql_query = "select * from issues NATURAL JOIN issuer  WHERE issuer_id='$iss' ";
                    $result = mysqli_query($db, $sql_query) ;
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['issuer_id'] . "</td>";
                        echo "<td>" . $row['ISBN'] . "</td>";
                        echo "<td>" . $row['C_id'] . "</td>";

                        echo "<td>" . $row['issue_date'] . "</td>";
                        echo "<td>" . $row['return_date'] . "</td>";
                        if ($row['Sid'] == 0) {
                            echo "<td> Instructor </td>";
                        } else {
                            echo "<td> Student </td>";
                        }

                        echo "</tr>";
                    }
                    mysqli_close($db);

                    ?>
                </table>
                <div class="btq1 d-flex justify-content-center pb-0 mb-0"><a href="student_home.php"><button type="submit" class="btn btn-primary s2">Go Back</button></a></div>
                   
            </div>
        <!-- </div> -->