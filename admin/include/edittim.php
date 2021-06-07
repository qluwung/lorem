<?php

if (isset($_GET['data'])) {
    $id_tim = $_GET['data'];
    $_SESSION['id_tim'] = $id_tim;
    //get data testimoni
    $sql_d = " SELECT  `nama`, `jabatan`,`instagram`,`linkedin`,`foto` FROM `tim` where `id_tim` = '$id_tim'";
    $query_d = mysqli_query($koneksi, $sql_d);
    while ($data_d = mysqli_fetch_row($query_d)) {
        $nama = $data_d[0];
        $jabatan = $data_d[1];
        $instagram = $data_d[2];
        $linkedin = $data_d[3];
        $foto = $data_d[4];
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
                        <h1 class="h3 mb-0 text-gray-800">Edit Tim</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Edit Data Tim
                                    <a href="tim.php" class="btn btn-sm btn-warning float-right">
                                        <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                                </div>

                                <div class="col-sm-12 mt-4">
                                    <?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
                                        <?php if ($_GET['notif'] == "editkosong") { ?>
                                            <div class="alert alert-danger" role="alert">Maaf data
                                                <?php echo $_GET['jenis']; ?> wajib di isi</div>
                                        <?php } ?>

                                    <?php } ?>
                                </div>
                                <form class="form-horizontal" action="index.php?include=konfirmasi-edit-tim" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="align-items-center">
                                            <h6>Nama :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Jabatan :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control " id="jabatan" name="jabatan" value="<?php echo $jabatan; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="align-items-center">
                                            <h6>Instagram :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="instagram" value="<?php echo $instagram; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Linkedin :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="linkedin" value="<?php echo $linkedin; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="align-items-center">
                                            <h6>Upload Foto:</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <div id="msg"></div>
                                                    <input type="file" name="foto" class="file">
                                                    <div class="input-group my-3">
                                                        <input type="text" class="form-control" disabled placeholder="Upload Gambar" name="foto" id="file">
                                                        <div class="input-group-append">
                                                            <button type="button" id="pilih_gambar" class="browse btn btn-dark">Pilih Gambar</button>
                                                        </div>
                                                    </div>
                                                            <img src="foto/<?php echo $foto ?>" class="img-thumbnail" id="preview">

                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" href="#" class=" d-sm-inline-block btn btn btn-success">
                                            Simpan
                                        </button>

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
     
            ?>
            <!-- End of Footer -->
            <?php
            include('includes/script.php');
            ?>