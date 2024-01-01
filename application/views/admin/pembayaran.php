<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
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
                <a href="<?= base_url('Auth/menu_utama'); ?>" class="btn btn-danger btn-sm mb-3"><i data-feather="skip-back">Detail pesanan</i></a>
                <button type="submit" class="btn btn-success btn-sm mb-3">Bayar tunai</button>
            </form>
                  </div>
                  </div>
             </div>
     </div>
</div>
</div>
