        <!-- Begin Page Content -->
        <div class="container-fluid">
        	<!-- Content Row -->

        	<div class="row">
        		<div class="col-xl-12 col-lg-12">
        			<div class="card shadow mb-4">
        				<div
        					class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-bottom-primary">
        					<h6 class="m-0 font-weight-bold text-primary">
        						<?=$breadcrumb?>
        					</h6>
        				</div>
        			</div>
        		</div>
        	</div>

        	<!-- Content Row -->

        	<div class="row">
        		<?php if($this->session->flashdata('success_message')): ?>
        		<div class="alert alert-success col" id="success-message">
        			<?= $this->session->flashdata('success_message');?></div>
        		<?php endif ?>
        		<div class="alert alert-danger col d-none" id="error-message"></div>
        		<!-- Area Chart -->
        		<div class="col-xl-12 col-lg-12">
        			<div class="card shadow mb-4">
        				<!-- Card Header - Dropdown -->
        				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        					<h6 class="m-0 font-weight-bold text-primary"><?=$title?></h6>
        					<div>
        						<div class="btn-group" role="group" aria-label="Basic example">
        							<button type="button" class="btn btn-warning"
        								onclick="window.location.href='<?=base_url();?>admin/<?=$folder?>'">Batal</button>
        						</div>
        					</div>
        				</div>
        				<!-- Card Body -->
        				<div class="card-body border-bottom-primary">
        					<?=form_open_multipart(base_url('buku_peraturan_desa/store'),'id="form"')?>
        					<h3 class="text-gray-900"><?=$title?></h3>
        					<span class="text-danger font-weight-bold">*</span> <small
        						class="text-gray-900 font-weight-bold">Wajib Diisi</small>
        					<div class="form-row">

        						<div class="col-lg-12 mt-3">
        							<div class="form-group">
        								<label for="status_surat" class="text-gray-900 font-weight-bold">Jenis Penerimaan/Pengiriman
        									Surat <span class="text-danger">*</span></label>
        								<select name="status_surat" id="status_surat" class="form-control border-left-primary" required>
        									<option value="">Pilih Jenis Surat</option>
        									<option value="PENERIMAAN">Penerimaan Surat</option>
        									<option value="PENGIRIMAN">Pengiriman Surat</option>
        								</select>
        							</div>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label for="tanggal_surat" class="text-gray-900 font-weight-bold">Tanggal Penerimaan/Pengiriman
        								Surat <span class="text-danger">*</span></label>
        							<input type="date" name="tanggal_surat" id="tanggal_surat"
        								class="form-control border-left-primary" required>
        						</div>

        						<div class="col-lg-6 mt-3">
        							<label class="text-gray-900 font-weight-bold">Upload Berkas</label>
        							<div class="custom-file">
        								<label for="berkas" class="custom-file-label border-left-primary">Pilih Berkas</label>
        								<input type="file" class="custom-file-input" id="berkas" name="berkas" accept=".pdf">
        								<small id="berkas" class="text-gray-700">Berkas berformat .pdf</small>
        							</div>
        						</div>

        						<div class="col-lg-12 mt-3" id="surat_masuk" style="display: none;">
        							<label class="text-gray-900 font-weight-bold">Surat Masuk <span
        									class="text-danger">*</span></label>
        							<div class="form-row">
        								<div class="col-lg-3">
        									<input type="text" name="sm_no" id="sm_no" class="form-control border-left-primary"
        										maxlength="100" required>
        									<small id="sm_no" class="text-gray-700">nomor</small>
        								</div>

        								<div class="col-lg-3">
        									<input type="date" name="sm_tgl" id="sm_tgl" class="form-control border-left-primary"
        										required>
        									<small id="sm_tgl" class="text-gray-700">Tanggal</small>
        								</div>

        								<div class="col-lg-3">
        									<input type="text" name="sm_pengirim" id="sm_pengirim"
        										class="form-control border-left-primary" maxlength="100" required>
        									<small id="sm_pengirim" class="text-gray-700">Pengirim (Diisi dengan nama instansi
        										pengirim)</small>
        								</div>

        								<div class="col-lg-3">
        									<input type="text" name="sm_isi" id="sm_isi" class="form-control border-left-primary"
        										maxlength="100" required>
        									<small id="sm_isi" class="text-gray-700">Isi Singkat (Diisi dengan perihal surat
        										masuk)</small>
        								</div>
        							</div>
        						</div>

        						<div class="col-lg-12 mt-3" id="surat_keluar" style="display: none;">
        							<label class="text-gray-900 font-weight-bold">Surat Keluar <span
        									class="text-danger">*</span></label>
        							<div class="form-row">
        								<div class="col-lg-3">
        									<input type="text" name="sk_no" id="sk_no" class="form-control border-left-primary"
        										maxlength="100" required>
        									<small id="sk_no" class="text-gray-700">nomor</small>
        								</div>

        								<div class="col-lg-3">
        									<input type="date" name="sk_tgl" id="sk_tgl" class="form-control border-left-primary"
        										required>
        									<small id="sk_tgl" class="text-gray-700">Tanggal</small>
        								</div>

        								<div class="col-lg-3">
        									<input type="text" name="sk_ditunjukkan" id="sk_ditunjukkan"
        										class="form-control border-left-primary" maxlength="100" required>
        									<small id="sk_ditunjukkan" class="text-gray-700">Ditunjukkan Kepada (Diisi dengan nama
        										instansi yang dituju)</small>
        								</div>

        								<div class="col-lg-3">
        									<input type="text" name="sk_isi" id="sk_isi" class="form-control border-left-primary"
        										maxlength="100" required>
        									<small id="sk_isi" class="text-gray-700">Isi Surat (Diisi dengan perihal surat keluar)</small>
        								</div>
        							</div>
        						</div>

        						<div class="col-lg-12 mt-3">
        							<div class="form-group">
        								<label for="ket" class="text-gray-900 font-weight-bold">Keterangan</label>
        								<textarea class="form-control border-left-primary" name="ket" id="ket" rows="3" maxlength="255"
        									required></textarea>
        								<small id="ket" class="text-gray-700">Diisi dengan catatan-catatan lain yang dianggap
        									perlu</small>
        							</div>
        						</div>
        					</div>
        					<?=form_close()?>

        					<div class="d-flex mt-3">
        						<button type="button" class="btn btn-success active-button align-self-center"
        							onclick="store(base_url+'admin/<?=$uri[2]?>/store','#form')">Simpan</button>
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
        	function cek_status_surat() {
        		var status = $('#status_surat').val();
        		console.log(status);
        		if (status == "PENERIMAAN") {
        			$('#surat_keluar').hide();
        			$('#surat_masuk').show();
        		} else if (status == "PENGIRIMAN") {
        			$('#surat_masuk').hide();
        			$('#surat_keluar').show();
        		} else {
        			$('#surat_masuk').hide();
        			$('#surat_keluar').hide();
        		}
        	}

        	$('#status_surat').change(function () {
        		cek_status_surat();
        	});

        </script>
