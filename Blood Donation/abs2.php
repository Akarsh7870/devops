<?php 
session_start();
require 'active/connection.php';

// Check if the search parameter is set
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
<head>
    <title>Bloodbank | Available Blood Samples</title>
    <style>
        body {
            background-image: url("back.jfif");
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        table {
            /* CSS has been included to customize the table format of this page */
            border-collapse: separate;
            border-spacing: 0 15px;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            /* CSS has been included to customize the table format of this page */
            text-align: center;
            border: 1px solid black;
            padding: 8px;
        }

        th {
            /* CSS has been included to customize the table format of this page */
            background-color: #4287f5;
            color: white;
        }

        h1 {
            color: #4287f5;
        }

        .container {
            margin-top: -20px;
        }
    </style>
</head>

<body>
    <?php require 'navbar/navbar.php'?>
    <div>
        <?php require 'message.php'; ?>
        <center>
            <div>
                <h1>ONLINE BLOOD BANK SYSTEM</h1>
            </div>
        </center> 

        <div class="container">
            <form method="get" action="">
                <label>Choose Any One :</label>
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
                <input type="submit" name="submit" class="button" value="search">
            </form>
        </div>

        <center>
            <table>
                <tr>
                    <th colspan="7" class="title">Available Blood in this Hospital</th>
                </tr>
                <tr>
                    <th>NO</th>
                    <th>NAME</th>
                    <th>PHONE</th>
                    <th>B.TYPE</th>
                </tr>

                <div>
                    <?php
                    if ($result) {
                        $row = mysqli_num_rows($result);
                        if ($row) {
                            //echo "<b> Total ".$row." </b>";
                        } else {
                            echo '<center><b>Data Not Available....</b></center>';
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
                        <form action="file/request.php" method="post">
                            <input type="hidden" name="bid" value="<?php echo $bid; ?>">
                            <input type="hidden" name="hid" value="<?php echo $hid; ?>">
                            <input type="hidden" name="bg" value="<?php echo $bg; ?>">
                        </form>
                    </tr>
                <?php } ?>
            </table>
        </center>
    </div>
    <?php require 'footer.php' ?>
</body>
</html>
