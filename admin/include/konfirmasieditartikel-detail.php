<?php

if (isset($_SESSION['id_artikeldetail'])) {
    $id_artikeldetail = $_SESSION['id_artikeldetail'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = addslashes($_POST['text']);
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
    $direktori = 'foto/' . $nama_file;
    //get cover
    $sql_f = "SELECT `foto` FROM `artikeldetail` WHERE `id_artikeldetail`='$id_artikeldetail'";
    $query_f = mysqli_query($koneksi, $sql_f);
    while ($data_f = mysqli_fetch_row($query_f)) {
        $foto = $data_f[0];
        //echo $foto;
    }
    if (empty($judul)) {
        header("Location:index.php?include=edit-artikel-detail&data=$id_artikeldetail&notif=editkosong&jenis=judul");
    } else if (empty($penulis)) {
        header("Location:index.php?include=edit-artikel-detail&data=$id_artikeldetail&notif =editkosong&jenis=penulis");
    } else if (empty($deskripsi)) {
        header("Location:index.php?include=edit-artikel-detail&data=$id_artikeldetail&notif =editkosong&jenis=deskripsi");
    } else {
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $nama_file = $_FILES['foto']['name'];
        $direktori = 'foto/' . $nama_file;
        if (move_uploaded_file($lokasi_file, $direktori)) {
            if (!empty($foto)) {
                unlink("foto/$foto");
            }
            $sql = "UPDATE `artikeldetail` set
`id_user`='$penulis',`judul`='$judul', `tanggal`= '$tanggal',
`text`='$deskripsi',`foto`='$nama_file'
WHERE `id_artikeldetail`='$id_artikeldetail'";
            mysqli_query($koneksi, $sql);
        } else {
          $sql = "UPDATE `artikeldetail` set
          `id_user`='$penulis',`judul`='$judul', `tanggal`= '$tanggal',
          `text`='$deskripsi',`foto`='$nama_file'
          WHERE `id_artikeldetail`='$id_artikeldetail'";
            mysqli_query($koneksi, $sql);
        }
//  echo $sql;
        header("Location:index.php?include=artikel-detail&notif=editberhasil");
      }
}