
	<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background:url(<?=base_url('assets/my/img/4.jpg')?>);background-size: 1200px;background-repeat: no-repeat;">
							</div>
                            <div class="col-lg-6 mt-4">
                                <div class="p-5">
                                    <div class="text-center">
										<img src="<?=base_url('assets/my/img/basic/wonodadi.png')?>" style="max-width:40%;height:auto;" alt="" srcset="">
                                        <h1 class="h4 text-gray-900 mb-4">Sistem Informasi Desa<br>Pekon Wonodadi</h1>
										
                                    </div>
                                    <form action="login/login" method="post" class="user">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Masuk
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>



	<!-- jQuery -->
	<script src="<?=base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url('assets/dist/js/adminlte.min.js')?>"></script>

</body>

</html>
