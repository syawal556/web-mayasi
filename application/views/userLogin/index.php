
<?php 

$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "web-mayasi";

// Buat koneksi
$koneksi = mysqli_connect('localhost', 'root', '', 'web-mayasi');

// Buat koneksi ke database
// $koneksi = mysqli_connect("localhost", "username", "password", "nama_database");

// Perintah SQL untuk menghitung jumlah data di dalam tabel
$sql = "SELECT COUNT(*) FROM tbl_pesanan WHERE status_pesanan=0" ;

// Jalankan perintah SQL dan simpan hasilnya ke dalam variabel
$hasil = mysqli_query($koneksi, $sql);

// Ambil hasil perhitungan dan simpan ke dalam variabel
$jumlah_data = mysqli_fetch_array($hasil)[0];

// Tampilkan hasil perhitungan
// echo "Jumlah data di dalam tabel pegawai adalah: " . $jumlah_data;
?>


<!-- Begin Page Content -->
<div class="container-fluid">
     <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            <div class="text-xs font-weight-bold text-success text-center text-uppercase mb-1">
                                             <h5>Pesanan Masuk</h5>
                                        </div>                                
                                              <div class="h3 text-center mb-0 font-weight-bold text-gray-800"> <?= $jumlah_data ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>


</div>
</div>
</div>