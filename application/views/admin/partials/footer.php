  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=base_url('logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="alertModalLabel">Alert Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="alertModalMessage">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--
<script>

  $('#deletebtn').click(function(){
    var len = $('[name="rowdelete[]"]:checked').length;
    if(len <= 0){
        alertModal("Tidak ada data yang dipilih");
    }
    else{
        $("#deleteModal").modal("show");
    }
  });
  </script>
-->
    <!-- Core plugin JavaScript-->
    <script src='<?php echo base_url("assets/sb2/vendor/jquery-easing/jquery.easing.min.js")?>'></script>
 <!-- Custom scripts for all pages-->
 <script src='<?php echo base_url("assets/sb2/js/sb-admin-2.min.js")?>'></script>

  <!-- Page level custom scripts
  <script src='<?php echo base_url("assets/sb2/js/demo/chart-area-demo.js")?>'></script>
<script src='<?php echo base_url("assets/sb2/js/demo/chart-pie-demo.js")?>'></script>
<script src='<?=base_url("assets/sb2/js/demo/datatables-demo.js")?>'></script>
-->
  <script src="<?=base_url('assets/my/script.js')?>"></script>

  <!--script custom upload file-->
  <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>

</body>

</html>
