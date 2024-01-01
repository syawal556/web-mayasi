
<div class="container">
<div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Tambah Menu Baru</h1>
                    </div>
                    <?php echo form_open_multipart('Menu/do_input');?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_menu" name="nama_menu"
                                placeholder="Masukan Nama Menu" value="<?= set_value('nama_menu'); ?>" required auotofocus>   
                        </div>
                        <div class="form-group">
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="<?= set_value('kategori');?>">--Kategori Menu--</option>
                                    <option>Makanan</option>
                                    <option >Minuman</option>
                                    <option >Cemilan</option>
                             </select>    
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Menu</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"value="<?= set_value('keterangan'); ?>"></textarea>
                            </div>
        
                         <div class="form-group">  
                            <input type="text" class="form-control" id="harga_menu" name="harga_menu" placeholder="Masukan Harga" required auotofocus>
                        </div>      
                        <div class="form-group">
                            <input type="file" class="form-control" id="gambar" name="gambar"
                             placeholder="gambar" required auotofocus>
                             <hr>
                         </div> 
                        <button type="submit" class="btn btn-primary">
                            Tambah Menu
                        </button> 
                        <a  class="btn btn-danger text-center" href="<?= base_url('Menu'); ?>">Batal</a>
                    <?php echo form_close(); ?>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php echo form_open_multipart('menu/do_input');?>
    <label for="nama_menu">Nama Menu:</label>
    <input type="text" name="nama_menu" required>
    <br><br>
    <label for="harga_menu">Harga Menu:</label>
    <input type="number" name="harga_menu" required>
    <br><br>
    <label for="keterangan">Keterangan:</label>
    <textarea name="keterangan"></textarea>
    <br><br>
    <label for="gambar">Gambar:</label>
    <input type="file" name="gambar" required>
    <br><br>
    <input type="submit" value="Simpan">
</form>
</body>
</html> -->