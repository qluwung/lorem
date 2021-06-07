<?php


if(isset($_SESSION['id_client'])){
    $id_client=$_SESSION['id_client'];
    $hardworkers=$_POST['pekerjakeras'];
    $client=$_POST['totalklien'];
    $jamDukungan=$_POST['jamdukungan'];
    $projek=$_POST['projek'];

    if(empty($hardworkers)){
        header("Location:index.php?include=edit-client&data=$id_client&notif=editkosong&jenis=hardworkers");
    }else if(empty($client)){
        header("Location:index.php?include=edit-client&data=$id_client&notif=editkosong&jenis=jumlah klien");
    }else if(empty($jamDukungan)){
        header("Location:index.php?include=edit-client&data=$id_client&notif=editkosong&jenis=Jam Dukungan");
    }else if(empty($projek)){
        header("Location:index.php?include=edit-client&data=$id_client&notif=editkosong&jenis=jumlah Projek");
    
    }else{
        $sql="UPDATE `client` set `hardworkers`='$hardworkers',`happyClient`='$client', `projects`='$projek',`jamDukungan`='$jamDukungan' where `id_client`='$id_client'";
        mysqli_query($koneksi,$sql);
        unset($_SESSION['id_client']);
        // echo $sql;
       header("Location:index.php?include=client&notif=editberhasil");
    }
}
?>