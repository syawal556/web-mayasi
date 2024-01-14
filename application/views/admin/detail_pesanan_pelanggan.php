<div>
    <div class="row" align="right">
        <div class="col-12">
        </div>
    </div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered  table table-sm text-center">    
            <div align="center">
                <h2 class="text-center">Detail Pesanan </h2>
                <div class="badge badge-success btn-sm mb-2 mr-2"> Nama Customer : <?php echo $invoice->nama_pelanggan ?></div>
                <div class="badge badge-success btn-sm mb-2 mr-2 "> Nomor Meja : <?php echo $invoice->no_meja ?></div>
                <!-- <?php if($invoice->order_id == 0) {?>
                    <p  class="badge badge-danger btn-sm mb-2 mr-2" > Status bayar : Bayar Tunai</p>
                    <?php } else{?>
                        <p  class="badge badge-success btn-sm mb-2 mr-2" > Status bayar : Transfer</p>
                        <?php  }?> -->
                        
                    </div>        
      <div class="badge badge-info btn-sm mb-2 mr-2 "> Catatan Pesanan : <?php echo $invoice->catatan ?></div>
<tr class="text-gray-900">
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

    <tr class="text-gray-900">
        <!-- <td><?php echo $ord->id_menu ?></td> -->
        <td><?php echo $ord->nama_menu?></td>
        <td><?php echo $ord->jumlah?></td>
        <td><?php echo number_format($ord->harga,0,',','.')?></td>
        <td><?php echo number_format($subtotal,0,',','.')?></td>
    </tr>

    <?php endforeach; ?>
    <tr class="h5 text-gray-900">
        <td colspan="3" align="center"><strong>Total Bayar </strong></td>
        <td align="center"><strong> Rp. <?php echo number_format($total,0,',','.') ?> </strong></td>
    </tr>
</table> 
<div align="right">
<a href="<?= base_url('Pesanan'); ?>"class="btn btn-danger btn-sm">Kembali</i></a>
<!-- <?php echo anchor ('Pesanan/proses_lanjut/'.$invoice->id_pesanan, ' <div class="btn btn-primary btn-sm mb-2 mt-2 mr-3" >Proses Pesanan <i data-feather="arrow-right-circle"></i></div> ') ?> -->
</div>
    </div>
         </div>
      
</div>
</div>

