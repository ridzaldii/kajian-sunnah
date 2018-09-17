<?php 
	include "../connect.php";
	require 'pushNotif.php';

	$pushNotif = new pushNotif();

	if (isset($_POST['submit'])) {
		$judul 				= addslashes($_POST['judul']);
		$pembicara		= addslashes($_POST['pembicara']);
		$deskripsi			= addslashes($_POST['deskripsi']);
		$kategori			= addslashes($_POST['kategori']);

		$query 		= "INSERT INTO artikel_kajian VALUES('', '$judul', '$pembicara','$deskripsi','$kategori',now(),now())";

		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil');
						window.location='".$link."/artikelkajian.php';
						</script>";
			$SendNotif = $pushNotif->push("Ada Artikel Kajian Baru! ", $judul);
		}else{
			echo $conn->error;
			echo "error";
		}
	} elseif (isset($_GET['hapus'])) {
		$query = "DELETE FROM artikel_kajian WHERE id='".$_GET['hapus']."'";
		$set0		= "SET FOREIGN_KEY_CHECKS=0";
		$set1		= "SET FOREIGN_KEY_CHECKS=1";

		$conn->query($set0);
		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil dihapus');
						window.location='".$link."/artikelkajian.php';
						</script>";
						$conn->query($set1);
		}else{
			echo $conn->error;
			$conn->query($set1);
			echo "error";
		}
	} elseif (isset($_GET['hapuskomen'])) {
		$query = "DELETE FROM komentar WHERE id='".$_GET['hapuskomen']."'";
		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil dihapus');
						window.location='".$link."/komentarartikel.php';
						</script>";
		}else{
			echo $conn->error;
			echo "error";
		}
	} elseif (isset($_POST['update'])) {
		$id 	= $_POST['id'];
		$judul 				= addslashes($_POST['judul']);
		$pembicara		= addslashes($_POST['pembicara']);
		$deskripsi			= addslashes($_POST['deskripsi']);
		$kategori			= addslashes($_POST['kategori']);

		$query 		= "UPDATE artikel_kajian SET judul='$judul',pembicara='$pembicara',deskripsi='$deskripsi',kategori='$kategori' WHERE id='$id' ";

		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil Diperbaharui');
						window.location='".$link."/artikelkajian.php';
						</script>";
		}else{
			echo $conn->error;
			echo "error";
		}
	} elseif (isset($_GET['validasi'])) {
		$id = $_GET['validasi'];
		$kode = $_GET['kode'];
		if ($kode=='v') {
			$query = "UPDATE komentar SET status = '1' WHERE id='$id'";
			$result 	= $conn->query($query);
			if ($result) {
				echo "<script>
							alert('Berhasil Divalidasi');
							window.location='".$link."/komentarartikel.php';
							</script>";
			}else{
				echo $conn->error;
				echo "error";
			}	
		} elseif ($kode=='u') {
			$query = "UPDATE komentar SET status = '0' WHERE id='$id'";
			$result 	= $conn->query($query);
			if ($result) {
				echo "<script>
							alert('Validasi Dibatalkan');
							window.location='".$link."/komentarartikel.php';
							</script>";
			}else{
				echo $conn->error;
				echo "error";
			}	
		}
	}
 ?>