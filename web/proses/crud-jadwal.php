<?php 
	include "../connect.php";
	require 'pushNotif.php';

	$pushNotif = new pushNotif();

	if (isset($_POST['submit'])) {
		$judul 				= addslashes($_POST['judul']);
		$ustadz				= addslashes($_POST['ustadz']);
		$deskripsi			= addslashes($_POST['deskripsi']);
		$tanggal			= $_POST['tanggal'];
		$hari				= $_POST['hari'];
		$jam				= $_POST['waktu'].":00";
		$tempat 			= addslashes($_POST['tempat']);
		$rutin 				= $_POST['rutin'];
		$panitia			= addslashes($_POST['panitia']);
		$kontak				= $_POST['kontak'];

		$file		= time()."-".$_FILES['gambar']['name'];
		$filetmp 		= $_FILES['gambar']['tmp_name'];

		if(move_uploaded_file($filetmp, '../images/poster/'.$file)){
			$query 		= "INSERT INTO jadwal_kajian VALUES('', '$judul', '$ustadz','$deskripsi','$tanggal','$jam','$tempat','$rutin','$file','$panitia','$kontak')";

			$result 	= $conn->query($query);
			if ($result) {
				$last_id = $conn->insert_id;
				$Senin = ($hari=='Senin' ? 'Ya' : 'Tidak');
				$Selasa = ($hari=='Selasa' ? 'Ya' : 'Tidak');
				$Rabu = ($hari=='Rabu' ? 'Ya' : 'Tidak');
				$Kamis = ($hari=='Kamis' ? 'Ya' : 'Tidak');
				$Jumat = ($hari=='Jumat' ? 'Ya' : 'Tidak');
				$Sabtu = ($hari=='Sabtu' ? 'Ya' : 'Tidak');
				$Minggu = ($hari=='Minggu' ? 'Ya' : 'Tidak');
				$query1 = "INSERT INTO hari VALUES('','$last_id','$Senin','$Selasa','$Rabu','$Kamis','$Jumat','$Sabtu','$Minggu')";

				$result1 	= $conn->query($query1);
				if ($result1) {
					echo "<script>
							alert('Berhasil.');
							window.location='".$link."/jadwalkajian.php';
							</script>";
					$SendNotif = $pushNotif->push("Ada Jadwal Kajian Baru! ",$judul);
				}else{
					echo $conn->error;
				}
			}else{
				echo $conn->error;
			}
		}else{
			echo "Failed to upload file.";
		}
	} elseif (isset($_POST['submit1'])) {
		$judul 				= addslashes($_POST['judul']);
		$ustadz				= addslashes($_POST['ustadz']);
		$deskripsi			= addslashes($_POST['deskripsi']);
		$hari				= $_POST['shari'];
		$jam				= $_POST['waktu'].":00";
		$tempat 			= addslashes($_POST['tempat']);
		$rutin 				= $_POST['rutin'];
		$panitia			= addslashes($_POST['panitia']);
		$kontak				= $_POST['kontak'];

		$file		= time()."-".$_FILES['gambar']['name'];
		$filetmp 		= $_FILES['gambar']['tmp_name'];

		if(move_uploaded_file($filetmp, '../images/poster/'.$file)){
			$query 		= "INSERT INTO jadwal_kajian VALUES('', '$judul', '$ustadz','$deskripsi','','$jam','$tempat','$rutin','$file','$panitia','$kontak')";

			$result 	= $conn->query($query);
			if ($result) {
				$Senin = null; $Selasa = null; $Rabu = null; $Kamis = null; $Jumat = null; $Sabtu = null; $Minggu = null;			
				foreach ($hari as $key) {
					if ($Senin==null && $key=='Senin') {
						$Senin = ($key=='Senin' ? 'Ya' : 'Tidak');
					} elseif ($Selasa==null && $key=='Selasa') {
						$Selasa = ($key=='Selasa' ? 'Ya' : 'Tidak');
					} elseif ($Rabu==null && $key=='Rabu') {
						$Rabu = ($key=='Rabu' ? 'Ya' : 'Tidak');
					} elseif ($Kamis==null && $key=='Kamis') {
						$Kamis = ($key=='Kamis' ? 'Ya' : 'Tidak');
					} elseif ($Jumat==null && $key=='Jumat') {
						$Jumat = ($key=='Jumat' ? 'Ya' : 'Tidak');
					} elseif ($Sabtu==null && $key=='Sabtu') {
						$Sabtu = ($key=='Sabtu' ? 'Ya' : 'Tidak');
					} elseif ($Minggu==null && $key=='Minggu') {
						$Minggu = ($key=='Minggu' ? 'Ya' : 'Tidak');
					}
				}	
				$Senin = ($Senin == null ? 'Tidak' : $Senin);
				$Selasa = ($Selasa == null ? 'Tidak' : $Selasa);
				$Rabu = ($Rabu == null ? 'Tidak' : $Rabu);
				$Kamis = ($Kamis == null ? 'Tidak' : $Kamis);
				$Jumat = ($Jumat == null ? 'Tidak' : $Jumat);
				$Sabtu = ($Sabtu == null ? 'Tidak' : $Sabtu);
				$Minggu = ($Minggu == null ? 'Tidak' : $Minggu);
				$last_id = $conn->insert_id;
				$query1 = "INSERT INTO hari VALUES('','$last_id','$Senin','$Selasa','$Rabu','$Kamis','$Jumat','$Sabtu','$Minggu')";

				$result1 	= $conn->query($query1);
				if ($result1) {
					echo "<script>
							alert('Berhasil.');
							window.location='".$link."/jadwalkajian.php';
							</script>";
					$SendNotif = $pushNotif->push("Ada Jadwal Kajian Baru! ",$judul);
				}else{
					echo $conn->error;
				}
			}else{
				echo $conn->error;
				echo "error";
			}
		}else{
			echo "Failed to upload file.";
		}
	} elseif (isset($_GET['hapus'])) {
		$query = "DELETE FROM jadwal_kajian WHERE id='".$_GET['hapus']."'";
		$set0		= "SET FOREIGN_KEY_CHECKS=0";
		$set1		= "SET FOREIGN_KEY_CHECKS=1";

		$conn->query($set0);
		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil dihapus');
						window.location='".$link."/jadwalkajian.php';
						</script>";
		$conn->query($set1);
		}else{
			echo $conn->error;
			$conn->query($se1);
			echo "error";
		}
	} elseif (isset($_POST['update'])) {
		$judul 				= addslashes($_POST['judul']);
		$ustadz				= addslashes($_POST['ustadz']);
		$deskripsi			= addslashes($_POST['deskripsi']);
		$tanggal		= $_POST['tanggal'];
		$hari				= $_POST['hari'];
		$jam		= $_POST['waktu'].":00";
		$tempat 			= addslashes($_POST['tempat']);
		$panitia			= addslashes($_POST['panitia']);
		$kontak		= $_POST['kontak'];

		$query 		= "UPDATE jadwal_kajian SET judul='$judul',ustadz='$ustadz',deskripsi='$deskripsi',tanggal='$tanggal',waktu='$jam',tempat='$tempat',panitia='$panitia',kontak='$kontak' WHERE id='$id' ";

		$result 	= $conn->query($query);
		if ($result) {
			$Senin = ($hari=='Senin' ? 'Ya' : 'Tidak');
			$Selasa = ($hari=='Selasa' ? 'Ya' : 'Tidak');
			$Rabu = ($hari=='Rabu' ? 'Ya' : 'Tidak');
			$Kamis = ($hari=='Kamis' ? 'Ya' : 'Tidak');
			$Jumat = ($hari=='Jumat' ? 'Ya' : 'Tidak');
			$Sabtu = ($hari=='Sabtu' ? 'Ya' : 'Tidak');
			$Minggu = ($hari=='Minggu' ? 'Ya' : 'Tidak');
			$query1 = "UPDATE hari SET Senin='$Senin',Selasa='$Selasa',Rabu='$Rabu',Kamis='$Kamis',Jumat='$Jumat',Sabtu='$Sabtu',Minggu='$Minggu' WHERE id_jadwal='$id'";

			$result1 	= $conn->query($query1);
			if ($result1) {
				echo "<script>
						alert('Berhasil Diperbaharui.');
						window.location='".$link."/jadwalkajian.php';
						</script>";
					$SendNotif = $pushNotif->push("Ada Perubahan Jadwal Kajian ", $judul);
			}else{
				echo $conn->error;
			}
		}else{
			echo $conn->error;
			echo "error";
		}
	} elseif (isset($_POST['update1'])) {
		$id 	= $_POST['id'];
		$judul 				= $_POST['judul'];
		$ustadz		= $_POST['ustadz'];
		$deskripsi			= $_POST['deskripsi'];
		$tanggal		= $_POST['tanggal'];
		$hari				= $_POST['shari'];
		$jam		= $_POST['waktu'].":00";
		$tempat 				= $_POST['tempat'];
		$panitia			= $_POST['panitia'];
		$kontak		= $_POST['kontak'];

		$query 		= "UPDATE jadwal_kajian SET judul='$judul',ustadz='$ustadz',deskripsi='$deskripsi',tanggal='$tanggal',waktu='$jam',tempat='$tempat',panitia='$panitia',kontak='$kontak' WHERE id='$id' ";

		$result 	= $conn->query($query);
		if ($result) {
			$Senin = null; $Selasa = null; $Rabu = null; $Kamis = null; $Jumat = null; $Sabtu = null; $Minggu = null;			
			foreach ($hari as $key) {
				if ($Senin==null && $key=='Senin') {
					$Senin = ($key=='Senin' ? 'Ya' : 'Tidak');
				} elseif ($Selasa==null && $key=='Selasa') {
					$Selasa = ($key=='Selasa' ? 'Ya' : 'Tidak');
				} elseif ($Rabu==null && $key=='Rabu') {
					$Rabu = ($key=='Rabu' ? 'Ya' : 'Tidak');
				} elseif ($Kamis==null && $key=='Kamis') {
					$Kamis = ($key=='Kamis' ? 'Ya' : 'Tidak');
				} elseif ($Jumat==null && $key=='Jumat') {
					$Jumat = ($key=='Jumat' ? 'Ya' : 'Tidak');
				} elseif ($Sabtu==null && $key=='Sabtu') {
					$Sabtu = ($key=='Sabtu' ? 'Ya' : 'Tidak');
				} elseif ($Minggu==null && $key=='Minggu') {
					$Minggu = ($key=='Minggu' ? 'Ya' : 'Tidak');
				}
			}	
			$Senin = ($Senin == null ? 'Tidak' : $Senin);
			$Selasa = ($Selasa == null ? 'Tidak' : $Selasa);
			$Rabu = ($Rabu == null ? 'Tidak' : $Rabu);
			$Kamis = ($Kamis == null ? 'Tidak' : $Kamis);
			$Jumat = ($Jumat == null ? 'Tidak' : $Jumat);
			$Sabtu = ($Sabtu == null ? 'Tidak' : $Sabtu);
			$Minggu = ($Minggu == null ? 'Tidak' : $Minggu);
			$query1 = "UPDATE hari SET Senin='$Senin',Selasa='$Selasa',Rabu='$Rabu',Kamis='$Kamis',Jumat='$Jumat',Sabtu='$Sabtu',Minggu='$Minggu' WHERE id_jadwal='$id'";

			$result1 	= $conn->query($query1);
			if ($result1) {
				echo "<script>
						alert('Berhasil.');
						window.location='".$link."/jadwalkajian.php';
						</script>";
					$SendNotif = $pushNotif->push("Ada Perubahan Jadwal Kajian ", $judul);
			}else{
				echo $conn->error;
			}
		}else{
			echo $conn->error;
			echo "error";
		}
	}
 ?>