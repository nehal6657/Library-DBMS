<?php
session_start();

// initializing variables
$name = "";
$username = "";
$email = "";
$_SESSION['conn'] = "";



$errors = array();

// connect to the database
$db = mysqli_connect("localhost", "root", "", "lib");
$_SESSION['conn'] = $db;

// ------------------------------REGISTER USER------------------------------------
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);
    $type = $_POST['type'];



    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if ($password != $password2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM students WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        // $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO students" . " (username, name, email, Pass,type) 
  			  VALUES" . "('$username','$name', '$email', '$password','$type')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now registered";   
        header('location: admin_home.php');   
    }
}
/*--------------------------------register endd------------------------------ */

/* -------------------------login--------------------------------------- */
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        // $pswd = md5($user_pswd);
        // $query = "SELECT * FROM users WHERE user_Fname='$user_Fname' AND user_pswd='$user_pswd'";
        // $results = mysqli_query($db, $query);
        $sql_query = "select count(*) as cntUser from students where Username='"  . $username  . "' and Pass='" . $password . "'";
        // $result = mysqli_query($db, $sql_query);
        $row = mysqli_fetch_array(mysqli_query($db, $sql_query));

        $count = $row['cntUser'];
        if ($count > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $row['email'];
            $_SESSION['sid'] = $row['Sid'];

            $_SESSION['success'] = "You are now logged in";
            header('location: admin_home.php ');
        } else {

            array_push($errors, "Wrong username/password combination");
        }
    }
}
/*------------------------------login end ---------------------------------*/

/*------------------------------adding books to the database--------------- */
$title = "";
$ISBN = "";
$publisher = "";
$edition=" ";


if(isset($_POST['addBooks'])){
    // receive all input values from the form
    $title = mysqli_real_escape_string($db, $_POST['name']);
    $ISBN = mysqli_real_escape_string($db, $_POST['ISBN']);
    $publisher = mysqli_real_escape_string($db, $_POST['publisher']);
    $edition= mysqli_real_escape_string($db, $_POST['edition']);
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
        $query = "INSERT INTO book". "(ISBN, title, publisher, edition, ref_flag, t_flag) VALUES"."('$ISBN', '$title', '$publisher', '$edition', '$reftype', '$ttype')";
        mysqli_query($db, $query);
        echo "book added to db";
         
        header('location: login.php');   
    }

    




}

/* ------------------------------end of adding books--------------------------*/

/* ------------------------------Editing Profile--------------------------*/
if (isset($_POST['Edit_details'])) {
    
    $Username = $_SESSION['username'];
    $Name = mysqli_real_escape_string($db, $_POST['Name']);
    $Email = mysqli_real_escape_string($db, $_POST['']);
    $type = $_POST['type'];

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    
    if (empty($Username)) {
        array_push($errors, "username is required");
        $_SESSION['username'] = 258;
    }
    
    if (count($errors) == 0) {
        //  $query = "Update students set Name='$name1' where email=' ".$email2 ." ' "  ;
        $query = "";
        $Sid = $_SESSION['sid'];
        $sql = "UPDATE students ". "SET Username = '$Username', Name= '$Name', type='$type', email='$Email'". "WHERE Sid = ' ".$Sid ." '";
      
        mysqli_query($db, $query);
        echo "nehal";
        $_SESSION['sid'] = $Sid;
        $_SESSION['username'] = $Username;
        $_SESSION['email'] = $Email;
        //$_SESSION['sid'] = $row['Sid'];

        array_push($errors, "$Name");

    }
}

// <!-- -------------------------------------------login for admin------------------------------------------ -->
if (isset($_POST['admin_loginuser'])) {
    $admin_id = mysqli_real_escape_string($db, $_POST['admin_id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($admin_id)) {
        array_push($errors, "admin_id is required");
    }
    if (empty($password)) {
        array_push($errors,
            "Password is required"
        );
    }

    if (count($errors) == 0
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

            array_push($errors,$admin_id, "Wrong id/password combination");
        }
    }
}
?>
