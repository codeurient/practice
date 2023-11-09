<?php
session_start();

include "path.php";

unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['admin']);
unset($_SESSION['status']);


header('location: ' . BASE_URL . 'log.php');