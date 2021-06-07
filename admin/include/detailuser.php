<?php
include('includes/header.php');


if (isset($_GET['data'])) {
  $id_user = $_GET['data'];
  $_SESSION['user'] = $id_user;
  $sql_d = "SELECT * from `user` where `id_user` = '$id_user'";
  $query_d = mysqli_query($koneksi, $sql_d);
  while ($data = mysqli_fetch_array($query_d)) {
      //$id_user = $data['id_user'];
      $nama = $data['nama'];
      $username = $data['username'];
      $email = $data['email'];
      $password = $data['password'];
      $level = $data['level'];
      $foto = $data['foto'];
  }
}
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
                        <h1 class="h3 mb-0 text-gray-800">Detail User</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Detail Data User
                                </div>
                                <div class="card-body">
                                 
                                    <div class="align-items-center">
                                        <h6>Nama :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="text" readonly class="form-control form-control-user" name="totalklien" aria-describedby="emailHelp" placeholder=""value="<?php echo $nama;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Username :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="text" readonly class="form-control form-control-user" name="totalklien" aria-describedby="emailHelp" placeholder=""value="<?php echo $username;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Password :</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="password" readonly class="form-control form-control-user" name="totalklien" aria-describedby="emailHelp" placeholder=""value="<?php echo $password;?>">
                                            </div>
                                        </div>
                                        <div class="align-items-center">
                                            <h6>Level :</h6>
                                            <div class="col-lg-5 col-12 pl-0">
                                                <div class="form-group">
                                                    <input type="text" readonly class="form-control form-control-user" name="totalklien" aria-describedby="emailHelp" placeholder=""value="<?php echo $level;?>">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Foto:</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <div id="msg"></div>
                                                <img src="foto/<?php echo $foto?>" class="img-thumbnail" id="preview" >
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