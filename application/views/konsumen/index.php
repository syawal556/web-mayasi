
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-lg-5">
      <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
               
                </div>
                    <div class="col-lg-">
                        <div class="p-5">
                            <div class="text-center">
                                <p class="text-dark mb-4">Anda harus inpu no tempat duduk dan nama untuk lanjutkan memesan</p>
                            </div>

                            <?= $this->session->flashdata('message'); ?>
                            <form class="user" method="post" action ="<?= base_url('konsumen'); ?>">
                            
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukan Nama Anda " value="<?= set_value('nama_pelanggan'); ?>">
                                        <?= form_error('nama_pelanggan','<small class =" text-danger pl-3 ">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user"
                                        id="no_meja" name="no_meja" placeholder="Masukan Meja Tempat duduk anda">
                                        <?= form_error('no_meja','<small class =" text-danger pl-3 ">','</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Lanjutkan Pesanan
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth'); ?>">Kembali halaman Utama</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
