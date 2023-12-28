<?php
require_once("include/initialize.php");

if (isset($_SESSION['StudentID'])) {
    redirect('index.php');
}

if (isset($_POST['btnLogin'])) {
    $email = trim($_POST['user_email']);
    $upass = trim($_POST['user_pass']);
    $h_upass = sha1($upass);

    if ($email == '' || $upass == '') {
        message("Invalid Username and Password!", "error");
        redirect(web_root . "login.php");
    } else {
        $student = new Student();
        $res = $student::studentAuthentication($email, $h_upass);

        if ($res == true) {
            redirect(web_root . "index.php");
        } else {
            message("Account does not exist! Please contact Administrator.", "error");
            redirect(web_root . "login.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link href="<?= web_root; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= web_root; ?>fonts/font-awesome.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="<?= web_root; ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= web_root; ?>css/main.css">
    <style>
        body {
            background-image: url("images/study.jpg");
            background-size: cover;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login100-form {
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 5px;
        }

        .login100-form-title {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .wrap-input100 {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        .input100 {
            font-size: 16px;
            color: #333;
            display: block;
            width: 100%;
            height: 40px;
            background: transparent;
            padding: 0 5px;
            border: none;
            border-bottom: 2px solid #555;
            margin: 0;
        }

        .focus-input100::before {
            content: "";
            display: block;
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #555;
            transition: 0.4s;
        }

        .focus-input100::after {
            content: "";
            display: block;
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #009688;
            transition: 0.4s;
            transform: scaleX(0);
        }

        .focus-input100:focus::before,
        .focus-input100:focus::after {
            transform: scaleX(1);
        }

        .container-login100-form-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 10px;
        }

        .login100-form-btn {
            font-size: 16px;
            color: #fff;
            background-color: #009688;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login100-form-btn:hover {
            background: #00796b;
        }

        .text-center {
            text-align: center;
        }

        .txt2 {
            font-size: 14px;
            color: #555;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form class="login100-form" action="" method="POST">
        <span class="login100-form-title">
            Member Login
        </span>

        <div class="wrap-input100">
            <input class="input100" type="text" name="user_email" placeholder="Username">
        </div>

        <div class="wrap-input100" data-validate="Password is required">
            <input class="input100" type="password" name="user_pass" placeholder="Password">
        </div>

        <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" name="btnLogin">
                Login
            </button>
        </div>

        <div class="text-center p-t-136">
            <a class="txt2" href="register.php">
                Create your Account
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        </div>
    </form>

    <script src="<?= web_root; ?>js/jquery.js"></script>
    <script src="<?= web_root; ?>js/bootstrap.min.js"></script>
    <script src="<?= web_root; ?>vendor/select2/select2.min.js"></script>
    <script src="<?= web_root; ?>vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="js/main.js"></script>
</body>
</html>
