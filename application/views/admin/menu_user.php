

 <?= $this->session->flashdata('message'); ?>
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Daftar Menu</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm text-center" id="table1" wid1th="100%" cellspacing="0">
                                <h3> <a href="<?= base_url('User/tambahMenu'); ?>" class=" btn font-weight-bold btn-success btn-xs center"></i> Tambah data menu</i></a>
                                    <thead>
                                    <tr>
                                    <th>No</th>
                                        <th>Nama menu</th>
                                        <th>Note</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                     <th>No</th>
                                        <th>Nama menu</th>
                                        <th>Note</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php  $no =1;
                                foreach ($tampilMenu as $menu) :?>
                             <tbody>                
                            <tr>
                            <td><?= $no++?></td>
                            <td><?= $menu->nama_menu?></td>
                            <td class="ket text-left"><?= $menu->keterangan?></td>
                            <td><img src="<?php echo base_url().'/uploads/'. $menu->gambar ?>" width ="100" class="img"></td>
                             <td>Rp.  <?= number_format($menu->harga_menu, 0,',','.') ?></td>
                              <td>
                             <button data-toggle="modal" data-target="#edit_menu<?= $menu->id ?>" class=" btn btn-warning btn-sm"><i data-feather="edit"></i>Edit</button>
                            <a href="<?= base_url('Menu/hapus_menu/'. $menu->id); ?>" class=" btn btn warning btn-sm" onclick="return confirm('Apakan anda yakin akan menghapus data ini?')"><i data-feather="trash-2"></i>Hapus</a>
                            </td>
                        </tr>
                     </tbody>
                    <?php endforeach; ?> 
                    </table>
                </div>
         </div>
     </div>



     <!-- Modal edit data menu -->
<?php foreach($tampilMenu as $tmp): ?>

<div class="modal fade" id="edit_menu<?= $tmp->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Menu/update_menu/' . $tmp->id ) ?>" method="post">
        <div class="form-group">
        <input type="text" class="form-control form-control-user"
          id="name" name="nama_menu" placeholder="Nama Menu" value="<?= $tmp->nama_menu ?>" required auotofocus>
        </div>
        <div class="form-group">
        <input type="text" class="form-control form-control-user"
          id="keterangan" name="keterangan" placeholder="Deskripsi Menu"value="<?= $tmp->keterangan?>"required auotofocus>
        </div>
        <div class="form-group">
        <input type="text" class="form-control form-control-user"
          id="harga_menu" name="harga_menu" placeholder="harga menu"value="<?= $tmp->harga_menu?>"required auotofocus>
        </div>
        <div class="form-group">
        <input type="file" class="form-control form-control-user"
          id="gambar" name="gambar" placeholder="gambar"value="<?= $tmp->gambar?>" required auotofocus>
        </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
    <?php endforeach ?>
    </div>
  </div>
</div>

        








                                