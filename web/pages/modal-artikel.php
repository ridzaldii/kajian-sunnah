<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Edit Artikel</h4>
    </div>
    <div class="modal-body">
      <form action="proses/crud-artikel.php" role="form" method="post" class="form-horizontal">
      <div class="form-group">
        <label class="col-sm-3 control-label">Judul</label>
        <div class="col-sm-7">
          <input type="text" name="id" value="<?php echo $row['id'] ?>" hidden>
          <input type="text" name="judul" class="form-control" value="<?php echo $row['judul'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Pembicara</label>
        <div class="col-sm-7">
          <input type="text" name="pembicara" class="form-control" value="<?php echo $row['pembicara'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Deskripsi</label>
        <div class="col-sm-7">
          <textarea type="text" name="deskripsi" class="md-textarea form-control" rows="3"><?php echo $row['deskripsi'] ?></textarea>
        </div>
      </div>
      <div class="form-group">
          <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Kategori</label>
          <div class="col-lg-7">
            <?php 
              switch ($row['kategori']) {
                case 'aqidah':
                  ?>
                  <select name="kategori" class="form-control">
                    <option value="aqidah" selected>Aqidah</option>
                    <option value="fikih">Fikih</option>
                    <option value="tauhid">Tauhid</option>
                    <option value="tematik">Tematik</option>
                  </select>
                  <?php
                  break;
                case 'fikih':
                  ?>
                  <select name="kategori" class="form-control">
                    <option value="aqidah">Aqidah</option>
                    <option value="fikih" selected>Fikih</option>
                    <option value="tauhid">Tauhid</option>
                    <option value="tematik">Tematik</option>
                  </select>
                  <?php
                  break;
                case 'tauhid':
                  ?>
                  <select name="kategori" class="form-control">
                    <option value="aqidah">Aqidah</option>
                    <option value="fikih">Fikih</option>
                    <option value="tauhid" selected>Tauhid</option>
                    <option value="tematik">Tematik</option>
                  </select>
                  <?php
                  break;
                case 'tematik':
                  ?>
                  <select name="kategori" class="form-control">
                    <option value="aqidah">Aqidah</option>
                    <option value="fikih">Fikih</option>
                    <option value="tauhid">Tauhid</option>
                    <option value="tematik" selected>Tematik</option>
                  </select>
                  <?php
                  break;
                default:
                  # code...
                  break;
              }
             ?>
          </div>
      </div>
      <div class="position-center">
        <div class="text-center">
          <button type="submit" name="update" class="btn btn-primary">Update</button>
        </div>
      </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>