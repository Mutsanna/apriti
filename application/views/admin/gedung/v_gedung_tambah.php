<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Tambah Gedung Baru</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'c_admin/gedung' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>

      <form method="post" action="<?php echo base_url().'c_admin/gedung_tambah_aksi'; ?>">
        <div class="form-group">
          <label class="font-weight-bold" for="gedung">Nama Gedung</label>
          <input type="text" class="form-control" name="gedung" placeholder="Masukkan Nama Gedung" required="required">
        </div>

        <input type="submit" class="btn btn-primary" value="Simpan">
      </form>

    </div>
  </div>
</div>