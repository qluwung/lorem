<?php

$nama = $_POST['nama'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$level = $_POST['level'];
$foto = $_POST['foto'];

if 		(empty($nama)) 		{ header("Location:index?include=tambah-user&notif=tambahkosong&jenis=nama");}
else if (empty($username)) 		{ header("Location:index?include=tambah-user&jenis=username");}
else if (empty($email)) 		{ header("Location:index?include=tambah-user&jenis=email");}
else if (empty($password)) 		{ header("Location:index?include=tambah-user&jenis=password");}
else if (empty($level)) 		{ header("Location:index?include=tambah-user&jenis=level");}
else  {
	$lokasi_file = $_FILES['foto']['tmp_name'];
	$nama_file = $_FILES['foto']['name'];
	$direktori = 'foto/'.$nama_file;
move_uploaded_file($lokasi_file,$direktori);
	$sql = "INSERT INTO `user`(`nama`,`username`,`email`,`password`,`level`,`foto`)
	VALUES ('$nama','$username','$email','$password','$level','$nama_file')";
	//echo $sql;
	mysqli_query($koneksi,$sql);
	header("Location:index.php?include=user&notif=tambahberhasil");
}
?>