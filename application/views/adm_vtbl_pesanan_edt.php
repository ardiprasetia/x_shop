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
            <form method="POST" action="<?=base_url('adm_pesanan/pesanan_edt_proses')?>">
            <div class="form-row">
                <div class="col-md-4 mr-5">
                    <div class="form-group mb-1">
                    <label class="medium mb-1">No Pesanan</label>
                    <?php
                        foreach($qr_pesanan_h->result() as $fd_pesan_id){
                           $pesanan_h_id = $fd_pesan_id->pesanan_h_id;
                           $akun_id = $fd_pesan_id->akun_id;
                           $akun_alamat_id = $fd_pesan_id->akun_alamat_id;
                           $pesanan_h_tgl = $fd_pesan_id->pesanan_h_tgl;
                           $pembayaran_id = $fd_pesan_id->pembayaran_id;
                           $pesanan_h_ket = $fd_pesan_id->pesanan_h_ket;
                        }

                    ?>
                    <input class="form-control py-1" type="text" name="pesanan_h_id" value="<?=$pesanan_h_id;?>" readonly>
                    </div>

                    <div class="form-group mb-1">
                    <label class="custom-control-select medium mb-1">Pembeli</label>
                    <input class="form-control py-1" type="text" name="akun_id" value="<?=$akun_id;?>" readonly>
                    </div>

                    <div class="form-group mb-1">
                    <label class="custom-control-select medium mb-1">Alamat Pembeli</label>
                        <select name="akun_alamat_id" class="custom-select">
                        <?php
                            foreach($qr_akun_alamat->result() as $fd_akun_alamat){
                                if($fd_akun_alamat->$akun_id = $akun_id){
                                
                        ?>
                            <option value="<?=$fd_akun_alamat->akun_alamat_id;?>"><?=$fd_akun_alamat->akun_alamat_nama;?></option>
                        <?php
                            }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Tanggal Pesanan</label>
                    <input class="form-control py-1" type="date" name="pesanan_h_tgl" value="<?=$pesanan_h_tgl?>">
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
                    <?php
                    $slc_p1 = 0;
                    $slc_p2 = 0;
                    $slc_p3 = 0;
                    if($pembayaran_id == 1){
                        $slc_p1 = 'selected';
                    }elseif($pembayaran_id ==2){
                        $slc_p2 = 'selected';
                    }else{
                        $slc_p3 = 'selected';
                    }
                    ?>
                        <select name="pembayaran_id" class="custom-select">
							<option <?=$slc_p1;?> value="1">Transfer BANK</option>
                            <option <?=$slc_p2;?> value="2">X-Shop Money</option>
                            <option <?=$slc_p3;?> value="3">COD</option>
                        </select>
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Keterangan</label>
                    <textarea name="pesanan_h_ket"><?=$pesanan_h_ket?></textarea>
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
                                    <input class="btn btn-primary btn-block" type="submit" name="s_save" value="SIMPAN DAN LANJUTKAN">
                                </div>
                            </div> 
                            </td>
                        </tr>
                        </form>
                        <?php
                        $no = 0;
                            foreach($qr_pesanan_d->result() as $fd_pesanan_d){
                                if($fd_pesanan_d->pesanan_h_id == $pesanan_h_id){
                                    $no++;
                        ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$fd_pesanan_d->barang_nama?></td>
                            <td><?=$fd_pesanan_d->toko_nama?></td>
                            <td><?=$fd_pesanan_d->pesanan_d_jumlah?></td>
                            <td><?=$fd_pesanan_d->kurir_nama?></td>
                            <td>Edit - Delete</td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>