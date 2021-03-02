 <!-- Sidebar -->
 <!--<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">-->

<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fa fa-user-circle" aria-hidden="true"></i>
  </div>
  <div class="sidebar-brand-text mx-3">EliTES Admin</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Umum
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="?hal=member-data" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <!--<i class="fas fa-fw fa-cog"></i>-->
    <i class="fa fa-users " aria-hidden="true"></i>
    <span>Member</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Jenis Member:</h6>
      <a class="collapse-item" href="?hal=member-data"> <i class="fa fa-users " aria-hidden="true"></i>  Semua Member</a>
      <a class="collapse-item" href="?hal=member-filter&mau=free"><i class="fa fa-user-md" aria-hidden="true"></i> Free User</a>
      <a class="collapse-item" href="?hal=member-filter&mau=employee"><i class="fa fa-user" aria-hidden="true"></i> Employee</a>
      <a class="collapse-item" href="?hal=member-filter&mau=enterpreneur"><i class="fa fa-user-circle" aria-hidden="true"></i> Enterpreneur</a>
      <a class="collapse-item" href="?hal=member-bisnis"><i class="fas fa-business-time    "></i> Bisnis Member</a>
    </div>
  </div>
</li>


<li class="nav-item">
  <a class="nav-link collapsed" href="?hal=membership-data" >
    <!--<i class="fas fa-fw fa-cog"></i>-->
    <i class="fas fa-boxes    "></i>
    <span>Paket Membership</span>
  </a>
 
  
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="?hal=member-data" data-toggle="collapse" data-target="#kursusan" aria-expanded="true" aria-controls="kursusan">
    <!--<i class="fas fa-fw fa-cog"></i>-->
    <i class="fas fa-chalkboard    "></i>
    <span>Kursus</span>
  </a>
  <div id="kursusan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Data:</h6>
      <a class="collapse-item" href="?hal=kelas-data"><i class="fas fa-users    "></i> Kelas</a>
      <a class="collapse-item" href="?hal=pilar-data"> <i class="fa fa-building" aria-hidden="true"></i> Pilar</a>
      <a class="collapse-item" href="?hal=paket-data"> <i class="fas fa-chalkboard-teacher    "></i> Pembagian Kelas</a>
      <a class="collapse-item" href="?hal=kursus-data"><i class="fas fa-chalkboard-teacher    "></i> Kursus</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" href="?hal=event-data">
    <!--<i class="fas fa-fw fa-cog"></i>-->
    <i class="fa fa-calendar" aria-hidden="true"></i>
    <span>Event</span>
  </a>
</li>




<li class="nav-item">
  <a class="nav-link collapsed" href="?hal=transaksi-data" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="transaksi">
    <!--<i class="fas fa-fw fa-cog"></i>-->
    <i class="fas fa-money-bill    "></i>
    <span>Transaksi <?php echo $lonTrans; ?></span>
  </a>
  <div id="transaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Data:</h6>
      <a class="collapse-item" href="?hal=transaksi-data&mau=semya"><i class="fas fa-clipboard-list    "></i> Semua Transaksi</a>
      <a class="collapse-item" href="?hal=transaksi-data&mau=belumproses"><i class="far fa-square"></i> Belum diproses</a>
      <a class="collapse-item" href="?hal=transaksi-data&mau=sudahproses"> <i class="fa fa-check-square" aria-hidden="true"></i> Sudah diproses</a>
      <a class="collapse-item" href="?hal=transaksi-data&mau=expired"> <i class="fa fa-window-close" aria-hidden="true"></i> Expired</a>
    </div>
  </div>
  
</li>


 










<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Informasi
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="?hal=user-data">
    <i class="fas fa-user-cog    "></i>
    <span>Administrator</span>
  </a>
  
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="?hal=provinsi-data">
    <i class="fa fa-map-signs" aria-hidden="true"></i>
    <span>Data Provinsi</span>
  </a>
  
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#utiliti" aria-expanded="true" aria-controls="utiliti">
    <i class="fa fa-info" aria-hidden="true"></i>
    <span>Info</span>
  </a>
  <div id="utiliti" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Info Halaman:</h6>
      <a class="collapse-item" href="?hal=info-data&mau=home-banner"><i class="fas fa-home"></i> Home Banner</a>
      <a class="collapse-item" href="?hal=info-data&mau=event"><i class="fa fa-calendar" aria-hidden="true"></i> Event</a>
      <a class="collapse-item" href="?hal=info-data&mau=course"><i class="fas fa-chalkboard-teacher"></i> Course</a>
      <a class="collapse-item" href="?hal=info-data&mau=tnc"><i class="fa fa-info" aria-hidden="true"></i> Term & Condition</a>
      <a class="collapse-item" href="?hal=info-data&mau=member-info">Membership Info</a>
      <a class="collapse-item" href="?hal=info-data&mau=kontak-kami"><i class="fa fa-phone" aria-hidden="true"></i> Kontak Kami</a>
      
    </div>
  </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Sosmed" aria-expanded="true" aria-controls="Sosmed">
    <i class="fa fa-comment" aria-hidden="true"></i>
    <span>Social Media</span>
  </a>
  <div id="Sosmed" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Info Halaman:</h6>
      <a class="collapse-item" href="?hal=sosmed-data&mau=website"><i class="fas fa-globe-asia"></i> Website</a>
      <a class="collapse-item" href="?hal=sosmed-data&mau=instagram"><i class="fab fa-instagram"></i> Instagram</a>
      <a class="collapse-item" href="?hal=sosmed-data&mau=facebook"><i class="fab fa-facebook-square"></i> Facebook</a>
      <a class="collapse-item" href="?hal=sosmed-data&mau=youtube"><i class="fab fa-youtube" aria-hidden="true"></i> Youtube</a>
 
    </div>
  </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kontak_kami" aria-expanded="true" aria-controls="kontak_kami">
    <i class="fa fa-phone" aria-hidden="true"></i>
    <span>Kontak Kami</span>
  </a>
  <div id="kontak_kami" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Pilih Info:</h6>
      <a class="collapse-item" href="?hal=kontak-data&mau=semua"><i class="fa fa-envelope" aria-hidden="true"></i> Semua Pesan</a>
      <a class="collapse-item" href="#"><i class="fas fa-envelope-open-text    "></i> Pesan Ditampilkan</a>
      <a class="collapse-item" href="#"><i class="fa fa-envelope-open" aria-hidden="true"></i> Belum ditampilkan</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">








<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->