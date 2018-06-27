<?php
session_start();
include '../connect.php';
if (isset($_POST['submit'])) {
	$username = $_POST['uname'];
	$password = md5($_POST['pswd']);
	// if ($username=='' || $password=='') {
	// 	echo "<script>
	// 				alert('Lengkapi Username dan Password');
	// 				window.location='".$link."';
	// 				</script>";
	// }else {
		$query = "SELECT * FROM admin WHERE username = '$username'";
		$result = $conn->query($query);
		$db_data = $result->fetch_assoc();
		if ($password == $db_data['password']){
			echo "sukses";
		    // menyimpan username dan level ke dalam session
		    $_SESSION['id'] = $db_data['id'];
		    $_SESSION['nama'] = $db_data['nama'];
		    $_SESSION['username'] = $db_data['username'];
		    $_SESSION['password'] = $db_data['id_user'];
		    header('location:'.$link);
		}else {
			echo "<script>
						alert('User Tidak Ditemukan');
						window.location='".$link."';
						</script>";
		}
	// }
}elseif (isset($_GET['log'])) {
	session_destroy();
    header('location:'.$link);
}

?>