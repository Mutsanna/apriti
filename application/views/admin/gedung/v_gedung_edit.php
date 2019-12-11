<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Edit Gedung</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'c_admin/gedung' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>

      <?php foreach($gedung as $p){ ?>
        <form method="post" action="<?php echo base_url().'c_admin/gedung_update'; ?>">
        <input type="hidden" value="<?php echo $p->id_gedung; ?>" name="id_gedung">
        <div class="form-group">
            <label class="font-weight-bold" for="namagedung">Nama Gedung</label>
            <input type="text" class="form-control" name="namagedung" placeholder="Masukkan Nama Gedung " required="required" value="<?php echo $p->nama_gedung; ?>">
          </div>
          <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
      <?php } ?>

    </div>
  </div>
</div>