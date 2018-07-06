<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Poster <?php echo $row['judul']; ?></h4>
    </div>
    <div class="modal-body">
      <form action="" role="form" method="post" class="form-horizontal">
      <div class="position-center">
        <div class="text-center">
          <img width="200px" src="images/poster/<?php echo $row['gambar']; ?>" alt="<?php echo $row['gambar'] ?>">
        </div>
      </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>