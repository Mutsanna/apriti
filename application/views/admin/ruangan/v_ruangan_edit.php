<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Edit Gedung</h4>
    </div>
    <div class="card-body">
    <?php foreach($ruangan as $p){ ?>
      <a href="<?php echo base_url().'c_admin/ruangan/'.$p->id_gedung;?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>
        <form method="post" action="<?php echo base_url().'c_admin/ruangan_update'; ?>">
        <input type="hidden" value="<?php echo $p->id_ruangan; ?>" name="id_ruangan">
        <input type="hidden" value="<?php echo $p->id_gedung; ?>" name="id_gedung">
          <div class="form-group">
            <label class="font-weight-bold" for="namaruangan">Nama Ruangan</label>
            <input type="text" class="form-control" name="namaruangan" placeholder="Masukkan Nama Ruangan " required="required" value="<?php echo $p->nama_ruangan; ?>">
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="kapasitas">Kapasitas</label>
            <input type="number" class="form-control" name="kapasitas" placeholder="Masukkan jumlah Kapasitas " required="required" value="<?php echo $p->kapasitas; ?>">
          </div>
          <div class="form-group">
            <label class="font-weight-bold" for="keterangan">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan " required="required" value="<?php echo $p->keterangan; ?>">
          </div>
          <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
      <?php } ?>

    </div>
  </div>
</div>