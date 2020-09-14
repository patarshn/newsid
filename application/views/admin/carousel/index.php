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
                  <?php print_r($uri);?>
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
                  <h6 class="m-0 font-weight-bold text-primary">Carousel</h6>
                  <div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-success">Add</button>
                        <button type="button" id="deletebtn" class="btn btn-danger">Delete</button>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form method="POST" id="formdelete" action="/carousel/destroy">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th width="3%"></th>
                      <th>Image</th>
                      <th>Title & Description</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  
                    <?php 
                    $count = 1;
                    foreach($carousel as $c):?>
                    
                    <tr>
                      
                      <td>
                        <input type="checkbox" name="rowdelete[]" value="<?=$c->id?>" class="rowdelete">
                        <input type="hidden" name="imagename[]" value="<?=$c->image?>" class="imagename">
                        <?=$count++;?>
                      </td>
                      <td><div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Actions:</div>
                      <a class="dropdown-item" href="#">Edit</a>
                      <a class="dropdown-item" href="#">Delete</a>
                      <!--<div class="dropdown-divider"></div>-->
                    </div>
                  </div></td>
                      <td>
                        <img src="<?=base_url('assets/'.$c->image);?>" width="150px" height="100px">
                      </td>
                      <td>
                        <p><?=$c->title;?></p>
                        <p><small><?=$c->description;?></small></p>
                      </td>
                    </tr>
                    <?php endforeach;?>
                    
                  </tbody>
                  
                  <tfoot>
                    <tr>
                      <th width="5%">No</th>
                      <th width="3%"></th>
                      <th>Image</th>
                      <th>Title & Description</th>
                    </tr>
                  </tfoot>
                </table>
                </form>
              </div>
                    
                    
                </div>
              </div>
            </div>
          </div>
          


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<!-- SUBMIT FORMDELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="alertModalMessage">
        Data yang akan dihapus tidak dapat dikembalikan lagi, konfirmasi untuk menghapus data.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="store(base_url+'admin/carousel/destroy','#formdelete')">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

