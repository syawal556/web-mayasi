
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

<body>

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-3">
                <img src="<?= base_url('assets/img/logo-mayasi.png'); ?>" align="left" width="165">
                            <div class="text-center ">
                                <<h1 class="h1 text-gray-900 mb-2 mr-5 mt-4">Waroeng Mayasi</h1>
                                <h4 class="h4 text-gray-900 mb-2 mr-5 mt-2">Jl. Am. Suwignyo, Sungai bangkong, Pontianak kota, Kalimantan Barat</h4>
                                <h6 class="h5 text-gray-900 mr-5">No handphone : 085656789099</h6>
                                <hr class="border border-dark border-2 opacity-50">
                         
<h2 align="center" class="text-gray-900"><strong><?= $title; ?> </strong></h2> 
<h5 class=" text-gray-900 float-left ml-5">Periode : <?= $tanggal; ?>/<?= $bulan; ?>/<?= $tahun; ?></h5>
</div>

</div>
    <div class="row ml-5 mr-5">
        <div class="col-12 table-responsive">
<table class="table table-striped text-center">
<thead class="table table-dark">
            <tr>
                <th>#</th>
                <th>ID Pesanan</th>
                <th>Nama Product</th>
                <th>Harga Jual</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
</thead>
<tbody>
    <?php 
    $no = 1;
    $grand_total = 0;
    foreach ($lap_tunai_harian as $lap) {
        $total_harga = $lap->jumlah * $lap->harga;
        $grand_total = $grand_total + $total_harga;
        ?>    

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $lap->id_pesan; ?></td>
                <td><?= $lap->nama_menu; ?></td>
                <td>Rp. <?= number_format($lap->harga, 0,',','.') ?></td>
                <td><?= $lap->jumlah ?></td>
                <td>Rp. <?= number_format( $total_harga, 0,',','.'); ?></td>
            </tr>
<?php } ?>
<thead class="table table-warning">
<tr align="center" class="h4">
     <td colspan="5"><strong>Grand Total Penjualan </strong></td>
    <td><strong> Rp. <?= number_format($grand_total, 0,',','.') ?> </strong></td>
 </tr>
 </thead>
                            

</tbody>
</table>
</div>

                <div class="row no-print">
                <div class="col-12 p-3 ml-3">
                <button  class="btn btn-primary btn-sm" oncLick="window.print()"><i class="fas fa-print"></i> Print</button>
                <a  class="btn btn-danger btn-sm text-center" href="<?= base_url('Laporan/lap_pembayaran'); ?>">Batal</a>
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

    <script type="text/javascript">
        window.addEventListener("load", window.print());

    </script>

</body>

</html>

