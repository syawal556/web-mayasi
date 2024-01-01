
<nav class="navbar">
    <a href="#" 
    class="navbar-logo"> Waroeng <span>Mayasi</span></a>


    <div class="navbar-nav">
    <a href="<?= base_url('Auth'); ?>">Home</a>
    <a href="<?= base_url('Auth/daftarMenu'); ?>">Menu Kita</a>
    </div> 

    <div class="navbar-extra" align="right">
    <a href="#" id="humburger-menu"><i data-feather="menu"></i></a>
        <li data-aos="fade-down" data-aos-duration="1000">
            <h1>
            <?php 
              $daftar = "Klik Disini: ".$this->cart->total_items().  " Detail Pesanan"
              
              ?>
                <?php echo anchor('Auth/menu_utama', $daftar )  ?>
            </h1> 
        </li>
        
        </ul>
    </div>
   
</nav>