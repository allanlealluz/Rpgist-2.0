<?php
class indexController extends Controller {
  function index(){
      $t = new Connection('rpgnip','localhost','root','');
      $dadosModel = $t->searchMensage();
      $this->carregarTemplate('main',$dadosModel);
  }
  function receive($data){
     session_start();
     $t = new Connection('rpgnip','localhost','root','');
     $t->AddMensage($data,$_SESSION['id_user']);
  }
  function search(){
    session_start();
    $t = new Connection('rpgnip','localhost','root','');
    $data = $t->searchTempMenssages();
    $data = json_encode($data);
    print_r($data);
    $t->DelTempMensages();
  }
}