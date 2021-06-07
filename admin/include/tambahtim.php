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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Tim</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Tambah Data Tim

                                    <a href="index.php?include=tim" class="btn btn-sm btn-warning float-right">
                                        <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>

                                </div>
                                <br>
                                <div class="col-sm-10">
                                    <?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
                                        <?php if ($_GET['notif'] == "tambahkosong") { ?>
                                            <div class="alert alert-danger" role="alert">Maaf data
                                                <?php echo $_GET['jenis']; ?> wajib di isi</div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                                <form class="form-horizontal" action="index.php?include=konfirmasi-tambah-tim" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="align-items-center">
                                            <h6>Nama :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="nama" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Jabatan :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="jabatan" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Instagram :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="instagram" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Linkedin :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="linkedin" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="align-items-center">
                                            <h6>Upload Gambar:</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <div id="msg"></div>
                                                    <input type="file" name="foto" class="file">
                                                    <div class="input-group my-3">
                                                        <input type="text" class="form-control" disabled placeholder="Upload Gambar" id="foto">
                                                        <div class="input-group-append">
                                                            <button type="button" id="pilih_gambar" class="browse btn btn-dark">Pilih Gambar</button>
                                                        </div>
                                                    </div>
                                                    <img src="gambar/80x80.png" id="preview" class="img-thumbnail">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" href="#" class=" d-sm-inline-block btn btn btn-success">
                                            Simpan
                                        </button>
                                        <button type="reset" href="#" class=" ml-2 d-sm-inline-block btn btn btn-warning">
                                            Reset
                                        </button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
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