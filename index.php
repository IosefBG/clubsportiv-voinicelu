<?php require_once("assets/functions/config.php") ?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <link rel="stylesheet" href="assets/css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
</head>
<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
<?php
require_once("assets/includes/header.php");
?>
<header class="masthead">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="admin/uploads/<?php echo dictionary("fundal_img_1"); ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1><?php echo dictionary("carousel_title_1"); ?></h1>
                    <h3><?php echo dictionary("carousel_content_1"); ?></h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="admin/uploads/<?php echo dictionary("fundal_img_2"); ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo dictionary("carousel_title_2"); ?></h5>
                    <p><?php echo dictionary("carousel_content_2"); ?></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="admin/uploads/<?php echo dictionary("fundal_img_3"); ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo dictionary("carousel_title_3"); ?></h5>
                    <p><?php echo dictionary("carousel_content_3"); ?></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</header>
<?php
if (config_check("announce") == 1) {
    echo '<div class="alert-danger" style="width:100%;display: block;">';
    echo '<div class="alerta">' . config_check("announce_text") . '</div>';
    echo '</div>';
}
?>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="text-uppercase section-heading"><?php echo dictionary("about_title"); ?></h1>
                <h3 class="text-muted section-subheading"><?php echo dictionary("about_content"); ?></h3>
                <div class="collapse-item">
                    <button type="button" class="collapsible"><i
                                class="fa fa-plus"></i> <?php echo dictionary("about_content_tab"); ?></button>
                    <div class="content"><p><?php echo dictionary("about_content_more"); ?></p></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-dark" id="initiere">
    <div class="container" id="performanta">
        <h1><?php echo dictionary("tenis_title"); ?></h1>
        <div class="row">
            <div class="col-lg-8 text-center">
                <h3><?php echo dictionary("tenis_i_title"); ?></h3>
                <div class="row" style="color:black!important;">
                    <div class="col-sm-6 pb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo dictionary("tenis_i_a_title"); ?></h5>
                                <p class="card-text"><?php echo dictionary("tenis_i_a_content"); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo dictionary("tenis_i_c_title"); ?></h5>
                                <p class="card-text"><?php echo dictionary("tenis_i_c_content"); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <h3><?php echo dictionary("tenis_p_title"); ?></h3>
                <div class="row" style="color:black!important;">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo dictionary("tenis_p_subtitle"); ?></h5>
                                <p class="card-text"><?php echo dictionary("tenis_p_content"); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="fotbal">
    <div class="container">
        <h1 class="text-uppercase section-heading"><?php echo dictionary("footbal_title"); ?></h1>
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="card" style="background-color:black;margin-bottom:50px;color:white!important;">
                    <div class="title-fotbal"><h2><?php echo dictionary("footbal_teren_title"); ?></h2></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10"><p
                                        class="card-text"><?php echo dictionary("footbal_teren_content"); ?></p></div>
                            <div class="col-2">
                                <div class="card-tarif"><?php echo dictionary("footbal_teren_tarif"); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 text-center">
                    <div class="card" style="background-color:black;margin-bottom:50px;color:white!important;">
                        <div class="title-fotbal"><h2><?php echo dictionary("footbal_subtitle"); ?></h2></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <img class="rounded-circle mx-auto"
                                         src="admin/uploads/<?php echo dictionary("footbal_img_1"); ?>" alt=""/>
                                    <h5 class="card-title"><?php echo dictionary("footbal_title_1"); ?></h5>
                                    <p class="card-text"><?php echo dictionary("footbal_content_1"); ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <img class="rounded-circle mx-auto"
                                         src="admin/uploads/<?php echo dictionary("footbal_img_2"); ?>" alt=""/>
                                    <h5 class="card-title"><?php echo dictionary("footbal_title_2"); ?></h5>
                                    <p class="card-text"><?php echo dictionary("footbal_content_2"); ?></p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<section class="bg-dark" id="antrenori">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-uppercase section-heading"><?php echo dictionary("antrenori_title"); ?></h1>
                <div class="row">
                    <?php
                    $n = config_check('ant');
                    for ($i = 1; $i <= $n; $i++) {
                        $antrenor = dictionary("antrenori_title_" . $i);
                        global $con;
                        $query_1 = "select count(*) from survey where antrenor='$antrenor' and rating!=0";
                        $query_2 = "select sum(rating) from survey where antrenor='$antrenor'";
                        $result_1 = mysqli_query($con, $query_1);
                        $result_2 = mysqli_query($con, $query_2);
                        $row_1 = mysqli_fetch_row($result_1);
                        $row_2 = mysqli_fetch_row($result_2);
                        $rezultat = $row_2[0]/$row_1[0];
                        echo '<div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">';
                        echo '    <div class="box-scene">';
                        echo '        <div class="box">';
                        echo '            <div class="front face">';
                        echo '               <img id="antt" src="admin/uploads/' . dictionary("antrenori_img_" . $i) . '" alt="">';
                        echo '            </div>';
                        echo '            <div class="side face">';
                        echo '                <div class="inside_cube"><div class="title">' . $antrenor . '</div>
                <div class="descript"><a type="button" data-bs-toggle="modal" data-bs-target="#modalant' . $i . '">Mai multe informatii</a></div></div>';
                        echo '            </div>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';

                        echo '<div class="modal fade" id="modalant' . $i . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                        echo '<div class="modal-dialog">';
                        echo '    <div class="modal-content">';
                        echo '        <div class="modal-header">';
                        echo '            <h5 class="modal-title" id="exampleModalLabel">' . $antrenor . '&nbsp&nbsp</h5>';

                        echo '            <span class="fa fa-star ';if($rezultat > 0) echo 'checked';echo'"></span>';
                        echo '            <span class="fa fa-star ';if($rezultat > 1) echo 'checked';echo'"></span>';
                        echo '            <span class="fa fa-star ';if($rezultat > 2) echo 'checked';echo'"></span>';
                        echo '            <span class="fa fa-star ';if($rezultat > 3) echo 'checked';echo'"></span>';
                        echo '            <span class="fa fa-star ';if($rezultat > 4) echo 'checked';echo'"></span>';
                        if($row_1[0] == 0 ){echo '&nbspfara recenzii';}
                        echo '            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                        echo '        </div>';
                        echo '        <div class="modal-body">                                    ';
                        echo '            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">';
                        echo '<div class="carousel-inner">';
                        $gall_max = config_check('antrenor_gall_' . $i);
                        for ($j = 1; $j <= $gall_max; $j++) {
                            $var = 'antrenor_gall_' . $i . '_' . $j;
                            echo '<div class="carousel-item ';
                            if ($j == 1) echo "active";
                            echo '">';
                            echo '  <img src="admin/uploads/' . dictionary($var) . '" class="d-block w-100" alt="...">';
                            echo '</div>';
                        }
                        echo '</div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

                                    
                                    <div class="modal_content">' . dictionary("antrenori_content_" . $i) . '</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-light" id="team">
    <div class="container">
        <div class="row">
            <?php
            for ($i = 1; $i <= 3; $i++) {
                $ei = "echipa_img_" . $i;
                $en = "echipa_nume_" . $i;
                $ef = "echipa_funct_" . $i;
                echo '<div class="col-sm-4"><div class="team-member">';
                echo '<img class="rounded-circle mx-auto" src="admin/uploads/' . dictionary($ei) . '" alt=""/>';
                echo '<h4>' . dictionary($en) . '</h4>';
                echo '<p class="text-muted">' . dictionary($ef) . '</p></div></div>';
            } ?>
            <div class="row">
                <?php
                for ($i = 4; $i <= 6; $i++) {
                    $ei = "echipa_img_" . $i;
                    $en = "echipa_nume_" . $i;
                    $ef = "echipa_funct_" . $i;
                    echo '<div class="col-sm-4"><div class="team-member">';
                    echo '<img class="rounded-circle mx-auto" src="admin/uploads/' . dictionary($ei) . '" alt=""/>';
                    echo '<h4>' . dictionary($en) . '</h4>';
                    echo '<p class="text-muted">' . dictionary($ef) . '</p></div></div>';
                } ?>
            </div>
            <div class="row">
                <?php
                for ($i = 7; $i <= 9; $i++) {
                    $ei = "echipa_img_" . $i;
                    $en = "echipa_nume_" . $i;
                    $ef = "echipa_funct_" . $i;
                    echo '<div class="col-sm-4"><div class="team-member">';
                    echo '<img class="rounded-circle mx-auto" src="admin/uploads/' . dictionary($ei) . '" alt=""/>';
                    echo '<h4>' . dictionary($en) . '</h4>';
                    echo '<p class="text-muted">' . dictionary($ef) . '</p></div></div>';
                } ?>
            </div>
        </div>
</section>
<section class="bg-dark" id="faq">
    <div class="container">
        <h1 class="text-uppercase section-heading"><?php echo dictionary("faq_title"); ?></h1>
        <?php
        $n = config_check('faq');
        for ($i = 1; $i <= $n; $i++) {
            echo '<div class="collapse-item">';
            echo '<button type="button" class="collapsible_faq">';
            echo '<i class="fa fa-plus"></i>' . dictionary("faq_tab_" . $i) . '</button>';
            echo '<div class="content" style="color:black">';
            echo '<p>' . dictionary("faq_tab_content_" . $i) . '</p></div></div>';
        }
        ?>
    </div>
</section>
<section id="price">
    <div class="container">
        <div class="text-center">
            <h1 class="text-uppercase section-heading"><?php echo dictionary("tarif_title"); ?></h1>
        </div>
        <?php
        $n = config_check('ore');
        if (config_check("sezon") == 1) {
            echo '<div class="text-center"><h3 class="text-uppercase section-heading text-dark">' . dictionary("tarif_title_v") . '</h3></div>';
            echo '<table class="table table-hover"><thead><tr><th scope="col">Interval</th><th scope="col">Rezervare</th><th scope="col">Abonament</th>';
            echo '</tr></thead><tbody>';
            for ($i = 1; $i <= $n; $i++) {
                $re = "tarif_title_v_r_" . $i;
                $ab = "tarif_title_v_a_" . $i;
                $to = "tarif_ora_" . $i;
                echo '<tr>';
                echo '<td>' . dictionary($to) . '</td>';
                echo '<td>' . dictionary($re) . ' RON / ORA</td>';
                echo '<td>' . dictionary($ab) . ' RON / ORA</td>';
            }
            echo '</tbody></table>';
        } else {
            echo '<div class="text-center"><h3 class="text-uppercase section-heading text-dark">' . dictionary("tarif_title_i") . '</h3></div>';
            echo '<table class="table table-hover"><thead><tr><th scope="col">Interval</th><th scope="col">Rezervare</th><th scope="col">Abonament</th>';
            echo '</tr></thead><tbody>';
            for ($i = 1; $i <= $n; $i++) {
                $re = "tarif_title_i_r_" . $i;
                $ab = "tarif_title_i_a_" . $i;
                $to = "tarif_ora_" . $i;
                echo '<tr>';
                echo '<td>' . dictionary($to) . '</td>';
                echo '<td>' . dictionary($re) . ' RON / ORA</td>';
                echo '<td>' . dictionary($ab) . ' RON / ORA</td>';
            }
            echo '</tbody></table>';
        }
        ?>
    </div>
</section>
<!--<section class="bg-dark px-5 text-white" id="rezervari">-->
<!--    <h2 class="h1-responsive font-weight-bold text-center my-4">-->
<?php //echo dictionary("rezervari_title"); ?><!--</h2>-->
<!--    <p class="text-center w-responsive mx-auto mb-5">--><?php //echo dictionary("rezervari_content"); ?><!--</p>-->
<!--    <div class="container">--><?php //rezerv(); ?>
<!--        <div class="row">-->
<!--            <div class="col-md-12">-->
<!--                <form method="POST">-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="md-form mb-0">-->
<!--                                <input type="text" id="name" name="name" class="form-control" required>-->
<!--                                <label for="name" class="">Nume</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="md-form mb-0">-->
<!--                                <input type="text" id="prenume" name="prenume" class="form-control" required>-->
<!--                                <label for="prenume" class="">Prenume</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="md-form mb-0">-->
<!--                                <input type="tel" id="phone" name="phone" pattern="[0]{1}[0-9]{9}" class="form-control"-->
<!--                                       required>-->
<!--                                <label for="phone" class="">Numar telefon</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="md-form mb-0">-->
<!--                                <input type="email" id="email" name="email" class="form-control" required>-->
<!--                                <label for="email" class="">Email</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="md-form mb-0">-->
<!--                                <select id="selector" class="form-control" name="date" required>-->
<!--                                    --><?php
//                                    for ($j = 0; $j < 14; $j++) {
//                                        global $con;
//                                        $zi = date('Y-m-d', strtotime(' + ' . $j . ' days'));
//                                        $query = "select * from rezervari where zi='$zi'";
//                                        $result = mysqli_query($con, $query);
//                                        if ($result->num_rows < 16) {
//                                            echo '<option value="' . $zi . '">' . $zi . '</option>';
//                                        }
//                                    }
//                                    ?>
<!--                                </select>-->
<!--                                <label for="time">Interval orar:</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-4">-->
<!--                            <div class="md-form mb-0">-->
<!--                                <select class="form-control" name="time" required>-->
<!--                                    --><?php
//                                    for ($i = 7; $i < 24; $i++) {
//                                        if ($i > 9) {
//                                            echo '<option value="' . $i . ':00">' . $i . ':00</option>';
//                                        } else {
//                                            echo '<option value="0' . $i . ':00">0' . $i . ':00</option>';
//                                        }
//                                    }
//                                    ?>
<!--                                </select>-->
<!--                                <label for="time">Interval orar:</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-12">-->
<!--                            <div class="md-form">-->
<!--                                <textarea type="text" id="message" name="message" rows="2"-->
<!--                                          class="form-control md-textarea"></textarea>-->
<!--                                <label for="message">Alte cuvinte...</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="h-captcha" data-sitekey="f2e589fb-f7f4-475f-a745-e22114dfbb02"></div>-->
<!--                    <label>-->
<!--                        <input type="checkbox" name="terms" value="value1" required>-->
<!--                        Accept ca aceste informatii sa fie preluate doar pentru a confirma rezervarea.</label>-->
<!--                    <div class="text-center text-md-left">-->
<!--                        <input class="btn btn-primary" type="submit" name="btn_rezerv" value="Rezerva">-->
<!--                    </div>-->
<!--                </form>-->
<!--                <div class="status"></div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>

    var wasSubmitted = false;

    function checkBeforeSubmit() {
        if (!wasSubmitted) {
            wasSubmitted = true;
            return wasSubmitted;
        }
        return false;
    }

    let coll = document.getElementsByClassName("collapsible");
    let faq = document.getElementsByClassName("collapsible_faq");
    let i;

    for (i = 0; i < coll.length; i++) {

        coll[i].addEventListener("click", function () {
            this.classList.toggle("active");
            console.log(this);
            $(this > i).hide();
            $(this).find('i').toggleClass('fa-minus');
            let content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }

    for (i = 0; i < faq.length; i++) {
        faq[i].addEventListener("click", function () {
            this.classList.toggle("active_faq");
            console.log(this);
            $(this > i).hide();
            $(this).find('i').toggleClass('fa-minus');
            let content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }

    function fooin() {
        $('.box').each(function () {
            if ($(this).hasClass("box-scenejs")) {
                $(this).removeClass("box-scenejs");
            }
        });
    };

    function foo() {
        $('.box').each(function () {
            if ($(this).is(':visible')) {
                $(this).addClass("box-scenejs");
                setTimeout(fooin, 2000)
            }
        });
    }

    window.setTimeout(foo, 2500);

</script>

<?php require_once("assets/includes/footer.php") ?>
</body>

</html>
