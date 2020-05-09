<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass= '';
$dbname = 'arkademy';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die('Koneksi Gagal : '.$conn->error);