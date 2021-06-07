<?php

if (isset($_SESSION['id_portofolio'])) {
    $id_portofolio = $_SESSION['id_portofolio'];
    $category_portofolio = $_POST['category_portofolio'];
    if (empty($category_portofolio)) {

        header("Location:index.php?include=edit-portofolio&data=$id_portofolio&notif=editkosong&jenis=Kategori Portofolio");
    } else {
        $sql = "update `portofolio` set `category_portofolio`='$category_portofolio'
where `id_portofolio`='$id_portofolio'";
        mysqli_query($koneksi, $sql);
        unset($_SESSION['id_portofolio']);
        header("Location:index.php?include=portofolio&notif=editberhasil");
    }
}
