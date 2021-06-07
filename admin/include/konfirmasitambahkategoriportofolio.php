<?php

$category_portofolio = $_POST['category_portofolio'];
if (empty($category_portofolio)) {
    header("Location:index.php?include=tambah-portofolio&notif=tambahkosong");
} else {
    $sql = "insert into `portofolio` (`category_portofolio`)  
values ('$category_portofolio')";
    mysqli_query($koneksi, $sql);
    header("Location:index.php?include=portofolio&notif=tambahberhasil");
}
