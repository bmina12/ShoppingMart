<?php
include('init.php');
session_start();
session_destroy();
header('Location:index.php');
?>