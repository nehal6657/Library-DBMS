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
    <title>Admin-Return</title>
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
            <h2 id="title2" class="d-flex">Overdue Books details</h2>
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th><strong>Issuer_id:</strong></th>
                        <th><strong>ISBN:</strong></th>
                        <th><strong>CId:</strong></th>

                        <th><strong>Issuedate :</strong></th>
                        <th><strong>Return date:</strong></th>
                        <th><strong>Overdue days:</strong></th>
                        <th><strong>Fine:</strong></th>



                    </tr>
                </thead>
                <?php
                $db = mysqli_connect("localhost", "root", "", "lib");
                // if (!$db) {
                //   die('Could not connect: ' . mysql_error());
                // }
                $sql_query = "select * from issues  WHERE return_date < now() ";
                $result = mysqli_query($db, $sql_query);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['issuer_id'] . "</td>";
                    echo "<td>" . $row['ISBN'] . "</td>";
                    echo "<td>" . $row['C_id'] . "</td>";
                    $r = $row['issue_date'];
                    $date1 = strtotime($r);
                    //echo date('d/M/Y h:i:s', $date1);
                    $i = $row['return_date'];
                    $date2 = strtotime($i);
                    //echo date('d/M/Y h:i:s', $date2);
                    $datetime1 = new DateTime($r);
                    $datetime2 = new DateTime($i);
                    $diff = $datetime1->diff($datetime2);
                    //echo $interval->format('%Y-%m-%d %H:%i:%s');

                    $details = array_intersect_key((array)$diff, array_flip(['y', 'm', 'd', 'h', 'i', 's']));

                    $overdue_days = 0;
                    $counter = 0;

                    //echo "nehal <br>";
                    foreach ($details as $value) {
                        //echo "$value <br>";
                        if ($counter === 0) {
                            $overdue_days = $overdue_days + 365 * $value;
                        } else if ($counter === 1) {
                            $overdue_days = $overdue_days + 30 * $value;
                        } else if ($counter === 2) {
                            $overdue_days = $overdue_days + $value;
                        }
                        $counter = $counter + 1;
                    }
                    //echo "nehal";



                    $sql = "SELECT  DATEDIFF('$i', '$r') as cnt ";
                    $ro = mysqli_fetch_array(mysqli_query($db, $sql));
                    $d = $ro['cnt'];
                    echo "<td>" . date('d/M/Y h:i:s', $date2) . "</td>";
                    echo "<td>" . date('d/M/Y h:i:s', $date1) . "</td>";

                    echo "<td>" . /*$diff->format('%Y-%m-%d %H:%i:%s')*/  $overdue_days . "</td>";
                    $f=($overdue_days)*5;
                    echo "<td>" . /*$diff->format('%Y-%m-%d %H:%i:%s')*/  $f . "</td>";
                    //  echo "<td>" . /*$diff->format('%Y-%m-%d %H:%i:%s')*/  $overdue_days*5 . "</td>"

                    echo "</tr>";
                }
                mysqli_close($db);

                ?>
            </table>

            <div class="btq1 d-flex justify-content-center pb-0 mb-0"><a href="admin_home.php"><button type="submit" class="btn btn-primary s2">Go Back</button></a></div>

        </div>
        <!-- </div> -->