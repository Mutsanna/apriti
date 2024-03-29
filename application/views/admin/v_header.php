<!DOCTYPE html>
<html>
<head>
  <title>Admin - APRITI</title>
  <!-- css bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">

  <!-- css datatables -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/DataTables/datatables.css' ?>">

  <!-- icon font awesome -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/awesome/css/font-awesome.css' ?>">
  <!-- Date time picker bootstrap -->
  <link href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>" rel="stylesheet" media="screen">

  <!-- jquery dan bootstrap js -->
  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js' ?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js' ?>"></script>
  
  <!-- js datatables -->
  <script type="text/javascript" src="<?php echo base_url().'assets/DataTables/datatables.js' ?>"></script>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo base_url().'c_admin'; ?>">APRITI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'c_admin'; ?>"><i class="fa fa-home"></i> Dashboard</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="<?php //echo base_url().'c_admin/petugas'; ?>"><i class="fa fa-user"></i> Petugas</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'c_admin/mahasiswa'; ?>"><i class="fa fa-users"></i> Mahasiswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'c_admin/gedung_ruangan'; ?>"><i class="fa fa-building"></i> Gedung & Ruangan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'admin/peminjaman_laporan'; ?>"><i class="fa fa-book"></i> Laporan Peminjaman</a>
          </li>
          <!-- <li class="nav-item">
            <a href="<?php //echo base_url().'admin/ganti_password' ?>" class="nav-link"><i class="fa fa-lock"></i> Ganti Password</a>
          </li> -->
        </ul>

        <span class="navbar-text mr-3 text-center">
          Halo, <?php echo $this->session->userdata('username'); ?> [admin]
        </span>

        <a href="<?php echo base_url().'c_admin/logout' ?>" class="btn btn-outline-light ml-1"><i class="fa fa-power-off"></i> KELUAR</a>

      </div>
    </div>
  </nav>

  <br/>
  <br/> 