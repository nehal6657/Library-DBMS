<?php
session_start();



$_SESSION['conn'] = "";
$admin_id = "";
$errors = array();

// connect to the database
$db = mysqli_connect("localhost", "root", "", "lib");
$_SESSION['conn'] = $db;

$title = "";
$ISBN = "";
$publisher = "";
$edition = " ";
$Author = " ";
$Avail=" ";

if (isset($_POST['editbooks'])) {
    // receive all input values from the form
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $ISBN = mysqli_real_escape_string($db, $_POST['ISBN']);
    $publisher = mysqli_real_escape_string($db, $_POST['publisher']);
    $edition = mysqli_real_escape_string($db, $_POST['edition']);
    $Author = mysqli_real_escape_string($db, $_POST['Author']);
    $Avail = mysqli_real_escape_string($db, $_POST['Avail']);
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




        // $query = "INSERT INTO students"." (username, name, email, Pass,type)
        // 	  VALUES"."('$username','$name', '$email', '$password','$type')";
        $sql = "UPDATE book SET title = '$title', Author= '$Author',Avail='$Avail', publisher='$publisher',edition='$edition', ref_flag='$reftype',t_flag='$ttype' WHERE ISBN = ' " . $ISBN . " '";
        // $query = "UPDATE book " . "SET title = '$title', Author= '$Author', publisher='$publisher',edition='$edition', ref_flag='$reftype,t_flag='$ttype'" . "WHERE ISBN = ' " . $ISBN . " '";
        // // $query = "INSERT INTO book" . "(ISBN, title, Author,publisher ,edition, ref_flag, t_flag) VALUES" . "('$ISBN', '$title', '$Author','$publisher','$edition', '$reftype', '$ttype')";
        mysqli_query($db, $sql);
        echo "book added to db";
        array_push($errors, $title);

        header('location: admin_home.php');
    }else{
        array_push($errors, "ISBN does not match");
    }
}
/*------------------------------Edting  profile to the database--------------- */

if (isset($_POST['update'])) {

    $Phone = $_POST['Phone'];
    $Name = $_POST['Name'];
    $Email = $_POST['email'];
 

    // // form validation: ensure that the form is correctly filled ...
    // // by adding (array_push()) corresponding error unto $errors array
    if (empty($Name)) {
        array_push($errors, "Name is required");
        
    }

    if (count($errors) == 0) {

        $sql = "UPDATE admins SET admin_name = '$Name', admin_email= '$Email', phone_number='$Phone' WHERE admin_id = ' " . $admin_id . " '";
        // $query = "UPDATE admins " . "SET admin_name = '$Name', admin_emai= '$Email', phone_number='$Phone'" . "WHERE admin_id = ' " . $admin_id . " '";

        mysqli_query($db, $sql);


        
        


        array_push($errors, "$Name");
    }
}

/*------------------------------updating  password  to the admin of database--------------- */

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

    if (
        count($errors) == 0
    ) {
        // $pswd = md5($user_pswd);
        // $query = "SELECT * FROM users WHERE user_Fname='$user_Fname' AND user_pswd='$user_pswd'";
        // $results = mysqli_query($db, $query);
        $sql_query = "select count(*) as cntUser from admins where admin_id='"  . $admin_id  . "' and admin_pswd='" . $old . "'";
        // $result = mysqli_query($db, $sql_query);
        $row = mysqli_fetch_array(mysqli_query($db, $sql_query));

        $count = $row['cntUser'];
        if ($count > 0) {
            $query = "UPDATE admins " . "SET admin_pswd = '$New'" . "WHERE admin_id = ' " . $admin_id . " '";

            mysqli_query($db, $query);

            $_SESSION['success'] = "You are now logged in";
            header('location: admin_home.php ');
        } else {

            array_push($errors, "Old password is incorrect");
        }
    }
}
/*------------------------------adding author to the database--------------- */
// $Auth_name=" ";
// if (isset($_POST['addAuthor'])) {
//     $Auth_name = mysqli_real_escape_string($db, $_POST['Auth_name']);
//     if (empty($Auth_name)) {
//         array_push($errors, "Name is required");
//     }
//     if (count($errors) == 0) {

//         // $query = "INSERT INTO students"." (username, name, email, Pass,type)
//         // 	  VALUES"."('$username','$name', '$email', '$password','$type')";
//         $query = "INSERT INTO author" . "( Auth_name) VALUES" . "( '$Auth_name')";
//         mysqli_query($db, $query);
//         echo "Author added to db";

//         header('location: admin_home.php');
//     }
// }

/*------------------------------adding books to the database--------------- */
// initializing variables
$title = "";
$ISBN = "";
$publisher = "";
$edition = " ";
$Author=" ";


if (isset($_POST['addBooks'])) {
    // receive all input values from the form
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $ISBN = mysqli_real_escape_string($db, $_POST['ISBN']);
    $publisher = mysqli_real_escape_string($db, $_POST['publisher']);
    $edition = mysqli_real_escape_string($db, $_POST['edition']);
    $Author = mysqli_real_escape_string($db, $_POST['Author']);
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
        $query = "INSERT INTO book" . "(ISBN, title, Author,publisher ,edition, ref_flag, t_flag) VALUES" . "('$ISBN', '$title', '$Author','$publisher','$edition', '$reftype', '$ttype')";
        mysqli_query($db, $query);
        echo "book added to db";
        header('location: admin_home.php');
    }
}

/* ------------------------------end of adding books--------------------------*/
/*--------------------------------adding copies------------------------------ */
// initializing variables

$ISBN1 = "";
$Cid ="";


if (isset($_POST['addcopy'])) {
    // receive all input values from the form
    
    $ISBN1 = mysqli_real_escape_string($db, $_POST['ISBN']);
    $Cid = mysqli_real_escape_string($db, $_POST['Cid']);
    
    if (empty($ISBN1)) {
        array_push($errors, "Book ISBN is required");
    }
    if (empty($Cid)) {
        array_push($errors, "Copyid is required");
    }

    // first check the database to make sure
    // a book with same isbn doesnt exist
    $user_check_query = "SELECT * FROM book WHERE ISBN='"  . $ISBN1  . "' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if (!$user) { // if book exists
        array_push($errors, "ISBN of (book) does not exists, first add book to database");
    }

    $user_check_query1 = "SELECT * FROM copy WHERE ISBN='"  . $ISBN1  . "' and C_id = '"  . $Cid  . "'LIMIT 1";
    $result1 = mysqli_query($db, $user_check_query1);
    $user1 = mysqli_fetch_assoc($result1);

    if ($user1) { // if book exists
        array_push($errors, "copy already exists!");
    }
    if (count($errors) == 0) {

        // $query = "INSERT INTO students"." (username, name, email, Pass,type)
        // 	  VALUES"."('$username','$name', '$email', '$password','$type')";
        $query = "INSERT INTO copy" . "(ISBN, C_id,purchase_date) VALUES" . "('$ISBN1', '$Cid', now())";
        mysqli_query($db, $query);
        echo "book added to db";
        header('location: admin_home.php');
    }
}


/*--------------------------------end of adding copies------------------------------ */
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
$id='';
$name='';
$email='';
$use='';


if (isset($_POST['addins'])) {
    // receive all input values from the form
    
    $use = mysqli_real_escape_string($db, $_POST['use']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['pas']);
    
    $type = $_POST['type'];



    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($use)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check = "SELECT * FROM instructor WHERE instructor_email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check);
    $user = mysqli_fetch_assoc($result);
    $user_check_query1 = "SELECT * FROM instructor WHERE instructor_username='$use' LIMIT 1";
    $result1 = mysqli_query($db, $user_check_query1);
    $user1 = mysqli_fetch_assoc($result1);

    if ($user) { // if user exists

        if ($user['instructor_email'] === $email) {
            array_push($errors, "email already exists");
        }
    }
    if ($user1) { // if user exists

        if ($user['instructor_username'] === $use) {
            array_push($errors, "username  already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        // $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO instructor" . " ( `instructor_name`, `instructor_email`, `instructor_username`, `instructor_pass`) 
  			  VALUES" . "('$name', '$email', '$use','$password')";
        mysqli_query($db, $query);
     
        header('location: admin_home.php');
    }
}
?>