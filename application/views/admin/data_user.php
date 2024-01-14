
<?= $this->session->flashdata('message'); ?>
                        <div class="card shadow mb-4">
                        <div class="card-body">
                          <div class="table-responsive">
                        <table class="table table-bordered  table table-sm text-center">    
                       <h3> <a href="<?= base_url('Admin_login/registrasi'); ?>" align="right" class=" btn font-weight-bold btn-success btn-xs center"> <i data-feather="user-plus"></i> Tambah data user</i></a>
                            <thead>       
                                    <tr>
                                            <th>No</th>
                                            <th>Nama pengguna</th>
                                            <th>Email pengguna</th>
                                            <th>Akses level</th>
                                            <th>Action</th>
                                    </tr>      
                            </thead>
                             <?php  $no =1;
                             foreach ($tampilkan as $tmp) :?>
                                <tbody>                
                                        <tr>
                                            <td><?= $no++?></td>
                                            <td><?= $tmp->name?></td>
                                            <td><?= $tmp->email?></td>
                                            <td><?= $tmp->akses_level?></td>
                                            <td>
                                            <button data-toggle="modal" data-target="#edit<?= $tmp->id ?>" class=" btn btn-warning btn-sm"><i data-feather="edit"></i></button>
                                            <a href="<?= base_url('User/delete/' . $tmp ->id) ?>" class=" btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i data-feather="trash-2"></i></a>
                                            </td>
                                        </tr>
                                    </thead>
                                </tbody>
                        <?php endforeach?> 
                </table> 

                        </div>
                        </div>
                        </div>


