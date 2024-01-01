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
                    <h3> Detail Pesanan Customer</h3>
            <div align="center">
                <div class="btn btn-dark btn-sm mb-2 mr-2 "> Nomor meja : <?php echo $invoice->no_meja ?></div>
                <div class="btn btn-dark btn-sm mb-2 mr-2"> Nama Customer : <?php echo $invoice->nama_pelanggan ?></div>
                <?php if($invoice->Status_bayar == 1) {?>
                <p class="btn btn-success btn-sm mb-2 mr-2" > Status bayar : Sudah bayar</p>
                <?php } else{?>
                <p class="btn btn-danger btn-sm mb-2 mr-2"> Status Bayar : Belum bayar</p>
                <?php  }?>
                
             </div>    
        </div>    
        <div class="btn btn-success btn-sm mb-2 mr-2"> Catatan Pesanan : <?php echo $invoice->catatan?></div>
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
    <a href="<?= base_url('Login_user/index_menu'); ?>"class="btn btn-warning btn-sm mb-3"><i data-feather=""></i>kembali</a>
    <?php echo anchor ('Login_user/user_proses_pesanan/'.$invoice->id_pesanan, ' <div class="btn btn-primary btn-sm mr-3 mb-3" ><i data-feather="arrow-right-circle"></i> Proses Pesanan</div>') ?>
</div> 
        </div>
     </div>
      
</div>
</div>

