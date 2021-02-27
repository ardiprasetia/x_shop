<div class="container-fluid">
    <h2 class="mt-4">Data Akun</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">&nbsp;</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>All Data Akun
            - <a href="<?=base_url('adm_akun/akun_inp');?>">Input Data Akun</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Akun</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Tanggal Lahir</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            foreach($qr_akun->result() as $fd_akun){
                                $no++;
                        ?>
                        <tr>
                            <td><?=$no;?></td>
                            <td><?=$fd_akun->akun_id;?></td>
                            <td><?=$fd_akun->akun_nama_depan;?> 
                                <?=$fd_akun->akun_nama_belakang;?>
                            </td>
                            <td><?=$fd_akun->akun_email;?></td>
                            <td><?=$fd_akun->akun_hp;?></td>
                            <td><?=$fd_akun->akun_tanggal_lahir;?></td>
                            <td>Detail - 
                                <a href="<?=base_url('adm_akun/akun_edit/'.$fd_akun->akun_id);?>">Edit -</a> 
                                <a href="<?=base_url('adm_akun/akun_delete/'.$fd_akun->akun_id);?>">Delete </a> 
                            </td>
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