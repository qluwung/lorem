<?php
include('includes/header.php');

if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_user = $_GET['data'];
    //hapus data
    $sql_dh = "delete from `user`
  where `id_user` = '$id_user'";
    mysqli_query($koneksi, $sql_dh);
    header("Location:index.php?include=user&notif=hapusberhasil");
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
            <h1 class="h3 mb-0 text-gray-800">Konfigurasi User</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            <!--Tabel-->
            <div class="col-xl-12 col-lg-8 ">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-danger">Tabel Konfigurasi User</h6>
                </div>

                <div class="card-body">
                  <div class=" d-flex justify-content-between mb-4">
                    <form class="d-none d-sm-inline-block form-inline "method="post" action ="index.php?include=user">
                      <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="kata_kunci" name="katakunci">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-danger" type="button">
                            <i class="fas fa-search fa-sm"></i>
                          </button>
                        </div>
                      </div>
                    </form>

                    <a href="index.php?include=tambah-user" class="btn btn-secondary btn-icon-split">
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
                          <th width="15%">nama</th>
                          <th width="20%">username</th>
                          <th width="25%">email</th>
                          <th width="20%">level</th>
                          <th width="15%">Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        // $idUser = $_SESSION['id_user'];
                        // $sql_k = "SELECT * FROM   `user` where `id_user`!='$idUser' ORDER BY `username`";
                        // $query_k = mysqli_query($koneksi, $sql_k);
                        // $no = 1;
                        // while ($data_k = mysqli_fetch_array($query_k)) {
                        //   $id_user = $data_k['id_user'];
                        //   $username = $data_k['username'];
                        //   $email = $data_k['email'];
                        //   $level = $data_k['level'];
                        $batas = 2;
                        if (!isset($_POST['halaman'])) {
                          $posisi = 0;
                          $halaman = 1;
                        } else {
                          $halaman = $_POST['halaman'];
                          $posisi = ($halaman - 1) * $batas;
                        }
                        // $sql_jum = "SELECT * FROM `user` ";
                        $sql_jum = "SELECT * FROM `user` ";
                        if (isset($_POST["katakunci"])) {
                          $katakunci_kategori = $_POST["katakunci"];
                          $sql_jum .= " where `nama` LIKE '%$katakunci_kategori%'";
                        }
                        $query_jum = mysqli_query($koneksi, $sql_jum);
                        $jum_data = mysqli_num_rows($query_jum);
                        $jum_halaman = ceil($jum_data / $batas);

                        $sql_k = "SELECT * FROM `user` ";
                        if (isset($_POST["katakunci"])) {
                          $katakunci_kategori = $_POST["katakunci"];
                          $sql_k .= " where `nama` LIKE '%$katakunci_kategori%'";
                        }
                        $sql_k .= " ORDER BY `nama` limit $posisi, $batas ";
                        $query_k = mysqli_query($koneksi, $sql_k);
                        $no = $posisi + 1;

                        while ($data_k = mysqli_fetch_array($query_k)) {
                          $id_user = $data_k['id_user'];
                          $nama = $data_k['nama'];
                          $username = $data_k['username'];
                          $email = $data_k['email'];
                          $level = $data_k['level'];
                        ?>
                          <tr align="center">
                            <td><?php echo $no; ?></td>
                            <td><?php echo $nama; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $level; ?></td>


                            <td>
                              <a href="index.php?include=edit-user&data=<?php echo $id_user; ?>" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-edit"></i>
                              </a>
                              <a href="index.php?include=detail-user&data=<?php echo $id_user; ?>" class="btn btn-warning btn-circle btn-sm">
                                <i class="fas fa-info-circle"></i>
                              </a>
                              <a href="javascript:if(confirm('Anda yakin ingin menghapus data   <?php echo $username; ?>?'))window.location.href = index.php?include=user&aksi=hapus&data=<?php echo $id_user; ?>&notif=hapusberhasil'" class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                              </a>
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
                            if (isset($_POST["katakunci"])) {
                              $katakunci_tim = $_POST["katakunci"];
                              if ($halaman != 1) {
                                echo "<li class='page-item'><a class='page-link'href='index.php?include=user&katakunci=$katakunci_user&halaman=1'>Previous</a></li>";
                                echo "<li class='page-item'><a class='page-link'href='index.php?include=user&katakunci=$katakunci_user&halaman=$sebelum'>«</a></li>";
                              }
                              for ($i = 1; $i <= $jum_halaman; $i++) {
                                if ($i > $halaman - 5 and $i < $halaman + 5) {
                                  if ($i != $halaman) {
                                    echo "<li class='page-item'><a class='page-link'href='index.php?include=user&katakunci=$katakunci_user&halaman=$i'>$i</a></li>";
                                  } else {
                                    echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                                  }
                                }
                              }
                              if ($halaman != $jum_halaman) {
                                echo "<li class='page-item'><a class='page-link'href='index.php?include=user&katakunci=$katakunci_user&halaman=$setelah'>»</a></li>";
                                echo "<li class='page-item'><a class='page-link'href='index.php?include=user&katakunci=$katakunci_user&halaman=$jum_halaman'>Last</a></li>";
                              }
                            } else {
                              if ($halaman != 1) {
                                echo "<li class='page-item'><a class='page-link'href='index.php?include=user&halaman=1'>First</a></li>";
                                echo "<li class='page-item'><a class='page-link'href='index.php?include=user&halaman=$sebelum'>«</a></li>";
                              }
                              for ($i = 1; $i <= $jum_halaman; $i++) {
                                if ($i > $halaman - 5 and $i < $halaman + 5) {
                                  if ($i != $halaman) {
                                    echo "<li class='page-item'><a class='page-link'href='index.php?include=user&halaman=$i'>$i</a></li>";
                                  } else {
                                    echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                                  }
                                }
                              }
                              if ($halaman != $jum_halaman) {
                                echo "<li class='page-item'><a class='page-link'href='index.php?include=user&halaman=$setelah'>»</a></li>";
                                echo "<li class='page-item'><a class='page-link'href='index.php?include=user&halaman=$jum_halaman'>Last</a></li>";
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
        <!-- Footer -->
        <?php
  
        ?>
        <!-- End of Footer -->
        <?php
        include('includes/script.php');
        ?>