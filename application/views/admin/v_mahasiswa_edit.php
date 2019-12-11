<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Edit Petugas</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'c_admin/mahasiswa' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>

      <?php foreach($mahasiswa as $p){ ?>
        <form method="post" action="<?php echo base_url().'c_admin/mahasiswa_update'; ?>">
        <input type="hidden" value="<?php echo $p->id_mahasiswa; ?>" name="id_mahasiswa">
        <div class="form-group">
            <label class="font-weight-bold" for="nama">NRP</label>
            <input type="text" class="form-control" name="nrp" placeholder="Masukkan NRP " required="required" value="<?php echo $p->nrp; ?>">
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" required="required" value="<?php echo $p->nama_mahasiswa; ?>">
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="prodi">Prodi</label>
            <input type="text" class="form-control" name="prodi" placeholder="Masukkan Prodi" required="required" value="<?php echo $p->prodi; ?>">
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan password">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
          </div>

          <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
      <?php } ?>

    </div>
  </div>
</div>