<div class="container">
  <div class="jumbotron text-center">
    <div class="col-sm-8 mx-auto">
      <h1>Selamat datang!</h1>
      <p>Ini merupakan aplikasi peminjaman ruang untuk mahasiswa <br> <b>Institut Teknologi Indonesia</b>.</p>
      <p>
        Anda telah login sebagai <b><?php echo $this->session->userdata('username'); ?></b> [admin].
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3">
      <div class="card bg-primary text-white">
        <div class="card-body">
          <h1>
            <?php echo $this->m_data->get_data('mahasiswa')->num_rows(); ?>
            <div class="pull-right">
              
            <i class="fa fa-users"></i>
            </div>
          </h1>
          <a style="color : white" href="<?php echo base_url().'c_admin/mahasiswa'; ?>">
          Jumlah Mahasiswa terdaftar di aplikasi
          </a>
          <!-- <br>
          &nbsp; -->
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-warning text-white">
        <div class="card-body">
          <h1>
            <?php echo $this->m_data->get_data('ruangan')->num_rows(); ?>
            <div class="pull-right">
              
            <i class="fa fa-building-o"></i>
            </div>
          </h1>
          Jumlah Ruangan Belum Di Pinjam
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-danger text-white">
        <div class="card-body">
          <h1>
            <?php echo $this->m_data->get_data('peminjaman')->num_rows(); ?>
            <div class="pull-right">
              
            <i class="fa  fa-check-square-o"></i>
            </div>
          </h1>
          Konfirmasi ruangan
          <br>
          &nbsp;
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card bg-info text-white">
        <div class="card-body">
          <h1>
            <?php echo $this->m_data->get_data('peminjaman')->num_rows(); ?>
            <div class="pull-right">
              
            <i class="fa fa-user"></i>
            </div>
          </h1>
          Ruangan sedang terpinjam
          <br>
          &nbsp;
        </div>
      </div>
    </div>

  </div>
  
  
</div>