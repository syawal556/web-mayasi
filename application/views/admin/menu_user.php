<?= $this->session->flashdata('message'); ?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary text-center">Daftar Menu</h4>
                        </div>
 <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm text-center" id="table1" width="100%" cellspacing="0">
                                <h3> <a href="<?= base_url('User/tambahMenu'); ?>" class=" btn font-weight-bold btn-success btn-xs center"></i> Tambah data menu</i></a>
                                    <thead>
                                        <tr>
                                        <th>Nomor</th>
                                        <th>Nama Menu</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Nomor</th>
                                        <th>Nama Menu</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                    <?php  $no =1;
                                    foreach ($tampilMenu as $menu) :?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $menu->nama_menu?></td>
                                        <td><?php echo $menu->keterangan?></td>
                                        <td> 
                                        <img src="<?php echo base_url().'/uploads/'. $menu->gambar ?>" width ="100" class="img"></td>
                                        <td>Rp.  <?= number_format($menu->harga_menu, 0,',','.') ?></td>
                                        <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $menu->id ?>"><i data-feather="edit-3"></i> </button>
                                     <a href="<?= base_url('Menu/hapus_menu/'. $menu->id); ?>" class=" btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i data-feather="trash-2"></i></a>
                                     <?php if($menu->status_menu == 1 ) {?>
                                      <a href="<?= base_url('Menu/aktifkan_menu/'. $menu->id); ?>" class=" btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan mengaktifkan menu ini?')"><i data-feather="eye-off"></i></a>
                                    <?php } else{?>
                                      <a href="<?= base_url('Menu/nonaktif_menu/'. $menu->id); ?>" class=" btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin akan menonaktifkan Menu in?')"><i data-feather="eye"></i></a> 
                                    <?php  }?> 
                                     
                                        </td>
                                    </tr>
                                        <?php endforeach; ?>
                                       
                                     <tbody>
                             </table>
                        </div>
                        </div>

<!-- Modal -->
<?php $no = 0; 
foreach ($tampilMenu as $key => $value) : $no++; ?>
<div class="modal fade" id="edit<?= $value->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('User/edit_menu/' . $value->id ) ?>" method="post">
        <input type="hidden" name="id" value="<?= $value->id ?>">
        <div class="form-group">
        <input type="text" class="form-control form-control-user"
          id="nama_menu" name="nama_menu" placeholder="Nama Menu" value="<?= $value->nama_menu ?>" required auotofocus>
        </div>
        <div class="form-group">
        <input type="text" class="form-control form-control-user"
          id="keterangan" name="keterangan" placeholder="Deskripsi Menu" value="<?= $value->keterangan ?>" required auotofocus>
        </div>
        <div class="form-group">
        <input type="number" maxlength="5" min="0" class="form-control form-control-user"
          id="harga_menu" name="harga_menu" placeholder="Harga Menu" value="<?= $value->harga_menu ?>" required auotofocus>
        </div>
        <div class="form-group">
        <input type="file" class="form-control form-control-user"  name="userfile" placeholder="gambar">
        </div>
        <img src="<?php echo base_url() . '/uploads/' . $value->gambar ?>"width ="100" class="img">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </form>
  </div>
</div>
<?php endforeach; ?>
