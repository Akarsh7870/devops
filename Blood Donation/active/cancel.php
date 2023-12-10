<?php
// php tag has been included for this page
//database connection page has been inserted here
include "connection.php";
// the below code has been wriiten to get the if from the database.
    $reqid=$_GET['reqid'];
// the below code has been wriiten to delete the if from the database.
	$sql = "delete from bloodrequest where reqid='$reqid'";
    //  if constion has been added in this task to execute
	if (mysqli_query($conn, $sql)) {
        //  error message has been included
	$msg="cancelled successfully...";
    // header location has been applied corresponding to this task.
	header("location:../sentrequest.php?msg=".$msg );
    // else contion has been applied
    } else {
    $error="Error deleting record: " . mysqli_error($conn);
        // header location has been applied corresponding to this task.
    header("location:../sentrequest.php?error=".$error );
    }
    // close the mysql coonnection for this page
    mysqli_close($conn);
?>