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
    <title>Bloodbank | Register</title>
    <style>
        body {
             
            background-color: cyan;
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        ul {
            padding: 30px;
        }

        h1 {
            color: #4287f5; 
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }

        input,
        select {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            box-sizing: border-box;
        }

        .button {
            background-color: cyan; 
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #3366cc; 
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

    <div>
        <div>
            <div>
                <ul style="padding: 30px;">
                    <li>
                        <center><h1>User Registration Portal</h1></center>
                    </li>
                </ul>

                <center>
                    <div>
                        <form action="active/receiverReg.php" method="post" enctype="multipart/form-data">
                            <input type="text" name="rname" placeholder="Enter Full Name" required>
                            <select name="rbg" required>
                                <option disabled="" selected="">Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                            <input type="text" name="rcity" placeholder="Enter Country" required>
                            <input type="tel" name="rphone" placeholder="Enter Phone Number" title="Password must start from 0, 6, 7, 8 or 9 and must have 10 to 12 digits">
                            <input type="email" name="remail" placeholder="Enter Email" required>
                            <input type="password" name="rpassword" placeholder="Enter Password" required minlength="6">
                            <input type="submit" name="rregister" value="Submit" class="button">
                        </form>
                    </div>
                </center>
            </div>
            <center><a href="login2.php">Log-In</a></center>
        </div>
    </div>

    <?php require 'footer.php'; ?>
</body>

</html>
<?php } ?>
