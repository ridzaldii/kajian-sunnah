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
        $kategori = htmlspecialchars($_POST['kategori']);
        try{
            //tampilkan semua data dari mysql
            $queryMarker = "SELECT * FROM artikel_kajian WHERE kategori='$kategori'";
            $getData = $conn->prepare($queryMarker);
            $getData->execute();
            $result = $getData->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $data){
                $response1 = array();
                $queryMarker1 = "SELECT * FROM komentar WHERE id_artikel=".$data['id'];
                $getData1 = $conn->prepare($queryMarker1);
                $getData1->execute();
                $result1 = $getData1->fetchAll(PDO::FETCH_ASSOC);
                foreach($result1 as $data1){
                    array_push($response1, 
                        array(
                            'id'=>$data1['id'],
                            'id_artikel'=>$data1['id_artikel'],
                            'nama'=>$data1['nama'],
                            'komentar'=>$data1['komentar'],
                            'tanggal'=>$data1['tanggal'],
                            'jam'=>$data1['jam']
                            )
                        );
                }
                array_push($response,
                    array(
                        'id'=>$data['id'],
                        'judul'=>$data['judul'],
                        'pembicara'=>$data['pembicara'],
                        'deskripsi'=>$data['deskripsi'],
                        'kategori'=>$data['kategori'],
                        'tanggal'=>$data['tanggal'],
                        'jam'=>$data['jam'],
                        'komentar'=>$response1
                        )
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