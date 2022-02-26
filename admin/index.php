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
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet"
          href="assets/bootstrap/css/bootstrap.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>
<?php require_once('assets/includes/header.php'); ?>
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Dashboard</h3>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-primary fw-bold text-xs mb-1">
                                <span>Email-uri trimise</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo config_check("emails"); ?></span>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Grade</span>
                            </div>
                            <div class="text-dark fw-bold h5 mb-0"><span>
                                    <?php
                                    $apiKey = "3c08549e6426ec22a038f5283ea82c98";
                                    $cityId = "683506";
                                    $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

                                    $ch = curl_init();

                                    curl_setopt($ch, CURLOPT_HEADER, 0);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                    curl_setopt($ch, CURLOPT_VERBOSE, 0);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                    $response = curl_exec($ch);

                                    curl_close($ch);
                                    $data = json_decode($response);
                                    $currentTime = time();
                                    echo $data->main->temp_max; ?>°C
                                </span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-temperature-high fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-warning py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-warning fw-bold text-xs mb-1">
                                <span>Umiditate</span>
                            </div>
                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $data->main->humidity; ?> %</span>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-smog fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-success fw-bold text-xs mb-1">
                                <span>Rezervari confirmate</span>
                            </div>
                            <div class="text-dark fw-bold h5 mb-0"><span>
                                    <?php
                                    global $con;
                                    $query = "select * from rezervari where status = 1";
                                    $result = mysqli_query($con, $query);
                                    echo mysqli_num_rows($result);
                                    ?>
                                </span></div>
                        </div>
                        <div class="col-auto"><i class="fas fa-user-check fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 col-xl-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="text-primary fw-bold m-0">Setari</h6>
                </div>
                <div class="card-body" style="margin-left:20px!important;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <label class="form-check-label " for="formCheck_switch">Activeaza anuntul&nbsp;
                                    <input class="form-check-input" type="checkbox"
                                           id="formCheck_switch" <?php if (config_check("announce") == 1) {
                                        echo checked;
                                    } ?>>&nbsp;</label>
                            </div>
                            <form method="post">
                                <?php config_content("announce_text"); ?>
                                <div class="d-none" id="content_switch">
                                    <input class="form-control" type="textarea"
                                           value="<?php echo config_check("announce_text"); ?>" name="btn_switch"
                                           id="formCheck_input">
                                    <button class="btn btn-primary" type="submit">Modifica</button>
                                </div>
                            </form>
                            <div class="form-check form-switch">
                                <label class="form-check-label " for="formCheck_switch_s">Schimba preturi
                                    <?php if (config_check("sezon") == 1) {
                                        echo 'iarna';
                                    } else {
                                        echo 'vara';
                                    } ?>&nbsp;
                                    <input class="form-check-input" type="checkbox"
                                           id="formCheck_switch_s" <?php if (config_check("sezon") == 1) {
                                        echo checked;
                                    } ?>>&nbsp;</label>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <label class="form-check-label " for="form_pass">
                                <button class="btn btn-primary" style="margin-bottom:15px!important;" id="form_pass"
                                        type="submit">Schimba parola
                                </button>
                            </label>
                            <form method="post">
                                <?php changepass(); ?>
                                <div class="d-none" id="form_pass_input">
                                    <label><input name="oldpass" class="form-control" required>Parola curenta</label>
                                    <label><input name="newpass" class="form-control" required>Parola noua</label>
                                    <label><input name="newpass2" class="form-control" required>Repeta parola
                                        noua</label>
                                    <button class="btn btn-primary" name="changepass" type="submit">Modifica</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="text-primary fw-bold m-0">Trimite survey</h6>
                </div>
                <div class="card-body" style="margin-left:20px!important;">
                    <form method="post">
                        <?php send_survey(); ?>
                        <div id="form_pass_input">
                            <div class="row">
                                <div class="col-4">
                                    <label>Email</label>
                                    <input name="email_survey" class="form-control" required>
                                </div>
                                <div class="col-4">
                                    <label>Antrenor</label>
                                    <select name="send-survey" id="send-survey" class="form-select">
                                        <?php
                                        for($i= 1; $i<= config_check('ant');$i++){
                                            echo '<option value="';
                                            if(dictionary('antrenori_title_'.$i)==""){
                                                echo 'Antrenor '.$i;
                                            }else{
                                                echo dictionary('antrenori_title_'.$i);
                                            }
                                            echo '"';
                                            if($i == 1) {echo 'selected';}
                                            echo '>';
                                            if(dictionary('antrenori_title_'.$i)==""){
                                                echo 'Antrenor '.$i;
                                            }else{
                                                echo dictionary('antrenori_title_'.$i);
                                            }
                                            echo '</option>';


                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-primary" name="survey" type="submit">Trimite</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-xl-4">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary fw-bold m-0">Rezervari</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Fara raspuns&quot;,&quot;Acceptate&quot;,&quot;Refuzate&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#4e73df&quot;,&quot;#1cc88a&quot;,&quot;#E44726&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;<?php
                        global $con;
                        echo mysqli_num_rows(mysqli_query($con, "select * from rezervari where status = '0'")); ?>&quot;,&quot;<?php global $con;
                        echo mysqli_num_rows(mysqli_query($con, "select * from rezervari where status = '1'")); ?>&quot;,&quot;<?php global $con;
                        echo mysqli_num_rows(mysqli_query($con, "select * from rezervari where status = '2'")); ?>&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{}}}"></canvas>
                    </div>
                    <div class="text-center small mt-4">
                        <span class="me-2"><i class="fas fa-circle text-primary"></i>&nbsp;Fara raspuns</span>
                        <span class="me-2"><i class="fas fa-circle text-success"></i>&nbsp;Acceptate</span>
                        <span class="me-2"><i class="fas fa-circle text-info" style="color:#E44726!important;"></i>&nbsp;Refuzate
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<?php require_once('assets/includes/footer.php'); ?>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/theme.js"></script>
<script>
    $("#form_pass").click(function () {
        $("#form_pass_input").removeClass("d-none")
    });
    var switchStatus = false;

    $("#formCheck_switch_s").on('change', function () {
        if ($(this).is(':checked')) {
            switchStatus = $(this).is(':checked');
            console.log(switchStatus);// To verify
            $.ajax({
                method: "POST",
                url: "action.php",
                dataType: 'json',
                data: ({varias: 1}),
                success: function (data) {
                    console.log(data);
                }
            })
        } else {
            switchStatus = $(this).is(':checked');
            console.log(switchStatus);// To verify
            $.ajax({
                method: "POST",
                url: "action.php",
                dataType: 'json',
                data: ({varias: 0}),
                success: function (data) {
                    console.log(data);
                }
            })
        }
    });

    var switchStatus = false;
    $("#formCheck_switch").on('change', function () {
        if ($(this).is(':checked')) {
            switchStatus = $(this).is(':checked');
            console.log(switchStatus);// To verify
            $.ajax({
                method: "POST",
                url: "action.php",
                dataType: 'json',
                data: ({variab: 1}),
                success: function (data) {
                    console.log(data);
                }
            })
            $("#content_switch").removeClass("d-none")
        } else {
            switchStatus = $(this).is(':checked');
            console.log(switchStatus);// To verify
            $.ajax({
                method: "POST",
                url: "action.php",
                dataType: 'json',
                data: ({variab: 0}),
                success: function (data) {
                    console.log(data);
                }
            })
            $("#content_switch").addClass("d-none")
        }
    });

</script>
</body>

</html>