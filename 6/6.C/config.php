<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass= 'root';
$dbname = 'arkademy';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die('Koneksi Gagal : '.$conn->error);

function idr_format($nilai, $pecahan = 0)
{
    return 'Rp. '.number_format($nilai, $pecahan, ',', '.');
}