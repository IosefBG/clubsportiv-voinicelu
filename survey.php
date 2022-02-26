<?php
require_once 'assets/functions/config.php'; ?>

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
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #333;
        }

        .form-signin {
            width: 100%;
            max-width: 500px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .page-link {
            color: black !important;
        }

        .navbar_brand{
            font-size: 1.75em;
            color: #fed136;
            font-family: "Kaushan Script", "Helvetica Neue", Helvetica, Arial, cursive;
            text-decoration:none
        }}

    </style>
</head>
<body class="text-center">

<main class="form-signin">
    <div class="card shadow border-start-primary py-4 mx-4">
    <a class="navbar_brand" href="/index.php">ClubVoinicelu</a>
    <h1 class="h3 mb-3 fw-normal">Survey</h1>

    <?php
    if (isset($_GET['code'])) {
        $cod = $_GET['code'];
        global $con;
        $query = "select * from survey where code ='$cod'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_row($result);
        if (mysqli_num_rows($result) > 0 && $row[4] == 0) {
            if (isset($_GET['rating'])) {
                $rating = $_GET['rating'];
                if ($rating > 0 && $rating <= 5) {
                    $sql = "update survey set rating='$rating' where code='$cod'";
                    $resultb = mysqli_query($con, $sql);
                    echo '<div class="alert alert-success">Multumim pentru timpul acordat.</div>';
                }
            } else {
                echo '<p class="px-4">Bazat pe ultima dumneavoastra experienta la clubul nostru cu antrenorul ' . $row[1] . '&nbsp</p><br />';
                echo '<nav aria-label="Page navigation example">';
                echo '<ul class="pagination"> ';
                echo ' <li class="page-item"> foarte dezamagit </li > ';
                echo '  <li class="page-item"><a class="page-link" href = "http://clubvoinicelu.ro/survey.php?code=' . $cod . '&rating=1" > 1</a ></li > ';
                echo '  <li class="page-item"><a class="page-link" href = "http://clubvoinicelu.ro/survey.php?code=' . $cod . '&rating=2" > 2</a ></li > ';
                echo '  <li class="page-item"><a class="page-link" href = "http://clubvoinicelu.ro/survey.php?code=' . $cod . '&rating=3" > 3</a ></li > ';
                echo '  <li class="page-item"><a class="page-link" href = "http://clubvoinicelu.ro/survey.php?code=' . $cod . '&rating=4" > 4</a ></li > ';
                echo '  <li class="page-item"><a class="page-link" href = "http://clubvoinicelu.ro/survey.php?code=' . $cod . '&rating=5" > 5</a ></li > ';
                echo '  <li class="page-item"> foarte multumit </li > ';
                echo '</ul > ';
                echo '</nav > ';
            }
        } else {
            echo '<div class="alert alert-danger" > Link - ul pe care ati intrat nu este corect .</div > ';
        }
    }
    ?>
    </div>
</main>


</body>
