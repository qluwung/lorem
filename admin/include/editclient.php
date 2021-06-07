<?php


if (isset($_GET['data'])) {
    $id_client = $_GET['data'];
    $_SESSION['id_client'] = $id_client;

    $sql_d = "select `hardworkers`,`happyClient`,`projects`, `jamDukungan` from `client` where `id_client`='$id_client'";
    $query_d = mysqli_query($koneksi, $sql_d);
    while ($data_d = mysqli_fetch_row($query_d)) {
        $hardworkwers = $data_d[0];
        $client = $data_d[1];
        $projects = $data_d[2];
        $jamDukungan = $data_d[3];
    }
}
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
                        <h1 class="h3 mb-0 text-gray-800">Edit Client</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Update Data Client
                                </div>
                                <form action="index.php?include=konfirmasi-edit-client" method="post" >

                                    <div class="col-sm-12 mt-4">
                                        <?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
                                            <?php if ($_GET['notif'] == "editkosong") { ?>
                                                <div class="alert alert-danger" role="alert">Maaf data
                                                    <?php echo $_GET['jenis']; ?> wajib di isi</div>
                                            <?php } ?>

                                        <?php } ?>
                                    </div>

                                    <div class="card-body">
                                        <div class="align-items-center">
                                            <h6>Total Klien :</h6>
                                            <div class="col-3 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="totalklien" placeholder="" id="total" value="<?php echo $client; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Projek :</h6>
                                            <div class="col-3 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="projek" aria-describedby="emailHelp" placeholder="" id="projek" value="<?php echo $projects; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Jam Dukungan :</h6>
                                            <div class="col-3 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="jamdukungan" id="jamdukungan" aria-describedby="emailHelp" placeholder="" value="<?php echo $jamDukungan; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Pekerja Keras :</h6>
                                            <div class="col-lg-3 col-6 pl-0">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" name="pekerjakeras" aria-describedby="emailHelp" placeholder="" id="pekerjakeras" value="<?php echo $hardworkwers; ?>">
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
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php
             
                ?>
                <!-- End of Footer -->
                <?php
                include('includes/script.php');
                ?>