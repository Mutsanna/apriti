<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Form peminjaman ruangan</h4>
    </div>
    <?php 
        foreach($gedung as $a){
      ?>
      <?php 
        foreach($ruangan as $b){
      ?>
    <div class="card-body">
      <a href="<?php echo base_url().'c_admin/ruangan/'.$a->id_gedung; ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
      <br/>
      <br/>

      <form method="post" action="<?php echo base_url().'c_admin/peminjaman'; ?>">
      <fieldset disabled>
      <div class="form-group">
          <label class="font-weight-bold" for="disabledTextInput">Nama Ruangan</label>
          <input type="text" id="disabledTextInput" class="form-control" name="gedung" placeholder="<?php echo $b->nama_ruangan; ?>">
        </div>
        </fieldset>
        <div class="form-group">
          <label class="font-weight-bold" for="gedung">Nama Peminjam</label>
          <input type="hidden" value="<?php echo $a->id_gedung; ?>" name="idgedung">
          <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama peminjam" required="required">
        </div>
        <label class="font-weight-bold">Dipinjam :</label>
        <div class="card-body">
            <div class="form-grop">
                <label class="font-weight-bold" for="waktu_mulai">Dari <br>&nbsp;&nbsp;Tanggal dan jam</label>
                <div class="date form_datetime" data-date="2019-01-21T15:25:00Z">
                    <input class="form-control" type="text" name="mulai" placeholder="Di pinjam pada tanggal : ">
                    <span class="add-on"><i class="icon-remove"></i></span>
                    <span class="add-on"><i class="icon-calendar"></i></span>
                </div>
            </div>
            <br>
            <div class="form-grop">
                <label class="font-weight-bold" for="waktu_selesai">Sampai <br>&nbsp;&nbsp;Tanggal dan jam</label>
                <div class="date form_datetime" data-date="2019-01-21T15:25:00Z">
                    <input class="form-control" type="text" name="selesai" placeholder="Sampai dengan tanggal : ">
                    <span class="add-on"><i class="icon-remove"></i></span>
                    <span class="add-on"><i class="icon-calendar"></i></span>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
          <label class="font-weight-bold" for="gedung">Keterangan</label>
          <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan" required="required">
        </div>

        <input type="submit" class="btn btn-primary" value="Simpan">
      </form>

      <?php
        }
        }
        ?>

    </div>
  </div>
</div>

