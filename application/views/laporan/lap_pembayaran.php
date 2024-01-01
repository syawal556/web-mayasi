
<div class="card-body text-center">
    <div class="card-header">
        <h2> <strong><?= $title ?> </strong></h2>
    </div>
</div> 

<div class="row ml-2 mr-2">
<div class="col-md-6 text-center">
<div class="card card-success">
        <div class="card-header">
        <h4 class="card-title"> Laporan Harian Pembayaran Tunai</h4>
        </div>
        <div class="card-body">
        <?php echo form_open('Laporan/lap_bayar_harian') ?>
        <div class="row text-center" >
                <div class="col-4">
                    <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                   <select name="tanggal" class="form-control">
                    <?php 
                        $mulai =1;
                        for ($i = $mulai; $i < $mulai + 31 ; $i++) { 
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                   </select>
                    </div>
                </div>
                <div class="col-4">
                <div class="form-group">
                    <label for="bulan">Bulan</label>
                   <select name="bulan" class="form-control">
                   <?php 
                        $mulai =1;
                        for ($i = $mulai; $i < $mulai + 12 ; $i++) { 
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                    </select>
                 </div>
                </div>

                <div class="col-4">
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                   <select name="tahun" class="form-control">
                   <?php 
                        $mulai = Date('Y');
                        for ($i = $mulai; $i < $mulai + 8 ; $i++) { 
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                   </select>
                </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                    <button type="submit" class="btn btn-success btn-flat btn-sm"> Cetak Laporan</button>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
     </div>
</div>

<div class="col-md-6 text-center">
<div class="card card-success">
        <div class="card-header">
        <h4 class="card-title"> Laporan Pembayaran Transfer</h4>
        </div>
        <div class="card-body">
        <?php echo form_open('Laporan/lap_transfer_harian') ?>
        <div class="row text-center" >
                <div class="col-4">
                    <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                   <select name="tanggal" class="form-control">
                    <?php 
                        $mulai =1;
                        for ($i = $mulai; $i < $mulai + 31 ; $i++) { 
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                   </select>
                    </div>
                </div>
                <div class="col-4">
                <div class="form-group">
                    <label for="bulan">Bulan</label>
                   <select name="bulan" class="form-control">
                   <?php 
                        $mulai =1;
                        for ($i = $mulai; $i < $mulai + 12 ; $i++) { 
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                    </select>
                 </div>
                </div>

                <div class="col-4">
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                   <select name="tahun" class="form-control">
                   <?php 
                        $mulai = Date('Y');
                        for ($i = $mulai; $i < $mulai + 8 ; $i++) { 
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                   </select>
                </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                    <button type="submit" class="btn btn-success btn-flat btn-sm"> Cetak Laporan </button>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
     </div>

</div>
<!-- <div class="col-md-4 text-center">
<div class="card card-success">
        <div class="card-header">
        <h4 class="card-title"> Laporan Pesanan Batal</h4>
        </div>
        <div class="card-body">
        <?php echo form_open('Laporan/lap_pesan_batal') ?>
        <div class="row text-center" >
                <div class="col-6">
                <div class="form-group">
                    <label for="bulan">Bulan</label>
                   <select name="bulan" class="form-control">
                   <?php 
                        $mulai =1;
                        for ($i = $mulai; $i < $mulai + 12 ; $i++) { 
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                    </select>
                 </div>
                </div>

                <div class="col-6">
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                   <select name="tahun" class="form-control">
                   <?php 
                        $mulai = Date('Y');
                        for ($i = $mulai; $i < $mulai + 8 ; $i++) { 
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                   </select>
                </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                    <button type="submit" class="btn btn-success btn-flat btn-sm"> Cetak Laporan </button>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
     </div>
</div> -->

</div>




