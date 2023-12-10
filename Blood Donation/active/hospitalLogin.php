<?php
// php tag start as well as require function has been added to link the database connection page.
session_start();
// seasion has been started from here in this project
    require 'connection.php';
    // if condition has been applied in this project to execute the task sucessfully. 
    if(isset($_POST['hlogin'])){
        // reterive the email data from database file.
    $hemail=$_POST['hemail'];
            // reterive the password data from database file.
    $hpassword=$_POST['hpassword'];
    // SQL query has been added successfully in this page to select data from the xammp server.
    $sql="select * from hospitals where hemail='$hemail' and hpassword='$hpassword'";
    // result variable has been applied check the connection or die the conection
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $rows_fetched=mysqli_num_rows($result);
        // if condition has been applied in this project to execute the task sucessfully. 
    if($rows_fetched==0){
        // erroe message has been shown by entering the below command
        $error= "Wrong email or password. Please try again.";
        // header location has been set to go another page.
        header( "location:../login.php?error=".$error);
        // else condition has been applied in this project to execute the task sucessfully. 
    }else{
        // row has been fetch from here
        $row=mysqli_fetch_array($result);
                // reterive the email data from database file.
        $_SESSION['hemail']=$row['hemail'];
                // reterive the hospital name data from database file.
        $_SESSION['hname']=$row['hname'];
                // reterive the id from database file.
        $_SESSION['hid']=$row['id'];
        //  message has been set after successfully login into the admin portal
        $msg= $_SESSION['hname'].' Welcome Back!!!! You have logged to the Online Blood Bank Portal';
                // header location has been set to go another page.
        header( "location:../bloodrequest.php?msg=".$msg);
    } 

  }
  // php tag has been stopped here.
?>