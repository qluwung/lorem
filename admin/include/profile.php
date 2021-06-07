<?php
include('includes/header.php');

?>
<?php

if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    //get profil
    $sql = "SELECT `nama`,`username`, `email`,`foto` FROM `user` WHERE `id_user`='$id_user'";
    //echo $sql;
    $query = mysqli_query($koneksi, $sql);
    while ($data = mysqli_fetch_row($query)) {
        $nama = $data[0];
        $username = $data[1];
        $email = $data[2];
        $foto = $data[3];
    }
}
?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include('includes/sidebar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar Navbar -->
                <?php
                include('includes/menu.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!--Tabel-->
                        <div class="col-xl-12 col-lg-8 ">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Profile</h6>
                                </div>
                                <div class="card-body">

                                    <div class="col-sm-12 p-0">
                                    <?php if (!empty($_GET['notif'])) { ?>
                                            <?php if ($_GET['notif'] == "editberhasil") { ?>
                                            <div class="alert alert-success" role="alert">
                                                Data Berhasil Diubah</div>
                                        <?php }} ?>

                                    </div>
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
                                        <h6>Nama :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="text" readonly class="form-control form-control-user" name="totalklien" aria-describedby="emailHelp" placeholder="" value="<?php echo $nama; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="align-items-center">
                                        <h6>Username :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="text" readonly class="form-control form-control-user" name="totalklien" aria-describedby="emailHelp" placeholder="" value="<?php echo $username; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="align-items-center">
                                        <h6>Email :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="text" readonly class="form-control form-control-user" name="totalklien" aria-describedby="emailHelp" placeholder="" value="<?php echo $email; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <td align="">
                                        <a href="index.php?include=edit-profile&data=<?php echo $id_user; ?>" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i> Edit Profile</a>
                                    </td>

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
                <!-- End of Content Wrapper -->

                <?php
                include('includes/script.php');
                ?>