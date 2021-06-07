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
                        <h1 class="h3 mb-0 text-gray-800">Detail Portofolio</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Detail Data Portofolio
                                </div>
                                <div class="card-body">
                                    <div class="align-items-center">
                                        <h6>Nama Portofolio :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" disabled placeholder="Upload Gambar" name="totalklien" aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Kategori :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" disabled placeholder="Upload Gambar" name="totalklien" aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Gambar:</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <div id="msg"></div>
                                                <input type="file" name="gambar" class="file">
                                                <img src="img/hero-login.png" id="preview" class="img-thumbnail">
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