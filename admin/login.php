<?php
$actual_link = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/";
require_once("../assets/functions/config.php");
if($_SESSION['admin'] == 1){
    header("Location:".$actual_link."index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>
<body class="bg-gradient-primary">
<div class="container" style="padding:0 20% 0 20%;">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-5">
                    <div class="row">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Welcome Back!</h4>
                            </div>
                            <?php login_validation(); ?>
                            <form method="post" class="user">
                                <div class="mb-3"><input class="form-control form-control-user" type="text" name="user"></div>
                                <div class="mb-3"><input class="form-control form-control-user" type="password" name="pass"></div>
                                <div class="mb-3">
                                    <div class="custom-control custom-checkbox small">
                                        <div class="form-check"><input class="form-check-input custom-control-input"
                                                                       type="checkbox" id="formCheck-1"><label
                                                class="form-check-label custom-control-label" for="formCheck-1">Remember
                                            Me</label></div>
                                    </div>
                                </div>
                                <button class="btn btn-primary d-block btn-user w-100" name="login" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>