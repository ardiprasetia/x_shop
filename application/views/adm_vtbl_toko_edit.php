<div class="container-fluid">
    <h2 class="mt-4">Data Toko</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">&nbsp;</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            <?php
                foreach($qr_toko->result() as $fd_toko){
                    $toko_id = $fd_toko->toko_id;
                    $akun_id = $fd_toko->akun_id;
                    $toko_nama = $fd_toko->toko_nama;
                    $toko_alamat = $fd_toko->toko_alamat;
                    $toko_kota = $fd_toko->toko_kota;
                    $toko_provinsi = $fd_toko->toko_provinsi;
                    $toko_hp = $fd_toko->toko_hp;
                    $toko_tgl_daftar = $fd_toko->toko_tgl_daftar;
                }
            ?>
            <a href="<?=base_url('adm_toko');?>">All Data Toko</a> - Edit Data Toko
        </div>
        <div class="card-body">
            <form method="post" action="<?=base_url('adm_toko/toko_edit_proses')?>">
            <div class="form-row">
                <div class="col-md-4 mr-5">
                    <div class="form-group mb-1">
                    <label class="medium mb-1">Toko ID</label>
                   
                    <input class="form-control py-1" type="text" name="toko_id" value="<?=$toko_id;?>" readonly>
                    </div>

                    <div class="form-group mb-1">
                    <label class="custom-control-select medium mb-1">Pemilik Toko</label>
                        <select name="akun_id" class="custom-select">  
                        <?php
                            foreach($qr_akun->result() as $fd_akun){
                                if($fd_toko->akun_id == $fd_akun->akun_id){
                                    $slc = 'selected';
                                }else{
                                    $slc = ''; 
                            }
                        
                        ?>
                            <option <?=$slc;?> value="<?=$fd_akun->akun_id?>">
                            <?=$fd_akun->akun_id;?> - 
                            <?=$fd_akun->akun_nama_depan;?>
                            <?=$fd_akun->akun_nama_belakang;?>
                            </option>
                        <?php
                        
                        }

                        ?>
                        </select>
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Nama Toko</label>
                    <input class="form-control py-1" type="text" name="toko_nama" value="<?=$toko_nama;?>">
                    </div>

                    <div class="form-group">
                    <label class="medium mb-1">Logo Toko</label>
                    <div class="custom-control-file py-1">
                        <input class="custom-file" type="file" name="toko_logo" />
                    </div>
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Alamat Toko</label>
                    <textarea name="toko_alamat" ><?=$toko_alamat;?></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-1">
                    <label class="medium mb-1">Kota</label>
                    <input class="form-control py-1" type="text" name="toko_kota" value="<?=$toko_kota;?>">
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Provinsi</label>
                    <input class="form-control py-1" type="text" name="toko_provinsi" value="<?=$toko_provinsi;?>">
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">No Handphone</label>
                    <input class="form-control py-1" type="text" name="toko_hp" value="<?=$toko_hp;?>">
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Tanggal Daftar</label>
                    <input class="form-control py-1" type="date" name="toko_tgl_daftar" value="<?=$toko_tgl_daftar;?>">
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