<?php
session_start();

// initializing variables
$ISBN="";
$C_id="";
$Issuer_id="";
$errors = array();
$x="";
// connect to the database
$db = mysqli_connect("localhost", "root", "", "lib");
$_SESSION['conn'] = $db;

// ------------------------------ISSUE BOOKS------------------------------------
if (isset($_POST['issueBooks'])) {
    // receive all input values from the form
    $ISBN = mysqli_real_escape_string($db, $_POST['ISBN']);
    $C_id = mysqli_real_escape_string($db, $_POST['Copyid']);
    $Issuer_id = mysqli_real_escape_string($db, $_POST['Issuerid']);
    $type = $_POST['type'];



    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($ISBN)){
        array_push($errors, "ISBN of book is required");
    }
    if (empty($C_id)) {
        array_push($errors, "Copy id is required");
    }
    if (empty($Issuer_id)) {
        array_push($errors, "Issuer id is required");
    }


    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $book_check_query = "SELECT * FROM `copy` WHERE C_id = '$C_id' and ISBN ='$ISBN'";
    $result = mysqli_query($db, $book_check_query);
    $res = mysqli_fetch_assoc($result);
    $ISSUER = "SELECT * FROM `issuer` WHERE issuer_id = '$Issuer_id' ";
    $result1 = mysqli_query($db, $ISSUER);
    $res1 = mysqli_fetch_assoc($result1);
    if(!$res){
        array_push($errors, "no such book exists!!");
    }
    if (!$res1) {
        array_push($errors, "no such issuer exists!!");
    }
    
    
    // while ($row = mysqli_fetch_assoc($result)) {
    //      $x = $row['isIssued'];        
    //    }
    //  if($x){
    //      array_push($errors, "book is already issued!");   
    //  }

    // Finally, register user if there are no errors in the form
    // if (count($errors) == 0) {
    //     // $password = md5($password_1); //encrypt the password before saving in the database
    //     //if($)
    //     $sql = "INSERT INTO `issues`(`issuer_id`, `ISBN`, `C_id`) VALUES ('$Issuer_id','$ISBN','$C_id')";
    //     // $query = "INSERT INTO issues" . " (issuer_id,ISBN,C_id,issue_date) 
  	// 	// 	  VALUES" . "('$Issuer_id','$ISBN', '$C_id','now()')";
    //     mysqli_query($db, $sql);
        
    //     header('location: issue_books.php');   
    // }
    if (count($errors) == 0) {

        // $query = "INSERT INTO students"." (username, name, email, Pass,type)
        // 	  VALUES"."('$username','$name', '$email', '$password','$type')";
        if ($type==0){
            $query = "INSERT INTO issues" . "(ISBN, issuer_id, C_id,issue_date,return_date) VALUES" . "('$ISBN', '$Issuer_id', '$C_id',now(),now()+INTERVAL 10 DAY)";
            mysqli_query($db, $query);
            echo "issuer added to db";

            header('location: issue_books.php');
        }else if($type==1){
            $query = "INSERT INTO issues" . "(ISBN, issuer_id, C_id,issue_date,return_date) VALUES" . "('$ISBN', '$Issuer_id', '$C_id',now(),now()+INTERVAL 15 DAY)";
            mysqli_query($db, $query);
            echo "issuer added to db";

            header('location: issue_books.php');
        } else if ($type == 2) {
            $query = "INSERT INTO issues" . "(ISBN, issuer_id, C_id,issue_date,return_date) VALUES" . "('$ISBN', '$Issuer_id', '$C_id',now(),now()+INTERVAL 20 DAY)";
            mysqli_query($db, $query);
            echo "issuer added to db";

            header('location: issue_books.php');
        } else if ($type == 3) {
            $query = "INSERT INTO issues" . "(ISBN, issuer_id, C_id,issue_date,return_date) VALUES" . "('$ISBN', '$Issuer_id', '$C_id',now(),now()+INTERVAL 30 DAY)";
            mysqli_query($db, $query);
            echo "issuer added to db";

            header('location: issue_books.php');
        }
        
    }

}
/*--------------------------------register endd------------------------------ */
?>
