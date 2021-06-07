<?php


if (isset($_GET['data'])) {
    $id_testimonial = $_GET['data'];
    //get data testimoni
    $sql_d = " SELECT  `nama`, `job`, `detail`, `foto` FROM `testimonial` where `id_testimonial` = '$id_testimonial'";
    $query = mysqli_query($koneksi, $sql_d);
    while ($data_d = mysqli_fetch_row($query)) {
        $nama = $data_d[0];
        $job = $data_d[1];
        $detail = $data_d[2];
        $foto = $data_d[3];
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
                        <h1 class="h3 mb-0 text-gray-800">Detail Testimoni</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Detail Data Testimoni
                                    <a href="testimoni.php" class="btn btn-sm btn-warning float-right">
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
                                        <h6>Nama Klien :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input readonly type="text" class="form-control form-control-user" name="nama" value="<?php echo $nama; ?>" aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Pekerjaan Klien :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input readonly type="text" class="form-control form-control-user" name="job" value="<?php echo $job; ?>" aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Detail :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <textarea readonly name="detail" value="" class="form-control form-control-user" id="" cols="30" rows="10">
<?php echo $detail; ?>
                                               </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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