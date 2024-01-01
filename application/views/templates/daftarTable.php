<!-- Modal edit data user -->
<?php foreach($tampilkan as $tmp): ?>

<div class="modal fade" id="edit<?= $tmp->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Admin_login/edit/' . $tmp->id ) ?>" method="post">
        <div class="form-group">
        <input type="text" class="form-control form-control-user"
          id="name" name="name" placeholder="Nama" value="<?= $tmp->name ?>" required auotofocus>
          <?= form_error('email','<small class =" text-danger pl-3 ">','</small>'); ?>
        </div>
        <div class="form-group">
        <input type="text" class="form-control form-control-user"
          id="email" name="email" placeholder="Email"value="<?= $tmp->email ?>">
          <?= form_error('email','<small class =" text-danger pl-3 ">','</small>'); ?>
        </div>
       <select name="akses_level" id="akses_level" class=" form-control">
        <option value="<?= $tmp->akses_level ?>">Akses level</option>
        <option>admin</option>
        <option >user</option>
       </select>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php endforeach ?>

