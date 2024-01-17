<div>
    <div class="row" align="right">
        <div class="col-12">
        </div>
    </div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered  table table-sm text-center">    
             <div class="card-header text-center">
                    <h3> Detail Pesanan </h3>
            <div align="center">
                <div class="badge badge-dark btn-sm mb-2 mr-2 "> Nomor meja : <?php echo $invoice->no_meja ?></div>
                <div class="badge badge-dark btn-sm mb-2 mr-2"> Nama Customer : <?php echo $invoice->nama_pelanggan ?></div>
                <!-- <?php if($invoice->Status_bayar == 1) {?>
                <p class="badge badge-success btn-sm mb-2 mr-2" > Status bayar : Sudah bayar</p>
                <?php } else{?>
                <p class="badge badge-danger btn-sm mb-2 mr-2"> Status Bayar : Belum bayar</p>
                <?php  }?> -->
                
             </div>    
        </div>    
        <div class="badge badge-success btn-sm mb-2 mr-2"> Catatan Pesanan : <?php echo $invoice->catatan?></div>
<tr>
        <!-- <th>Id Menu</th> -->
        <th>Nama Menu</th>
        <th>Jumlah Pesanan</th>
        <th>Harga Satuan</th>
        <th>Sub-total</th>
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
    </tr>

    <?php endforeach; ?>
    <tr>
        <td colspan="3" align="center"><strong>Total Bayar </strong></td>
        <td align="center"><strong> Rp. <?php echo number_format($total,0,',','.') ?> </strong></td>
    </tr>
</table>
<div align="right">
    <a href="<?= base_url('Auth/struk_admin/'.$invoice->id_pesanan); ?>" class="btn btn-success btn-sm"><i data-feather="printer"></i> Proses</a>
    <a href="<?= base_url('Login_user/index_menu'); ?>"class="btn btn-warning btn-sm"><i data-feather=""></i>kembali</a>
</div> 
        </div>
     </div>
      
</div>
</div>

