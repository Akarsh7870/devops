<?php 
session_start();
require 'active/connection.php';
if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id && bg LIKE '%$searchKey%'";
} else {
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id";
}
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<title>Online</title>

<body>
  <style>
    body{
        background-image: url("back.jfif");
        height: 100%; 
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
  </style>

  <?php require 'navbar/navbaruser.php'?>
  
  <div>
    <?php require 'message.php'; ?>
    <center><div><h1>ONLINE BLOOD BANK SYSTEM</h1></div></center> 
    <div class="container">
      <form method="get" action="" style="margin-top:-20px; ">
        <label >Search Data :</label>
        <select name="search">
          <option><?php echo @$_GET['search']; ?></option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
        </select>
        <input type="submit" name="submit" class="button" value="Enter">
      </form>
    </div>
    
    <center><table>
      <tr><th colspan="7" class="title">Available Blood in the hospital.</th></tr>
      <tr>
        <th>NO</th>
        <th>NAME</th>               
        <th>MOBILE</th>
        <th>B.TYPE</th>
        <th>STATUS</th>
      </tr>

      <div>
        <?php
        if ($result) {
          $row = mysqli_num_rows($result);
          if ($row) {
            // echo "<b> Total ".$row." </b>";
          } else {
            echo '<b>Data Not Available.....</b>';
          }
        }
        ?>
      </div>

      <?php while($row = mysqli_fetch_array($result)) { ?>
        <tr>
          <td><?php echo ++$counter;?></td>
          <td><?php echo $row['hname'];?></td>
          <td><?php echo ($row['hphone']); ?></td>
          <td><?php echo ($row['bg']); ?></td>
          <?php $bid= $row['bid'];?>
          <?php $hid= $row['hid'];?>
          <?php $bg= $row['bg'];?>
          <form action="active/request.php" method="post">
            <input type="hidden" name="bid" value="<?php echo $bid; ?>">
            <input type="hidden" name="hid" value="<?php echo $hid; ?>">
            <input type="hidden" name="bg" value="<?php echo $bg; ?>">

            <?php if (isset($_SESSION['hid'])) { ?>
              <td><a href="javascript:void(0);" class="btn btn-info hospital">Apply For blood</a></td>
            <?php } else { ?>
              <td><input type="submit" name="request" class="button" value="Apply For Blood"></td>
            <?php } ?>
          </form>
        </tr>
      <?php } ?>
    </table></center>
  </div>
  <?php require 'footer.php' ?>
</body>

<style>
  table {
    border-collapse: separate;
    border-spacing: 0 15px;
  }
  th {
    background-color: rebeccapurple;
    color: white;
  }
  th,
  td {
    width: 300px;
    text-align: center;
    border: 1px solid black;
    padding: 5px;
  }
  h2 {
    color: #4287f5;
  }
</style>

<script type="text/javascript">
    $('.hospital').on('click', function(){
        alert("user can not apply for this blood.");
    });
</script>
</html>
