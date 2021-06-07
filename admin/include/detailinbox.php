<?php


if(isset($_GET['data'])){
    $id_inbox = $_GET['data'];
    //get data testimoni
    $sql_d = "SELECT `id_inbox`,`date_receive_inbox` ,`name_inbox`,`email_inbox`,`subject_inbox`,`message_inbox` FROM `inbox` where `id_inbox` = '$id_inbox'";
    $query = mysqli_query($koneksi,$sql_d);
    while($data_d = mysqli_fetch_row($query)){
      $id_inbox = $data_d[0];
      $date_receive_inbox = $data_d[1];
      $name_inbox = $data_d[2];
        $email_inbox = $data_d[3];
          $subject_inbox = $data_d[4];
            $message_inbox= $data_d[5];


    }
    }
    ?>

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
                        <h1 class="h3 mb-0 text-gray-800">Detail Inbox</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Detail Inbox
                                    <a href="inbox.php" class="btn btn-sm btn-warning float-right">
                <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                                </div>
                                <div class="card-body">
                                    <div class="align-items-center">
                                        <h6>Tanggal Diterima</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="date" readonly class="form-control form-control-user"  value="<?php echo $date_receive_inbox;?>" disabled placeholder="Upload Gambar" name="totalklien" aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Nama Pengirim</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                                <input type="text" readonly class="form-control form-control-user" value="<?php echo $name_inbox;?>"disabled placeholder="Upload Gambar" name="totalklien" aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Email</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                            <input type="text" readonly class="form-control form-control-user" value="<?php echo $email_inbox;?>" disabled placeholder="Upload Gambar" name="totalklien" aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Subject</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                            <input type="text" value="<?php echo $subject_inbox;?>" readonly class="form-control form-control-user" disabled placeholder="Upload Gambar" name="totalklien" aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-items-center">
                                        <h6>Isi Pesan</h6>
                                        <div class="col-lg-5 col-12 pl-0">
                                            <div class="form-group">
                                            <textarea class="form-control form-control-user" cols="50" rows="20" readonly> <?php echo $message_inbox;?> </textarea>

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
