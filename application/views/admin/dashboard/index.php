        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <p>Anda login sebagai, <?=$this->session->userdata('username')?></p>
                </div>
                
              </div>
              <h3>Form Ahli Waris</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_ahliwaris["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Belum Menikah</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_belummenikah["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Ahli Waris</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_ahliwaris["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Covid</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_covid["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Jual Beli Hewan</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_jualbelihewan["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Kehilangan Barang</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_kehilanganbarang["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Kelahiran</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_kelahiran["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Kematian</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_kematian["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form KTP Sementara</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_ktpsementara["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Kuasa</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_kuasa["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Pas Jalan</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_pasjalan["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Penghasilan</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_penghasilan["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Pernyataan Nikah</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_pernyataannikah["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form SKCK</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_skck["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>
            
            <h3>Form Status Perkawinan</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_statusperkawinan["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Suami Istri</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_suamiistri["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Tatin</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_tatin["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Tidak Mampu</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_tidakmampu["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>

            <h3>Form Usaha</h3>
              <div class="row">
              <!-- START -->
              <?php foreach($form_usaha["countdata"] as $d):?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$d['verif_lurah']?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$d['total'];?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach?>
             <!--END-->
            </div>











          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->