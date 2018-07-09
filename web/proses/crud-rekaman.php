<?php 
	include "../connect.php";

	if (isset($_POST['submit'])) {
		$judul = $_POST['judul'];
		$deskripsi = $_POST['deskripsi'];

		$recfile		= time()."-".$_FILES['rekaman']['name'];
		$filetmp 		= $_FILES['rekaman']['tmp_name'];

		if(move_uploaded_file($filetmp, '../file/'.$recfile)){
			$query 		= "INSERT INTO rekaman_kajian VALUES('', '$judul', '$recfile','$deskripsi',now(),now())";

			$result 	= $conn->query($query);
			if ($result) {
				echo "<script>
							alert('Berhasil');
							window.location='".$link."/rekamankajian.php';
							</script>";
			}else{
				echo $conn->error;
				echo "error";
			}
		} else{
			echo "erroraaa";
		}
	} elseif (isset($_GET['hapus'])) {
		$query = "DELETE FROM rekaman_kajian WHERE id='".$_GET['hapus']."'";
		$result 	= $conn->query($query);
		if ($result) {
			echo "<script>
						alert('Berhasil dihapus');
						window.location='".$link."/rekamankajian.php';
						</script>";
		}else{
			echo $conn->error;
			echo "error";
		}
	} elseif (isset($_POST['update'])) {
		$id = $_POST['id'];
		$judul = $_POST['judul'];
		$deskripsi = $_POST['deskripsi'];

		// echo $_POST['rekaman'];
		if ($_FILES['rekaman']['name']!="") {
			$recfile		= time()."-".$_FILES['rekaman']['name'];
			$filetmp 		= $_FILES['rekaman']['tmp_name'];
			if(move_uploaded_file($filetmp, '../file/'.$recfile)){
				$query 		= "UPDATE rekaman_kajian SET judul='$judul', rekaman='$recfile',deskripsi='$deskripsi' WHERE id='$id'";

				$result 	= $conn->query($query);
				if ($result) {
					echo "<script>
								alert('Berhasil Diperbaharui....');
								window.location='".$link."/rekamankajian.php';
								</script>";
				}else{
					echo $conn->error;
					echo "error";
				}
			} else{
				echo "erroraaa";
			}
		} else {
			$query 		= "UPDATE rekaman_kajian SET judul='$judul',deskripsi='$deskripsi' WHERE id='$id'";
			$result 	= $conn->query($query);
				if ($result) {
					echo "<script>
								alert('Berhasil Diperbaharui.');
								window.location='".$link."/rekamankajian.php';
								</script>";
				}else{
					echo $conn->error;
					echo "error";
				}
		}
		
	}
 ?>