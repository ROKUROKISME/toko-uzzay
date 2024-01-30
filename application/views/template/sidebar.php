<div class="main-panel"> -->

    <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="mb-5">
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= site_url('home') ?>" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap"><span class="hide-menu">Master Data</span></li>

					<!-- <li <?= ($_SESSION['Login'] == 'Admin' ? '' : 'hidden') ?> class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= site_url('admin') ?>" aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span class="hide-menu">Admin</span></a></li> -->
                    <li class="sidebar-item"> <a class="sidebar-link" href="<?= site_url('kategori') ?>" aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span class="hide-menu">Kategori
                            </span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= site_url('supplier') ?>" aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span class="hide-menu">Supplier</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= site_url('rekening') ?>" aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span class="hide-menu">Rekening</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= site_url('barang') ?>" aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span class="hide-menu">Barang</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= site_url('konsumen') ?>" aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span class="hide-menu">Konsumen</span></a></li>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap"><span class="hide-menu">Transaksi</span></li>
            
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Penjualan </span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <li class="sidebar-item"><a href="<?= site_url('pesanan') ?>" class="sidebar-link"><span class="hide-menu"> Permintaan pesanan
                                    </span></a>
                            </li>
                            <li class="sidebar-item"><a href="<?= site_url('pesanan/diterima') ?>" class="sidebar-link"><span class="hide-menu"> Pesanan diterima
                                    </span></a>
                            </li>
                            <li class="sidebar-item"><a href="<?= site_url('pesanan/selesai') ?>" class="sidebar-link"><span class="hide-menu"> Pesanan selesai
                                    </span></a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="list-divider"></li>
                    <li class="nav-small-cap"><span class="hide-menu">Laporan</span></li>

                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= site_url('laporan/penjualan') ?>" aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span class="hide-menu">Laporan Penjualan
                            </span></a>
                    </li> -->
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
