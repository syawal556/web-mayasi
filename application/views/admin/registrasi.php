
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrasi User</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('Admin_login/registrasi'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Masukan nama" value="<?= set_value('name'); ?>">
                                        <?= form_error('name','<small class =" text-danger pl-3 ">','</small>'); ?>
                                </div>     
                                <div class="form-group">
                                <select name="akses_level" id="akses_level" class=" form-control"
                                placeholder="Masukan nama" value="<?= set_value('akses_level');?>">
                                    <option>admin</option>
                                    <option >user</option>
                                </select>
                                </div>  
                                    <div class="form-group">  
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email" 
                                    value="<?= set_value( 'email'); ?>">
                                    <?= form_error('email','<small class =" text-danger pl-3 ">','</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control"
                                            id="password1" name="password1" placeholder="Password"> 
                                            <?= form_error('password1','<small class =" text-danger pl-3 ">','</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control"
                                            id="password2" name="password2" placeholder="Ulangi password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">
                                    Registrasi
                                </button> 
                                <a  class="btn btn-warning text-center ml-2" href="<?= base_url('data_user'); ?>">Batal</a>
                            </form>
                            
                                <hr>
                               
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Lupa Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('Admin_login/admin'); ?>">  Jika email anda telah terdaftar? silahkan Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
