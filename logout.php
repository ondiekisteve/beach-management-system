<?php

include 'inc.php';
session_destroy();
$redirectpage='index.php';
header('Location:'.$redirectpage);

?>