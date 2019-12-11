<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Detail peminjaman ruang</h1>
    <p class="lead">Menunggu konfirmasi dari pihak DAA untuk peminjaman ruang</p>
  </div>
</div>

<!-- <ul class="list-group list-group-flush">
  <li class="list-group-item">Nama lengkap : </li>
  
  <li class="list-group-item">Dapibus ac facilisis in</li>
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
</ul> -->
<?php foreach($peminjaman as $k){ ?>
<table class="table">
  <tbody>
    <tr>
      <th scope="row">Nama Lengkap : </th>
      <td><?php echo $this->session->userdata('nama_mahasiswa'); ?></td>
    </tr>
    <tr>
      <th scope="row">NRP : </th>
      <td><?php echo $this->session->userdata('nrp'); ?></td>
    </tr>
    <tr>
    <?php foreach($ruangan as $p){ ?>
      <th scope="row">Ruangan : </th>
      <td><?php echo $p->nama_ruangan; ?></td>
    </tr>
    <tr>
      <th scope="row">Tanggal - Jam : </th>
      <td><?php echo $k->tanggal_di_mulai; ?></td>
    </tr>
    <tr>
      <th scope="row">Tanggal - Jam : </th>
      <td><?php echo $k->tanggal_di_sampai; ?></td>
    </tr>
    <tr>
      <th scope="row">Keterangan : </th>
      <td><?php echo $k->keterangan; ?></td>
    </tr>
    <tr>
      <td colspan="2">
      <a href="<?php echo base_url().'c_mahasiswa/batal_peminjaman/'.$k->id_peminjaman.'/'.$p->id_ruangan; ?>"class="btn btn-outline-danger btn-block">Batal Peminjaman
        
        </a></td>
      
    </tr>
  </tbody>
</table>

<?php }} ?>