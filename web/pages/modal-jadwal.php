<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Edit Jadwal</h4>
    </div>
    <div class="modal-body">
      <form action="proses/crud-jadwal.php" role="form" method="post" class="form-horizontal">
      <div class="form-group">
        <label class="col-sm-3 control-label">Judul</label>
        <div class="col-sm-7">
          <input type="text" name="id" value="<?php echo $row['id'] ?>" hidden>
          <input type="text" name="judul" class="form-control" value="<?php echo $row['judul'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Ustadz</label>
        <div class="col-sm-7">
          <input type="text" name="ustadz" class="form-control" value="<?php echo $row['ustadz'] ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Deskripsi</label>
        <div class="col-sm-7">
          <textarea type="text" name="deskripsi" class="md-textarea form-control" rows="3"><?php echo $row['deskripsi'] ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Tanggal</label>
        <div class="col-sm-4">
          <input id="date_picker" type="date" class="form-control" value="<?php echo $row['tanggal'] ?>">
          <input type="text" id="tanggal" name="tanggal" value="<?php echo $row['tanggal'] ?>" hidden>
        </div>
        <label class="col-sm-1 control-label">Hari</label>
        <div class="col-sm-2">
          <input type="text" id="hari" name="hari" class="form-control" value="<?php echo $row['hari'] ?>" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Jam</label>
        <div class="col-sm-3">
          <input type="text" id="timep" name="waktu" value="<?php echo $row['waktu'] ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Tempat</label>
        <div class="col-sm-7">
          <input type="text" name="tempat" value="<?php echo $row['tempat'] ?>" class="form-control">
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

<!-- timepicker -->
<script type="text/javascript">
document.getElementById("date_picker").addEventListener("input", myFunction);

  function myFunction() {
    var j = document.getElementById("tanggal");
    var f = document.getElementById("date_picker");
    var d = document.getElementById("hari");

    var date = new Date(f.value);
    var bulan = "";
    var tgl = "";
    if (date.getMonth()>9) {
      bulan = date.getMonth()+1;
    } else{
      bulan = "0"+(date.getMonth()+1);
    };

    if (date.getDate()>9) {
      tgl = date.getDate();
    }else{
      tgl = "0"+date.getDate();
    };

    j.value = date.getFullYear()+"-"+bulan+"-"+tgl;

    var weekday = new Array(7);
    weekday[0] = "Minggu";
    weekday[1] = "Senin";
    weekday[2] = "Selasa";
    weekday[3] = "Rabu";
    weekday[4] = "Kamis";
    weekday[5] = "Jumat";
    weekday[6] = "Sabtu";

    var n = weekday[date.getDay()];
    d.value = n;
  }

var timepicker = new TimePicker('timep', {
  lang: 'en',
  theme: 'dark'
});
timepicker.on('input', function(evt) {

  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});
</script>
<!-- timepicker end -->