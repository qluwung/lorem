<?php

$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$instagram = $_POST['instagram'];
$linkedin = $_POST['linkedin'];


if 		(empty($nama)) 		{ header("Location:index.php?include=tambah-tim&notif=tambahkosong&jenis=nama");}
else if (empty($jabatan)) 		{ header("Location:index.php?include=tambah-tim&notif=tambahkosong&jenis=jabatan");}
else if (empty($instagram)) 		{ header("Location:tambahtim.php?notif=tambahkosong&jenis=instagram");}
else if (empty($linkedin)) 		{ header("Location:index.php?include=tambah-tim&notif=tambahkosong&jenis=linkedin");}
else  {
	$lokasi_file = $_FILES['foto']['tmp_name'];
	$nama_file = $_FILES['foto']['name'];
	$direktori = 'foto/'.$nama_file;
move_uploaded_file($lokasi_file,$direktori);
	$sql = "INSERT INTO `tim`(`nama`,`jabatan`,`instagram`,`linkedin`,`foto`)
	VALUES ('$nama','$jabatan','$instagram','$linkedin','$nama_file')";
	//echo $sql;
	mysqli_query($koneksi,$sql);
	header("Location:index.php?include=tim&notif=tambahberhasil");
}
?>
