<?php 
session_start();

if (isset($_SESSION['hid'])) {
    header("location:bloodrequest.php");
} elseif (isset($_SESSION['rid'])) {
    header("location:sentrequest.php");
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Online</title>
    <style>
        body {
            background-color: cyan; 
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .col {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .table {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }

        input {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            box-sizing: border-box;
        }

        .button {
            background-color: #4287f5;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #3366cc;
        }

        h1 {
            color: #4287f5;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #4287f5;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php require 'navbar/navbar.php'; ?>
    <?php require 'message.php'; ?>

    <div class="col">
        <div class="table">
            <center>
                <h1>Hospitals Member Register Portal</h1>
            </center>
            <form action="active/hospitalReg.php" method="post" enctype="multipart/form-data">
                <!-- input tags have been applied here to enter the details. -->
                <input type="text" name="hname" placeholder="Enter Name" required>
                <input type="text" name="hcity" placeholder="Enter Country" required>
                <input type="tel" name="hphone" placeholder="Enter Mobile" required title="Password must start from 0, 6, 7, 8, or 9 and must have 10 to 12 digits">
                <input type="email" name="hemail" placeholder="Enter Email" required>
                <input type="password" name="hpassword" placeholder="Enter Password" required minlength="6">
                <input type="submit" name="hregister" value="Register" class="button">
            </form>

            <a href="login.php" title="Click here">Login Here</a>
        </div>
    </div>

    <?php require 'footer.php'; ?>
</body>
</html>
<?php } ?>
