<?php


if (isset($_GET['data'])) {
    $id_artikeldetail = $_GET['data'];
    $_SESSION['id_artikeldetail'] = $id_artikeldetail;

    //get data buku
    $sql_m = "SELECT `judul`,`id_user`,`tanggal`,`text`,`foto` FROM `artikeldetail` WHERE `id_artikeldetail`='$id_artikeldetail'";
    $query_m = mysqli_query($koneksi, $sql_m);
    while ($data_m = mysqli_fetch_row($query_m)) {
        $judul = $data_m[0];
        $user_name = $data_m[1];
        $tanggal = $data_m[2];
        $deskripsi = $data_m[3];
        $foto = $data_m[4];
    }
}
?>

<?php
include('includes/header.php');
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!--SideBar-->
        <?php
        include('includes/sidebar.php');
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include('includes/menu.php');
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Artikel Detail</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-12">
                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Edit Artikel Detail
                                    <a href="artikel-detail.php" class="btn btn-sm btn-warning float-right">
                                        <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                                </div>

                               

                                    <div class="card-body">
                                        <div class="align-items-center">
                                            <h6>Foto</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <div id="msg"></div>
                                                    <img src="foto/<?php echo $foto; ?>" id="preview" class="img-thumbnail">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Judul :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input disabled type="text" class="form-control" name="judul" id="id_artikel" value="<?php echo $judul; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Tanggal :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input readonly type="date" class="form-control form-control-user" name="tanggal" id="" value="<?php echo $tanggal; ?>" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Penulis :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <select disabled class="form-control form-control-user" name="penulis" id="cars">
                                                        <option value="">-Pilih Penulis -</option>
                                                        <?php
                                                        $sql_k = "SELECT `id_user`,`username` FROM
                                                    `user` ORDER BY `username`";
                                                        $query_k = mysqli_query($koneksi, $sql_k);
                                                        while ($data_k = mysqli_fetch_row($query_k)) {
                                                            $id_user = $data_k[0];
                                                            $username = $data_k[1];
                                                        ?>
                                                            <option value="<?php echo $id_user; ?>" <?php if ($id_user == $user_name) { ?> selected <?php } ?>><?php echo $username; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Teks :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <textarea disabled readonly name="text" value=" " class="form-control form-control-user" id="Editor" cols="30" rows="10"><?php echo $deskripsi; ?>
                                                                   </textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                        </div>


                        <!-- /.container-fluid -->
                    </div>

                    <!-- End of Main Content -->
                </div>
                <!-- Footer -->
                <?php
            
                ?>
                <!-- End of Footer -->
                <?php
                include('includes/script.php');
                ?>