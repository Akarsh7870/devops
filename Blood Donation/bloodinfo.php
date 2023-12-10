<?php
require 'active/connection.php';
session_start();

if (!isset($_SESSION['hid'])) {
    header('location:login.php');
} else {
    $counter = 0; // Initializing counter

    // Fetching blood information for the logged-in hospital
    if (isset($_SESSION['hid'])) {
        $hid = $_SESSION['hid'];
        $sql = "select * from bloodinfo where hid='$hid'";
        $result = mysqli_query($conn, $sql);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Online</title>
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
            border-spacing: 0 20px;
            margin-top: 20px;
        }

        th {
            background-color: #4287f5;
            color: white;
        }

        th,
        td {
            width: 400px;
            text-align: center;
            border: 1px solid black;
            padding: 5px;
        }

        h1 {
            color: #4287f5;
        }

        .btn {
            background-color: #4287f5;
            color: white;
            padding: 8px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #3366cc;
        }
    </style>
</head>

<body>
    <?php require 'navbar/navbaradmin.php'; ?>

    <div>
        <?php require 'message.php'; ?>

        <div class="col">
            <center>
                <div class="col">
                    <div>
                        <center><h1>Insert Blood Group Details</h1></center>
                        <div class="card-body">
                            <form action="active/infoAdd.php" method="post">
                                <select name="bg" required="">
                                    <option disabled selected>Blood Type</option>
                                    <option>AB-</option>
                                    <option>AB+</option>
                                    <option>O-</option>
                                    <option>O+</option>
                                    <option>A-</option>
                                    <option>A+</option>
                                    <option>B-</option>
                                    <option>B+</option>
                                </select><br>
                                <input type="checkbox" name="condition" value="agree" required> Please Tick this box, If agreed<br><br>
                                <input type="submit" name="add" value="Insert Blood Type" class="btn">
                            </form>
                        </div>
                    </div>
                </div>
            </center>

            <?php
            if (isset($_SESSION['hid'])) {
                $hid = $_SESSION['hid'];
                $sql = "select * from bloodinfo where hid='$hid'";
                $result = mysqli_query($conn, $sql);
            }
            ?>

            <center>
                <div>
                    <table>
                        <h1>Display All Blood Entry Details</h1>
                        <tr>
                            <th>No</th>
                            <th>BLOOD</th>
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

                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo ++$counter; ?></td>
                                <td><?php echo $row['bg']; ?></td>
                                <td><a href="active/delete.php?bid=<?php echo $row['bid']; ?>" class="btn">Remove</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </center>
        </div>
    </div>
    <?php require 'footer.php'; ?>
</body>

</html>
<?php } ?>
</style>
