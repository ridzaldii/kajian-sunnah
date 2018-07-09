<?php

include_once 'Connection.php';

$response = array("error" => FALSE);

$conn = new Connection();
$MySQLiconn = $conn->getConnection();

if (isset($_POST['id_artikel']) && isset($_POST['nama']) && isset($_POST['komentar'])) {
 
 $id_artikel = htmlspecialchars($_POST['id_artikel']);
 $nama = htmlspecialchars($_POST['nama']);
 $komentar = htmlspecialchars($_POST['komentar']);
        
 $sql = $MySQLiconn->query("INSERT INTO komentar VALUES ('','$id_artikel','$nama','$komentar','0',now(),now())");

     if($sql) {
         $response["error"] = FALSE;
         $response["message"] = "Pengiriman komentar berhasil.";

         echo json_encode($response);
      } else {
        $response["error"] = TRUE;
        $response["message"] = "Pengiriman komentar gagal.";

        echo json_encode($response);
      }    
}
?>