<?php

if (isset($_SESSION['id_testimonial'])) {
  $id_testimonial = $_SESSION['id_testimonial'];
  $nama = $_POST['nama'];
  $job = $_POST['job'];
  $detail = $_POST['detail'];
  $lokasi_file = $_FILES['foto']['tmp_name'];
  $nama_file = $_FILES['foto']['name'];
    $direktori = 'foto/' . $nama_file;

  $sql_f = "SELECT `foto` FROM `testimonial` WHERE `id_testimonial`='$id_testimonial'";
  $query_f = mysqli_query($koneksi, $sql_f);
  while ($data_f = mysqli_fetch_row($query_f)) {
    $foto = $data_f[0];
    //echo $foto;
  }
  if (empty($nama)) {
    header("Location:index.php?include=edit-testimoni&data=$id_testimonial&notif=editkosong&jenis=nama");
  } else if (empty($job)) {
    header("Location:index.php?include=edit-testimoni&data=$id_testimonial&notif=editkosong&jenis=job");
  } else if (empty($detail)) {
    header("Location:index.php?include=edit-testimoni&data=$id_testimonial&notif=editkosong&jenis=teks");
  } else {
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
    $direktori = 'foto/' . $nama_file;
    if (move_uploaded_file($lokasi_file, $direktori)) {
      if (!empty($foto)) {
        unlink("foto/$foto");
      }
      $sql = "UPDATE `testimonial` set   `nama`='$nama',`job`='$job',`detail`='$detail',`foto`='$nama_file'  where `id_testimonial`='$id_testimonial'";
      mysqli_query($koneksi, $sql);
    } else {
      $sql = "UPDATE `testimonial` set  `nama`='$nama',`job`='$job',`detail`='$detail' where `id_testimonial`='$id_testimonial'";
      mysqli_query($koneksi, $sql);
    }
    header("Location:index.php?include=testimoni&notif=editberhasil");
  }
}
