<?php
require_once("../assets/functions/config.php");
$actual_link = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/";
if ($_SESSION['admin'] != 1) {
    header("Location:" . $actual_link . "login.php");
}

if (isset($_POST["ant-limit"])) {
    global $con;
    $newval = $_POST["ant-limit"];
    $query = "update configs set value='$newval' where name='ant'";
    $result = mysqli_query($con, $query);
}

$limit_ant = config_check('ant');

for($i = 1; $i <= $limit_ant; $i++){
    if (isset($_POST["ant-gall-limit-".$i])) {
        global $con;
        $newval = $_POST["ant-gall-limit-".$i];
        $nameval = "antrenor_gall_".$i;
        $query = "update configs set value='$newval' where name='$nameval'";
        $result = mysqli_query($con, $query);
    }
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

    <div class="justify-content-between align-items-center mb-4">

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <h3 class="text-dark mb-0">Antrenori</h3>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Nr. Antrenori&nbsp;</label>
                    </div>
                    <div class="col-6">
                        <form action="antrenori.php" id="ant" method="post">
                            <select name="ant-limit" id="ant-limit" class="form-select form-select-sm">
                                <option value="2" selected="">2</option>
                                <?php foreach ([3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15] as $limit_ant) : ?>
                                    <option
                                        <?php if (config_check("ant") == $limit_ant) echo 'selected'; ?>
                                            value="<?= $limit_ant; ?>">
                                        <?= $limit_ant; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <h6 class="text-primary fw-bold m-0">Setari galerie</h6>

            </div>
            <div class="row">
                <?php
                $ant_max = config_check('ant');

                for ($i = 1; $i <= $ant_max; $i++) {
                    $limit_ant_gallery = config_check('antrenor_gall_'.$i);
                    echo '<div class="col-lg-6 col-xl-4">';
                    echo '<ul class="list-group list-group-flush">';
                    echo '    <li class="list-group-item">';
                    echo '        <div class="row align-items-center no-gutters">';
                    echo '            <div class="col me-2">';
                    echo '                <h6 class="mb-0">';
                    echo '                    <div class="text-center"><strong>Antrenor ' . $i . '</strong></div>';

                    echo '<form action="antrenori.php" id="ant-gall-limit-'.$i.'" method="post">';
                    echo '     <select name="ant-gall-limit-'.$i.'" id="ant-gall-limit-'.$i.'" class="form-select form-select-sm">';
                    echo '<option value="1" selected="">1</option>';?>
                    <?php foreach ([2, 3] as $limit_ant_gallery) : ?>
                        <option
                            <?php if (config_check('antrenor_gall_'.$i) == $limit_ant_gallery) echo 'selected'; ?>
                                value="<?= $limit_ant_gallery; ?>">
                            <?= $limit_ant_gallery; ?>
                        </option>
                    <?php endforeach;
                    echo '        </select>';
                    echo '</form>';

                    echo '                </h6>';
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

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <h6 class="text-primary fw-bold m-0">Poze galerie</h6>

            </div>
            <div class="row">
                <?php

                    $ant_max = config_check('ant');

                    for ($i = 1; $i <= $ant_max; $i++) {
                        $gall_max = config_check('antrenor_gall_'.$i);
                        for ($j = 1; $j <= $gall_max; $j++) {
                            $var = 'antrenor_gall_' . $i .'_' . $j;
                            echo '<div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">';
                            echo '<img style="display: block;margin-left: auto;margin-right: auto;width: 80%;" width="128" height="128" src="http://clubvoinicelu.ro/admin/uploads/' . dictionary($var) . '">';
                            upload_img($var);
                            echo '<label style="display: block;margin-left: auto;margin-right: auto;width:80%;">Antrenor ' . $i . ' poza ' . $j . '&nbsp;<form method="post" action="" enctype="multipart/form-data">
                                <input type="file" name="file"/>
                                <input type="submit" value="Upload" name="' . $var . '">
                            </form></label></div>';
                        }
                    }

                    ?>

            </div>

        </div>


    </div>


    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <h6 class="text-primary fw-bold m-0">Imagini</h6>

            </div>

            <div class="card-body" style="margin-left:20px!important;">

                <div class="row">

                    <?php

                    $ant_max = config_check('ant');

                    for ($i = 1; $i <= $ant_max; $i++) {

                        $var = 'antrenori_img_' . $i;

                        echo '<div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">';

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
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row align-items-center no-gutters">
                                    <div class="col me-2">
                                        <h6 class="mb-0">
                                            <div class="text-center"><strong>Titlu principal</strong>
                                            </div><?php input_dictionary("antrenori_title"); ?>
                                        </h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
                <?php
                $ant_max = config_check('ant');

                for ($i = 1; $i <= $ant_max; $i++) {
                    echo '<div class="col-lg-12 col-xl-6">';
                    echo '<ul class="list-group list-group-flush">';
                    echo '    <li class="list-group-item">';
                    echo '        <div class="row align-items-center no-gutters">';
                    echo '            <div class="col me-2">';
                    echo '                <h6 class="mb-0">';
                    echo '                    <div class="text-center"><strong>Titlu ' . $i . '</strong></div>';
                    input_dictionary("antrenori_title_" . $i);
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
                    echo '                    <div class="text-center"><strong>Content ' . $i . '</strong></div>';
                    input_dictionary("antrenori_content_" . $i);
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

</div>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/theme.js"></script>
<script>
    $(document).ready(function () {
        $('#ant-limit').change(function () {
            $('form#ant').submit();
        })
        for (let i = 1; i < 15; i++) {
            $('#ant-gall-limit-'+ i).change(function () {
                $('form#ant-gall-limit-'+ i).submit();
            })
        }
    });
</script>

</body>


</html>