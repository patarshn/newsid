    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('admin')?>">
        <div class="sidebar-brand-text mx-3"><img src="<?=base_url('assets/my/img/basic/logo_pekon.png')?>" width="128px" alt="" srcset=""></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('')?>">
          <i class="fas fa-home"></i>
          <span>Beranda</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin/')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin/report')?>">
          <i class="fas fa-chart-pie"></i>
          <span>Report</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin/data_kependudukan')?>">
          <i class="fas fa-users"></i>
          <span>Data Kependudukan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataPengajuan" aria-expanded="true" aria-controls="dataPengajuan">
          <i class="fas fa-fw fa-cog"></i>
          <span>Data Pengajuan</span>
        </a>
        <div id="dataPengajuan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_ahliwaris')?>">SK Ahli Waris</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_belummenikah')?>">SK Belum Menikah</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_covid')?>">SK Covid</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_jualbelihewan')?>">SK Jual Beli</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_kehilanganbarang')?>">SK Kehilangan Barang</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_kelahiran')?>">SK Kelahiran</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_kematian')?>">SK Kematian</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_ktpsementara')?>">SK KTP Sementara</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_kuasa')?>">SK Kuasa</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_pasjalan')?>">SK Pas Jalan</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_penghasilan')?>">SK Penghasilan</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_pernyataannikah')?>">SK Pernyataan Nikah</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_skck')?>">SK Catatan Kriminal</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_statusperkawinan')?>">SK Status Perkawinan</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_suamiistri')?>">SK Suami Istri</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_tatin')?>">SK Tatin</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_tidakmampu')?>">SK Tidak Mampu</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/form_usaha')?>">SK Usaha</a>

    
          </div>
        </div>
      </li>

      <!-- Nav Item Administrasi - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#administrasi_umum" aria-expanded="true" aria-controls="administrasi_umum">
          <i class="fas fa-fw fa-cog"></i>
          <span>Administrasi Umum</span>
        </a>
        <div id="administrasi_umum" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_peraturan_desa')?>">Buku Peraturan di Desa</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_keputusan_kepala_desa')?>">Buku Keputusan Kepala Desa</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_inventaris_kekayaan_desa')?>">Buku Inventaris dan Kekayaan Desa</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_aparat_pemerintah_desa')?>">Buku Aparat Pemerintah Desa</a>

          </div>
        </div>
      </li>
      
      <li class="nav-item">
       
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penduduk" aria-expanded="true" aria-controls="penduduk">
          <i class="fa fa-id-card"></i>
          <span>Administrasi Penduduk</span>
        </a>
        <div id="penduduk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
          <a class="collapse-item text-wrap" href="<?=base_url('admin/induk_penduuduk')?>"><b>Iduk Penduduk</b></a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/mutasi_penduduk')?>"><b>Mutasi Penduduk</b></a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/rekap_penduduk')?>"><b>Rekapitulasi Jumlah Penduduk</b></a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/penduduk_sementara')?>"><b>Penduduk Sementara</b></a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/ktp_kk')?>"><b>KTP dan KK</b></a>
         
          </div>
        </div>
      
        <hr class="sidebar-divider my-0">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pembangunan" aria-expanded="true" aria-controls="pembangunan">
          <i class="fa fa-building"></i>
          <span>Administrasi Pembangunan</span>
        </a>
        <div id="pembangunan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
          <a class="collapse-item text-wrap" href="<?=base_url('admin/rencana_pembangunan')?>"><b>Rencana Kerja Pembangunan</b></a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/kegiatan_pembangunan')?>"><b>Kegiatan Pembangunan</b></a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/inventaris_pembangunan')?>"><b>Inventaris Pembangunan</b></a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/kader_pemberdayaan')?>"><b>Kader Pemberdayaan Masyarakat</b></a>
         
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->