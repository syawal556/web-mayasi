
<div class="card shadow mb-4">
                        <div class="card-header py-3 text-center">
                        <?= $this->session->flashdata('message'); ?>
                            <h4 class="m-0 font-weight-bold text-danger">Daftar Pesanan Belum Diproses</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm text-center" id="table1" wid1th="100%" cellspacing="0">
                                    <thead>
                                    <tr class="text-gray-900">
                                        <th>ID Pesanan</th>
                                        <th>Nama Customer</th>
                                        <th>Nomor Meja</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID Pesanan</th>
                                            <th>Nama Customer</th>
                                            <th>Nomor Meja</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php foreach($pesanan as $pesan):?>
                                        <tr class="text-gray-900">
                                           <td> <?php echo $pesan->id_pesanan?> </td> 
                                            <td>
                                             <?php echo $pesan->nama_pelanggan?>
                                            <br>
                                            <?php if($pesan->Status_bayar == 1) {?>
                                            <p class="badge badge-success" > Sudah bayar</p>
                                            <?php } else{?>
                                            <p class="badge badge-danger"> Belum bayar</p>
                                            <?php  }?>
                                            </td>
                                            <td>
                                            <p class="badge badge-dark"><?php echo $pesan->no_meja?></p> <br>
                                            </td>
                                            <td><?php echo $pesan->tgl_pesan?></td>
                                            <td> 
                                            <?php echo anchor ('Login_user/detail_pesanan_user/'.$pesan->id_pesanan, ' <div class="btn btn-sm btn-info">Detail Pesanan</div>') ?>
                                            </td>
                                        </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                </div>