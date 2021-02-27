<div class="container-fluid">
    <h2 class="mt-4">Data Toko</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">&nbsp;</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>All Data Toko
            - <a href="<?=base_url('adm_toko/toko_inp');?>">Input Data Toko</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Toko</th>
                            <th>Nama Toko</th>
                            <th>Pemilik Toko</th>
                            <th>Kota</th>
                            <th>No HP</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            foreach($qr_toko->result() as $fd_toko){
                                $no++;
                        ?>
                        <tr>
                            <td><?=$no;?></td>
                            <td><?=$fd_toko->toko_id;?></td>
                            <td><?=$fd_toko->toko_nama;?></td>
                            <td><?=$fd_toko->akun_nama_depan;?> 
                                <?=$fd_toko->akun_nama_belakang;?>
                            </td>
                            <td><?=$fd_toko->toko_kota;?></td>
                            <td><?=$fd_toko->toko_hp;?></td>
                            <td>Detail -
                            <a href="<?=base_url('adm_toko/toko_edit/'.$fd_toko->toko_id);?>">Edit -</a>  
                            <a href="<?=base_url('adm_toko/toko_delete/'.$fd_toko->toko_id);?>">Delete -</a></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>