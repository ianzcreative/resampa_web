<?php
$hostname = "localhost";
$database = "platiniu_resampah";
$username = "platiniu_myuser1";
$password = "XYkuLO7ih+5h";
$connect = mysqli_connect($hostname, $username, $password, $database);
// script cek koneksi   
if (!$connect) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}