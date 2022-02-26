<?php
require_once("../assets/functions/config.php");
$actual_link = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/";
if ($_SESSION['admin'] != 1) {
    header("Location:" . $actual_link . "login.php");
}

if (isset($_POST["faq-limit"])) {
    global $con;
    $newval = $_POST["faq-limit"];
    $query = "update configs set value='$newval' where name='faq'";
    $result = mysqli_query($con, $query);
}

$limit_faq = config_check('faq');

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
                <h3 class="text-dark mb-0">F.A.Q</h3>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Nr. F.A.Q&nbsp;</label>
                    </div>
                    <div class="col-6">
                        <form action="faq.php" id="faq" method="post">
                            <select name="faq-limit" id="faq-limit" class="form-select form-select-sm">
                                <option value="4" selected="">4</option>
                                <?php foreach ([5, 6, 7, 8, 9, 10] as $limit_faq) : ?>
                                    <option
                                        <?php if (config_check("faq") == $limit_faq) echo 'selected'; ?>
                                        value="<?= $limit_faq; ?>">
                                        <?= $limit_faq; ?>
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
                                            </div><?php input_dictionary("faq_title"); ?>
                                        </h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
                <?php
                $faq_max = config_check('faq');

                for ($i = 1; $i <= $faq_max; $i++) {
                    echo '<div class="col-lg-12 col-xl-6">';
                    echo '<ul class="list-group list-group-flush">';
                    echo '    <li class="list-group-item">';
                    echo '        <div class="row align-items-center no-gutters">';
                    echo '            <div class="col me-2">';
                    echo '                <h6 class="mb-0">';
                    echo '                    <div class="text-center"><strong>Tab ' . $i . '</strong></div>';
                    input_dictionary("faq_tab_" . $i);
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
                    input_dictionary("faq_tab_content_" . $i);
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
        $('#faq-limit').change(function () {
            $('form#faq').submit();
        })
    });
</script>

</body>


</html>