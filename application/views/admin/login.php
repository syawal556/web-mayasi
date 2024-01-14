
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-8">
              <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        <div class="col-lg d-none d-lg-block">
                        <img src="<?= base_url('assets/img/logo-mayasi.png'); ?>"class="ml-5 mt-5 center" align="left" width="250" data-aos="fade-right" data-aos-duration="2000"   data-aos-delay="100">
                        </div>
                        
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>

                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="post" action ="<?= base_url('Admin_login/admin'); ?>">
                                    
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                id="email" name="email" placeholder="masukan email " value="<?= set_value('email'); ?>">
                                                <?= form_error('email','<small class =" text-danger pl-3 ">','</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"
                                                id="password" name="password" placeholder="Password">
                                                <?= form_error('password','<small class =" text-danger pl-3 ">','</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('Auth'); ?>">Kembali halaman Utama</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
