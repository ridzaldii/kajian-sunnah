<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Edit Artikel</h4>
    </div>
    <div class="modal-body">
      <form action="proses/crud-donasi.php" role="form" method="post" class="form-horizontal">
      <div class="form-group">
        <label class="col-sm-3 control-label">Gambar</label>
        <div class="col-sm-7">
          <img width="200px" src="images/donasi/<?php echo $row['gambar']; ?>" alt="<?php echo $row['gambar'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Kontak</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" value="+62" disabled>
        </div>
        <div class="col-sm-5">
          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
          <input type="text" name="kontak" class="form-control" value="<?php echo $row['kontak'] ?>">
        </div>
      </div>
      <div class="form-group">
          <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Telepon</label>
          <div class="col-lg-6">
            <?php 
              if ($row['telfon']==1) {
                ?> 
                <label class="radio-inline">
                    <input type="radio" name="telfon" id="radio11" value="1" checked> Ya
                </label>
                <label class="radio-inline">
                    <input type="radio" name="telfon" id="radio12" value="0"> Tidak
                </label>
                <?php
              } else {
                ?> 
                <label class="radio-inline">
                    <input type="radio" name="telfon" id="radio11" value="1"> Ya
                </label>
                <label class="radio-inline">
                    <input type="radio" name="telfon" id="radio12" value="0" checked> Tidak
                </label>
                <?php
              }
             ?>
              
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">WhatsApp</label>
          <div class="col-lg-6">
            <?php 
              if ($row['wa']==1) {
                ?> 
                <label class="radio-inline">
                    <input type="radio" name="wa" id="radio11" value="1" checked> Ya
                </label>
                <label class="radio-inline">
                    <input type="radio" name="wa" id="radio12" value="0"> Tidak
                </label>
                <?php
              } else {
                ?> 
                <label class="radio-inline">
                    <input type="radio" name="wa" id="radio11" value="1"> Ya
                </label>
                <label class="radio-inline">
                    <input type="radio" name="wa" id="radio12" value="0" checked> Tidak
                </label>
                <?php
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