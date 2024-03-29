<!DOCTYPE html>
<html>
<head>
  <title>Login - APRITI</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js' ?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js' ?>"></script>
</head>
<body class="bg-dark">

  <div class="container"> 

    <br/><br/><br/><br/>

    <h3 class="font-weight-normal text-center text-white">APLIKASI PEMINJAMAN RUANG</h3>
    <h2 class="font-weight-normal text-center text-white mb-5"><b>INSTITUT TEKNOLOGI INDONESIA</b></h2>

    <div class="col-md-4 offset-md-4">
      <div class="card">
        <div class="card-body">
          <?php 
          if(isset($_GET['alert'])){
            if($_GET['alert']=="gagal"){
              echo "<div class='alert alert-danger font-weight-bold text-center'>LOGIN GAGAL!</div>";
            }else if($_GET['alert']=="belum_login"){
              echo "<div class='alert alert-danger font-weight-bold text-center'>SILAHKAN LOGIN TERLEBIH DULU!</div>";
            }else if($_GET['alert']=="logout"){
              echo "<div class='alert alert-success font-weight-bold text-center'>ANDA TELAH LOGOUT!</div>";
            }
          } 
          ?>

          <h4 class="font-weight-bold text-center mb-3 mt-3">LOGIN</h4>

          <!-- validasi error -->
          <?php echo validation_errors(); ?>

          <form method="post" action="<?php echo base_url().'c_login/login_aksi'; ?>">
            <div class="form-group">
              <label for="username">Username / NRP</label>
              <input name="username" type="text" class="form-control" placeholder="Masukkan username / nrp">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input name="password" type="password" class="form-control" placeholder="Masukkan Password">
            </div>
            <div class="form-group">
              <label for="sebagai">Login Sebagai :</label>
              <select name="sebagai" class="form-control">
                <option value="admin">Admin</option>
                <option value="mahasiswa">Mahasiswa</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
        
      </div>
    </div>
  </div>

</body>
</html>