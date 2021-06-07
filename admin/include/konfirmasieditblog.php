<?php

if (isset($_SESSION['id_projectInfo'])) {
    $id_projectInfo = $_SESSION['id_projectInfo'];
    $nama_portofolio = $_POST['nama_portofolio'];
    $category_portofolio = $_POST['category_portofolio'];
    $nama_client = $_POST['nama_client'];
    $tgl_project = $_POST['tgl_project'];
    $url = $_POST['url'];
    $teks = addslashes($_POST['teks']);
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
    $direktori = 'foto/' . $nama_file;
    //get cover
    $sql_f = "SELECT `foto` FROM `project_information` WHERE `id_projectInfo`='$id_projectInfo'";
    $query_f = mysqli_query($koneksi, $sql_f);
    while ($data_f = mysqli_fetch_row($query_f)) {
        $foto = $data_f[0];
        //echo $foto;
    }
    if (empty($nama_portofolio)) {
        header("Location:index.php?include=edit-portofolio-blog&data=$id_projectInfo&notif=editkosong&jenis=nama portofolio");
    } else if (empty($category_portofolio)) {
        header("Location:index.php?include=edit-portofolio-blog&data=$id_projectInfo&notif=editkosong&jenis=kategori portofolio");
    } else if (empty($nama_client)) {
        header("Location:index.php?include=edit-portofolio-blog&data=$id_projectInfo&notif =editkosong&jenis=nama klien");
    } else if (empty($tgl_project)) {
        header("Location:index.php?include=edit-portofolio-blog&data=$id_projectInfo&notif =editkosong&jenis=tanggal");
    } else if (empty($url)) {
        header("Location:index.php?include=edit-portofolio-blog&data=$id_projectInfo&notif =editkosong&jenis=url");
    } else if (empty($teks)) {
        header("Location:index.php?include=edit-portofolio-blog&data=$id_projectInfo&notif =editkosong&jenis=teks");
    } else {
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $nama_file = $_FILES['foto']['name'];
        $direktori = 'foto/' . $nama_file;
        if (move_uploaded_file($lokasi_file, $direktori)) {
            if (!empty($foto)) {

                unlink("foto/$foto");
            }
            $sql = "UPDATE `project_information` set
`id_portofolio`='$category_portofolio',`nama_portofolio`='$nama_portofolio',`nama_client`='$nama_client',
`tgl_project`='$tgl_project',`url`='$url',
`teks`='$teks',`foto`='$nama_file'
WHERE `id_projectInfo`='$id_projectInfo'";
            mysqli_query($koneksi, $sql);
        } else {
            $sql = "UPDATE `project_information` set
`id_portofolio`='$category_portofolio',`nama_portofolio`='$nama_portofolio',`nama_client`='$nama_client',
`tgl_project`='$tgl_project',`url`='$url',
`teks`='$teks'
WHERE `id_projectInfo`='$id_projectInfo'";
            mysqli_query($koneksi, $sql);
        }
        // echo $sql;
        header("Location:index.php?include=portofolio-blog&notif=editberhasil");
    }
}
