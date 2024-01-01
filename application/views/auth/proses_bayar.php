
<?php 
$user = $this->db->get_where('tbl_pesanan',['Status_bayar'])->row_array();

?>

<?php if($user == 0) {?>
        <div class="container-dluid">
                    <div class="alert alert-success">
                    <p> <h3 class="text-center align-middle">Pesanan anda telah diterima, Selesaikan Pembayaran anda!!!!</h3> </p>
                    </div>
            </div>
 <?php } else{?>
        <div class="container-dluid">
                    <div class="alert alert-success">
                    <p> <h3 class="text-center align-middle">Pesanan anda telah diterima!!!!</h3> </p>
                    </div>
            </div>

<?php  }?>
        

