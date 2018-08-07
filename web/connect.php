<?php 
	$host 	= "localhost";
	$user 	= "root";
	$pass 	= "";
	$db 	= "kajian_sunnah";

	$conn = new mysqli($host, $user, $pass, $db);

	$ip = "localhost";
	$link = "http://".$ip."/kajian-sunnah/web";
	$linkproses = "http://".$ip."/kajian-sunnah/web/proses";
 ?>