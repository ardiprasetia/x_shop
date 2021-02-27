<div class="container-fluid">
    <h2 class="mt-4">Input Data Pesanan</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">&nbsp;</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>
        <a href="<?=base_url('adm_pesanan');?>">All Data Pesanan</a>
            - Input Data Pesanan
        </div>
        <div class="card-body">
            <form method="POST" action="<?=base_url('adm_pesanan/pesanan_input_proses')?>">
            <div class="form-row">
                <div class="col-md-4 mr-5">
                    <div class="form-group mb-1">
                    <label class="medium mb-1">No Pesanan</label>
                    <?php
                        foreach($qr_pesan_id->result() as $fd_pesan_id){
                            $old_pesan_id = $fd_pesan_id ->pesanan_h_id;
                            $x_pesan_id = substr($old_pesan_id,5)+1;
                            $new_pesan_id = 'XTR01'.sprintf('%05d',$x_pesan_id);
                        }

                    ?>
                    <input class="form-control py-1" type="text" name="pesanan_h_id" value="<?=$new_pesan_id?>" readonly>
                    </div>

                    <div class="form-group mb-1">
                    <label class="custom-control-select medium mb-1">Pembeli</label>
                        <select name="akun_id_pembeli" class="custom-select" onchange="$(location).attr('href','<?=base_url('adm_pesanan/pesanan_inp/');?>'+this.value);">
                        <?php
                            foreach($qr_akun->result() as $fd_akun){
                                if($this->uri->segment(3)==$fd_akun->akun_id){
                                    $a_slc = 'selected';
                                }else{
                                    $a_slc = '';
                                }
                                
                        ?>
                            <option <?=$a_slc;?> value="<?=$fd_akun->akun_id?>">
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
                    <label class="custom-control-select medium mb-1">Alamat Pembeli</label>
                        <select name="akun_alamat_id" class="custom-select">
                        <?php
                        $s_alamat_id = $this->uri->segment(3);
                            if($s_alamat_id != ''){
                            foreach($qr_akun_alamat->result() as $fd_akun_alamat){
                                
                        ?>
                            <option value="<?=$fd_akun_alamat->akun_alamat_id;?>"><?=$fd_akun_alamat->akun_alamat_nama;?></option>
                        <?php
                            }
                            }else{
                            ?> 
                                <option value="0">---Silahkan Pilih Pembeli--</option>
                            <?php
                            }
                           ?>  
                        </select>
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Tanggal Pesanan</label>
                    <input class="form-control py-1" type="date" name="pesanan_h_tgl">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-1">
                    <label class="custom-control-select medium mb-1">Kode Promo</label>
                        <select name="promo_id" class="custom-select">
                            <option value="0">Tidak Memiliki Promo</option>
                        </select>
                    </div>

                    <div class="form-group mb-1">
                    <label class="custom-control-select medium mb-1">Pembayaran</label>
                        <select name="pembayaran_id" class="custom-select">
							<option value="1">Transfer BANK</option>
                            <option value="2">X-Shop Money</option>
                            <option value="3">COD</option>
                        </select>
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Keterangan</label>
                    <textarea name="pesanan_h_ket"></textarea>
                    </div>
                </div>
            </div>
            <div class="table-responsive mt-5">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Toko</th>
                            <th>Jumlah</th>
                            <th>Kurir</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="display: none;">&nbsp;</td>
                            <td colspan="3">
                                <div class="form-group mb-1">
                                <select name="barang_id" class="custom-select">
                                <?php
                                    foreach($qr_barang->result() as $fd_barang){
                                ?>
                                <option value="<?=$fd_barang->barang_id;?>">
                                <?=$fd_barang->kategori_brg_sub_nama;?>-
                                <?=$fd_barang->barang_nama;?>-
                                <?=$fd_barang->toko_nama;?>
                                </option>
                                <?php
                                    }
                                ?>
                                </select>
                                </div>
                            </td>
                            <td style="display: none;">&nbsp;</td>
                            <td>
                                <div class="form-group mb-1">
                                <input class="form-control py-1" type="text" name="pesanan_d_jumlah" >
                                </div>
                            </td>
                            <td>
                                <div class="form-group mb-1">
                                <select name="kurir_id" class="custom-select">
                                <?php
                                    foreach($qr_kurir->result() as $fd_kurir){
                                ?>
                                <option value="<?=$fd_kurir->kurir_id;?>">
                                <?=$fd_kurir->kurir_nama;?>- 
                                <?=$fd_kurir->kurir_company;?></option>
                                <?php
                                    }
                                ?>
                                </select>
                                </div>
                            </td>
                            <td>
                            <div class="form-row mt-3">
                                <div class="col-md">
                                    <input class="btn btn-primary btn-block" type="submit" name="s_save" value="SIMPAN">
                                </div>
                            </div>    
                            <div class="form-row mt-3">
                                <div class="col-md">
                                    <input class="btn btn-primary btn-block" type="submit" name="s_save" value="SIMPAN DAN LANJUTKAN">
                                </div>
                            </div> 
                            </td>
                        </tr>
                        </form>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>Edit - Delete</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>