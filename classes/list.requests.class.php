<?php 
class Requests {
  public function listAll() 
  {
    $db = DB::connect();
    $rs = $db->prepare("SELECT * FROM request ORDER BY ordernumber");
    $rs->execute();
    $obj = $rs->fetchAll(PDO::FETCH_ASSOC);
  
    if($obj){
      echo json_encode(["dados" => $obj]);
    } else {
      echo json_encode(["dados" => "Nao existe dados para retornar"]);
    }
  
  }
  public function listOnly($param) 
  {

    var_dump($param);
    $db = DB::connect();
    $rs = $db->prepare("SELECT * FROM request WHERE ordernumber = {$param}");
    $rs->execute();
    $obj = $rs->fetchObject();
  
    if($obj){
      echo json_encode(["dados" => $obj]);
    } else {
      echo json_encode(["dados" => "Nao existe dados para retornar"]);
    }
  
  }

}