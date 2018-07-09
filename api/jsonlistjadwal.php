<?php

require_once("Connection.php");
class JsonDisplayMarker {
    function getMarkers(){
        //buat koneksinya
        $connection = new Connection();
        $conn = $connection->getConnection();
        //buat responsenya
        $response = array();
        $code = "code";
        $message = "message";

        $link = $connection->getLink();
        try{
            //tampilkan semua data dari mysql
            $queryMarker = "SELECT * FROM jadwal_kajian";
            $getData = $conn->prepare($queryMarker);
            $getData->execute();
            $result = $getData->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $data){
                array_push($response,
                    array(
                        'id'=>$data['id'],
                        'judul'=>$data['judul'],
                        'ustadz'=>$data['ustadz'],
                        'deskripsi'=>$data['deskripsi'],
                        'tanggal'=>$data['tanggal'],
                        'waktu'=>$data['waktu'],
                        'hari'=>$data['hari'],
                        'alamat'=>$data['tempat'],
                        'rutin'=>$data['rutin'],
                        'gambar'=>$link.'images/poster/'.$data['gambar'],
                        'panitia'=>$data['panitia'],
                        'kontak'=>$data['kontak'])
                    );
            }
        }catch (PDOException $e){
            echo "Failed displaying data".$e->getMessage();
        }
        //buatkan kondisi jika berhasil atau tidaknya
        if($queryMarker){
            echo json_encode(
                array("result"=>$response,$code=>1,$message=>"Success")
            );
        }else{
            echo json_encode(
                array("result"=>$response,$code=>0,$message=>"Failed displaying data")
            );
        }
    }
}
$location = new JsonDisplayMarker();
$location->getMarkers();