<?php
$host     = "localhost";    // Nama host
$username = "root";         // Username database
$password = "";   // Password database
$database = "arsip1";   // Nama database
$conn = mysqli_connect($host,$username,$password,$database) or die("koneksi gagal");