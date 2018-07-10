<?php 
	include "../connect.php";
	include '../pusher-beams/src/PushNotifications.php';
	require '../pusher-beams/vendor/autoload.php';
	if (isset($_POST['submit'])) {
		$judul 				= $_POST['judul'];
		$pembicara		= $_POST['pembicara'];
		$deskripsi			= $_POST['deskripsi'];
		$kategori			= $_POST['kategori'];
		$pushNotifications = new \Pusher\PushNotifications\PushNotifications(array(
		  "instanceId" => "52da5a29-f929-4686-ab85-8829dc8ea266",
		  "secretKey" => "AA45726F7796AA3065F8A11BFF715BA",
		));

		$query 		= "INSERT INTO artikel_kajian VALUES('', '$judul', '$pembicara','$deskripsi','$kategori',now(),now())";

		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil');
						window.location='".$link."/artikelkajian.php';
						</script>";
			$publishResponse = $pushNotifications->publish(
			  array("hello"),
			  array(
			    "fcm" => array(
			      "notification" => array(
			        "title" => "Hi!",
			        "body" => "Ada Artikel Kajian Baru!"
			    ))
			));
		}else{
			echo $conn->error;
			echo "error";
		}
	} elseif (isset($_GET['hapus'])) {
		$query = "DELETE FROM artikel_kajian WHERE id='".$_GET['hapus']."'";
		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil dihapus');
						window.location='".$link."/artikelkajian.php';
						</script>";
		}else{
			echo $conn->error;
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
		$judul 				= $_POST['judul'];
		$pembicara		= $_POST['pembicara'];
		$deskripsi			= $_POST['deskripsi'];
		$kategori			= $_POST['kategori'];

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