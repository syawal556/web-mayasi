


<?= $this->session->flashdata('message'); ?>
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h2 align="center" class="m-0 font-weight-bold text-dark">Daftar Menu</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm text-center" id="table1" wid1th="100%" cellspacing="0">
                                <a href="<?= base_url('Login_user'); ?>" class=" btn btn-primary mb-3"> Kembali </a> 
                                    <thead>
                                    <tr>
                                    <th>No</th>
                                        <th>Nama menu</th>
                                        <th>Note</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                     <th>No</th>
                                        <th>Nama menu</th>
                                        <th>Note</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
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
                             <a href="<?= base_url('Menu/edit_menu/'. $menu->id); ?>" class=" btn btn warning btn-sm"><i data-feather="edit"></i></a>                              <a href="<?= base_url('menu/hapus_menu/'. $menu->id); ?>" class=" btn btn warning btn-sm" onclick="return confirm('Apakan anda yakin akan menghapus data ini?')"><i data-feather="trash-2"></i></a>
                            </td>
                        </tr>
                     </tbody>
                    <?php endforeach; ?> 
                    </table>
                </div>
         </div>
     </div>










                                


