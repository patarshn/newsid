<!-- CONTENT -->
<div class="container mt-3">
        <form>
            <label for="layanan">Pilih Layanan</label>
            <div class="form-row">
                <div class="col-lg-10 col-12">
                    <div class="form-group">
                        <select class="form-control" id="layanan">
                        <option>--Pilih--</option>
                        <option value="form_izinusaha">Form Izin Usaha</option>
                        <option value="form_kk">Form KK</option>
                        <option value="form_ktp">Form KTP</option>
                        <option value="form_kelahiran">Form Kelahiran</option>
                        <option value="form_kematian">Form Kematian</option>
                        <option value="form_tidakmampu">Form Keterangan Tidak Mampu</option>
                        <option value="form_belummenikah">Form Keterangan Belum Menikah</option>
                        <option value="form_sudahmenikah">Form Keterangan Sudah Menikah</option>
                        <option value="form_domisili">Form Keterangan Domisili</option>
                        <option value="form_jualbeli">Form Jual Beli</option>
                        <option value="form_waris">Form Keterangan Waris</option>
                        <option value="form_hibah">Form Keterangan Hibah</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-2">
                    <button type="button" class="btn btn-primary active-button" onclick="showPage()">Submit</button>
                </div>
            </div>
        </form>

        <script>
        function showPage() {
            var sel = document.getElementById('layanan');
            var option = sel.options[sel.selectedIndex].value;
            window.location.href=option;
        }
        </script>
</div>
<!-- END CONTENT -->