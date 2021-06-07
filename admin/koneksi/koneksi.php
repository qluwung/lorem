<?php
$koneksi = mysqli_connect("localhost","root","","dblorem");
// cek koneksi
if (!$koneksi){
 die("Error koneksi: " . mysqli_connect_errno());
}
?>