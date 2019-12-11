<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Data ruangan di aplikasi peminjaman ruang ITI</h4>
    </div>
    <div class="card-body">
    <a href="<?php echo base_url().'c_admin/gedung_ruangan' ?>" class='btn btn-sm btn-outline-dark pull-left'><i class="fa fa-arrow-left"></i> Kembali</a>

    <?php 
        foreach($gedung as $a){
      ?>

      <a href="<?php echo base_url().'c_admin/ruangan_tambah/'.$a->id_gedung; ?>" class='btn btn-sm btn-success pull-right'><i class="fa fa-plus"></i> Ruangan Baru</a>
      <br/>
      <br/>
      <table class="table table-bordered table-striped table-hover">
        <tr>
          <th width="1%">No</th>
          <th>Nama Gedung</th>
          <th>Nama Ruangan</th>
          <th>Kapasistas</th>
          <th>keterangan</th>
          <th width="16%">Opsi</th>
        </tr>
        <?php 
        $no = 1;
        foreach($ruangan as $p){
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $a->nama_gedung; ?></td>
            <td><?php echo $p->nama_ruangan; ?></td>
            <td><?php echo $p->kapasitas; ?></td>
            <td><?php echo $p->keterangan; ?></td>
            <td>
              <a href="<?php echo base_url().'c_admin/pinjam/'.$p->id_ruangan.'/'.$a->id_gedung; ?>" class="btn btn-sm btn-block btn-outline-success"><i class="fa fa-key"></i> Pinjam</a>
              <a href="<?php echo base_url().'c_admin/ruangan_edit/'.$p->id_ruangan; ?>" class="btn btn-sm btn-block btn-outline-warning"><i class="fa fa-wrench"></i> Edit</a>
              <a href="<?php echo base_url().'c_admin/ruangan_hapus/'.$p->id_ruangan.'/'.$a->id_gedung; ?>" class="btn btn-sm btn-block btn-outline-danger"><i class="fa fa-trash"></i> Hapus</a>
            </td>
          </tr>
          <?php 
        }
        ?>
        <?php 
        }
        ?>
      </table>

    </div>
  </div>
</div>