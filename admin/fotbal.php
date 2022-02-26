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

        <h3 class="text-dark mb-0">Football</h3>

    </div>

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <h6 class="text-primary fw-bold m-0">Imagini</h6>

            </div>

            <div class="card-body" style="margin-left:20px!important;">

                <div class="row">

                    <?php

                    for ($i = 1; $i <= 2; $i++) {

                        $var = 'footbal_img_' . $i;

                        echo '<div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">';

                        echo '<img style="display: block;margin-left: auto;margin-right: auto;width: 80%;" width="128" height="128" src="http://clubvoinicelu.ro/admin/uploads/' . dictionary($var) . '">';

                        upload_img($var);

                        echo '<label style="display: block;margin-left: auto;margin-right: auto;width:80%;">Poza ' . $i . '&nbsp;<form method="post" action="" enctype="multipart/form-data">

                            <input type="file" name="file"/>

                            <input type="submit" value="Upload" name="' . $var . '">

                        </form></label></div>';

                    }

                    ?>


                </div>

            </div>

        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <h6 class="text-primary fw-bold m-0">Texte</h6>

            </div>
            <div class="row">
                <div class="col-lg-12 col-xl-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <h6 class="mb-0">
                                        <div class="text-center"><strong>Titlu principal</strong>
                                        </div><?php input_dictionary("footbal_title"); ?>
                                    </h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-12 col-xl-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <h6 class="mb-0">
                                        <div class="text-center"><strong>Subtitlu</strong>
                                        </div><?php input_dictionary("footbal_subtitle"); ?>
                                    </h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-12 col-xl-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <h6 class="mb-0">
                                        <div class="text-center"><strong>Titlu teren</strong>
                                        </div><?php input_dictionary("footbal_teren_title"); ?>
                                    </h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-12 col-xl-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <h6 class="mb-0">
                                        <div class="text-center"><strong>Continut</strong>
                                        </div><?php input_dictionary("footbal_teren_content"); ?>
                                    </h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-12 col-xl-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <h6 class="mb-0">
                                        <div class="text-center"><strong>Tarif</strong>
                                        </div><?php input_dictionary("footbal_teren_tarif"); ?>
                                    </h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <?php
                for($i = 1 ; $i < 3; $i++){
                    echo '<div class="col-lg-12 col-xl-6">';
                    echo '<ul class="list-group list-group-flush">';
                    echo '    <li class="list-group-item">';
                    echo '        <div class="row align-items-center no-gutters">';
                    echo '            <div class="col me-2">';
                    echo '                <h6 class="mb-0">';
                    echo '                    <div class="text-center"><strong>Titlu '.$i.'</strong></div>';input_dictionary("footbal_title_".$i);
                    echo '                </h6>';
                    echo '            </div>';
                    echo '        </div>';
                    echo '    </li>';
                    echo '</ul>';
                    echo '<ul class="list-group list-group-flush">';
                    echo '    <li class="list-group-item">';
                    echo '        <div class="row align-items-center no-gutters">';
                    echo '            <div class="col me-1">';
                    echo '                <h7 class="mb- ">';
                    echo '                    <div class="text-center"><strong>Content '.$i.'</strong></div>';input_dictionary("footbal_content_".$i);
                    echo '                </h7>';
                    echo '            </div>';
                    echo '        </div>';
                    echo '    </li>';
                    echo '</ul>';
                    echo '</div>';
                }
                ?>

            </div>

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