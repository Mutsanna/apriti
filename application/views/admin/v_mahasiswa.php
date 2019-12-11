<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Data mahasiswa yang terdafatar di aplikasi peminjaman ruang ITI</h4>
    </div>
    <div class="card-body">

      <a href="<?php echo base_url().'c_admin/mahasiswa_tambah' ?>" class='btn btn-sm btn-success pull-right'><i class="fa fa-plus"></i> Mahasiswa Baru</a>
      <br/>
      <br/>
      

      <table class="table table-bordered table-striped table-hover">
        <tr>
          <th width="1%">No</th>
          <th>NRP</th>
          <th>Nama</th>
          <th>Prodi</th>
          <th width="16%">Opsi</th>
        </tr>
        <?php 
        $no = 1;
        foreach($mahasiswa as $p){
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $p->nrp; ?></td>
            <td><?php echo $p->nama_mahasiswa; ?></td>
            <td><?php echo $p->prodi; ?></td>
            <td>
              <a href="<?php echo base_url().'c_admin/mahasiswa_edit/'.$p->id_mahasiswa; ?>" class="btn btn-sm btn-warning"><i class="fa fa-wrench"></i> Edit</a>
              <a href="<?php echo base_url().'c_admin/mahasiswa_hapus/'.$p->id_mahasiswa; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
            </td>
          </tr>
          <?php 
        }
        ?>
      </table>

    </div>
  </div>
</div>