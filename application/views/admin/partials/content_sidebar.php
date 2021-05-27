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
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_tnh_kas_desa')?>">Buku Tanah Kas Desa</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_tnh_desa')?>">Buku Tanah di Desa</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_agenda')?>">Buku Agenda</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_ekspedisi')?>">Buku Ekspedisi</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_lemdes_berdes')?>">Buku Lembaran Desa dan Berita Desa</a>
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
          
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_induk_penduduk')?>">Buku Induk Penduduk</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_mutasi_penduduk')?>">Buku Mutasi Penduduk Desa</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/rekap_penduduk')?>">Buku Rekapitulasi Jumlah Penduduk</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_penduduk_sementara')?>">Buku Penduduk Sementara</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_ktp_kk')?>">Buku KTP dan Buku KK</a>
         
          </div>
        </div>
        </li>
      
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pembangunan" aria-expanded="true" aria-controls="pembangunan">
          <i class="fa fa-building"></i>
          <span>Administrasi Pembangunan</span>
        </a>
        <div id="pembangunan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_rencana_pembangunan')?>">Buku Rencana Kerja Pembangunan</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_kegiatan_pembangunan')?>">Buku Kegiatan Pembangunan</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_inventaris_pembangunan')?>">Buku Inventaris Hasil- Hasil Pembangunan</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_kader_pemberdayaan')?>">Buku Kader Pemberdayaan Masyarakat</a>
         
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#administrasi_keuangan" aria-expanded="true" aria-controls="administrasi_keuangan">
          <i class="fa fa-id-card"></i>
          <span>Administrasi Keuangan</span>
        </a>
        <div id="administrasi_keuangan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
          <a class="collapse-item text-wrap" href="<?=base_url('admin/apbd')?>"><b>Agaran Pendapatan dan Belanja Desa</b></a>
         
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#administrasi_lainnya" aria-expanded="true" aria-controls="administrasi_lainnya">
          <i class="fas fa-fw fa-cog"></i>
          <span>Administrasi Lainnya</span>
        </a>
        <div id="administrasi_lainnya" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_agenda_surat_keluar')?>">Buku Agenda Surat Keluar BPD</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_agenda_surat_masuk')?>">Buku Agenda Surat Masuk BPD</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_ekspedisi_bpd')?>">Buku Ekspedisi BPD</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_data_inventaris_bpd')?>">Buku Data Inventaris BPD</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_laporan_keuangan')?>">Buku Laporan Keuangan BPD</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_data_anggota_bpd')?>">Buku Data Anggota BPD</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_data_kegiatan')?>">Buku Data Kegiatan BPD</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_data_aspirasi_masyarakat')?>">Buku Data Aspirasi Masyarakat</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_data_peraturan_bpd')?>">Buku Data Peraturan/Keputusan BPD</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_data_peraturan_desa')?>">Buku Data Peraturan Desa</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_keputusan_musyawarah')?>">Buku Keputusan Musyawarah Desa</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_keputusan_ppd')?>">Buku Keputusan Musyawarah Perencanaan Pembangunan Desa</a>
          <a class="collapse-item text-wrap" href="<?=base_url('admin/buku_rapat_bpd')?>">Buku Rapat BPD</a>
          <a class="collapse-item text-wrap" href="<?=base_url('administrasilainnya\buku_tamu_bpd/BUKU TAMU BPD.docx')?>">Unduh Buku Tamu BPD</a>
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