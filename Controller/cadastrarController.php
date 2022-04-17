<?php
class cadastrarController extends Controller{
    function index(){
        $this->carregarTemplate('cadastrar');
    }
    function register(){
        $name = htmlentities(addslashes($_POST['name']));
        $email = htmlentities(addslashes($_POST['email']));
        $password = htmlentities(addslashes($_POST['password']));
        echo $name;
        $t = new Connection('rpgnip','localhost','root','');
        $t->RegisterUser($name,$email,$password);
    }
}