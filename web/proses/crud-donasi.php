<?php 
	include "../connect.php";
	require 'pushNotif.php';

	$pushNotif = new pushNotif();

	if (isset($_POST['submit'])) {
		$kontak = $_POST['kontak'];
		$telfon = $_POST['telfon'];
		$wa = $_POST['wa'];

		$file		= time()."-".$_FILES['gambar']['name'];
		$filetmp 		= $_FILES['gambar']['tmp_name'];

		if(move_uploaded_file($filetmp, '../images/donasi/'.$file)){
			$query 		= "INSERT INTO donasi VALUES('', '$file', '$kontak', '$wa', '$telfon')";

			$result 	= $conn->query($query);
			if ($result) {
				echo "<script>
							alert('Berhasil');
							window.location='".$link."/infodonasi.php';
							</script>";
					$SendNotif = $pushNotif->push("Ada Poster Donasi Baru!", "");
			}else{
				echo $conn->error;
				echo "error";
			}
		} else{
			echo "erroraaa";
		}
	} elseif (isset($_GET['hapus'])) {
		$query = "DELETE FROM donasi WHERE id='".$_GET['hapus']."'";
		$set0		= "SET FOREIGN_KEY_CHECKS=0";
		$set1		= "SET FOREIGN_KEY_CHECKS=1";

		$conn->query($set0);
		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil dihapus');
						window.location='".$link."/infodonasi.php';
						</script>";
						$conn->query($set1);
		}else{
			echo $conn->error;
			$conn->query($set1);
			echo "error";
		}
	} elseif (isset($_POST['update'])) {
		$id = $_POST['id'];
		$kontak = $_POST['kontak'];
		$telfon = $_POST['telfon'];
		$wa = $_POST['wa'];

		$query 		= "UPDATE donasi SET kontak='$kontak', telfon='$telfon', wa='$wa' WHERE id='$id'";
		$result 	= $conn->query($query);

		if ($result) {
			echo "<script>
						alert('Berhasil Diperbaharui.');
						window.location='".$link."/infodonasi.php';
						</script>";
		}else{
			echo $conn->error;
			echo "error";
		}

		
	}
 ?>