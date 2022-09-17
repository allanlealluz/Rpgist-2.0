<?php
class loginController extends Controller {
  function index(){
      $this->carregarTemplate('login');
  }
  function In(){
    $t = new Connection('rpgnip','localhost','root','');
    $email = htmlentities(addslashes($_POST['Email']));
    $password = htmlentities(addslashes($_POST['Password']));
    $t->login($email,$password);
    echo 'sucess';
    header('Location:/rpgnip/');
  }
}