<?php

// $id_projekInfo = $_POST['project_information'];
$judul = $_POST['judul'];
$tanggal = $_POST['tanggal'];
$penulis = $_POST['penulis'];
// $id_portofolio =$_POST['id_portofolio'];
$text= $_POST['text'];



// if(empty($id_projekInfo)){
// header("Location:tambahportofolio-blog.php?notif=tambahkosong&
// jenis=blog");
// }else 
if(empty($judul)){
header("Location:index.php?=tambah-artikel&notif=judulKosong");
// }else if(empty($nama_portofolio)){
// header("Location:tambahportofolio-blog.php?notif=tambahkosong&
// jenis=namaportofolio");
// }else if(!move_uploaded_file($lokasi_file,$direktori)){
//     header("Location:tambahportofolio-blog.php?notif=ok");
    
// 

}else if(empty($tanggal)){
    header("Location:index.php?include=tambah-artikel&notif=TanggalKosong");
}else if(empty($penulis)){
    header("Location:index.php?include=tambah-artikel&notif=PenulisKosong");
}else if(empty($text)){
    header("Location:index.php?include=tambah-artikel&notif=DetailKosong");
}else{
        $lokasi_file = $_FILES['gambar']['tmp_name'];
        $nama_file = $_FILES['gambar']['name'];
        $direktori = 'foto/'.$nama_file;
          move_uploaded_file($lokasi_file,$direktori);
$sql = "INSERT INTO `artikeldetail` (`id_user`,`judul`,`tanggal`,`text`,`foto`) VALUES ('$penulis','$judul','$tanggal','$text','$nama_file')";
 //echo $sql;
mysqli_query($koneksi,$sql);
// $id_projekInfo = mysqli_insert_id($koneksi);
// if(!empty($_POST['portofolio'])){
// foreach($_POST['portofolio'] as $id_portofolio){
// $sql_i = "insert into `portofolio` (`id_portofolioInfo`, `id_portofolio`)
// values ('$id_portofolioInfo', '$id_portofolio')";
// mysqli_query($koneksi,$sql_i);
// }
// }

header("Location:index.php?include=artikel-detail&notif=tambahberhasil");
}
