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
    <title>User Login Portal</title>
    <style>
        body {
            background-image: url("back.jfif");
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
            color: #4287f5; /* Set your desired color */
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }

        label {
            color: #4287f5; /* Set your desired color */
        }

        input {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            box-sizing: border-box;
        }

        .button {
            background-color: #4287f5; /* Set your desired color */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #3366cc; /* Set your desired color on hover */
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #4287f5; /* Set your desired color */
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
                        <center><h1>User Login Portal</h1></center>
                    </li>
                </ul>

                <center>
                    <div>
                        <form action="active/receiverLogin.php" method="post">
                            <label>Enter Email-ID</label>
                            <input type="email" name="remail" placeholder="Enter User Email">
                            <label>Enter Password</label>
                            <input type="password" name="rpassword" placeholder="Enter User Password">
                            <input type="submit" name="rlogin" value="Login" class="button">
                        </form>
                    </div>
                </center>
            </div>
            <center><a href="register.php" title="Click here">Register Page</a></center>
        </div>
    </div>

    <?php require 'footer.php'; ?>
</body>

</html>
<?php } ?>
