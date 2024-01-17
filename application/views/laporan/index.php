
<div class="card-body text-center">
    <div class="card-header">
        <h2> <strong><?= $title ?> </strong></h2>
    </div>
</div> 

<div class="row ml-2 mr-2">
<div class="col-md-4">
<div class="card card-success">
        <div class="card-header">
        <h4 class="card-title"> Laporan Harian</h4>
        </div>
        <div class="card-body">
        <?php echo form_open('Laporan/lap_harian') ?>
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
                        $mulai = 2023;
                        for ($i = $mulai; $i < $mulai + 8 ; $i++) { 
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                   </select>
                </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                    <button type="submit" class="btn btn-success btn-flat btn-sm" target="_blank"> Laporan Harian</button>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
     </div>
</div>

<div class="col-md-4">
    <div class="card card-primary">
        <div class="card-header">
        <h4 class="card-title"> Laporan Bulanan</h4>
        </div>
    <div class="card-body">
        <?php echo form_open('Laporan/lap_bulanan') ?>
        <div class="row" align="center">
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
                        $mulai = 2023;
                        for ($i = $mulai; $i < $mulai + 8 ; $i++) { 
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                   </select>
                </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                    <button type="submit" class="btn btn-success btn-flat btn-sm">Laporan Bulanan</button>
                    </div>
                </div>
        </div>
        <?php echo form_close() ?>
    </div>
    </div> 

</div>

<div class="col-md-4">
    <div class="card card-primary">
        <div class="card-header">
        <h4 class="card-title"> Laporan Tahunan</h4>
        </div>
        <div class="card-body">
        <?php echo form_open('Laporan/lap_tahunan') ?>
    <div class="row text-center" >
    <div class="col-12">
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                   <select name="tahun" class="form-control">
                   <?php 
                        $mulai = 2023;
                        for ($i = $mulai; $i < $mulai + 8 ; $i++) { 
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                    ?>
                   </select>
                </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                    <button type="submit" class="btn btn-success btn-flat btn-sm"> Laporan Tahunan</button>
                    </div>
                </div>

        </div>
    </div>
    <?php echo form_close() ?>

    </div>
   
</div>
</div>

<style>
        @media print{
            .btn {
                display: none;
            }
        }

</style>

