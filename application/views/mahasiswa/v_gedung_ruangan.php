<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card ">
                <div class="card-header bg-primary">  
                    <i class="fa fa-building"></i> 
                    &nbsp; Gedung
                </div>
                <div class="panel-body">
                    <div class="list-group list-group-flush">
                        <?php foreach($gedung as $k){ ?>
                            <a href="<?php echo base_url().'c_mahasiswa/ruangan/'.$k->id_gedung; ?>" class="list-group-item">
                                <i class="glyphicon glyphicon-user"></i> <?php echo $k->nama_gedung; ?>
                            </a>				
                        <?php } ?>
                    </div>
                    <!-- <div class="text-right">
                        <a href="<?php //echo base_url().'c_admin/gedung' ?>" class="btn btn-sm btn-block btn-outline-primary">Lihat Data Gedung &nbsp; <i class="fa fa-arrow-right">&nbsp;</i></a>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card ">
                <div class="card-header bg-warning">  
                    <i class="fa fa-bell-o"></i> 
                    &nbsp; Konfirmasi peminjaman ruang
                </div>
                <div class="panel-body">
                    <div class="list-group list-group-flush">
                        <?php foreach($ruangan_konfirmasi as $d){ ?>
                            <a href="<?php echo base_url().'c_mahasiswa/detail_peminjaman/'.$d->id_ruangan; ?>" class="list-group-item">
                                <i class="glyphicon glyphicon-user"></i> <?php echo $d->nama_ruangan; ?>
                            </a>				
                        <?php } ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card ">
                <div class="card-header bg-danger">  
                    <i class="fa fa-ban"></i> 
                    &nbsp; Gedung & Ruangan Sedang Digunakan
                </div>
                <div class="panel-body">
                    <div class="list-group list-group-flush">
                        <?php foreach($ruangan as $p){ ?>
                            <a href="#" class="list-group-item">
                                <i class="glyphicon glyphicon-user"></i> <?php echo $p->nama_ruangan; ?>
                            </a>				
                        <?php } ?>
                    </div>
                    <div class="text-right">
                        <a href="<?php echo base_url().'c_admin/gedung' ?>" class="btn btn-sm btn-block btn-outline-danger">Lihat Data Gedung &nbsp; <i class="fa fa-arrow-right"></i>&nbsp;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>