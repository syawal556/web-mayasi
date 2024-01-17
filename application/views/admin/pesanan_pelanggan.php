<?= $this->session->flashdata('message'); ?>
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-danger text-center">Daftar Orderan Belum Diproses</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm text-center" id="table1" width="100%" cellspacing="0">
                                    <thead class="table table-dark table-hover">
                                        <tr>
                                        <th>ID pesanan</th>
                                        <!-- <th>ID Bayar</th> -->
                                        <th>Nama Customer</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Status Order</th>
                                        <th>Nomor Meja</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>ID pesanan</th>
                                        <!-- <th>ID Transfer</th> -->
                                        <th>Nama Customer</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Status Order</th>
                                        <th>Nomor Meja</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                     <?php foreach($belum_bayar as $pesan):?>
                                    <tr>
                                        <td><?php echo $pesan->id_pesanan?></td>
                                        <!-- <td>
                                        <?php if($pesan->order_id == 0) {?>
                                        <p class="badge badge-dark" >Bayar Tunai</p>
                                        <?php } else{?>
                                              <div class="text-gray-900">
                                              <?= $pesan->order_id; ?>
                                              </div> 
                                        <?php  }?>
                                        </td> -->
                                        <td class="h5 text-gray-900"><?php echo $pesan->nama_pelanggan?></td>
                                        <td><?php echo $pesan->tgl_pesan?></td>
                                        <td>
                                        <?php if($pesan->status_code == 200) {?>
                                        <p class="badge badge-success" > Sudah bayar </p>
                                        <?php } else{?>
                                        <p class="badge badge-danger">Belum bayar</p>
                                        <?php  }?> 
                                        <br>
                                        
                                        </td>
                                        <td>
                                        <p class="badge badge-info"><?php echo $pesan->no_meja?></p> 
                                        </td>
                                        <td> 
                                        <?php echo anchor ('Pesanan/detail_pesanan/'.$pesan->id_pesanan, ' <div class="btn btn-primary btn-sm"><i data-feather="eye"></i></div>') ?>
                                        <?php if($pesan->order_id == 0) {?>
                                            <a href="<?= base_url('Pesanan/pesanan_batal/'.$pesan->id_pesanan); ?>" class=" btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan membatalkan pesanan ini?')"><i data-feather="delete"></i></a>
                                        <?php } else{?>
                                        
                                        <?php  }?>
                                        <?php if($pesan->order_id == 0) {?>
                                            <a href="<?= base_url('Pesanan/konfirmasi_pesanan/'.$pesan->id_pesanan); ?>" class=" btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin ingin aprrove pesanan ini?')">Approve</a>
                                        <?php } else{?>
                                        
                                        <?php  }?>
                                      
                                    </td>
                                    </tr>
                                        <?php endforeach; ?>
                                       
                                     <tbody>
                             </table>
                        </div>
                        </div>


                        






