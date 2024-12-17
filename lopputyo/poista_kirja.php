<?php
include "kirjat.php";

$id = $_GET['id'];
$kirja = new Kirja();
$kirja->poista($id);
header("Location: index.php");
die();
