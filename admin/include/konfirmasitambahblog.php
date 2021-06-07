<?php


// $id_projekInfo = $_POST['project_information'];
$nama_portofolio = $_POST['nama_portofolio'];
$category_portofolio = $_POST['category_portofolio'];
// $id_portofolio =$_POST['id_portofolio'];
$nama_client= $_POST['nama_client'];
$tgl_project = $_POST['tgl_project'];
$url = $_POST['url'];
$teks = addslashes($_POST['teks']);


// if(empty($id_projekInfo)){
// header("Location:tambahportofolio-blog.php?notif=tambahkosong&
// jenis=blog");
// }else 
if(empty($nama_portofolio)){
    header("Location:tambahportofolio-blog.php?data=$id_projectInfo&notif=editkosong&jenis=nama");
// }else if(empty($nama_portofolio)){
// header("Location:tambahportofolio-blog.php?notif=tambahkosong&
// jenis=namaportofolio");
// }else if(!move_uploaded_file($lokasi_file,$direktori)){
//     header("Location:tambahportofolio-blog.php?notif=ok");
    
// 
}else if(empty($nama_client)){
    header("Location:index.php?include=tambah-portofolio-blog&data=$id_projectInfo&notif=editkosong&jenis=nama klien");
}else if(empty($category_portofolio)){
    header("Location:index.php?include=tambah-portofolio-blog&data=$id_projectInfo&notif=editkosong&jenis=kategori portofolio");
}else if(empty($tgl_project)){
    header("Location:index.php?include=tambah-portofolio-blog&data=$id_projectInfo&notif=editkosong&jenis=tanggal");
}else if(empty($url)){
    header("Location:index.php?include=tambah-portofolio-blog&data=$id_projectInfo&notif=editkosong&jenis=url");
}else if(empty($teks)){
    header("Location:index.php?include=tambah-portofolio-blog&data=$id_projectInfo&notif=editkosong&jenis=text");
    }else{
        $lokasi_file = $_FILES['foto']['tmp_name'];
        $nama_file = $_FILES['foto']['name'];
        $direktori = 'foto/'.$nama_file;
          move_uploaded_file($lokasi_file,$direktori);
$sql = "INSERT INTO `project_information` (`id_portofolio`,`nama_portofolio`,`nama_client`,`tgl_project`,`url`,`teks`,`foto`) VALUES ('$category_portofolio','$nama_portofolio','$nama_client',
'$tgl_project','$url','$teks','$nama_file')";
// echo $sql;
mysqli_query($koneksi,$sql);
// $id_projekInfo = mysqli_insert_id($koneksi);
// if(!empty($_POST['portofolio'])){
// foreach($_POST['portofolio'] as $id_portofolio){
// $sql_i = "insert into `portofolio` (`id_portofolioInfo`, `id_portofolio`)
// values ('$id_portofolioInfo', '$id_portofolio')";
// mysqli_query($koneksi,$sql_i);
// }
// }

header("Location:index.php?include=portofolio-blog&notif=tambahberhasil");
}
