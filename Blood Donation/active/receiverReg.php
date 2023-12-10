<?php
// php tag has been start from here as well as require function has been added to establish the connection page.
if(isset($_POST['rregister'])){
	require 'connection.php';
		        // reterive the name data from database file.
	$rname=$_POST['rname'];
		        // reterive the email data from database file.
	$remail=$_POST['remail'];
		        // reterive the password data from database file.
	$rpassword=$_POST['rpassword'];
		        // reterive the mobile data from database file.
	$rphone=$_POST['rphone'];
		        // reterive the city data from database file.
	$rcity=$_POST['rcity'];
		        // reterive bg data from database file.
	$rbg=$_POST['rbg'];
		        // check the email id if it is valid or not.
	$check_email = mysqli_query($conn, "SELECT remail FROM receivers where remail = '$remail' ");
		// if condition has been applied in this project to execute the task sucessfully. 
	if(mysqli_num_rows($check_email) > 0){
				//  error message has been set for this page
    $error= 'Email Avialbles...try another....';
                // header location has been set to go another page.
    header( "location:../register.php?error=".$error );
}else{
	$sql = "INSERT INTO receivers (rname, remail, rpassword, rphone, rcity, rbg)
	VALUES ('$rname','$remail', '$rpassword', '$rphone', '$rcity', '$rbg')";
		// if condition has been applied in this project to execute the task sucessfully. 
	if ($conn->query($sql) === TRUE) {
		$msg = "successfully registered..";
		            // header location has been set to go another page.
		header( "location:../login2.php?msg=".$msg);
	} else {
		// error message command has beenset here
		$error = "Error: " . $sql . "<br>" . $conn->error;
		            // header location has been set to go another page.
        header( "location:../register.php?error=".$error );
	}
	//  connection closed
	$conn->close();
}
}
// php tag ended
?>