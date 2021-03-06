<?php

require_once("../assets/functions/config.php");

$actual_link = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/";


if ($_SESSION['admin'] != 1) {
    header("Location:" . $actual_link . "login.php");

}


?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?v=<?php echo time(); ?>">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">

    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">

    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">

</head>

<?php require_once('assets/includes/header.php'); ?>

<div class="container-fluid">

    <div class="d-sm-flex justify-content-between align-items-center mb-4">

        <h3 class="text-dark mb-0">Tenis</h3>

    </div>

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <h6 class="text-primary fw-bold m-0">Tenis</h6>

            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">

                    <div class="row align-items-center no-gutters">

                        <div class="col me-2">

                            <h6 class="mb-0">

                                <div class="text-center"><strong>Titlu Principal</strong></div>

                                <?php input_dictionary("tenis_title"); ?>

                            </h6>

                        </div>

                    </div>

                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <h6 class="mb-0">
                                        <div class="text-center"><strong>Titlu 1</strong></div>
                                        <?php input_dictionary("tenis_i_title"); ?>
                                    </h6>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <h6 class="mb-0">
                                        <div class="text-center"><strong>Titlu 2</strong></div>
                                        <?php input_dictionary("tenis_p_title"); ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <h6 class="mb-0">
                                                <div class="text-center"><strong>Subtitlu 1</strong></div>
                                                <?php input_dictionary("tenis_i_a_title"); ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-1">
                                            <h6 class="mb- ">
                                                <div class="text-center"><strong>Continut 1</strong></div>
                                                <?php input_dictionary("tenis_i_a_content"); ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <h6 class="mb-0">
                                                <div class="text-center"><strong>Subtitlu 2</strong></div>
                                                <?php input_dictionary("tenis_i_c_title"); ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-1">
                                            <h6 class="mb-0">
                                                <div class="text-center"><strong>Continut 2</strong></div>
                                                <?php input_dictionary("tenis_i_c_content"); ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-1">
                                    <h6 class="mb-0">&nbsp;&nbsp;</h6>
                                </div>
                            </div>
                            <div class="row align-items-center no-gutters">
                                <div class="col me-1">
                                    <h6 class="mb-0">
                                        <div class="text-center"><strong>Continut 1</strong></div>
                                        <?php input_dictionary("tenis_i_a_content"); ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>


            </ul>

        </div>


    </div>


</div>

<?php require_once('assets/includes/footer.php'); ?>

</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>

</div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<script src="assets/js/chart.min.js"></script>

<script src="assets/js/bs-init.js"></script>

<script src="assets/js/theme.js"></script>

</body>


</html>