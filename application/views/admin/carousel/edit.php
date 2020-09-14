        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->

          <div class="row">
          
          

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
            <?php if($this->session->flashdata('success_message')): ?>
	            <div class="alert alert-success col" id="success-message"><?= $this->session->flashdata('success_message');?></div>
            <?php endif ?>
                <div class="alert alert-danger col d-none" id="error-message"></div>
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">
                  <?php
                  $segment = $this->uri->segment_array();
                  $uri = base_url();
                  $uriCount = count($segment);
                  $i = 1;
                  foreach ($segment as $s)
                  {
                    //echo $s;
                    //echo '<br />';
                    $uri = $uri.$s.'/';
                    echo '<a href="'.$uri.'">'.ucfirst($s).'</a>';
                    if($i != $uriCount){
                      echo " » ";
                    }
                    $i++;
                  }
                  ?>
                  </h6>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Carousel</h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-warning">Cancel</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="/carousel/update" method="POST" id="form" enctype="multipart/form-data">
                    <?php foreach($carousel as $c):?>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?=$c->id?>" >
                        </div>
                        <div class="form-group">
                            <label for="uploadimage">Upload Image</label>
                            <p>
                            <img src="<?=base_url('assets/'.$c->image);?>" alt="" width="200px" height="150px">
                            </p>
                            <input type="file" class="form-control" id="uploadimage" name="uploadimage">
                            <input type="hidden" class="form-control" id="uploadimagename1" name="uploadimagename1" value="<?=$c->image?>">
                            <input type="hidden" class="form-control" id="uploadimagename2" name="uploadimagename2" >
                        </div>
                        <div class="form-group">
                        <label for="titleimage">Title Image</label>
                        <input type="text" class="form-control" id="titleimage" name="titleimage" value="<?=$c->title?>">
                        </div>
                        <div class="form-group">
                        <label for="descriptionimage">Description Image</label>
                        <input type="text" class="form-control" id="descriptionimage" name="descriptionimage" value="<?=$c->description?>">
                        </div>
                    <?php endforeach;?>
                    </form>
                    <div class="d-flex">
                    <button type="button" class="btn btn-success active-button align-self-center" onclick="store(base_url+'admin/carousel/update','#form')">Simpan</button>
                        <div class="spinner-border m-1 align-self-center text-primary d-none" role="status" id="loading">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<script>

  $(document).ready(function(){
      $('#uploadimage').change(function(e){
          var uploadimagename = e.target.files[0].name;
          $('#uploadimagename2').val(uploadimagename);
      });
  });
</script>