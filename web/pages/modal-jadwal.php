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
          <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Rutin</label>
          <div class="col-lg-6">
            <select id="rutin" name="rutin" onchange="functionChange()" class="form-control" disabled>
              <?php if ($row['rutin']=='Ya') {
                ?>
                <option value="Ya" selected>Ya</option>
                <option value="Tidak">Tidak</option>
                <?php
              } elseif ($row['rutin']=='Tidak') {
                ?>
                <option value="Ya">Ya</option>
                <option value="Tidak" selected>Tidak</option>
                <?php
              } ?>
            </select>
          </div>
      </div>
      <?php if ($row['rutin']=='Ya') {
        ?>
      <div class="form-group" id="inTgl" style="display:none">
        <?php
      } elseif ($row['rutin']=='Tidak') {
        ?>
      <div class="form-group" id="inTgl">
        <?php
      } ?>
        <label class="col-sm-3 control-label">Tanggal</label>
        <div class="col-sm-4">
          <input id="date_picker<?php echo $row['id'];?>" type="date" class="form-control" value="<?php echo $row['tanggal'] ?>">
          <input type="text" id="tanggal<?php echo $row['id'];?>" name="tanggal" value="<?php echo $row['tanggal'] ?>" hidden>
        </div>
        <label class="col-sm-1 control-label">Hari</label>
        <div class="col-sm-2">
          <?php 
            $query1 = "SELECT * FROM hari WHERE id_jadwal = ".$row['id'];
              $result1 = $conn->query($query1);
              ?>
              <input type="text" id="hari<?php echo $row['id'];?>" name="hari" class="form-control" value="<?php 
                while ($row1 = $result1->fetch_assoc()) {
                  if ($row1['Senin']=='Ya') {
                    echo 'Senin';
                  } elseif ($row1['Selasa']=='Ya') {
                    echo 'Selasa';
                  } elseif ($row1['Rabu']=='Ya') {
                    echo 'Rabu';
                  } elseif ($row1['Kamis']=='Ya') {
                    echo 'Kamis';
                  } elseif ($row1['Jumat']=='Ya') {
                    echo 'Jumat';
                  } elseif ($row1['Sabtu']=='Ya') {
                    echo 'Sabtu';
                  } elseif ($row1['Minggu']=='Ya') {
                    echo 'Minggu';
                  } 
                }
              ?>" readonly>
        </div>
      </div>
      <?php if ($row['rutin']=='Ya') {
        ?>
      <div class="form-group" id="inHari">
        <?php
      } elseif ($row['rutin']=='Tidak') {
        ?>
      <div class="form-group" id="inHari" style="display:none">
        <?php
      } ?>
        <label class="col-sm-3 control-label">Hari</label>
        <div class="col-lg-6">
            <?php 
              $query1 = "SELECT * FROM hari WHERE id_jadwal = ".$row['id'];
              $result1 = $conn->query($query1);
              while ($row1 = $result1->fetch_assoc()) {
                if ($row1['Senin']=='Ya') {
                  ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="shari[]" id="shari" value="Senin" checked>Senin
                  </label>
                  <?php
                } else {
                  ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="shari[]" id="shari" value="Senin">Senin
                  </label>
                  <?php
                } 
                if ($row1['Selasa']=='Ya') {
                  ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="shari[]" id="shari" value="Selasa" checked>Selasa
                  </label>
                  <?php
                } else {
                  ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="shari[]" id="shari" value="Selasa">Selasa
                  </label>
                  <?php
                }
                if ($row1['Rabu']=='Ya') {
                  ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="shari[]" id="shari" value="Rabu" checked>Rabu
                  </label>
                  <?php
                } else {
                  ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="shari[]" id="shari" value="Rabu">Rabu
                  </label>
                  <?php
                }
                if ($row1['Kamis']=='Ya') {
                  ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="shari[]" id="shari" value="Kamis" checked>Kamis
                  </label>
                  <?php
                } else {
                  ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="shari[]" id="shari" value="Kamis">Kamis
                  </label>
                  <?php
                }
                if ($row1['Jumat']=='Ya') {
                  ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="shari[]" id="shari" value="Jumat" checked>Jumat
                  </label>
                  <?php
                } else {
                  ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="shari[]" id="shari" value="Jumat">Jumat
                  </label>
                  <?php
                }
                if ($row1['Sabtu']=='Ya') {
                  ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="shari[]" id="shari" value="Sabtu" checked>Sabtu
                  </label>
                  <?php
                } else {
                  ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="shari[]" id="shari" value="Sabtu">Sabtu
                  </label>
                  <?php
                }
                if ($row1['Minggu']=='Ya') {
                  ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="shari[]" id="shari" value="Minggu" checked>Minggu
                  </label>
                  <?php
                } else {
                  ?>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="shari[]" id="shari" value="Minggu">Minggu
                  </label>
                  <?php
                }
              } ?>
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
      <div class="form-group">
        <label class="col-sm-3 control-label">Nama Panitia</label>
        <div class="col-sm-7">
          <input type="text" name="panitia" value="<?php echo $row['panitia'] ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">Kontak</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" value="+62" disabled>
        </div>
        <div class="col-sm-5">
          <input type="text" name="kontak" class="form-control" value="<?php echo $row['kontak'] ?>">
        </div>
      </div>
      <div class="position-center">
        <div class="text-center">
          <?php if ($row['rutin']=='Ya') {
            ?>
            <button type="submit" id="submit" name="update1" class="btn btn-primary">Update</button>
            <?php
          } elseif ($row['rutin']=='Tidak') {
            ?>
            <button type="submit" id="submit" name="update" class="btn btn-primary">Update</button>
            <?php
          } ?>
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
document.getElementById("date_picker<?php echo $row['id'];?>").addEventListener("input", myFunction);

  function myFunction() {
    var j = document.getElementById("tanggal<?php echo $row['id'];?>");
    var f = document.getElementById("date_picker<?php echo $row['id'];?>");
    var d = document.getElementById("hari<?php echo $row['id'];?>");

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