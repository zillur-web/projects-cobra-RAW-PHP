<?php
require_once 'dashboard/session.php';

session_destroy();
header('location:login.php');
?>