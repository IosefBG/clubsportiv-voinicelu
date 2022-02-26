<?php
session_start();
session_destroy();
//echo "Ai fost delogat cu succes";
header("Location:login.php");
