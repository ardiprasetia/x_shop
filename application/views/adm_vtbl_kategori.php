<div class="container-fluid">
    <h2 class="mt-4">Setting Kategori</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">&nbsp;</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>All Kategori - 
            <a data-toggle="modal" href="#insert_utama">Input Kategori Utama</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Utama</th>
                            <th>Sub Kategori</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            foreach($qr_k_utama as $fd_k_utama){
                                $no++;
                        ?>
                        <tr>
                            <td><?=$no;?></td>
                            <td><?=$fd_k_utama->kategori_brg_utama_nama;?></td>
                            <td>
                                <?php
                                    foreach ($qr_k_sub as $fd_k_sub) {
                                        if($fd_k_sub->kategori_brg_utama_id == 
                                           $fd_k_utama->kategori_brg_utama_id){
                                ?>
                                - <?=$fd_k_sub->kategori_brg_sub_nama;?> 
                                ( <a data-toggle="modal" href="#edit_sub">Edit</a>
                                 - Delete)<br />
                                <?php
                                        }
                                    }
                                ?>
                                + <a data-toggle="modal" href="#insert_sub">Input Sub
                                </a>
                            </td>
                            <td>
                            <a data-toggle="modal" href="#edit_utama" >Edit</a>
                             - Delete</td>
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
<!---------------------- POPUP Insert New Kategori Utama --------------------->
<div class="modal fade" id="insert_utama" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Insert Nama Kategori Utama</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <input class="form-control" type="text" name="kategori_utama_nama">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------->
<!---------------------- POPUP Insert New Kategori Sub --------------------->
<div class="modal fade" id="insert_sub" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Insert Nama Kategori Sub</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <input class="form-control" type="text" name="kategori_sub_nama">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------->
<!---------------------- POPUP edit Kategori utama --------------------->
<div class="modal fade" id="edit_utama" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Edit Nama Kategori Utama</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <input class="form-control" type="text" name="kategori_utama_nama">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------->
<!---------------------- POPUP edit Kategori sub --------------------->
<div class="modal fade" id="edit_sub" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Edit Nama Kategori Sub</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <input class="form-control" type="text" name="kategori_sub_nama">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------->