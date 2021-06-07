<?php

include('koneksi/koneksi.php');
if (isset($_SESSION['iduser'])) {
  $iduser = $_SESSION['iduser'];
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $level = $_POST['level'];

  //get foto
  $sql_f = "SELECT `foto` FROM `user` WHERE `id_user`='$iduser'";
  $query_f = mysqli_query($koneksi, $sql_f);
  while ($data_f = mysqli_fetch_row($query_f)) {
    $nama_file = $data_f[0];
    //echo $foto;
  }
  if (empty($nama)) {
    header("Location:index.php?include=konfirmasi-edit-user&data=$iduser&notif=editkosong&jenis=nama");
  } else if (empty($username)) {
    header("Location:index.php?include=konfirmasi-edit-user&data=$iduser&notif=editkosong&jenis=username");
  } else if (empty($email)) {
    header("Location:index.php?include=konfirmasi-edit-user&data=$iduser&notif=editkosong&jenis=email");
  } else if (empty($password)) {
    header("Location:index.php?include=konfirmasi-edit-user&data=$iduser&notif=editkosong&jenis=password");
  } else if (empty($level)) {
    header("Location:index.php?include=konfirmasi-edit-user&data=$iduser&notif=editkosong&jenis=level");
  } else {
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
    $direktori = 'foto/' . $nama_file;
    if (move_uploaded_file($lokasi_file, $direktori)) {
      if (!empty($nama_file)) {
        unlink("foto/$nama_file");
      }
      $sql = "UPDATE `user` set  `nama`='$nama',`username`='$username',`email`='$email',`password`='$password',`level`='$level',`foto`='$nama_file' where `id_user`='$iduser'";
      mysqli_query($koneksi, $sql);
    } else {
      $sql = "UPDATE `user` set `nama`='$nama',`username`='$username',`email`='$email',`password`='$password',`level`='$level' where `id_user`='$iduser'";
      mysqli_query($koneksi, $sql);
    }
    header("Location:index.php?include=user&notif=editberhasil");
  }
}
