<?php
require_once("../assets/functions/config.php");
if ($_SESSION['admin'] != 1) {
    $actual_link = "https://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/";
    header("Location:" . $actual_link . "login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>
<?php require_once('assets/includes/header.php'); ?>
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Setari</h3>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="text-primary fw-bold m-0">Anunturi</h6>
                </div>
                <div class="container">
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="formCheck-1"><strong>Activeaza anuntul</strong>
                                <input class="form-check-input" type="checkbox" id="formCheck-1" <?php if(config_check("announce")==1){echo checked;} ?>>
                            </label>
                        </div>
                        <form method="post">
                            <?php config_content("announce_text");?>
                        <div class="d-none" id="content_switch">
                            <input class="form-control" type="textarea" value="<?php echo config_check("announce_text");?>" name="btn_switch" id="formCheck_input">
                            <button class="btn btn-primary" type="submit">Modifica</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="text-primary fw-bold m-0">Iarna</h6>
                </div>
                <div class="container">

                </div>
            </div>
        </div>
    </div>
</div>
<!--<p class="unbroken">The United States (U.S. or US)—officially the United States of America (USA), commonly known as America—is a country primarily located in North America, consisting of 50 states, a federal district, five major self-governing territories, 326 reservations, and various possessions. At 3.8 million square miles (9.8 million square kilometers), it is the world's third- or fourth-largest country by total area. With a population of more than 328 million people, it is the third most populous country in the world. The national capital is Washington, D.C., and the most populous city is New York City.</p>-->
<!--<p class="broken"></p>-->
</div>
<footer class="bg-white sticky-footer">
    <div class="container my-auto">
        <div class="text-center my-auto copyright"><span>Copyright © Brand 2021</span></div>
    </div>
</footer>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/theme.js"></script>
<script>
    var switchStatus = false;
    $("#formCheck-1").on('change', function() {
        if ($(this).is(':checked')) {
            switchStatus = $(this).is(':checked');
            console.log(switchStatus);// To verify
            $.ajax({
                method: "POST",
                url: "action.php",
                dataType:'json',
                data: ({variab: 1}),
                success: function(data){
                    console.log(data);
                }
            })
            // .done(function( response ) {
            //     $("p.broken").html(response);
            // });
            $( "#content_switch" ).removeClass( "d-none" )
        }
        else {
            switchStatus = $(this).is(':checked');
            console.log(switchStatus);// To verify
            $.ajax({
                method: "POST",
                url: "action.php",
                dataType:'json',
                data: ({variab: 0}),
                success: function(data){
                    console.log(data);
                }
            })
            // .done(function( response ) {
            //     $("p.broken").html(response);
            // });
            $( "#content_switch" ).addClass( "d-none" )
        }
    });
</script>
</body>

</html>
