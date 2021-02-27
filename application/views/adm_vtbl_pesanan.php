<div class="container-fluid">
    <h2 class="mt-4">Data Pesanan</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">&nbsp;</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>All Data Pesanan
            - <a href="<?=base_url('adm_pesanan/pesanan_inp');?>">Input Data Pesanan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Pesanan</th>
                            <th>Pembeli</th>
                            <th>Tanggal Pesanan</th>
                            <th>Pembayaran</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            foreach($qr_pesan->result() as $fd_pesan){
                                $no++;
                        ?> 
                        <tr>
                            <td><?=$no;?></td>
                            <td><?=$fd_pesan->pesanan_h_id;?></td>
                            <td><?=$fd_pesan->akun_nama_depan;?> 
                                <?=$fd_pesan->akun_nama_belakang;?></td>
                            <td><?=$fd_pesan->pesanan_h_tgl;?></td>
                            <td>
                            <?php
                            if($fd_pesan->pembayaran_id ==1){
                                echo 'Transfer BANK';
                            }elseif($fd_pesan->pembayaran_id ==2){
                                echo 'X-Shop Money';
                            }else{
                                echo 'COD';
                            }                                
                            ?>
                            </td>
                            <td>Detail - 
                            <a href="<?=base_url('adm_pesanan/pesanan_edt/'.$fd_pesan->pesanan_h_id);?>">Edit</a> - 
                            Delete</td>
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