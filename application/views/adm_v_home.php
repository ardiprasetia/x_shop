
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>X Shop</title>
        <link href="<?=base_url('xplus/bootstrap/css/styles.css');?>" rel="stylesheet" />
        <link href="<?=base_url('xplus/bootstrap/css/dataTables.bootstrap4.min.css');?>" rel="stylesheet" />
        <script src="<?=base_url('xplus/bootstrap/js/all.min.js');?>"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-green">
            <a class="navbar-brand" href="<?=base_url();?>">X Shop</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="GET" action="<?php echo base_url('adm_home/orang/hasil');?>">
                <div class="input-group">
                    <input class="form-control" type="text" name="cari" id="cari" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"  />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                        <a class="dropdown-item" href="<?php echo site_url('adm_home/login');?>">Login</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="<?=base_url();?>">
                              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

<!---------------------------------------------------------------------SIDEBAR/MENU--------------------------------------------------------------------->
                            <div class="sb-sidenav-menu-heading">Data Utama</div>
                            <a class="nav-link" href="<?=base_url();?>adm_akun">
                              <div class="sb-nav-link-icon">
                                <i class="fas fa-user"></i>
                              </div>Data Akun
                            </a>
                            <a class="nav-link" href="<?=base_url();?>adm_toko">
                              <div class="sb-nav-link-icon">
                                <i class="fas fa-table"></i>
                              </div>Data Toko
                            </a>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                              <div class="sb-nav-link-icon"><i class="fas fa-columns fa-w-16"></i></div>
                                Data Barang
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <!---
                                NOTES:
                                - Pada bagian attribut, data-target, arial-controls dan id
                                  yang berisi #pages_id_kategori_utama dan pages_id_kategori_utama, diganti dengan id_kategori_utama dari database, agar menu dapat tampil sesuai dengan parent nya, contoh: #pages_1 atau pages_1 (angka 1 berasal dr id_kategori_utama di database)
                            -->

                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="menubarang">
                                <?php
                                    foreach($qr_k_utama as $fd_k_utama){
                                ?>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" 
                                    data-target="#pages_<?=$fd_k_utama->kategori_brg_utama_id;?>" 
                                    aria-expanded="false" aria-controls="pages_id_kategori_utama">
                                      <?=$fd_k_utama->kategori_brg_utama_nama;?><div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pages_<?=$fd_k_utama->kategori_brg_utama_id;?>" aria-labelledby="headingOne" data-parent="#menubarang">
                                      <nav class="sb-sidenav-menu-nested nav">
                                        <?php
                                            foreach($qr_k_sub as $fd_k_sub){
                                                if($fd_k_utama->kategori_brg_utama_id == 
                                                   $fd_k_sub->kategori_brg_utama_id){
                                        ?>
                                        <a class="nav-link" 
                                        href="<?=base_url();?>adm_barang/vbarang/<?=$fd_k_sub->kategori_brg_sub_id;?>">
                                            <?=$fd_k_sub->kategori_brg_sub_nama;?>
                                        </a>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <a class="nav-link" href="<?=base_url('adm_kategori');?>"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                        Settings Kategori
                                    </a>
                                </nav>
                            </div>
                            <!---------------------------------------------------------------------------------------------------------->
                            <div class="sb-sidenav-menu-heading">Transaksi</div>
                            <a class="nav-link" href="<?=base_url('adm_pesanan');?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            List Pesanan
                            </a>
<!---------------------------------------------------------------------END OF SIDEBAR/MENU--------------------------------------------------------------------->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>ADMINISTRATOR
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
<!---------------------------------------------------------------------CONTENT--------------------------------------------------------------------->
                  <?php
                    $this->load->view($hal);
                  ?>
<!---------------------------------------------------------------------END OF CONTENT--------------------------------------------------------------------->
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?=base_url('xplus/bootstrap/js/jquery-3.4.1.min.js');?>"></script>
        <script src="<?=base_url('xplus/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
        <script src="<?=base_url('xplus/bootstrap/js/scripts.js');?>"></script>
        <script src="<?=base_url('xplus/bootstrap/js/Chart.min.js');?>"></script>
        <script src="<?=base_url('xplus/bootstrap/js/chart-area-demo.js');?>"></script>
        <script src="<?=base_url('xplus/bootstrap/js/chart-bar-demo.js');?>"></script>
        <script src="<?=base_url('xplus/bootstrap/js/jquery.dataTables.min.js');?>"></script>
        <script src="<?=base_url('xplus/bootstrap/js/dataTables.bootstrap4.min.js');?>"></script>
        <script src="<?=base_url('xplus/bootstrap/js/datatables-demo.js');?>"></script>
    </body>
</html>