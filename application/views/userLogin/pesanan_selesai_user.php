
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-success text-center">Daftar Orderan Telah Diproses</h4>
                        </div>
 <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm text-center" id="table1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>ID pesanan</th>
                                        <th>Nama Customer</th>
                                        <th>Nomor Meja</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Detail</th>
                                
                                      
                                        <!-- <th>Aksi</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>ID pesanan</th>
                                        <th>Nama Customer</th>
                                        <th>Nomor Meja</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Detail</th>
                                        
                                        <!-- <th>Aksi</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                     <?php foreach($telah_diproses as $pesan):?>
                                    <tr>
                                        <td><?php echo $pesan->id_pesanan?></td>
                                        <td><?php echo $pesan->nama_pelanggan?></td>
                                        <td>
                                        <p class="badge badge-info"><?php echo $pesan->no_meja?></p> 
                                        </td>
                                        <td><?php echo $pesan->tgl_pesan?></td>
                                        <!-- <td>
                                        <?php if($pesan->Status_bayar == 1) {?>
                                        <p class="badge badge-success" > Transfer</p>
                                        <?php } else{?>
                                        <p class="badge badge-danger"> Bayar Tunai</p>
                                        <?php  }?>
                                        </td> -->
                                        <td> 
                                        <?php echo anchor ('Login_user/cek_status/'.$pesan->id_pesanan, ' <div class="btn btn-success btn-sm" >Detail</div>') ?>
                                    </td>
                                    </tr>
                                        <?php endforeach; ?>  
                                     <tbody>
                             </table>
                        </div>
                        </div>