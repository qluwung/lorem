<?php
$link = mysqli_connect('localhost','root','','dblorem');


// Menampilkan Data Tabel Project
$perpage_project  = 2;
$page_project     = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_project    = ($page_project > 1) ? ($page_project * $perpage_project) - $perpage_project :0;     
$result_project   = mysqli_query ($link, "SELECT * FROM project_information");
$total_project    = mysqli_num_rows($result_project);
$pages_project    = ceil($total_project/$perpage_project);
$articles_project = "SELECT * FROM project_information ORDER BY id_projectinfo DESC LIMIT $start_project, $perpage_project";
$tampil_project   = mysqli_query($link,$articles_project);
$id_project		  = $start_project + 1;

// Menampilkan Data Tabel Inbox
$perpage_inbox  = 2;
$page_inbox     = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_inbox    = ($page_inbox > 1) ? ($page_inbox * $perpage_inbox) - $perpage_inbox :0;     
$result_inbox   = mysqli_query ($link, "SELECT * FROM inbox");
$total_inbox    = mysqli_num_rows($result_inbox);
$pages_inbox    = ceil($total_inbox/$perpage_inbox);
$articles_inbox = "SELECT * FROM inbox ORDER BY date_receive_inbox DESC LIMIT $start_inbox, $perpage_inbox";
$tampil_inbox   = mysqli_query($link,$articles_inbox);
$id_inbox		  = $start_inbox + 1;

$perpage_artikeldetail  = 2;
$page_artikeldetail     = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_artikeldetail    = ($page_artikeldetail > 1) ? ($page_artikeldetail * $perpage_artikeldetail) - $perpage_artikeldetail :0;     
$result_artikeldetail   = mysqli_query ($link, "SELECT * FROM artikeldetail");
$total_artikeldetail    = mysqli_num_rows($result_artikeldetail);
$pages_artikeldetail    = ceil($total_artikeldetail/$perpage_artikeldetail);
$articles_artikeldetail = "SELECT * FROM artikeldetail ORDER BY date_receive_artikeldetail DESC LIMIT $start_artikeldetail, $perpage_artikeldetail";
$tampil_artikeldetail   = mysqli_query($link,$articles_artikeldetail);
$id_artikeldetail		  = $start_artikeldetail + 1;

?>

