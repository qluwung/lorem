<?php

if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_inbox = $_GET['data'];
        //hapus data inbox
        $sql_dm = "delete from `inbox` where `id_inbox` = '$id_inbox'";
        mysqli_query($koneksi, $sql_dm);
    }
}
?>

<?php
include('includes/header.php')
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include('includes/sidebar.php')
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include('includes/menu.php')
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Inbox</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!--Tabel-->
                        <div class="col-xl-12 col-lg-8 ">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Tabel Inbox</h6>
                                </div>

                                <div class="card-body">
                                    <div class=" d-flex justify-content-between mb-4">
                                        <form class="d-none d-sm-inline-block form-inline ">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-light border-0 small" id="kata_kunci" name="katakunci" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger" type="button">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="col-sm-12">
                                        <?php if (!empty($_GET['notif'])) { ?>
                                            <?php if ($_GET['notif'] == "tambahberhasil") { ?>
                                                <div class="alert alert-success" role="alert">
                                                    Data Berhasil Ditambahkan</div>
                                            <?php } else if ($_GET['notif'] == "editberhasil") { ?>
                                                <div class="alert alert-success" role="alert">
                                                    Data Berhasil Diubah</div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr align="center">
                                                    <th width="5%">No</th>
                                                    <th width="15%">Tanggal Diterima </th>
                                                    <th width="10%">Nama Pengirim</th>
                                                    <th width="15%">Email</th>
                                                    <th width="15%">Subjek</th>
                                                    <th width="20%">Isi Pesan</th>
                                                    <th width="15%">
                                                        Aksi
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $batas = 5;
                                                if (!isset($_GET['halaman'])) {
                                                    $posisi = 0;
                                                    $halaman = 1;
                                                } else {
                                                    $halaman = $_GET['halaman'];
                                                    $posisi = ($halaman - 1) * $batas;
                                                }
                                                //menampilkan data chat
                                                $sql_k = "SELECT `id_inbox`,`date_receive_inbox` ,`name_inbox`,`email_inbox`,`subject_inbox`,`message_inbox` FROM `inbox` ";
                                                if (isset($_GET["katakunci"])) {
                                                    $katakunci_inbox = $_GET["katakunci"];
                                                    $sql_k .= " WHERE `name_inbox` LIKE'%$katakunci_inbox%'";
                                                }
                                                $sql_k .= " ORDER BY `name_inbox` limit $posisi, $batas ";

                                                $query_k = mysqli_query($koneksi, $sql_k);
                                                //hitung jumlah semua data
                                                $sql_jum = "SELECT `id_inbox`,`date_receive_inbox` ,`name_inbox`,`email_inbox`,`subject_inbox`,`message_inbox` FROM `inbox` ";
                                                if (isset($_GET["katakunci"])) {
                                                    $katakunci_inbox = $_GET["katakunci"];
                                                    $sql_jum .= " WHERE `name_inbox` LIKE '%$katakunci_inbox%'";
                                                }
                                                $sql_jum .= " ORDER BY `name_inbox`";
                                                $query_jum = mysqli_query($koneksi, $sql_jum);
                                                $jum_data = mysqli_num_rows($query_jum);
                                                $jum_halaman = ceil($jum_data / $batas);


                                                $query_k = mysqli_query($koneksi, $sql_k);
                                                $no = $posisi + 1;
                                                while ($data_k = mysqli_fetch_row($query_k)) {
                                                    $id_inbox = $data_k[0];
                                                    $date_receive_inbox = $data_k[1];
                                                    $name_inbox = $data_k[2];
                                                    $email_inbox = $data_k[3];
                                                    $subject_inbox = $data_k[4];
                                                    $message_inbox = $data_k[5];
                                                ?>
                                                    <tr align="center">
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $date_receive_inbox; ?></td>
                                                        <td><?php echo $name_inbox; ?></td>
                                                        <td><?php echo $email_inbox; ?></td>
                                                        <td><?php echo $subject_inbox; ?></td>
                                                        <td><?php echo $message_inbox; ?></td>


                                                        <td>

                                                            <a href="index.php?include=detail-inbox&data=<?php echo $id_inbox; ?>" class="btn btn-sm btn-warning" title="Detail"><i class="fas
                            fa-eye"></i></a>
                                                            <a href="javascript:if(confirm('Anda yakin ingin menghapus data
                            <?php echo $id_inbox; ?>?')) window.location.href =
                            'index.php?include=inbox&aksi=hapus&data=<?php echo $id_inbox ?>¬if=hapusberhasil'" class="btn btn-sm btn-delete"><i class="fas fa-trash" title="Hapus"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php $no++;
                                                } ?>


                                            </tbody>
                                        </table>
                                    </div>

                                    <!--Pagination-->
                                    <div class=" d-flex justify-content-start mb-4">
                                        <form class="d-none d-sm-inline-block form-inline ">
                                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                                <ul class="pagination">

                                                    <?php
                                                    if ($jum_halaman == 0) {
                                                        //tidak ada halaman
                                                    } else if ($jum_halaman == 1) {
                                                        echo "<li class='page-item'><a class='page-link'>1</a></li>";
                                                    } else {
                                                        $sebelum = $halaman - 1;
                                                        $setelah = $halaman + 1;
                                                        if (isset($_GET["katakunci"])) {
                                                            $katakunci_inbox = $_GET["katakunci"];
                                                            if ($halaman != 1) {
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=inbox&katakunci=$katakunci_inbox&halaman=1'>Previous</a></li>";
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=inbox&katakunci=$katakunci_inbox&halaman=$sebelum'>«</a></li>";
                                                            }
                                                            for ($i = 1; $i <= $jum_halaman; $i++) {
                                                                if ($i > $halaman - 5 and $i < $halaman + 5) {
                                                                    if ($i != $halaman) {
                                                                        echo "<li class='page-item'><a class='page-link'href='index.php?include=inbox&katakunci=$katakunci_tim&halaman=$i'>$i</a></li>";
                                                                    } else {
                                                                        echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                                                                    }
                                                                }
                                                            }
                                                            if ($halaman != $jum_halaman) {
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=inbox&katakunci=$katakunci_inbox&halaman=$setelah'>»</a></li>";
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=inbox&katakunci=$katakunci_inbox&halaman=$jum_halaman'>Last</a></li>";
                                                            }
                                                        } else {
                                                            if ($halaman != 1) {
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=inbox&halaman=1'>First</a></li>";
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=inbox&halaman=$sebelum'>«</a></li>";
                                                            }
                                                            for ($i = 1; $i <= $jum_halaman; $i++) {
                                                                if ($i > $halaman - 5 and $i < $halaman + 5) {
                                                                    if ($i != $halaman) {
                                                                        echo "<li class='page-item'><a class='page-link'href='index.php?include=inbox&halaman=$i'>$i</a></li>";
                                                                    } else {
                                                                        echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                                                                    }
                                                                }
                                                            }
                                                            if ($halaman != $jum_halaman) {
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=inbox&halaman=$setelah'>»</a></li>";
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=inbox&halaman=$jum_halaman'>Last</a></li>";
                                                            }
                                                        }
                                                    }

                                                    ?>

                                                </ul>
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
                <!-- End of Content Wrapper -->

                <?php
                include('includes/script.php');
                ?>