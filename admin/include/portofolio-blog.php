<?php
include('includes/header.php');


if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_projectInfo = $_GET['data'];
        $sql_f = "SELECT `foto` from `project_information` where `id_projectInfo`='$id_projectInfo'";
        $query_f = mysqli_query($koneksi, $sql_f);
        $jumlah_f = mysqli_num_rows($query_f);
        if ($jumlah_f > 0) {
            while ($data_f = mysqli_fetch_row($query_f)) {
                $foto = $data_f[0];

                unlink("foto/$foto");
            }
        }
        $sql_dm = "DELETE from `project_information` where `id_projectInfo`='$id_projectInfo'";
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
                        <h1 class="h3 mb-0 text-gray-800">Blog Portofolio</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!--Tabel-->
                        <div class="col-xl-12 col-lg-8 ">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Tabel Blog Portofolio</h6>
                                </div>

                                <div class="card-body">
                                    <div class=" d-flex justify-content-between mb-4">
                                        <form class="d-none d-sm-inline-block form-inline ">
                                            <div class="input-group">
                                                <input type="text" id="kata_kunci" name="katakunci" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-danger" type="button">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                        <a href="index.php?include=tambah-portofolio-blog" class="btn btn-secondary btn-icon-split">
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
                                                    <th>Nama Portofolio</th>
                                                    <th>Klien</th>
                                                    <th>Kategori</th>
                                                    <th>Tanggal</th>
                                                    <th>URL</th>
                                                    <th>Teks</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $batas = 2;
                                                if (!isset($_GET['halaman'])) {
                                                    $posisi = 0;
                                                    $halaman = 1;
                                                } else {
                                                    $halaman = $_GET['halaman'];
                                                    $posisi = ($halaman - 1) * $batas;
                                                }
                                                //menampilkan data portofolio blog
                                                $sql_b = "SELECT `b`.`id_projectInfo`, `b`.`nama_portofolio`,`b`.`nama_client`,`k`.`category_portofolio`,`b`.`tgl_project`,`b`.`url`, `b`.`teks`  FROM `project_information` `b`
                                                INNER JOIN `portofolio` `k` ON `b`.`id_portofolio` =`k`.`id_portofolio`";
                                                if (isset($_GET["katakunci"])) {
                                                    $katakunci_portofolio_blog = $_GET["katakunci"];
                                                    $sql_b .= " where `b`.`nama_portofolio` LIKE'%$katakunci_portofolio_blog%' OR `b`.`nama_client` LIKE '%$katakunci_portofolio_blog%'OR `k`.`category_portofolio` LIKE '%$katakunci_portofolio_blog%' ";
                                                }
                                                $sql_b .= "ORDER BY `b`.`nama_portofolio`limit $posisi, $batas ";
                                                $query_b = mysqli_query($koneksi, $sql_b);
                                                //hitung jumlah semua data
                                                $sql_jum = "SELECT `b`.`id_projectInfo`, `b`.`nama_portofolio`,`b`.`nama_client`,`k`.`category_portofolio`,`b`.`tgl_project`,`b`.`url`, `b`.`teks`  FROM `project_information` `b`
                                                INNER JOIN `portofolio` `k` ON `b`.`id_portofolio` =`k`.`id_portofolio`";
                                                if (isset($_GET["katakunci"])) {
                                                    $katakunci_portofolio_blog = $_GET["katakunci"];
                                                    $sql_jum .= " where `b`.`nama_portofolio` LIKE'%$katakunci_portofolio_blog%' OR `b`.`nama_client` LIKE '%$katakunci_portofolio_blog%'OR `k`.`category_portofolio` LIKE '%$katakunci_portofolio_blog%' ";
                                                }
                                                $sql_jum .= " order by `nama_portofolio`";
                                                $query_jum = mysqli_query($koneksi, $sql_jum);
                                                $jum_data = mysqli_num_rows($query_jum);
                                                $jum_halaman = ceil($jum_data / $batas);
                                                $no = $posisi + 1;
                                                while ($data_b = mysqli_fetch_row($query_b)) {
                                                    $id_projectInfo = $data_b[0];
                                                    $nama_portofolio = $data_b[1];
                                                    $nama_client = $data_b[2];
                                                    $category_portofolio = $data_b[3];
                                                    $tgl_project = $data_b[4];
                                                    $url = $data_b[5];
                                                    $text = $data_b[6];
                                                ?>
                                                    <tr align="center">
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $nama_portofolio; ?></td>
                                                        <td><?php echo $nama_client; ?></td>
                                                        <td><?php echo $category_portofolio; ?></td>
                                                        <td><?php echo $tgl_project; ?></td>
                                                        <td><?php echo $url; ?></td>
                                                        <td><?php echo $text; ?></td>
                                                        <td>
                                                            <!-- janngan kelupaan :        -->
                                                            <a href="index.php?include=edit-portofolio-blog&data=<?= $id_projectInfo ?>" class="btn btn-info btn-circle btn-sm">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="index.php?include=detail-portofolio-blog&data=<?= $id_projectInfo ?>" class="btn btn-warning btn-circle btn-sm">
                                                                <i class="fas fa-info-circle"></i>
                                                            </a>
                                                            <a href="javascript:if(confirm('Anda yakin ingin menghapus data
<?php echo $id_projectInfo; ?>?')) window.location.href =
'index.php?include=portofolio-blog&aksi=hapus&data=<?php echo $id_projectInfo ?>¬if=hapusberhasil'" class="btn btn-xs btn-danger btn-circle btn-sm"><i class="fas fa-trash" title="Hapus"></i></a>
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
                                                        if (isset($_GET["katakunci"])) {
                                                            $katakunci_testimonial = $_GET["katakunci"];
                                                            if ($halaman != 1) {
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=portofolio-blog&katakunci=$katakunci_testimonial&halaman=1'>First</a></li>";
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=portofolio-blog&katakunci=$katakunci_testimonial&halaman=$sebelum'>«</a></li>";
                                                            }
                                                            for ($i = 1; $i <= $jum_halaman; $i++) {
                                                                if ($i > $halaman - 5 and $i < $halaman + 5) {
                                                                    if ($i != $halaman) {
                                                                        echo "<li class='page-item'><a class='page-link'href='index.php?include=portofolio-blog&katakunci=$katakunci_portofolio_blog&halaman=$i'>$i</a></li>";
                                                                    } else {
                                                                        echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                                                                    }
                                                                }
                                                            }
                                                            if ($halaman != $jum_halaman) {
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=portofolio-blog&katakunci=$katakunci_portofolio_blog&halaman=$setelah'>»</a></li>";
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=portofolio-blog&katakunci=$katakunci_portofolio_blog&halaman=$jum_halaman'>Last</a></li>";
                                                            }
                                                        } else {
                                                            if ($halaman != 1) {
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=portofolio-blog&halaman=1'>First</a></li>";
                                                                echo "<li class='page-item'><a class='page-link'href='index.php?include=portofolio-blog&halaman=$sebelum'>«</a></li>";
                                                            }
                                                            for ($i = 1; $i <= $jum_halaman; $i++) {
                                                                if ($i > $halaman - 5 and $i < $halaman + 5) {
                                                                    if ($i != $halaman) {
                                                                        echo "<li class='page-item'><a class='page-link'href='index.php?include=portofolio-blog&halaman=$i'>$i</a></li>";
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
                <?php
            
                ?>
                <!-- End of Footer -->
                <?php
                include('includes/script.php');
                ?>