<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['variab'])) {
    $var = $_POST['variab'];
    require_once('../assets/functions/config.php');
    global $con;
    $sql = "update configs set value='$var' where name='announce' ";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        echo 'Ceva nu a mers bine';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['varias'])) {
    $var = $_POST['varias'];
    require_once('../assets/functions/config.php');
    global $con;
    $sql = "update configs set value='$var' where name='sezon' ";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        echo 'Ceva nu a mers bine';
    }
}
?>