<?php 
	include "../connect.php";

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
			}else{
				echo $conn->error;
				echo "error";
			}
		} else{
			echo "erroraaa";
		}
	} elseif (isset($_GET['hapus'])) {
		$query = "DELETE FROM donasi WHERE id='".$_GET['hapus']."'";
		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil dihapus');
						window.location='".$link."/infodonasi.php';
						</script>";
		}else{
			echo $conn->error;
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