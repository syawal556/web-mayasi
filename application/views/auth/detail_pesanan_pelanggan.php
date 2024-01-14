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
<a href="" class="btn btn-info btn-flat btn-sm mb-3" data-toggle="modal" data-target="#exampleModal1">Tambah Pesanan</a>
<a href="<?= base_url('auth/pembayaran'); ?>" class="btn btn-primary btn-flat btn-sm mb-3" data-toggle="modal" data-target="#exampleModal"><i data-feather="check-circle"></i> Proses pesanan</a>
<?php echo form_close(); ?>
<br>
<h4 class="mt-3">Ketentuan:</h4>
<span> - Silahkan klik tombol update pesanan untuk menambahkan jumlah QTY pesanan yang diinginkan</span>
<br> 
<span> - Tombol Hapus Semua Pesanan akan otomatis Mengahpus Semua total dan jumlah Pesanan</span>
<br>
<span> - Untuk menghapus Salah Satu Pesanan Maka Pilih tombol icon hapus</span>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Data Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">

      <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-12 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
        <div class="btn-btn-sm btn-info">
            <?php 
            $grand_total = 0;
            if ($daftar = $this->cart->contents())
            {
                foreach($daftar as $items)
                {
                    $grand_total = $grand_total + $items['subtotal'];

                }
                echo "<h4> Total Bayar : Rp. ".number_format($grand_total,0,',','.');
            } ?>
        </div>
        </div>
             <h5 class="text-center"> Silahkan Masukan Nama dan Nomor Meja anda</h5>
             <?= $this->session->flashdata('message'); ?>
             <form method="post" action="<?= base_url('Auth/proses_pesanan'); ?>">
            <div class="form-group">
             <input type="text" class="form-control form-control-user" id="nama_pelanggan" name="nama_pelanggan"
                placeholder="Masukan nama anda" required>
                </div>
            <div class="form-group">
             <input type="text" class="form-control form-control-user" id="no_meja" name="no_meja"
                placeholder="Meja tampat duduk anda" required>
                </div>
                <div class="mb-3">
                 <label for="exampleFormControlTextarea1" class="form-label">Catatan Pesanan (optional) <br>Jika Tidak ada Tambahakan tanda strip -</label>
                 <textarea class="form-control" id="catatan" name="catatan"  placeholder="catatan pesanan" rows="3"value="<?= set_value('catatan'); ?>"></textarea>
                 </div>
                <a href="<?= base_url('Auth/menu_utama'); ?>" class="btn btn-danger btn-sm mb-3">Batal</a>
                <button type="submit" class="btn btn-success btn-sm mb-3">Pesan</button>
            </form>
                  </div>
                  </div>
             </div>
     </div>
</div>
</div>

        <!-- <a href="<?= base_url('Auth/pembayaran'); ?>" class="btn btn-success btn-flat btn-sm mb-3">Bayar Tunai</a>
        <a href="<?= base_url('Menu/transfer'); ?>" class="btn btn-dark btn-flat btn-sm mb-3 ml-2">Tranfser</a> -->
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



<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        
      <?php foreach ($daftarMenu as $daftar) : ?>
        <div class="card" style="width: 28rem;">
        <img class="card-img-top" src="<?php echo base_url().'/uploads/'. $daftar->gambar ?>" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"><?php echo $daftar->nama_menu ?></h5>
        <p class="card-text"><?php echo $daftar->keterangan ?></p>
        <a href="<?= base_url('Auth/Tambah_pesanan/'.$daftar->id); ?>" class="btn btn-primary">Pesan</a>
        </div>
        <?php endforeach; ?>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>