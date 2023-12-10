<?php
require 'active/connection.php';
session_start();

if (!isset($_SESSION['hid'])) {
    header('location:login.php');
} else {
    $counter = 0; // Initializing counter
    $hid = $_SESSION['hid'];
    $sql = "SELECT bloodrequest.*, receivers.* FROM bloodrequest, receivers WHERE hid='$hid' AND bloodrequest.rid=receivers.id";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>ONLINE</title>
    <style>
        body {
            background-image: url("back.jfif");
            height: 100%;
            width: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: separate;
            border-spacing: 0 15px;
            margin-top: 20px;
        }

        th {
            background-color: #4287f5;
            color: white;
        }

        th,
        td {
            width: 250px;
            text-align: center;
            border: 1px solid black;
            padding: 5px;
        }

        h1 {
            color: #4287f5;
        }
    </style>
</head>

<body>
    <?php require 'navbar/navbaradmin.php'; ?>
    <?php require 'message.php'; ?>

    <div>
        <table>
            <center><h1>USER BLOOD REQUEST TABLE</h1></center>
            <br>
            <tr>
                <th>NO</th>
                <th>NAME</th>
                <th>EMAIL-ID</th>
                <th>COUNTRY</th>
                <th>MOBILE</th>
                <th>TYPE</th>
            </tr>

            <div>
                <?php
                if ($result) {
                    $row = mysqli_num_rows($result);
                    if ($row) {
                        // echo "<b> Total ".$row." </b>";
                    } else {
                        echo '';
                    }
                }
                ?>
            </div>

            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo ++$counter; ?></td>
                    <td><?php echo $row['rname']; ?></td>
                    <td><?php echo $row['remail']; ?></td>
                    <td><?php echo $row['rcity']; ?></td>
                    <td><?php echo $row['rphone']; ?></td>
                    <td><?php echo $row['bg']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php require 'footer.php'; ?>
</body>

</html>
<?php } ?>
