<?php
include('includes/header.php');
?>

<?php
include('control.php');
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-right fa-sm text-white-50"></i> Lihat Website</a>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Portofolio -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Portofolio Diunggah</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">+<?php echo "$total_project"; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fab fa-envira fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Artikel -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Artikel Diunggah</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">+<?php echo "$total_artikeldetail"; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Kapasitas Database
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php
                                                        // Menampilkan Jumlah Tabel Pada Database
                                                        $servername = "localhost";
                                                        $username = "root";
                                                        $password = "";
                                                        $dbname = "dblorem";

                                                        // Create connection
                                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                                        // Check connection
                                                        if ($conn->connect_error) {
                                                            die("Connection failed: " . $conn->connect_error);
                                                        }

                                                        $sql = "SELECT table_schema \"dblorem\",
                                                        ROUND(SUM(data_length + index_length) / 1024 / 1024, 1) \"DB Size in MB\" 
                                                        FROM information_schema.tables WHERE table_schema = 'dblorem' GROUP BY table_schema";
                                                        $result = $conn->query($sql);

                                                        if ($result = mysqli_query($conn, $sql)) {

                                                            //fetch one and one row
                                                            while ($row = mysqli_fetch_row($result)) {
                                                                printf("%s MB <br />\n", $row[1]);
                                                            }
                                                            //free result set
                                                            mysqli_free_result($result);
                                                        }

                                                        $conn->close();

                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-database fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pesan Dalam Inbox</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">+<?php echo "$total_inbox"; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-danger">Statistik Pengunjung</h6>
                                </div>

                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myChart" width="45" height="25">
                                            <?php
                                            $konek = mysqli_connect("localhost", "root", "", "dblorem");

                                            $tgl_skrg = date("Ymd"); // dapatkan tanggal sekarang saat online
                                            //$tgl_skrg = date("20130918"); // untuk simulasi saja sesuai dengan di database

                                            // dapatkan 6 hari sblm tgl sekarang 
                                            $seminggu = strtotime("-1 week +1 day", strtotime($tgl_skrg));
                                            $hasilnya = date("Y-m-d", $seminggu);

                                            //lakukan looping sebanyak 6 kali   
                                            for ($i = 0; $i <= 6; $i++) {
                                                $urutan_tgl   = strtotime("+$i day", strtotime($hasilnya));
                                                $hasil_urutan = date("d-M-Y", $urutan_tgl);

                                                $tgl_pengujung   = strtotime("+$i day", strtotime($hasilnya));
                                                $hasil_pengujung = date("Y-m-d", $tgl_pengujung);
                                                $query_pengujung = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM statistik WHERE tanggal='$hasil_pengujung' GROUP BY ip"));
                                            }
                                            ?>
                                            <script>
                                                var ctx = document.getElementById("myChart");
                                                var myChart = new Chart(ctx, {
                                                    type: 'line',
                                                    data: {
                                                        labels: [<?php echo $hasil_pengujung ?>],
                                                        datasets: [{
                                                            label: 'Pengunjung',
                                                            data: [<?php echo $query_pengujung ?>],
                                                            backgroundColor: [
                                                                'rgba(255, 99, 132, 0.2)',
                                                                'rgba(54, 162, 235, 0.2)',
                                                                'rgba(255, 206, 86, 0.2)',
                                                                'rgba(75, 192, 192, 0.2)',
                                                                'rgba(153, 102, 255, 0.2)',
                                                                'rgba(255, 159, 64, 0.2)'
                                                            ],
                                                            borderColor: [
                                                                'rgba(255,99,132,1)',
                                                                'rgba(54, 162, 235, 1)',
                                                                'rgba(255, 206, 86, 1)',
                                                                'rgba(75, 192, 192, 1)',
                                                                'rgba(153, 102, 255, 1)',
                                                                'rgba(255, 159, 64, 1)'
                                                            ],
                                                            borderWidth: 1
                                                        }]
                                                    },
                                                    options: {
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero: true
                                                                }
                                                            }]
                                                        }
                                                    }
                                                });
                                            </script>
                                        </canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Tabel-->

                        <div class="col-xl-6 col-lg-8 ">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Statistik Pengunjung</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Pengunjung</th>
                                                  <!--  <th>Hits</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $konek = mysqli_connect("localhost", "root", "", "dblorem");

                                                $tgl_skrg = date("Ymd"); // dapatkan tanggal sekarang saat online
                                                //$tgl_skrg = date("20130918"); // untuk simulasi saja sesuai dengan di database

                                                // dapatkan 6 hari sblm tgl sekarang 
                                                $seminggu = strtotime("-1 week +1 day", strtotime($tgl_skrg));
                                                $hasilnya = date("Y-m-d", $seminggu);

                                                //lakukan looping sebanyak 6 kali   
                                                for ($i = 0; $i <= 6; $i++) {
                                                    $urutan_tgl   = strtotime("+$i day", strtotime($hasilnya));
                                                    $hasil_urutan = date("d-M-Y", $urutan_tgl);

                                                    $tgl_pengujung   = strtotime("+$i day", strtotime($hasilnya));
                                                    $hasil_pengujung = date("Y-m-d", $tgl_pengujung);
                                                    $query_pengujung = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM statistik WHERE tanggal='$hasil_pengujung' GROUP BY ip"));

                                                    // $tgl_hits   = strtotime("+$i day", strtotime($hasilnya));
                                                    // $hasil_hits = date("Y-m-d", $tgl_hits);
                                                    // $jumlah_record = mysqli_query($konek, "SELECT COUNT(*) from statistik" );
                                                    // $jum = mysqli_fetch_array($jumlah_record, MYSQLI_NUM);
                                                   
                                                
                                                    

                                                    echo "<tr><td>$hasil_urutan</td><td>$query_pengujung</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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