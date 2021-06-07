<?php

include('koneksi/koneksi.php');
if (isset($_GET['data'])) {
    $id_projectInfo = $_GET['data'];
    $_SESSION['id_projectInfo'] = $id_projectInfo;
    $sql_m = "SELECT `id_portofolio`, `nama_portofolio`,`nama_client`, `tgl_project`, `url`, `teks`, `foto` from `project_information` where `id_projectInfo`='$id_projectInfo'";
    $query_m = mysqli_query($koneksi, $sql_m);
    while ($data_m = mysqli_fetch_row($query_m)) {

        $nama_portofolio = $data_m[1];
        $nama_client = $data_m[2];
        $category_portofolio = $data_m[0];
        $tgl_project = $data_m[3];
        $url = $data_m[4];
        $teks = $data_m[5];
        $foto = $data_m[6];
    }
}
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
                        <h1 class="h3 mb-0 text-gray-800">Edit Blog Portofolio</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>
                    </div>


                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Edit Blog Portofolio
                                    <a href="index.php?include=edit-client" class="btn btn-sm btn-warning float-right">
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
                                <form method="post" action="index.php?include=konfirmasi-edit-blog" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="align-items-center">
                                            <h6>Nama Portofolio :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="nama_portofolio" aria-describedby="emailHelp" placeholder="" value="<?php echo $nama_portofolio; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Klien :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="nama_client" aria-describedby="emailHelp" placeholder="" value="<?php echo $nama_client; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Kategori :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <select class="form-control form-control-user" name="category_portofolio" id="cars">
                                                        <option value="">-Pilih Kategori -</option>
                                                        <?php
                                                        $sql_k = "SELECT `id_portofolio`,`category_portofolio` FROM
                                                    `portofolio` ORDER BY `category_portofolio`";
                                                        $query_k = mysqli_query($koneksi, $sql_k);
                                                        while ($data_k = mysqli_fetch_row($query_k)) {
                                                            $id_portofolio = $data_k[0];
                                                            $category_portofolio = $data_k[1];
                                                        ?>
                                                            <option value="<?php echo $id_portofolio; ?>" <?php if ($id_portofolio == $id_portofolio) { ?> selected <?php } ?>><?php echo $category_portofolio; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Tanggal :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="date" class="form-control form-control-user" name="tgl_project" aria-describedby="emailHelp" placeholder="" value="<?php echo $tgl_project; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>URL :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="url" aria-describedby="emailHelp" placeholder="" value="<?php echo $url; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="align-items-center">
                                        <h6>Teks :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <textarea type="text" class="form-control form-control-user" cols="50" rows="20" id="editor" name = "teks"value="<?php //echo $teks;
                                                                                                                                                                    ?>"></textarea>
                                            </div>
                                        </div>
                                    </div> -->
                                        <div class="align-items-center">
                                            <h6>Teks :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <textarea name="teks" value=" " class="form-control form-control-user" id="" cols="30" rows="10"><?php echo $teks; ?>
                                               </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Upload Foto</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <div id="msg"></div>
                                                    <input type="file" name="foto" class="file">
                                                    <div class="input-group my-3">
                                                        <input type="text" class="form-control" disabled placeholder="Upload Gambar" id="file" value="<?php echo $foto; ?>">
                                                        <div class="input-group-append">
                                                            <button type="button" id="pilih_gambar" class="browse btn btn-dark">Pilih Gambar</button>
                                                        </div>
                                                    </div>
                                                    <img src="foto/<?php echo $foto; ?>" id="preview" class="img-thumbnail">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" href="#" class=" d-sm-inline-block btn btn btn-success">
                                            Simpan
                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
         
            ?>
            <!-- End of Footer -->
            <?php
            include('includes/script.php');
            ?>