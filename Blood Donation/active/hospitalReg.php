<?php
// php tag has been start from here as well as require function has been added to establish the connection page.
require 'connection.php';
 // if condition has been applied in this project to execute the task sucessfully. 
if(isset($_POST['hregister'])){
	        // reterive the name data from database file.
	$hname=$_POST['hname'];
	        // reterive the email data from database file.
	$hemail=$_POST['hemail'];
	        // reterive the password data from database file.
	$hpassword=$_POST['hpassword'];
	        // reterive the phone data from database file.
	$hphone=$_POST['hphone'];
	        // reterive the city data from database file.
	$hcity=$_POST['hcity'];
	        // check the email id if it is valid or not.
	$check_email = mysqli_query($conn, "SELECT hemail FROM hospitals where hemail = '$hemail' ");
	// if condition has been applied in this project to execute the task sucessfully. 
	if(mysqli_num_rows($check_email) > 0){
		//  error message has been set for this page
    $error= 'Email Already exists. Please try another Email.';
            // header location has been set to go another page.
    header( "location:../register.php?error=".$error );
    // else condition has been appllied
}else{
	// sql query has been applied to inster the values into the database file
	$sql = "INSERT INTO hospitals (hname, hemail, hpassword, hphone, hcity)
	VALUES ('$hname','$hemail', '$hpassword', '$hphone', '$hcity')";
	   // if condition has been applied in this project to execute the task sucessfully. 
	if ($conn->query($sql) === TRUE) {
		// successfully message has been shown here
		$msg = 'You have successfully registered. Please, login to continue.';
		header( "location:../login.php?msg=".$msg );
	 // else condition has been applied in this project to execute the task sucessfully. 
	} else {
		//  error message has been set here
		$error = "Error: " . $sql . "<br>" . $conn->error;
		        // header location has been set to go another page.
        header( "location:../register.php?error=".$error );
	}
	// connection closed here
	$conn->close();
}
}
 // php tag ended
?>