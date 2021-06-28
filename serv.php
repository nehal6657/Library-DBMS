<?php
session_start();

// initializing variables

$_SESSION['conn'] = "";

$Sid = $_SESSION['Sid'];

$errors = array();

// connect to the database
$db = mysqli_connect("localhost", "root", "", "lib");
$_SESSION['conn'] = $db;


/* ------------------------------Editing Profile--------------------------*/
 if (isset($_POST['update'])) {

 $Username = $_POST['Username'];
 $Name = $_POST['Name'];
$Email = $_POST['email'];
$type = $_POST['type'];

// // form validation: ensure that the form is correctly filled ...
// // by adding (array_push()) corresponding error unto $errors array
 if (empty($Username)) {
 array_push($errors, "username is required");
 $_SESSION['username'] = 258;
 }

if (count($errors) == 0) {


$query = "UPDATE students ". "SET Username = '$Username', Name= '$Name', type='$type', email='$Email'". "WHERE Sid = ' ".$Sid ." '";

mysqli_query($db, $query);
 

 $_SESSION['username'] = $Username;
 $_SESSION['email'] = $Email;


 array_push($errors, "$Name");

 }
}

/* ------------------------------end of Editing Profile--------------------------*/
if (isset($_POST['change'])) {
    $old = mysqli_real_escape_string($db, $_POST['old']);
    $New = mysqli_real_escape_string($db, $_POST['New']);
    $New1 = mysqli_real_escape_string($db, $_POST['New1']);


    if (empty($old)) {
        array_push($errors, "Old password is required");
    }
    if (empty($New)) {
        array_push($errors, "Password is required");
    }
    if ($New != $New1) {
        array_push($errors, "The two passwords do not match");
        
    }

    if (count($errors) == 0 ) {
        // $pswd = md5($user_pswd);
        // $query = "SELECT * FROM users WHERE user_Fname='$user_Fname' AND user_pswd='$user_pswd'";
        // $results = mysqli_query($db, $query);
        $sql_query = "select count(*) as cntUser from students where Sid='"  . $Sid  . "' and Pass='" . $old . "'";
        // $result = mysqli_query($db, $sql_query);
        $row = mysqli_fetch_array(mysqli_query($db, $sql_query));

        $count = $row['cntUser'];
        if ($count > 0) {
            $query = "UPDATE students " . "SET Pass = '$New'" . "WHERE Sid = ' " . $Sid . " '";

            mysqli_query($db, $query);

            $_SESSION['success'] = "You are now logged in";
            header('location: student_home.php ');
        } else {

            array_push($errors, "Old password is incorrect");
        }
    }
}
/*---------------------search by author---------------------------------------------------- */
