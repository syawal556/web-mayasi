<body>
<?php foreach ($daftarMenu as $daftar) : ?>
<div class="display">
<div class="container-fluid">
<div class="card">
    <div class="img-card">
            <img src="<?php echo base_url().'/uploads/'. $daftar->gambar ?>" class="img">
    </div>
    <div class="content-text">
        <h2 class="nama-menu"><?php echo $daftar->nama_menu ?></h2>
        <h4 class="nama"><?php echo $daftar->keterangan ?></h4>
        <h2 class="harga">Rp. <?php echo number_format($daftar->harga_menu, 0,',','.')  ?></h2>
        <br>
        <?php if($daftar->harga_menu == 0) {?>
          <div class="btn-block">
            <a href="" class="btn-order"> <span class="span">Order</span> </a>
        </div>
         <?php } else{?>
          <!-- <div class="btn-block">
          <a href="<?= base_url('Auth/pesanan/'.$daftar->id); ?>" class="btn-order"> <span class="span">Order</span> </a> -->
        </div>
         <?php  }?> 
        <!-- <div class="btn-block">
            <button type="button" class="btn btn-success swalDefaultSuccess" class="btn-order"> <span class="span">Order</span> </button>
        </div> -->
        <div class="btn-block">
            <a href="<?= base_url('Auth/pesanan/'.$daftar->id); ?>" class="btn-order"> <span class="span">Order</span> </a>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php endforeach; ?>

<script src="<?= base_url('assets'); ?>/plugins2/sweetalert2/sweetalert2.min.js"></script>
<script>
  $(function() {
                var Toast = Swal.mixin({
                     toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                        });

                        $('.swalDefaultSuccess').click(function() {
                        Toast.fire({
                            icon: 'success',
                            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                        })
                    });
                });
</script>