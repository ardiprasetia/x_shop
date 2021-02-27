<div class="container-fluid">
    <h2 class="mt-4">Data Akun</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">&nbsp;</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            <?php
                foreach($qr_akun->result() as $fd_akun){
                    $akun_id = $fd_akun->akun_id;
                    $akun_nama_depan = $fd_akun->akun_nama_depan;
                    $akun_nama_belakang = $fd_akun->akun_nama_belakang;
                    $akun_email = $fd_akun->akun_email;
                    $akun_hp = $fd_akun->akun_hp;
                    $akun_jenis_kelamin = $fd_akun->akun_jenis_kelamin;
                    $akun_tanggal_lahir = $fd_akun->akun_tanggal_lahir;
                    $akun_tgl_daftar = $fd_akun->akun_tgl_daftar;
                }
            ?>
            <a href="<?=base_url('adm_akun');?>">All Data Akun</a> - Edit Data Akun
        </div>
        <div class="card-body">
            <form method='post' action="<?=base_url('adm_akun/akun_edit_proses');?>">
            <div class="form-row">
                <div class="col-md-4 mr-5">
                    <div class="form-group mb-1">
                    <label class="medium mb-1">Akun ID</label>
                    <input class="form-control py-1" type="text" name="akun_id" value="<?=$akun_id;?>" readonly>
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Nama Depan</label>
                    <input class="form-control py-1" type="text" name="akun_nama_depan" value="<?=$akun_nama_depan;?>">
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Nama Belakang</label>
                    <input class="form-control py-1" type="text" name="akun_nama_belakang" value="<?=$akun_nama_belakang;?>" ></div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Alamat Email</label>
                    <input class="form-control py-1" type="text" name="akun_email" value="<?=$akun_email;?>">
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">No Handphone</label>
                    <input class="form-control py-1" type="text" name="akun_hp" value="<?=$akun_hp;?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-1">
                    <label class="medium mb-1">Jenis Kelamin</label>
                    <div class="custom-control-radio py-1">
                        <?php
                            $lk='';
                            $pr='';
                            if($fd_akun->akun_jenis_kelamin = 'laki-laki'){
                                $lk= 'checked';
                            }elseif($fd_akun->akun_jenis_kelamin = 'perempuan'){
                                $pr= 'checked';
                        }
                        ?>
                        <input <?=$lk;?> class="custom-radio" type="radio" name="akun_jenis_kelamin" value="laki-laki" /> Laki - laki
                        <input <?=$pr;?> class="custom-radio" type="radio" name="akun_jenis_kelamin" value="perempuan" /> Perempuan
                    </div>
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Tanggal Lahir</label>
                    <input class="form-control py-1" type="date" name="akun_tanggal_lahir" value="<?=$akun_tanggal_lahir;?>">
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Foto User</label>
                    <div class="custom-control-file">
                        <input class="custom-file" type="file" name="akun_foto" />
                    </div>
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Tanggal Daftar</label>
                    <input class="form-control py-1" type="date" name="akun_tgl_daftar" value="<?=$akun_tgl_daftar;?>">
                    </div>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="col-md-4">
                    <input class="btn btn-primary btn-block" type="submit" name="submit" value="SIMPAN">
                </div>
                <div class="col-md-2">
                    <input class="btn btn-secondary btn-block" type="reset" name="reset" value="BATAL">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>