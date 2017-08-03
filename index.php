<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $dbcon = new PDO('mysql:host=localhost;dbname=id2357704_dbtest', 'id2357704_test_schema', '');

    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $user = $dbcon->prepare("SELECT id FROM admin WHERE username = :myusername and passcode = :mypassword");

    $user->execute(['myusername' => $myusername, 'mypassword' => $mypassword]);

    //*DB Connection Option 1 (Using Config.php, More Vulnarable to SQL Injection)*//
    //$sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
    //$result = mysqli_query($db,$sql);
    //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    //$count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($user->rowCount() == 1){                        //$count == 1) {
        $_SESSION['login_user'] = $myusername;

        header("Location: Main.php"); // Go to Main.php page
        exit;
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>

<html>

<head>
    <title>Login Page</title>

    <style type = "text/css">

        #cf {
            position:left;
            height:281px;
            width:450px;
            margin:0 auto;
        }

        #cf img {
            position:absolute;
            left:0;
            -webkit-transition: opacity 1s ease-in-out;
            -moz-transition: opacity 1s ease-in-out;
            -o-transition: opacity 1s ease-in-out;
            transition: opacity 1s ease-in-out;
        }

        #cf img.top:hover {
            opacity:0;
        }

        body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
        }

        label {
            font-weight:bold;
            width:100px;
            font-size:14px;
        }

        .box {
            border:#666666 solid 1px;
        }
    </style>

</head>

<body bgcolor = "#FFFFFF">

<div id="cf">
    <img class="bottom" src="media/images/icon/kali_logo.png"/>
    <img class="top" src="media/images/icon/gallery_icon.png"/>
</div>



<div style = "font-size:18px; color:#6bcc4e; margin-top:17px"><?php echo 'Current Timestamp: ' , date('H:i:s, l F Y e') ?></div>


<div align = "center">
    <div style = "width:300px; border: solid 1px #333333; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

        <div style = "margin:30px">

            <form action = "" method = "post">
                <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                <input type = "submit" value = " Submit "/><br />
            </form>

            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

        </div>

    </div>

</div>

</body>
</html>