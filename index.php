<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
$sesi = $_SESSION['MEMBER'];
require_once 'dbconnect.php';
require_once 'models/type.php';
require_once 'models/product.php';
require_once 'models/user.php';
require_once 'models/role.php';
require_once 'models/myprofil.php';
include_once 'header.php';
include_once 'menu.php';
echo "<br>";
include_once 'sidebar.php';
include_once 'main.php';

echo "<br>";
include_once 'card.php';
echo "<br>";

include_once 'contact.php';


?>