<?php
// php tag has been start from here as well as require function has been added to establish the connection page.
require 'connection.php';
// session start from here this page
session_start();
 // if condition has been applied in this project to execute the task sucessfully. 
if(!isset($_SESSION['hid']))
{
	            // header location has been set to go another page.
	header('location:login.php');
}
else {
	if(isset($_POST['add'])){
		//  reterive id number from datebase file.
		$hid=$_SESSION['hid'];
				//  reterive blood group number from datebase file.
		$bg=$_POST['bg'];
		// checking the connection data from the database file
		$check_data = mysqli_query($conn, "SELECT hid FROM bloodinfo where hid='$hid' && bg='$bg'");
		if(mysqli_num_rows($check_data) > 0){
					//  error message has been set for this page
			$error= 'You have already added this blood sample.';
			            // header location has been set to go another page.
			header( "location:../bloodinfo.php?error=".$error );
			    // else condition has been appllied
}else{
		// sql query has been applied to inster the values into the database file
		$sql = "INSERT INTO bloodinfo (bg, hid) VALUES ('$bg', '$hid')";
		if ($conn->query($sql) === TRUE) {
					// successfully message has been shown here
			$msg = "You have added record successfully.";
			            // header location has been set to go another page.
			header( "location:../bloodinfo.php?msg=".$msg );
			    // else condition has been appllied
		} else {
					//  error message has been set for this page
			$error = "Error: " . $sql . "<br>" . $conn->error;
			            // header location has been set to go another page.
            header( "location:../bloodinfo.php?error=".$error );
		}
			// connection has been stopped here
		$conn->close();
	}
}
}
// php tag ended
?>