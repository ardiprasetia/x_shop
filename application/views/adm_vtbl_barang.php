<div class="container-fluid">
    <h2 class="mt-4">Data Barang ( 
        <?php
        foreach ($qr_k_sub as $fd_k_sub) {
            if($fd_k_sub->kategori_brg_sub_id == $this->uri->segment(3)){
                $kat_nama = $fd_k_sub->kategori_brg_sub_nama;
                echo $kat_nama;
            }
        }
        ?>
     )</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">&nbsp;</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>All Data Barang - 
            <a href="<?=base_url('adm_barang/barang_inp/'.$this->uri->segment(3));?>">Input Data Barang ( <?=$kat_nama;?> )
             </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Toko</th>
                            <th>Harga Barang</th>
                            <th>Potongan Harga (%)</th>
                            <th>Tanggal Daftar</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            foreach ($qr_barang->result() as $fd_barang) {
                            $no++;
                        ?>
                        <tr>
                            <td><?=$no;?></td>
                            <td><?=$fd_barang->barang_nama;?></td>
                            <td><?=$fd_barang->toko_nama;?></td>
                            <td><?=$fd_barang->barang_harga;?></td>
                            <td><?=round((float)$fd_barang->barang_potongan*100);?> %</td>
                            <td><?=$fd_barang->barang_tgl_daftar;?></td>
                            <td>Detail - Edit - Delete</td>
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