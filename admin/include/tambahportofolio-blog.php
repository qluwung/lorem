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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Blog Portofolio</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Tambah Blog Portofolio

                                    <a href="index.php?include=portofolio-blog" class="btn btn-sm btn-warning float-right">
                                        <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                                    <!-- nambahin tombol kembali wung -->
                                </div>
                                <div class="col-sm-12 mt-4">
                                    <?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
                                        <?php if ($_GET['notif'] == "editkosong") { ?>
                                            <div class="alert alert-danger" role="alert">Maaf data
                                                <?php echo $_GET['jenis']; ?> wajib di isi</div>
                                        <?php } ?>

                                    <?php } ?>
                                </div>
                                <form method="POST" action="index.php?include=konfirmasi-tambah-blog" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="align-items-center">
                                            <h6> Nama Porotofolio :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="nama_portofolio" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="align-items-center">
                                            <h6>Klien :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="nama_client" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Kategori :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <select class="form-control form-control-user" name="category_portofolio" id="cars">
                                                        <option value="">-Pemilih Kategori</option>
                                                        <?php
                                                        $sql_t = "SELECT `id_portofolio`,`category_portofolio` FROM `portofolio`
ORDER BY `category_portofolio`";
                                                        $query_t = mysqli_query($koneksi, $sql_t);
                                                        while ($data_t = mysqli_fetch_row($query_t)) {
                                                            $id_portofolio = $data_t[0];
                                                            $category_portofolio = $data_t[1];
                                                        ?>
                                                            <option value="<?php echo $id_portofolio; ?>"><?php echo $category_portofolio; ?></option> <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Tanggal :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="date" class="form-control form-control-user" name="tgl_project" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>URL :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="url" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="align-items-center">
                                            <h6>Teks :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <textarea name="teks" class="form-control form-control-user" id="" cols="30" rows="10"></textarea>
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