<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Edit Rekaman</h4>
    </div>
    <div class="modal-body">
      <form action="proses/crud-rekaman.php" role="form" method="post" class="form-horizontal" enctype="multipart/form-data">
      <div class="form-group">
        <label class="col-sm-3 control-label">Judul Kajian</label>
        <div class="col-sm-7">
          <input type="text" name="id" value="<?php echo $row['id'] ?>" hidden>
          <input type="text" name="judul" class="form-control" value="<?php echo $row['judul'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">File Rekaman</label>
        <div class="col-sm-4">
          <input type="text" name="aa" class="form-control" 
                value="<?php 
                          if (file_exists("file/".$row['rekaman'])==1) {
                            echo $row['rekaman'];
                          } else{
                            echo "File Tidak Ditemukan";
                        }?>">
        </div>
        <div class="col-sm-3">
          <?php 
            if (file_exists("file/".$row['rekaman'])==1) {
              echo "<input type='file' name='rekaman' class='form-control' >";
            } else{
              echo "<input type='file' name='rekaman' class='form-control' required>";
          }?>
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