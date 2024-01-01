<div class="container-fluid mb-4 my-4">
    <h4 class="text-center text-gray-900">Detail pesanan anda</h4>
    <?= $this->session->flashdata('message'); ?>
    <br>
    <?php echo form_open('Auth/update'); ?>
    <table class=" table table-bordered table-striped table-hover">
    <table cellpadding="6" cellspacing="1" style="width:100%" border="0">

<tr>
        <th width="100px">QTY</th>
        <th style="text-align:center">Nama Menu</th>
        <th style="text-align:right">Harga</th>
        <th style="text-align:right">Total </th>
        <th style="text-align:right"> action</th>
        
</tr>

<?php $i = 1; ?>
<?php foreach ($this->cart->contents() as $items):   ?>
        <tr>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3','min'=> '0', 'size' => '5','type' =>'number', 'class' => 'form-control')); ?></td>
                
                <td style="text-align:center">
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>
                <td style="text-align:right">Rp. <?php echo number_format($items['price'], 0,',','.'); ?></td>
                <td style="text-align:right">Rp. <?php echo number_format($items['subtotal'], 0,',','.'); ?></td>
                <td class="text-right">
                    <a href="<?= base_url('Auth/delete/' . $items['rowid']) ?>" class="btn btn-warning btn-sm"><i data-feather="delete"></i></a>

                </td>
        </tr>

<?php $i++; ?>
<?php endforeach; ?>


<tr>
        <td colspan="3"> </td>
        <td class="right"><strong> Total Bayar</strong></td>
       <h1></h1> <td class="right"><strong>Rp. <?php echo number_format($this->cart->total(), 0,',','.'); ?></strong></td>
</tr>


</table>

</div>
</p>
<button type="submit" class="btn btn-success btn-flat btn-sm mb-3"  ><i data-feather="plus-circle"></i> Update Pesanan</button>
<a href="<?= base_url('Auth/clear'); ?>" class="btn btn-danger btn-flat btn-sm mb-3" onclick="return confirm('Apakah anda yakin akan menghapus semua pesanan?')"><i data-feather="trash-2"></i> Hapus semua pesanan</a>
<a href="<?= base_url('Auth/daftarMenu'); ?>" class="btn btn-info btn-flat btn-sm mb-3">Tambah Pesanan</a>
<a href="<?= base_url('Auth/pembayaran'); ?>" class="btn btn-primary btn-flat btn-sm mb-3"><i data-feather="check-circle"></i> Proses pesanan</a>
<?php echo form_close(); ?>
<br>
<h4 class="mt-3">Ketentuan:</h4>
<span> - silahkan klik tombol update pesanan untuk menambahkan jumlah QTY pesanan yang diinginkan</span>
<br> 
<span> - Tombol Hapus Semua Pesanan akan otomatis Mengahpus Semua total dan jumlah Pesanan</span>
<br>
<span> - Untuk menghapus Salah Satu Pesanan Maka Pilih tombol icon hapus</span>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih metode pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <a href="<?= base_url('Auth/pembayaran'); ?>" class="btn btn-success btn-flat btn-sm mb-3">Bayar Tunai</a>
        <a href="<?= base_url('Menu/transfer'); ?>" class="btn btn-dark btn-flat btn-sm mb-3 ml-2">Tranfser</a>
      <!-- <form method="post" action="<?= base_url(''); ?>">
      <select name="metode_pembayaran" id="metode_pembayaran" class=" form-control">
                <option value="<?= set_value('metode_pembayaran');?>">--Metode pembayaran--</option>
                 <option>Tranfser</option>
                <option >Tunai</option>
                </select>
        </form>      -->

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>