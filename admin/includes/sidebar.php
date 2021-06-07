<ul class="navbar-nav bg-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon">
            <i class="fas fa-server"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Lorem <sup>.</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php?include=dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Input Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Konten :</h6>
                <a class="collapse-item" href="index.php?include=client">Client</a>
                <a class="collapse-item" href="index.php?include=portofolio">Portofolio</a>
                <a class="collapse-item" href="index.php?include=testimoni">Testimoni</a>
                <a class="collapse-item" href="index.php?include=tim">Tim</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="index.php?include=artikel-detail">
            <i class="fas fa-fw fa-book"></i>
            <span>Artikel</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="index.php?include=portofolio-blog">
            <i class="fas fa-fw fa-comments"></i>
            <span>Portofolio Blog</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="index.php?include=inbox">
            <i class="fas fa-fw fa-comments"></i>
            <span>Inbox</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
    <?php
        if (isset($_SESSION['level'])) {
          if ($_SESSION['level'] == "Superadmin") { ?>
        <a class="nav-link" href="index.php?include=user">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Konfigurasi</span></a>
   

              </a>
            </li>
        <?php }
        } ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>