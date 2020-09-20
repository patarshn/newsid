
<!-- NAVBAR -->
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-light mybg-light">
        <div class="container">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="https://wonodadi.id">Beranda</a>
                    <!--<a class="nav-item nav-link" href="<?=base_url()?>">Layanan</a>-->
                    <span class="dropdown">
                        <a class="nav-item nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Layanan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url()?>"><b>LIHAT SEMUA</b></a>
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url('form_belummenikah')?>">SK Belum Menikah</a>
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url('form_janda')?>">SK Janda</a>
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url('form_kematian')?>">SK Kematian</a>
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url('form_ktpsementara')?>">SK KTP Sementara</a>
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url('form_penghasilan')?>">SK Penghasilan</a>
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url('form_tidakmampu')?>">SK Tidak Mampu</a>
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url('form_usaha')?>">SK Usaha</a>
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url('form_kelahiran')?>">SK Kelahiran</a>
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url('form_kehilanganbarang')?>">SK Kehilangan Barang</a>
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url('form_tatin')?>">SK Tatin</a>
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url('form_suamiistri')?>">SK Suami Istri</a>
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url('form_pasjalan')?>">SK Pas Jalan</a>
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url('form_ahliwaris')?>">SK Ahli Waris</a>
                        <a class="nav-item nav-link dropdown-item" href="<?=base_url('form_skck')?>">SK Catatan Kriminal</a>
                        </div>
                    </span>
                    <?php if(!empty($this->session->userdata('username'))):?>
                        <a class="nav-item nav-link" href="<?=base_url('admin')?>">Dashboard</a> 
                    <a class="nav-item nav-link" href="<?=base_url('logout')?>">Logout</a>    
                    <?php else:?>
                        <a class="nav-item nav-link" href="<?=base_url('login')?>">Login</a>  
                    <?php endif;?>
                    
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- END NAVBAR -->