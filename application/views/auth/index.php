<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/img/logo-mayasi.png'); ?>">
    <title> Selamat Datang Pada halaman Web Waroeng Mayasi</title>
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,700;1,400;1,700&display=swap" rel="stylesheet">
<!-- feather icon -->
<script src="https://unpkg.com/feather-icons"></script>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<!-- style saya -->
<link rel="stylesheet" href="<?= base_url('assets'); ?>/css/style.css?v=<?php echo time(); ?>">


<body>

<!-- navbar star -->
<nav class="navbar">
    <a href="#" 
    class="navbar-logo" data-aos="fade-down"data-aos-duration="2000" data-aos-delay="500"> Waroeng <span>Mayasi</span></a>
    <h1><?= $this->session->flashdata('message'); ?></h1>
    <div class="navbar-nav" data-aos="fade-down" data-aos-duration="2000">
    <a href="#home">Home</a>
    <!-- <a href="#about">About</a> -->
    <a href="<?= base_url('/Auth/daftarMenu'); ?>">Menu Kita</a>
    <a href="#contact">Kontak Kita</a>

    
    </div> 
    
    <div class="navbar-extra">
       
        <!-- <a href="#" id="search"><i data-feather="search"></i></a>
        <a href="#" id="shopping"><i data-feather="shopping-cart"></i></a> -->
        <a href="#" id="humburger-menu"><i data-feather="menu"></i></a>
        <a href="<?= base_url('Admin_login/admin'); ?>" id="log-in"><i data-feather="log-in">login</i></a>
        

    </div>
     
</nav>
<!-- navbarend -->


<!-- herosetion -->
<section class="hero" id="home">
            <main class="content" data-aos="fade-right"
                    data-aos-anchor="#example-anchor"
                    data-aos-offset="500"
                    data-aos-duration="2000">
                <h1>Mari Mengawali Hari Mu Dengan <span>Waroeng Mayasi</span></h1>
                <p>"Waroeng mayasi siap untuk memberikan santapan dan hidangan penambah semangat utnuk mengawali harimu"
                </p>
                <a href="<?= base_url('/Auth/daftarMenu'); ?>" class="cta">Pesan Makanan</a>
                <!-- <a href="<?= base_url('Konsumen'); ?>" class="btn btn-primary">login konsumen</a> -->
            </main>
<!-- heroend end -->

</section>

<!-- about me -->

<!-- <section id="about"  class="about" data-aos="zoom-out-up" data-aos-duration="2000">
    <h2><span>Tentang</span> Kami</h2>

<div class="row">
    <div class="about-img" data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
        <img src="<?= base_url('assets'); ?>/img/bg-tentang-kami.jpg" alt="Tentang Coffee">
    </div>
    <div class="content" data-aos="flip-right"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000" data-aos-delay="500">
        <h3>Kenapa harus Cerita Coffe?</h3>
        <p> karena cerita coffee ialah dipilh dari bahan pilihan
        dan diolah dengan tenaga ahli sehingga
        rasa yang di hadirkan selalu konsisten
         dan akan membuat pencintan coffee semakin ketagihan</p>
         <p>
            Selain itu cerita coffee mempunyai sejarah yang sangat
            panjang dan selalu diminati oleh orang yang sangan cinta coffee
             </p>
             <p>dengan pembuatan yang dipilih dari bahan premium sehingga cerita coffe sangat diminati dan sering mendapatkan juara</p>
    </div>
</div>
</section> -->

<!-- section about me end -->

<!-- menu section -->


<!-- <section id="menu" class="menu">
    <h2>Menu <span> Kita</span></h2>
    <p>
        menu kita sangat terjangkau dan 
        sesuai dengan dompet anak muda beli sekarang akan mendapatkan diskon 
    </p>
    <div class="row">
        <div class="menu-card">
            <img src="<?= base_url('assets'); ?>/img/menu/menu2.jpg"
            alt="sandwich" class="menu-card-img">
            <h3 class="menu-card-title">--sandwich--</h3>
            <p class="menu-card-price"> IDR 20k</p>
        </div>
        <div class="menu-card">
            <img src="<?= base_url('assets'); ?>/img/menu/menu3.jpg"
            alt="sandwich" class="menu-card-img">
            <h3 class="menu-card-title">--coffee spesial--</h3>
            <p class="menu-card-price"> IDR 15k</p>
        </div>
        <div class="menu-card">
            <img src="<?= base_url('assets'); ?>/img/menu/menu4.jpg"
            alt="sandwich" class="menu-card-img">
            <h3 class="menu-card-title">--Burger</h3>
            <p class="menu-card-price"> IDR 20k</p>
        </div>
        <div class="menu-card">
            <img src="<?= base_url('assets'); ?>/img/menu/menu06.jpg"
            alt="sandwich" class="menu-card-img">
            <h3 class="menu-card-title">--spagetty spesial--</h3>
            <p class="menu-card-price"> IDR 15k</p>
        </div>
      
    </div>
</section> -->

<!-- menu section end -->

<!-- contact section -->
    <section id="contact" class="contact">
        <h2> <span>  kontak kami</span></h2>
        <p> untuk kritik dan saran nya silahkan hubungin kontak kami disini</p>
        <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8176043648855!2d109.31479387383742!3d-0.03432503553678327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d58e295f12c7b%3A0xad9b7bdad6f30994!2sWaroeng%20Mayasi!5e0!3m2!1sid!2sid!4v1699935368112!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
            <form action="#">
                <div class="input-group">
                    <i data-feather="users"></i>
                    <input type="text" placeholder="Nama"> 
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" placeholder="Email"> 
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="Nomor Handphone"> 
                </div>
                <button type="submit" class="btn"> kirim pesan anda</button>
            </form>
        </div>

    </section>

<!-- contact section end -->

<!-- footerstart -->
 <footer>
    <div class="socials">
        <a href="#"><i data-feather="instagram"></i></a>
        <a href="#"><i data-feather="twitter"></i></a>
        <a href="#"><i data-feather="facebook"></i></a>

    </div>

    <div class="links">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kita</a>
        <a href="#menu">Menu Kita</a>
        <a href="#contact">Kontak</a>
    </div>

    <div class="credit">
        <P> create by syawal <a href="">sawaludin</a>. | &copy; 2023</P>
    </div>

 </footer>

<!-- footerstart -->




<!-- feater icons  -->
<script>
    feather.replace()
    </script>

<!-- feater icons end  -->

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init( {
        once: true,
    });
  </script>

  <!-- my java script -->
<script src="<?= base_url('assets'); ?>/js/script.js"></script>

</body>

</html>