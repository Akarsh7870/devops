<?php
// php tag start for this page
//database connection page has been inserted here
include "connection.php";
// the below code has been wriiten to get the if from the database.
    $bid=$_GET['bid'];
    // the below code has been wriiten to delete the if from the database.
	$sql = "delete from bloodinfo where bid='$bid'";
        //  if constion has been added in this task to execute
	if (mysqli_query($conn, $sql)) {
	$msg="Blood Sample deleted sucessfully.";
        // header location has been applied corresponding to this task.
	header("location:../bloodinfo.php?msg=".$msg );
        // else contion has been applied
    } else {
    $error="Error deleting record: " . mysqli_error($conn);
        // header location has been applied corresponding to this task.
    header("location:../bloodinfo.php?error=".$error );
    }
        // close the mysql coonnection for this page
    mysqli_close($conn);
?>