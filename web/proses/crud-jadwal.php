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

		$query 		= "INSERT INTO jadwal_kajian VALUES('', '$judul', '$ustadz','$deskripsi','$tanggal','$jam','$hari','$tempat')";

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