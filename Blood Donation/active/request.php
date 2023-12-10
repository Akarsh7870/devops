<?php
// php tag has been start from here as well as require function has been added to establish the connection page.
session_start(); 
// session start from here this page
require 'connection.php';
 // if condition has been applied in this project to execute the task sucessfully. 
if(!isset($_SESSION['rid']))
{
		            // header location has been set to go another page.
	header('location:../login.php');
}
    // else condition has been appllied
else {
	if(isset($_POST['request'])){
				//  reterive id number from datebase file.
		$hid = $_POST['hid'];
						//  reterive blood group number from datebase file.
		$rid = $_SESSION['rid'];
						//  reterive user id number from datebase file.
		$bg = $_POST['bg'];
				// checking the connection data from the database file
		$check_data = mysqli_query($conn, "SELECT reqid FROM bloodrequest where hid='$hid' and rid='$rid'");
		if(mysqli_num_rows($check_data) > 0){
								//  error message has been set for this page
			$error= 'You have already requested for blood sample from this Hospital.';
								            // header location has been set to go another page.

			header( "location:../abs.php?error=".$error );
			    // else condition has been appllied
}else{
			// sql query has been applied to inster the values into the database file
		$sql="INSERT INTO bloodrequest (bg, hid, rid) VALUES ('$bg', '$hid', '$rid')";
		 // if condition has been applied in this project to execute the task sucessfully. 
		if ($conn->query($sql) === TRUE) {
								// successfully message has been shown here
			$msg = 'You have requested for blood group '.$bg.'. Our team will contact you soon.';
			header( "location:../sentrequest.php?msg=".$msg);
			    // else condition has been appllied
		} else {
				//  error message has been set for this page
			$error = "Error: " . $sql . "<br>" . $conn->error;
					            // header location has been set to go another page.
            header( "location:../abs.php?error=".$error );
		}
		    // else condition has been appllied

		$conn->close();
	}
}
}
// php tag end
?>