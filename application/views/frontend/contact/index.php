<!-- CONTENT -->
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-7">
        <form>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" placeholder="">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="">
                <label for="title">Judul</label>
                <input type="text" class="form-control" id="title" placeholder="">
                <label for="message">Pesan</label>
                <input type="text" class="form-control" id="message" placeholder="">
                <p class="btn btn-primary disabled" style="background-color:grey !important; border-color:grey !important;">ABCDEFG</p><br>
                <label for="captcha">Masukkan Captcha</label>
                <input type="text" class="form-control" id="captcha" placeholder="">
                <button type="submit" class="btn btn-primary active-button">Submit</button>
                <button type="submit" class="btn btn-secondary">Reset</button>
            </div>
        </form>
        </div>
        <div class="col-lg mt-3">
            <div class="row mb-3 contact">
                <div class="col-1 icon">
                    <img src="img/icon/Icon material-place.png" alt="Place">
                </div>
                <div class="col">
                    <span>Jl. Way Pangubuan No. 16, Pahoman, Kota Bandarlampung, Lampung, 35132</span>
                </div>
            </div>
            <div class="row mb-3 contact">
                <div class="col-1 icon">
                    <img src="<?=base_url('assets/my/img/icon/Icon zocial-email.png')?>" alt="Email">
                </div>
                <div class="col">
                    <span>company@gmail.com</span>
                </div>
            </div>
            <div class="row mb-3 contact">
                <div class="col-1 icon">
                    <img src="img/icon/Icon ionic-ios-call.png" alt="Call">
                </div>
                <div class="col">
                    <span>0812-3456-7890</span>
                </div>
            </div>
            <div class="row mb-3 pl-3 contact">
                <div class="social-media">
                    <img src="<?=base_url('assets/my/img/icon/Icon simple-facebook.png')?>" alt="Facebook">
                    <img src="<?=base_url('assets/my/img/icon/Icon awesome-instagram.png')?>" alt="Instagram">
                    <img src="<?=base_url('assets/my/img/icon/Icon awesome-twitter.png')?>" alt="Twitter">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->