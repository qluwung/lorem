<?php
  session_start();
  include('koneksi/koneksi.php');
  if(isset($_GET['include'])){
    $include=$_GET['include'];
    if($include=="konfirmasi-login"){
      include("include/konfirmasiLogin.php");
    }else if($include=="logout"){
      include("include/logout.php");
    }else if($include=="konfirmasi-tambah-artikel"){
      include("include/konfirmasitambahartikel-detail.php");
    }else if($include=="konfirmasi-edit-artikel"){
      include("include/konfirmasieditartikel-detail.php");
    }else if($include=="portofolio-blog"){
      include("include/portofolio-blog.php");}
    else if($include=="konfirmasi-tambah-blog"){
      include("include/konfirmasitambahblog.php");
    }else if($include=="konfirmasi-edit-blog"){
      include("include/konfirmasieditblog.php");
    }else if($include=="konfirmasi-tambah-kategori-portofolio"){
      include("include/konfirmasitambahkategoriportofolio.php");
    }else if($include=="konfirmasi-edit-kategori-portofolio"){
      include("include/konfirmasieditkategoriportofolio.php");
    }else if($include=="konfirmasi-tambah-testimoni="){
      include("include/konfirmasitambahtestimoni.php");
    }else if($include=="konfirmasi-edit-testimoni"){
      include("include/konfirmasiedittestimoni.php");
    }else if($include=="konfirmasi-edit-profile"){
      include("include/konfirmasieditprofile.php");
    }else if($include=="konfirmasi-tambah-tim"){
      include("include/konfirmasitambahtim.php");
    }else if($include=="konfirmasi-edit-tim"){
      include("include/konfirmasiedittim.php");
    }else if($include=="konfirmasi-tambah-blog"){
      include("include/konfirmasitambahblog.php");
    }else if($include=="konfirmasi-edit-blog"){
      include("include/konfirmasieditblog.php");
    }else if($include=="konfirmasi-tambah-user"){
      include("include/konfirmasitambahuser.php");
    }else if($include=="konfirmasi-edit-user"){
      include("include/konfirmasiedituser.php");
    }
    else if($include=="konfirmasi-edit-client"){
      include("include/konfirmasieditclient.php");
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
<?php include("includes/header.php") ?>
</head>
<body>
  <?php
    //Check Ada Get Include
    if(isset($_GET['include'])){
      $include=$_GET['include'];

      //Check Apakah Ada Session id_admin
      if(isset($_SESSION['id_user'])){
  ?>
    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <div class="content-wrapper">
          <?php 
          if($include=="artikel-detail"){
            include("include/artikel-detail.php");
          }else if($include=="tambah-artikel-detail"){
            include("include/tambahartikel-detail.php");  
          }else if($include=="edit-artikel-detail"){
            include("include/editartikel-detail.php");  
          }else if($include=="client"){
            include("include/client.php");  
          }else if($include=="edit-client"){
            include("include/editclient.php");  
          }else if($include=="dashboard"){
            include("include/dashboard.php");  
          }else if($include=="detail-artikel"){
            include("include/detailartikel-detail.php");  
          }else if($include=="detail-inbox"){
            include("include/detailinbox.php");  
          }else if($include=="inbox"){
            include("include/inbox.php");  
          }else if($include=="detail-portofolio-blog"){
            include("include/detailportofolio-blog.php");  
          }else if($include=="edit-portofolio-blog"){
            include("include/editportofolio-blog.php");  
          }else if($include=="edit-portofolio"){
            include("include/editportofolio.php");  
          }else if($include=="tambah-portofolio-blog"){
            include("include/tambahportofolio-blog.php");  
          }else if($include=="detail-testimoni"){
            include("include/detailtestimoni.php");  
          }else if($include=="detail-tim"){
            include("include/detailtim.php");  
          }else if($include=="detail-user"){
            include("include/detailuser.php");  
          }else if($include=="edit-profile"){
            include("include/editprofile.php");  
          }else if($include=="profile"){
            include("include/profile.php");  
          }else if($include=="edit-testimoni"){
            include("include/edittestimoni.php");  
          }else if($include=="edit-tim"){
            include("include/edittim.php");  
          }else if($include=="edit-user"){
            include("include/edituser.php");  
          }else if($include=="login"){
            include("include/login.php");  
          }else if($include=="tambah-testimoni"){
            include("include/tambahtestimoni.php");  
          }else if($include=="tambah-tim"){
            include("include/tambahtim.php");  
          }else if($include=="tambah-user"){
            include("include/tambahuser.php");  
          }else if($include=="testimoni"){
            include("include/testimoni.php");  
          }else if($include=="tim"){
            include("include/tim.php");  
          }else if($include=="user"){
            include("include/user.php");  
          }else if($include=="tambah-portofolio"){
            include("include/tambahportofolio.php");  
          }else if($include=="portofolio"){
            include("include/portofolio.php");  
          }

          ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
    <?php
      }else{
        //Pemanggilan Halaman Form Login
        include("include/login.php");
      }
    }else{
      if(isset($_GET['id_user'])){
    ?>    
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include("includes/header.php") ?>
      <?php include("includes/sidebar.php") ?>
      <div class="content-wrapper">
      <?php
        //pemanggilan profil
        include("include/profile.php");
      ?>
      </div>
      <!-- /.content-wrapper -->
      <?php include("includes/footer.php") ?>
    </div> 
    <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
    <?php
      }else{
        //Pemanggilan Halaman Form Login
        include("include/login.php");
      }
    }
  ?>
</body>
</html>
