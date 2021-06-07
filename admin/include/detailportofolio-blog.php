<?php


if (isset($_GET['data'])) {
    $id_projectInfo = $_GET['data'];
    $sql_d = "SELECT `b`.`foto`,`b`.`nama_portofolio`,`b`.`nama_client`,`b`.`tgl_project`,`b`.`url`,`b`.`teks`,`k`.`category_portofolio`from `project_information` `b` inner join `portofolio` `k` on `b`.`id_portofolio`=`k`.`id_portofolio` where `b`.`id_projectInfo`='$id_projectInfo'";
    $query_d = mysqli_query($koneksi, $sql_d);
    while ($data_d = mysqli_fetch_array($query_d)) {
        $nama_portofolio = $data_d['nama_portofolio'];
        $category_portofolio = $data_d['category_portofolio'];
        $nama_client = $data_d['nama_client'];
        $tgl_project = $data_d['tgl_project'];
        $url = $data_d['url'];
        $teks = $data_d['teks'];
        $foto = $data_d['foto'];
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
                        <h1 class="h3 mb-0 text-gray-800">Detail Blog Portofolio</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Detail Blog Portofolio
                                    <a href="portofolio-blog.php" class="btn btn-sm btn-warning float-right">
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
                                        <h6>Nama Portofolio :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="text" readonly class="form-control form-control-user" name="totalklien" aria-describedby="emailHelp" placeholder="" value="<?php echo $nama_portofolio; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Klien :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="text" readonly class="form-control form-control-user" name="totalklien" aria-describedby="emailHelp" placeholder="" value="<?php echo $nama_client; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Kategori :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="text" readonly class="form-control form-control-user" name="totalklien" aria-describedby="emailHelp" placeholder="" value="<?php echo $category_portofolio; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Tanggal :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="date" readonly class="form-control form-control-user" name="totalklien" aria-describedby="emailHelp" placeholder="" value="<?php echo $tgl_project; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>URL :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="text" readonly class="form-control form-control-user" name="totalklien" aria-describedby="emailHelp" placeholder="" value="<?php echo $url; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Teks :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <textarea name="teks" value=" " class="form-control form-control-user" id="" cols="30" rows="10"><?php echo $teks; ?></textarea>
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