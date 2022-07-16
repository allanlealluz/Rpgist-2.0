<?php
class indexController extends Controller {
  function index(){
      $t = new Connection('rpgnip','localhost','root','');
      $dadosModel = $t->searchMensage();
      $this->carregarTemplate('main',$dadosModel);
  }
  
  function receive($data)
  {
     session_start();
     $t = new Connection('rpgnip','localhost','root','');
     $t->AddMensage($data,$_SESSION['id_user']);
  }
  function search($id)
  {
    session_start();
    $t = new Connection('rpgnip','localhost','root','');
    $data = $t->searchTempMenssages($id);
    $data2 = json_encode($data);
    print_r($data2);
  }
}
$to = new IndexController();
