<?php

$server   = "localhost";
$username = "root";
$password = "";
$database = "29_oyyspp_12rpl2";

$konek = mysqli_connect($server,$username,$password,$database);

if (!$konek) {
    die("Gagal Koneksi<br>".mysqli_connect_error()."<br>".mysqli_connect_errno());
}else{
   // echo "Koneksi Berhasil";
}

?>
