<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url('assets/img/logo-mayasi.png'); ?>">
    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <img src="<?= base_url('assets/img/logo-mayasi.png'); ?>"class="ml-1 mt-1" align="left" width="190">
                            <div class="text-center ">
                                <h1 class="h1 text-gray-900 mb-2 mr-5 mt-4">Waroeng Mayasi</h1>
                                <h4 class="h4 text-gray-900 mb-2 mr-5 mt-2">Jl. Am. Suwigyo, Sungai Bangkong, Pontianak Kota, kalimantan Barat</h4>
                                <h6 class="h5 text-gray-900 mr-5">No handphone : 085656789099</h6>
                                <hr class="border border-dark border-2 opacity-50 mt-5">
                            </div>
                            </div>
                            <div class="card text-left mb-2" >
                        <div class="card-header text-gray-900">
                          <h5> Nomor meja    : <?php echo $invoice->no_meja ?></h5>
                          <h5> Nama Customer  : <?php echo $invoice->nama_pelanggan ?></h5>
                            
                          <h5> Tanggal Pesanan    : <?php echo $invoice->tgl_pesan ?></h5>
                          <?php if($invoice->order_id == 1) {?>
                    <h5> Status bayar : Bayar Tunai</h5>
                    <?php } else{?>
                        <h5> Status bayar : Lunas</h5>
                        <?php  }?>
                        </div>
                        </div> 
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table table-sm text-center text-gray-900">  
                         <tr>
                            <!-- <th>ID Menu</th> -->
                            <th>Nama Menu</th>
                            <th>Jumlah Pesanan</th>
                            <th>Harga Satuan</th>
                            <th>Sub-total</th>
                            <th>Catatan Pesanan</th>
                        </tr>
                        <?php 
                            $total = 0;
                            foreach ($detail as $ord):
                                $subtotal = $ord->jumlah * $ord->harga;
                                $total += $subtotal;
                            ?>

                            <tr>
                                <!-- <td><?php echo $ord->id_menu ?></td> -->
                                <td><?php echo $ord->nama_menu?></td>
                                <td><?php echo $ord->jumlah?></td>
                                <td><?php echo number_format($ord->harga,0,',','.')?></td>
                                <td><?php echo number_format($subtotal,0,',','.')?></td>
                                <?php endforeach; ?>
                                <td><?php echo $invoice->catatan ?></td>
                            </tr>

                                <td colspan="4" class="h3" align="center"><strong>Total Bayar</strong></td>
                                <td  class ="h3"align="center"><strong> Rp. <?php echo number_format($total,0,',','.') ?> </strong></td>
                            </tr>
                            
                            </table> 
                         </div>
            </div>
                <div class="card text-right mb-5" >    
                    <div class="card-footer text-muted">
                           <h5 class="text-gray-900 mr-4"> Hormat kami </h5><p></p>
                           <h5 class="text-gray-900 mr-5 mt-5"> (Owner)</h5>
                           
                        </div>
                        </div>
                        </div>
                       
                <div class="row no-print">
                <div class="col-12 p-3 ml-3">
                    <a href="<?= base_url('Auth/after_cetak/'.$invoice->id_pesanan); ?> "class="btn btn-success btn-sm ml-2 mb-5" oncLick="window.print()" onclick="return confirm('Apakan anda yakin akan menghapus data ini?')"><i class="fas fa-print"></i> Print</a>
                <!-- <?php echo anchor ('Auth/after_cetak/'.$invoice->id_pesanan, ' <div class="btn btn-success btn-sm ml-2 mb-5" oncLick="window.print()" ><i class="fas fa-print"></i></div>') ?> -->
                    <!-- <a href="" class="btn btn-primary btn-sm ml-2 mb-5" oncLick="window.print()"><i class="fas fa-print"></a> -->
                <!-- <button  class="btn btn-primary btn-sm ml-2 mb-5" oncLick="window.print()"><i class="fas fa-print"></i> Print</button> -->
                <a  class="btn btn-danger btn-sm text-center ml-2 mb-5" href="<?= base_url('Login_user/index_menu'); ?>">Batal</a>
                </div>
                </div>
                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src= "<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <style>
        @media print{
            .btn {
                display: none;
            }
        }

    </style>

</body>

</html>