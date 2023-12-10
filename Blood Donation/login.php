<?php 
session_start();

if (isset($_SESSION['hid'])) {
    header("location:bloodrequest.php");
} elseif (isset($_SESSION['rid'])) {
    header("location:sentrequest.php");
} else {
?>
<!-- HTML tag starts here -->
<html>
<head>
    <title>Online</title>
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
            color: #4287f5;
        }

        .div-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #4287f5;
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

    <div class="div-container">
        <div class="form-container">
            <center>
                <h1>ADMIN SIGN-IN PORTAL</h1>
            </center>
            <form action="active/hospitalLogin.php" method="post">
                <label>Enter Email-ID</label>
                <input type="email" name="hemail">
                <label>Enter Password</label>
                <input type="password" name="hpassword">
                <input type="submit" name="hlogin" value="Login" class="button">
            </form>
            <center><a href="register2.php" title="Click here">Register Page</a></center>
        </div>
    </div>

    <?php require 'footer.php'; ?>
</body>
</html>
<?php } ?>
