<?php

$nama = $_POST['nama'];
$job = $_POST['job'];
$detail = $_POST['detail'];

if (empty($nama)) {
	header("Location:index.php?include=tambah-testimoni&notif=tambahkosong&jenis=nama");
} else if (empty($job)) {
	header("Location:index.php?include=tambah-testimoni&jenis=job");
} else if (empty($detail)) {
	header("Location:index.php?include=tambah-testimoni&jenis=detail");
} else {
	$lokasi_file = $_FILES['foto']['tmp_name'];
	$nama_file = $_FILES['foto']['name'];
	$direktori = 'foto/' . $nama_file;
	move_uploaded_file($lokasi_file, $direktori);
	$sql = "INSERT INTO `testimonial`(`nama`,`job`,`detail`,`foto`)
  VALUES ('$nama','$job','$detail','$nama_file')";
	//echo $sql;
	mysqli_query($koneksi, $sql);
	header("Location:index.php?include=testimoni&notif=tambahberhasil");
}
