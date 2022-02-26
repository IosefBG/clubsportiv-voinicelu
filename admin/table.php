<?php
require_once("../assets/functions/config.php");
session_start();
if (isset($_POST['records-limit'])) {
    $_SESSION['records-limit'] = $_POST['records-limit'];
}

global $con;
$limit = isset($_POST["records-limit"]) ? $_POST["records-limit"] : 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

if (isset($_POST['filter_day'])) {
    $timestamp = $_POST['filter_day'];
    $result = $con->query("SELECT * FROM rezervari WHERE zi='$timestamp' ");
    $session['filter'] = $timestamp;
    $count = mysqli_num_rows($result);
} elseif (isset($_POST['filter_status'])) {
    $status = $_POST['filter_status'];
    $result = $con->query("SELECT * FROM rezervari WHERE status='$status'");
    $session['filter'] = $status;
    $count = mysqli_num_rows($result);
} elseif (isset($_POST['filter_search'])) {
    $search = '%' . $_POST['filter_search'] . '%';
    $result = $con->query("SELECT * FROM rezervari where prenume LIKE '$search'");
    $session['filter'] = $search;
    $count = mysqli_num_rows($result);
} else {
    $result = $con->query("SELECT * FROM rezervari LIMIT $start, $limit");
    $count = mysqli_num_rows($result);
}
$clienti = $result->fetch_all(MYSQLI_ASSOC);

$result1 = $con->query("SELECT count(id) AS id FROM rezervari");
$custCount = $result1->fetch_all(MYSQLI_ASSOC);
$total = $custCount[0]['id'];
$pages = ceil($total / $limit);

$Previous = $page - 1;
$Next = $page + 1;

$actual_link = "https://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . "/";


?>
<!DOCTYPE html>
<html lang="ro">
<style>
    table, form {
        color: black !important;
    }

    td {
        font-size: 20px;
        font-weight: bold;
    }
</style>
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
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Rezervari</p>
        </div>
        <div class="card-body">
            <div class="row" id="page-top">
                <div class="col-xl-3 text-nowrap">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                        <form action="table.php" id="1" method="post">
                            <label class="form-label">Show&nbsp;
                                <select name="records-limit" id="records-limit"
                                        class="d-inline-block form-select form-select-sm">
                                    <option value="10" selected="">10</option>
                                    <?php foreach ([25, 50, 100] as $limit) : ?>
                                        <option
                                            <?php if (isset($_SESSION['records-limit']) && $_SESSION['records-limit'] == $limit) echo 'selected'; ?>
                                                value="<?= $limit; ?>">
                                            <?= $limit; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>&nbsp;</label>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3">
                    <form method="post">
                        <label class="form-label">
                            <div class="row">
                                <div class="col-8">
                                    <input type="date" id="start" name="filter_day" class="form-control"
                                           value="<?php echo $session['filter']; ?>"
                                           min="<?php echo date("Y-m-d"); ?>"
                                           max="<?php echo date("Y-m-d", strtotime(date("Y-m-d") . ' + 14 days')); ?>">
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary">Cauta</button>
                                </div>
                            </div>
                        </label>
                    </form>
                </div>
                <div class="col-xl-3">
                    <form method="post">
                        <label class="form-label">
                            <div class="row">
                                <div class="col-8">
                                    <select name="filter_status" class="form-select">
                                        <option value="0" <?php if ($session['filter'] == 0) {
                                            echo selected;
                                        } ?> >In asteptare
                                        </option>
                                        <option value="1" <?php if ($session['filter'] == 1) {
                                            echo selected;
                                        } ?> >Acceptat
                                        </option>
                                        <option value="2" <?php if ($session['filter'] == 2) {
                                            echo selected;
                                        } ?> >Refuzat
                                        </option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary">Cauta</button>
                                </div>
                            </div>
                        </label>
                    </form>
                </div>
                <div class="col-xl-3">
                        <form method="post">
                            <label class="form-label">
                                <div class="row">
                                    <div class="col-8">
                                        <input type="search" class="form-control" name="filter_search" aria-controls="dataTable" placeholder="Prenume">
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary">Cauta</button>
                                    </div>
                                </div>
                            </label>
                        </form>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Telefon</th>
                        <th>Email</th>
                        <th>Zi</th>
                        <th>Ora</th>
                        <th>Extra</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($count == "0") {
                        echo "<h2>Nu s-a gasit nici un rezultat cu aceste filtre</h2>";
                    } else {

                        foreach ($result as $pers): ?>
                            <tr>
                                <td><?php
                                    if (isset($_POST['test'])) {
                                        echo "TEST";
                                    }
                                    echo $pers['nume']; ?></td>
                                <td><?php echo $pers['prenume']; ?></td>
                                <td><?php echo $pers['tel']; ?></td>
                                <td><?php echo $pers['email']; ?></td>
                                <td><?php echo $pers['zi']; ?></td>
                                <td><?php echo $pers['ora']; ?>:00</td>
                                <td><?php echo $pers['extra']; ?></td>
                                <td><?php
                                    rezerv_status($pers['id'], $pers['id'] . $pers['id']);
                                    if ($pers['status'] == 0) {
                                        echo '<form method="POST">';
                                        echo '<button type="submit" name="' . $pers['id'] . '" class="btn btn-success" name="">Accepta</button>';
                                        echo '<button type="submit" name="' . $pers['id'] . $pers['id'] . '" class="btn btn-danger">Refuza</button>';
                                        echo '</form>';
                                    } elseif ($pers['status'] == 1) {
                                        echo '<button type="button" class="btn btn-success" disabled>Acceptat</button>';
                                    } elseif ($pers['status'] == 2) {
                                        echo '<button type="button" class="btn btn-danger" disabled>Refuzat</button>';
                                    }
                                    ?></td>
                            </tr>
                        <?php endforeach;
                    } ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1
                        to <?php echo $_SESSION['records-limit']; ?> of
                        <?php echo $total; ?></p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item <?php if ($Previous < 1) echo "disabled"; ?>">
                                <a href="table.php?page=<?= $Previous; ?>" class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $pages; $i++) : ?>
                                <li class="page-item"><a class="page-link <?php if ($_GET['page'] == $i) {
                                        echo "active";
                                    } ?>" href="table.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                            <?php endfor; ?>
                            <li class="page-item <?php if ($Next > $pages) echo "disabled"; ?>">
                                <a href="table.php?page=<?= $Next; ?>" class="page-link" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#records-limit').change(function () {
            $('form#1').submit();
        })
    });
</script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/theme.js"></script>

<?php require_once('assets/includes/footer.php'); ?>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</body>

</html>