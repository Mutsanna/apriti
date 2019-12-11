<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Tambah Mahasiwa Baru</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'c_admin/mahasiswa' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>

      <form method="post" action="<?php echo base_url().'c_admin/mahasiswa_tambah_aksi'; ?>">
        <div class="form-group">
          <label class="font-weight-bold" for="nrp">NRP</label>
          <input type="text" class="form-control" name="nrp" placeholder="Masukkan NRP" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="nama">Nama Lengkap</label>
          <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="username">prodi</label>
          <input type="text" class="form-control" name="prodi" placeholder="Masukkan prodi" required="required">
        </div>
        <div class="form-group">
          <label class="font-weight-bold" for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Masukkan password" required="required">
        </div>

        <input type="submit" class="btn btn-primary" value="Simpan">
      </form>

    </div>
  </div>
</div>