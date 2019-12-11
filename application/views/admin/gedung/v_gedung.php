<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Data gedung yang terdafatar di aplikasi peminjaman ruang ITI</h4>
    </div>
    <div class="card-body">
      <a href="<?php echo base_url().'c_admin/gedung_ruangan' ?>" class='btn btn-sm btn-outline-dark pull-left'><i class="fa fa-arrow-left"></i> Kembali</a>
      <a href="<?php echo base_url().'c_admin/gedung_tambah' ?>" class='btn btn-sm btn-success pull-right'><i class="fa fa-plus"></i> Tambah Gedung</a>
      <br/>
      <br/>
      

      <table class="table table-bordered table-striped table-hover">
        <tr>
          <th width="1%">No</th>
          <th>Nama Gedung</th>
          <th width="16%">Opsi</th>
        </tr>
        <?php 
        $no = 1;
        foreach($gedung as $p){
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $p->nama_gedung; ?></td>
            <td>
              <a href="<?php echo base_url().'c_admin/gedung_edit/'.$p->id_gedung; ?>" class="btn btn-sm btn-block btn-outline-warning"><i class="fa fa-wrench"></i> Edit</a>
              <a href="<?php echo base_url().'c_admin/gedung_hapus/'.$p->id_gedung; ?>" class="btn btn-sm btn-block btn-outline-danger"><i class="fa fa-trash"></i> Hapus</a>
            </td>
          </tr>
          <?php 
        }
        ?>
      </table>

    </div>
  </div>
</div>