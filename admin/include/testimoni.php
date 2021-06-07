<?php
include('includes/header.php');



if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_testimonial = $_GET['data'];
        $sql_f = "SELECT `foto` from `testimonial` where `id_testimonial`='$id_testimonial'";
        $query_f = mysqli_query($koneksi, $sql_f);
        $jumlah_f = mysqli_num_rows($query_f);
        if ($jumlah_f > 0) {
            while ($data_f = mysqli_fetch_row($query_f)) {
                $foto = $data_f[0];

                unlink("foto/$foto");
            }
        }
        $sql_dm = "DELETE from `testimonial` where `id_testimonial`='$id_testimonial'";
        mysqli_query($koneksi, $sql_dm);
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
                        <h1 class="h3 mb-0 text-gray-800">Testimoni</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!--Tabel-->
                        <div class="col-xl-12 col-lg-8 ">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Tabel Testimoni</h6>
                                </div>

                                <div class="card-body">
                                    <div class=" d-flex justify-content-between mb-4">
                                        <form method="post" action ="index.php?include=testimoni">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="kata_kunci" name="katakunci">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-danger" type="submit">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                        <a href="index.php?include=tambah-testimoni" class="btn btn-secondary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">Tambah Data</span>
                                        </a>
                                    </div>
                                    <div class="col-sm-12 p-0">
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
                                        <table class="table table-bordered fixed" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr align="center">
                                                    <th width="5%">No</th>
                                                    <th width="20%">Nama </th>
                                                    <th width="20%">Pekerjaan</th>
                                                    <th width="30%"> Detail</th>
                                                    <th width="15%">
                                                        Aksi
                                                    </th>
                                                </tr>


                                            </thead>
                                            <tbody>

                                                <?php
                                                $batas = 2;
                                                if (!isset($_POST['halaman'])) {
                                                    $posisi = 0;
                                                    $halaman = 1;
                                                } else {
                                                    $halaman = $_POST['halaman'];
                                                    $posisi = ($halaman - 1) * $batas;
                                                }
                                                //menampilkan data testimonial
                                                $sql_k = "SELECT `id_testimonial`,`nama` , `job`, `detail` FROM `testimonial` ";
                                                if (isset($_POST["katakunci"])) {
                                                    $katakunci_testimonial = $_POST["katakunci"];
                                                    $sql_k .= " WHERE `nama` LIKE'%$katakunci_testimonial%'";
                                                }
                                                $sql_k .= " ORDER BY `nama` limit $posisi, $batas ";

                                                $query_k = mysqli_query($koneksi, $sql_k);
                                                //hitung jumlah semua data
                                                $sql_jum = "SELECT `id_testimonial`,`nama` , `job`, `detail` FROM `testimonial` ";
                                                if (isset($_POST["katakunci"])) {
                                                    $katakunci_testimonial = $_POST["katakunci"];
                                                    $sql_jum .= " WHERE `nama` LIKE '%$katakunci_testimonial%'";
                                                }
                                                $sql_jum .= " ORDER BY `nama`";
                                                $query_jum = mysqli_query($koneksi, $sql_jum);
                                                $jum_data = mysqli_num_rows($query_jum);
                                                $jum_halaman = ceil($jum_data / $batas);
                                                $no = $posisi + 1;
                                                while ($data_k = mysqli_fetch_row($query_k)) {
                                                    $id_testimonial = $data_k[0];
                                                    $nama = $data_k[1];
                                                    $job = $data_k[2];
                                                    $detail = $data_k[3];
                                                ?>
                                                    <tr align="center">
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $nama; ?></td>
                                                        <td><?php echo $job; ?></td>
                                                        <td><?php echo $detail; ?></td>
                                                        <td align="center">
                                                            <a href="index.php?include=edit-testimoni&data=<?php echo $id_testimonial; ?>" class="btn btn-sm btn-circle btn-info" title="Edit"><i class="fas
    fa-edit"></i></a>
                                                            <a href="index.php?include=detail-testimoni&data=<?php echo $id_testimonial; ?>" class="btn btn-sm btn-circle btn-warning" title="Detail"><i class="fas
    fa-eye"></i></a>
                                                            <a href="javascript:if(confirm('Anda yakin ingin menghapus data
    <?php echo $nama; ?>?')) window.location.href =
    'index.php?include=testimoni&aksi=hapus&data=<?php echo $id_testimonial; ?>¬if=hapusberhasil'" class="btn btn-sm btn-circle btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
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
                                                        if (isset($_POST["katakunci"])) {
                                                            $katakunci_testimonial = $_POST["katakunci"];
                                                            if ($halaman != 1) {
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=testimoni&katakunci=$katakunci_testimonial&halaman=1'>First</a></li>";
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=testimoni&katakunci=$katakunci_testimonial&halaman=$sebelum'>«</a></li>";
                                                            }
                                                            for ($i = 1; $i <= $jum_halaman; $i++) {
                                                                if ($i > $halaman - 5 and $i < $halaman + 5) {
                                                                    if ($i != $halaman) {
                                                                        echo "<li class='page-item'><a class='page-link'href='index.php?include=testimoni&katakunci=$katakunci_testimonial&halaman=$i'>$i</a></li>";
                                                                    } else {
                                                                        echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                                                                    }
                                                                }
                                                            }
                                                            if ($halaman != $jum_halaman) {
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=testimoni&katakunci=$katakunci_testimonial&halaman=$setelah'>»</a></li>";
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=testimoni&katakunci=$katakunci_testimonial&halaman=$jum_halaman'>Last</a></li>";
                                                            }
                                                        } else {
                                                            if ($halaman != 1) {
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=testimoni&halaman=1'>First</a></li>";
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=testimoni&halaman=$sebelum'>«</a></li>";
                                                            }
                                                            for ($i = 1; $i <= $jum_halaman; $i++) {
                                                                if ($i > $halaman - 5 and $i < $halaman + 5) {
                                                                    if ($i != $halaman) {
                                                                        echo "<li class='page-item'><a class='page-link'href='index.php?include=testimoni&halaman=$i'>$i</a></li>";
                                                                    } else {
                                                                        echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                                                                    }
                                                                }
                                                            }
                                                            if ($halaman != $jum_halaman) {
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=testimoni&halaman=$setelah'>»</a></li>";
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=testimoni&halaman=$jum_halaman'>Last</a></li>";
                                                            }
                                                        }
                                                    } ?>

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
                <!-- Footer -->
                <?php
              
                ?>
                <!-- End of Footer -->
                <?php
                include('includes/script.php');
                ?>