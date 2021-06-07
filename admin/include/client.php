<?php



include('koneksi/koneksi.php');

if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_client = $_GET['data'];

        $sql_dh = "delete from `tbclient` where `id_client`='$id_client'";
        mysqli_query($koneksi, $sql_dh);
    }
}
?>

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

                <!-- Topbar -->
                <?php
                include('includes/menu.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Client</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!--Tabel-->
                        <div class="col-xl-12 col-lg-8 ">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Tabel Client</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr align="center">
                                                    <th>Nomor</th>
                                                    <th>Total Klien</th>
                                                    <th>Projek</th>
                                                    <th>Jam Dukungan</th>
                                                    <th>Pekerja Keras</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql_k = "SELECT `id_client`,`happyClient`,`projects`, `jamDukungan`, `hardworkers`FROM
`client` ";
                                                $query_k = mysqli_query($koneksi, $sql_k);
                                                $no = 1;
                                                while ($data_k = mysqli_fetch_row($query_k)) {
                                                    $id_client = $data_k[0];
                                                    $client = $data_k[1];
                                                    $projek = $data_k[2];
                                                    $jam_dukungan = $data_k[3];
                                                    $hardworkers = $data_k[4];
                                                ?>
                                                    <tr align="center">
                                                        <td><?php echo $no ?></td>
                                                        <td><?php echo $client ?></td>
                                                        <td><?php echo $projek ?></td>
                                                        <td><?php echo $jam_dukungan ?></td>
                                                        <td><?php echo $hardworkers ?></td>

                                                        <td>
                                                            <div class="edit"></div>
                                                            <a href="index.php?include=edit-client&data=<?= $id_client ?>" class="btn btn-info btn-circle btn-sm">

                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- End of Main Content -->


                </div>
                <!-- Footer -->
                <?php
           
                ?>
                <!-- End of Footer -->
                <!-- End of Content Wrapper -->

                <?php
                include('includes/script.php');
                ?>