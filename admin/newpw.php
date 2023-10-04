<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Generate a unique verification token
    $token = md5(uniqid(rand(), true));

    // Calculate the token expiration time (e.g., 1 hour from now)
    $tokenExpiration = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // Insert the token and expiration time into the database
    $query = mysqli_query($con, "INSERT INTO password_reset_tokens (token, user_id, expiration_time) 
                                  SELECT '$token', id, '$tokenExpiration' FROM tbladmin 
                                  WHERE AdminEmailId='$email' AND AdminUserName='$username'");

    if($query)
    {
        // Send an email with the verification link
        $to = $email;
        $subject = 'Password Reset Verification';
        $message = 'Please click the following link to reset your password: ' . PHP_EOL;
        $message .= 'http://localhost/news/admin/reset_password.php?token=' . $token;
        // Send the email (you can use a library like PHPMailer for this)
        // mail($to, $subject, $message);

        echo "<script>alert('Verification email sent. Please check your inbox.');</script>";
    }
    else
    {
        echo "<script>alert('Invalid Details. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Livr News Portal.">
    <meta name="author" content="xyz">
    <title>Live News Portal | Forgot Password</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/modernizr.min.js"></script>
    <script type="text/javascript">
        function checkpass() {
            if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                alert('New Password and Confirm Password field do not match');
                document.changepassword.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="bg-transparent">
    <section>
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12">
                    <div class="wrapper-page">
                        <div class="m-t-40 account-pages">
                            <div class="text-center account-logo-box">
                                <h2 class="text-uppercase">
                                    <a href="index.php" class="text-success">
                                        <span><img src="assets/images/logo.png" alt="" height="56"></span>
                                    </a>
                                </h2>
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" required="" name="username" placeholder="Username" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" required="" name="email" placeholder="Email" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input type="password" class="form-control" id="userpassword" name="confirmpassword" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input type="password" class="form-control" id="userpassword" name="newpassword" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-xs-12">
                                            <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="submit">Reset</button>
                                        </div>
                                    </div>
                                 </form>
                                <div class="clearfix"></div>
                                <a href="../index"><i class="mdi mdi-home"></i> Back Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>
</body>
</html>