<?php 
// php tag has been included as well as connection page is also set up here
require 'active/connection.php'; 
// session has been start here
session_start();
// condition has been applied to check the user id number
  if(!isset($_SESSION['rid']))
  {
  	// header location has been set here to go another page
  header('location:login.php');
  }
  //  condition has been included here
  else {
  	// get the user if from the database file
    $rid = $_SESSION['rid'];
    // sql command has been applied here to reterive the information from the database file
    $sql = "select bloodrequest.*, hospitals.* from bloodrequest, hospitals where rid='$rid' && bloodrequest.hid=hospitals.id";
    // result has been set in this page.
    $result = mysqli_query($conn, $sql);
    // php tag ended here
?>
<!-- html tag start from here for this page -->
<html>
<!-- title has been written in this page -->
<title>ONLINE</title>
<style>
   body{
        background-image: url("back.jfif");
        height: 100%; 
          background-position: center;
            background-repeat: no-repeat;
              background-size: cover;
    }
</style>
<!-- boddy tag has been applied here -->
<body>
<!-- php tag has been applied here to link the head page into this page -->
	<?php require 'navbar/navbaruser.php'?>
	<!-- div tag has been written here as well as class has beenset for this page -->
	<div class="container cont">
<!-- php tag has been applied here to link the head page into this page -->
		<?php require 'message.php'; ?>
<!-- php tag has been applied here to link the head page into this page -->
<!-- table format has been set for this page as well as show the data in the table format -->
	<table>
		<!-- heading page has been set -->
		<center><h1>Display Blood Booking Details</h1></center>
		<!-- table title has been set for the this page -->
			<tr>
						<!-- table title has been set for the this page -->
			<th>No</th>
					<!-- table title has been set for the this page -->
			<th>Hospital Name</th>
					<!-- table title has been set for the this task -->
			<th>Hospital Email</th>
				<!-- table title has been set for the this page -->
			<th>Phone</th>
					<!-- table title has been set for the this page -->
			<th>Blood Type</th>
				<!-- table title has been set for the this page -->
			<th>Action</th>
			<!-- tag ended here -->
		</tr>

		    <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b>You have not requested yet....</b>';
            }
            ?>
            </div>
<!-- php tag start as well as while loop used  -->
		<?php while($row = mysqli_fetch_array($result)) { ?>
<!-- tr tag start here -->
		<tr>
					<!-- table title has been set for the this page -->
			<td><?php echo ++$counter;?></td>
					<!-- table title has been set for the this page -->
			<td><?php echo $row['hname'];?></td>
					<!-- table title has been set for the this page -->
			<td><?php echo $row['hemail'];?></td>
					<!-- table title has been set for the this page -->
			<td><?php echo $row['hphone'];?></td>
					<!-- table title has been set for the this page -->
			<td><?php echo $row['bg'];?></td>
			<!-- table title has been set for the this page -->
			<td>
				<a href="active/cancel.php?reqid=<?php echo $row['reqid'];?>" class="button">Cancel</a>
			
			</td>
		</tr>
		<?php } ?>
	</table>
</div>
<!-- php tag start here as well as link the footer page of this task -->
    <?php require 'footer.php'; ?>
</body>
 <style>
      table {
      	/*css has been included to customize the table format of this page*/
        border-collapse: separate;
        border-spacing: 0 20px;
      }
      th {
        background-color: #4287f5;
        color: white;
      }
      th,
      td {
        width: 500px;
        text-align: center;
        border: 1px solid black;
        padding: 5px;
      }
      
    </style>
</html>
<?php } ?>