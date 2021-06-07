<?php

if (isset($_SESSION['id_tim'])) {
  $id_tim = $_SESSION['id_tim'];
  $nama = $_POST['nama'];
  $jabatan = $_POST['jabatan'];
  $instagram = $_POST['instagram'];
  $linkedin = $_POST['linkedin'];
  $nama_file = $_FILES['foto']['name'];
  $direktori = 'foto/' . $nama_file;
  //get foto
  $sql_f = "SELECT `foto` FROM `tim` WHERE `id_tim`='$id_tim'";
  $query_f = mysqli_query($koneksi, $sql_f);
  while ($data_f = mysqli_fetch_row($query_f)) {
    $foto = $data_f[0];
    //echo $foto;
  }
  if (empty($nama)) {
    header("Location:index.php?include=edit-tim&data=$id_tim&notif=editkosong&jenis=nama");
  } else if (empty($jabatan)) {
    header("Location:index.php?include=edit-tim&data=$id_tim&notif=editkosong&jenis=jabatan");
  } else if (empty($instagram)) {
    header("Location:index.php?include=edit-tim&data=$id_tim&notif=editkosong&jenis=instagram");
  } else if (empty($linkedin)) {
    header("Location:index.php?include=edit-tim&data=$id_tim&notif=editkosong&jenis=linkedin");
  } else {
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
    $direktori = 'foto/' . $nama_file;
    if (move_uploaded_file($lokasi_file, $direktori)) {
      if (!empty($foto)) {
        unlink("foto/$foto");
      }
      $sql = "UPDATE `tim` set `nama`='$nama',`jabatan`='$jabatan',`instagram`='$instagram',`linkedin`='$linkedin', `foto`='$nama_file' where `id_tim`='$id_tim'";
      mysqli_query($koneksi, $sql);
    } else {
      $sql = "UPDATE `tim` set `nama`='$nama',`jabatan`='$jabatan',`instagram`='$instagram',`linkedin`='$linkedin' where `id_tim`='$id_tim'";
      mysqli_query($koneksi, $sql);
    }
    header("Location:index.php?include=tim&notif=editberhasil");
  }
}
