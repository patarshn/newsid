<!-- SUBMIT FORMDELETE MODAL -->
<div class="modal fade" id="setujuModal" tabindex="-1" role="dialog" aria-labelledby="setujuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="setujuModalLabel">Konfirmasi Aksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="alertModalMessage">
        Data yang akan disetujui, konfirmasi untuk menyetujui data..
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="store(base_url+'admin/<?=$uri[2]?>/setuju','#formdelete')">Setujui</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- SUBMIT FORMDELETE MODAL -->
<div class="modal fade" id="tolakModal" tabindex="-1" role="dialog" aria-labelledby="tolakModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tolakModalLabel">Konfirmasi Aksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="alertModalMessage">
      Data yang akan ditolak, konfirmasi untuk menolak data.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" onclick="store(base_url+'admin/<?=$uri[2]?>/tolak','#formdelete')">Tolak</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


      
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->