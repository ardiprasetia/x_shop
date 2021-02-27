<div class="container-fluid">
    <h2 class="mt-4">Data Barang ( 
        <?php
            foreach ($qr_k_sub as $fd_k_sub) {
                if($fd_k_sub->kategori_brg_sub_id == $this->uri->segment(3)){
                    $nama_sub = $fd_k_sub->kategori_brg_sub_nama;
                    echo $nama_sub;
                }
            }
        ?> )
    </h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">&nbsp;</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            <a href="<?=base_url('adm_barang/vbarang/'.$this->uri->segment(3));?>">
            All Data Barang</a> - 
            Input Data Barang ( <?=$nama_sub;?> )
        </div>
        <div class="card-body">
            <form method="post" action="<?=base_url('adm_barang/barang_input_proses/'.$this->uri->segment(3));?>">
            <div class="form-row">
                <div class="col-md-4 mr-5">
                    <div class="form-group mb-1">
                    <label class="medium mb-1">Toko</label>
                    <input class="form-control py-1" type="text" name="toko_id">
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Nama Barang</label>
                    <input class="form-control py-1" type="text" name="barang_nama">
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Harga Barang (Rp.)</label>
                    <input class="form-control py-1" type="number" name="barang_harga">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-1">
                    <label class="medium mb-1">Potongan Harga (%)</label>
                    <input class="form-control py-1" type="number" name="barang_potongan">
                    </div>

                    <div class="form-group mb-1">
                    <label class="medium mb-1">Tanggal Daftar</label>
                    <input class="form-control py-1" type="date" name="barang_tgl_daftar">
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