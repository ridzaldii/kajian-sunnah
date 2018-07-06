<?php 
	include "../connect.php";

	if (isset($_POST['submit'])) {
		$judul 				= $_POST['judul'];
		$ustadz		= $_POST['ustadz'];
		$deskripsi			= $_POST['deskripsi'];
		$tanggal		= $_POST['tanggal'];
		$hari				= $_POST['hari'];
		$jam		= $_POST['waktu'].":00";
		$tempat 				= $_POST['tempat'];
		$rutin 				= $_POST['rutin'];

		$file		= time()."-".$_FILES['gambar']['name'];
		$filetmp 		= $_FILES['gambar']['tmp_name'];

		if(move_uploaded_file($filetmp, '../images/poster/'.$file)){
			$query 		= "INSERT INTO jadwal_kajian VALUES('', '$judul', '$ustadz','$deskripsi','$tanggal','$jam','$hari','$tempat','$rutin','$file')";

			$result 	= $conn->query($query);
			if ($result) {
				echo "<script>
							alert('Berhasil.');
							window.location='".$link."/jadwalkajian.php';
							</script>";
			}else{
				echo $conn->error;
				echo "error";
			}
		}else{
			echo "Failed to upload file.";
		}
	} elseif (isset($_POST['submit1'])) {
		$judul 				= $_POST['judul'];
		$ustadz		= $_POST['ustadz'];
		$deskripsi			= $_POST['deskripsi'];
		$hari				= $_POST['shari'];
		$jam		= $_POST['waktu'].":00";
		$tempat 				= $_POST['tempat'];
		$rutin 				= $_POST['rutin'];

		$file		= time()."-".$_FILES['gambar']['name'];
		$filetmp 		= $_FILES['gambar']['tmp_name'];

		if(move_uploaded_file($filetmp, '../images/poster/'.$file)){
			$query 		= "INSERT INTO jadwal_kajian VALUES('', '$judul', '$ustadz','$deskripsi','','$jam','$hari','$tempat','$rutin','$file')";

			$result 	= $conn->query($query);
			if ($result) {
				echo "<script>
							alert('Berhasil');
							window.location='".$link."/jadwalkajian.php';
							</script>";
			}else{
				echo $conn->error;
				echo "error";
			}
		}else{
			echo "Failed to upload file.";
		}
	} elseif (isset($_GET['hapus'])) {
		$query = "DELETE FROM jadwal_kajian WHERE id='".$_GET['hapus']."'";
		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil dihapus');
						window.location='".$link."/jadwalkajian.php';
						</script>";
		}else{
			echo $conn->error;
			echo "error";
		}
	} elseif (isset($_POST['update'])) {
		$id 	= $_POST['id'];
		$judul 				= $_POST['judul'];
		$ustadz		= $_POST['ustadz'];
		$deskripsi			= $_POST['deskripsi'];
		$tanggal		= $_POST['tanggal'];
		$hari				= $_POST['hari'];
		$jam		= $_POST['waktu'].":00";
		$tempat 				= $_POST['tempat'];

		$query 		= "UPDATE jadwal_kajian SET judul='$judul',ustadz='$ustadz',deskripsi='$deskripsi',tanggal='$tanggal',hari='$hari',waktu='$jam',tempat='$tempat' WHERE id='$id' ";

		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil Diperbaharui');
						window.location='".$link."/jadwalkajian.php';
						</script>";
		}else{
			echo $conn->error;
			echo "error";
		}
	}
 ?>