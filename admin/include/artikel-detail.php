<?php

if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_artikeldetail = $_GET['data'];
    //get foto
    $sql_f = "SELECT `foto` FROM `artikeldetail` WHERE `id_artikeldetail`='$id_artikeldetail'";
    $query_f = mysqli_query($koneksi, $sql_f);
    $jumlah_f = mysqli_num_rows($query_f);
    if ($jumlah_f > 0) {
      while ($data_f = mysqli_fetch_row($query_f)) {
        $foto = $data_f[0];
        //menghapus foto
        unlink("foto/$foto");
      }
    }
    //hapus data buku
    $sql_dm = "delete from `artikeldetail` where `id_artikeldetail` = '$id_artikeldetail'";
    mysqli_query($koneksi, $sql_dm);
  }
}
?>

<?php
include('includes/header.php');
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
      <?php
      include('includes/menu.php');
      ?>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Detail Artikel</h1>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>
        </div>

        <!-- Content Row -->
        <div class="row">
          <!--Tabel-->
          <div class="col-xl-12 col-lg-8 ">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">Tabel Detail Artikel</h6>
              </div>

              <div class="card-body">
              
                <div class=" d-flex justify-content-between mb-4">
                  <form class="d-none d-sm-inline-block form-inline " method ="post" action ="index.php?include=artikel-detail">
                    <div class="input-group">
                      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="kata_kunci" name="katakunci">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-danger" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>

                  <a href="index.php?include=tambah-artikel-detail" class="btn btn-secondary btn-icon-split">
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
                    <?php } else if ($_GET['notif'] == "hapusberhasil") { ?>
                      <div class="alert alert-success" role="alert">
                        Data Berhasil Dihapus</div>
                    <?php } ?>
                  <?php } ?>
                </div>
                <div class="table-responsive">

                  <table class="table table-bordered fixed" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr align="center">
                        <th width="8%">No</th>
                        <th width="30%">Judul</th>
                        <th width="30%">Tanggal</th>
                        <th width="30%">Penulis</th>
                        <th width="20%">Text</th>
                        <th width="15%">
                          Aksi
                        </th>
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

                      //menampilkan data

                      $sql_b = "SELECT `d`.`id_artikeldetail`, `d`.`judul`, `d`.`tanggal`,
`u`.`username`,`d`.`text` FROM`artikeldetail` `d` INNER JOIN `user` `u` ON
`d`.`id_user` = `u`.`id_user` ";

                      if (isset($_POST["katakunci"])) {
                        $katakunci_artikel = $_POST["katakunci"];
                        $sql_b .= " where `judul` LIKE'%$katakunci_artikel%'";
                      }
                      $sql_b .= " ORDER BY `judul` limit $posisi, $batas ";

                      $query_b = mysqli_query($koneksi, $sql_b);

                      //hitung jumlah semua data
                      $sql_jum = "SELECT `d`.`id_artikeldetail`, `d`.`judul`, `d`.`tanggal`,
  `u`.`username`,`d`.`text` FROM`artikeldetail` `d` INNER JOIN `user` `u` ON
  `d`.`id_user` = `u`.`id_user` ";
                      if (isset($_POST["katakunci"])) {
                        $katakunci_artikel = $_POST["katakunci"];
                        $sql_jum .= " where `judul` LIKE '%$katakunci_artikel%'";
                      }
                      $sql_jum .= " order by `judul`";
                      $query_jum = mysqli_query($koneksi, $sql_jum);
                      $jum_data = mysqli_num_rows($query_jum);
                      $jum_halaman = ceil($jum_data / $batas);

                      $no = $posisi + 1;
                      while ($data_b = mysqli_fetch_row($query_b)) {
                        $id_artikeldetail = $data_b[0];
                        $judul_artikel = $data_b[1];
                        $tanggal = $data_b[2];
                        $user = $data_b[3];
                        $deskripsi = $data_b[4];


                      ?>
                        <tr align="center">
                          <td><?php echo $no; ?></td>
                          <td><?php echo $judul_artikel; ?></td>
                          <td><?php echo $tanggal; ?></td>
                          <td><?php echo $user; ?></td>
                          <td><?php echo $deskripsi; ?></td>
                          <td>
                            <a href="index.php?include=edit-artikel-detail&data=<?php echo $id_artikeldetail; ?>" class="btn btn-sm btn-info btn-circle" title="Edit"><i class="fas fa-edit"></i></a>
                            <a href="index.php?include=detail-artikel&data=<?php echo $id_artikeldetail; ?>" class="btn btn-sm btn-circle btn-warning" title="Detail"><i class="fas fa-eye"></i></a>
                            <a href="javascript:if(confirm('Anda yakin ingin menghapus data
<?php echo $judul_artikel; ?>?')) window.location.href =
'index.php?include=artikel-detail&aksi=hapus&data=<?php echo $id_artikeldetail; ?>¬if=hapusberhasil'" class="btn btn-sm btn-circle btn-danger"><i class="fas fa-trash" title="Hapus"></i></a>
                          </td>
                        </tr>
                      <?php
                        $no++;
                      } ?>


                  </table>
                </div>
                <!-- /.card-body -->
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
                            $katakunci_artikel = $_POST["katakunci"];
                            if ($halaman != 1) {
                              echo "<li class='page-item'><a class='page-link'href='index.php?include=artikel-detail&katakunci=$katakunci_artikel&halaman=1'>Previous</a></li>";
                              echo "<li class='page-item'><a class='page-link'href='index.php?include=artikel-detail&katakunci=$katakunci_artikel&halaman=$sebelum'>«</a></li>";
                            }
                            for ($i = 1; $i <= $jum_halaman; $i++) {
                              if ($i > $halaman - 5 and $i < $halaman + 5) {
                                if ($i != $halaman) {
                                  echo "<li class='page-item'><a class='page-link'href='index.php?include=artikel-detail&katakunci=$katakunci_artikel&halaman=$i'>$i</a></li>";
                                } else {
                                  echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                                }
                              }
                            }
                            if ($halaman != $jum_halaman) {
                              echo "<li class='page-item'><a class='page-link'href='index.php?include=artikel-detail&katakunci=$katakunci_artikel&halaman=$setelah'>»</a></li>";
                              echo "<li class='page-item'><a class='page-link'href='index.php?include=artikel-detail&katakunci=$katakunci_artikel&halaman=$jum_halaman'>Last</a></li>";
                            }
                          } else {
                            if ($halaman != 1) {
                              echo "<li class='page-item'><a class='page-link'href='index.php?include=artikel-detail&halaman=1'>First</a></li>";
                              echo "<li class='page-item'><a class='page-link'href='index.php?include=artikel-detail&halaman=$sebelum'>«</a></li>";
                            }
                            for ($i = 1; $i <= $jum_halaman; $i++) {
                              if ($i > $halaman - 5 and $i < $halaman + 5) {
                                if ($i != $halaman) {
                                  echo "<li class='page-item'><a class='page-link'href='index.php?include=artikel-detail&halaman=$i'>$i</a></li>";
                                } else {
                                  echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                                }
                              }
                            }
                            if ($halaman != $jum_halaman) {
                              echo "<li class='page-item'><a class='page-link'href='index.php?include=artikel-detail&halaman=$setelah'>»</a></li>";
                              echo "<li class='page-item'><a class='page-link'href='index.php?include=artikel-detail&halaman=$jum_halaman'>Last</a></li>";
                            }
                          }
                        }

                        ?>

                      </ul>
                    </div>
                </div>
                <!-- /.card -->

                <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->

            </div>
          </div>
        </div>
     
    
      <!-- ./wrapper -->

      <?php include("includes/script.php") ?>