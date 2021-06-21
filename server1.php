<?php
session_start();



$_SESSION['conn'] = "";



$errors = array();

// connect to the database
$db = mysqli_connect("localhost", "root", "", "lib");
$_SESSION['conn'] = $db;



/*------------------------------adding books to the database--------------- */
// initializing variables
$title = "";
$ISBN = "";
$publisher = "";
$edition = " ";


if (isset($_POST['addBooks'])) {
    // receive all input values from the form
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $ISBN = mysqli_real_escape_string($db, $_POST['ISBN']);
    $publisher = mysqli_real_escape_string($db, $_POST['publisher']);
    $edition = mysqli_real_escape_string($db, $_POST['edition']);
    $reftype =  $_POST['reftype'];
    $ttype = $_POST['ttype'];
    if (empty($title)) {
        array_push($errors, "Book title is required");
    }
    if (empty($ISBN)) {
        array_push($errors, "ISBN is required");
    }

    // first check the database to make sure 
    // a book with same isbn doesnt exist
    $user_check_query = "SELECT * FROM book WHERE ISBN='"  . $ISBN  . "' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if book exists
        array_push($errors, "ISBN (book) already exists");
    }
    if (count($errors) == 0) {

        // $query = "INSERT INTO students"." (username, name, email, Pass,type) 
        // 	  VALUES"."('$username','$name', '$email', '$password','$type')";
        $query = "INSERT INTO book" . "(ISBN, title, publisher, edition, ref_flag, t_flag) VALUES" . "('$ISBN', '$title', '$publisher', '$edition', '$reftype', '$ttype')";
        mysqli_query($db, $query);
        echo "book added to db";

        header('location: admin_home.php');
    }
}

/* ------------------------------end of adding books--------------------------*/

// <!-- -------------------------------------------login for admin------------------------------------------ -->
if (isset($_POST['admin_loginuser'])) {
    $admin_id = mysqli_real_escape_string($db, $_POST['admin_id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($admin_id)) {
        array_push($errors, "admin_id is required");
    }
    if (empty($password)) {
        array_push(
            $errors,
            "Password is required"
        );
    }

    if (
        count($errors) == 0
    ) {
        // $pswd = md5($user_pswd);
        // $query = "SELECT * FROM users WHERE user_Fname='$user_Fname' AND user_pswd='$user_pswd'";
        // $results = mysqli_query($db, $query);
        $sql_query = "select count(*) as cntUser from admins where admin_id='"  . $admin_id  . "' and admin_pswd='" . $password . "'";
        // $result = mysqli_query($db, $sql_query);
        $row = mysqli_fetch_array(mysqli_query($db, $sql_query));

        $count = $row['cntUser'];
        if ($count > 0) {
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['success'] = "You are now logged in";
            header('location: admin_home.php ');
        } else {

            array_push($errors, "Wrong_id/password combination");
        }
    }
}
?>