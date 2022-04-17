<?php 
class Connection {
    private $pdo;
    function __construct($dbname,$host,$user,$password) {
        try {
          $this->pdo = new PDO('mysql:dbname='.$dbname.';host='.$host,$user,$password);  
        } catch (Exception $ex) {
          echo $ex->getCode(),$ex->getMessage(),$ex->getLine();  
        }
        
    }
    public function RegisterUser($username,$email,$password){
        $cmd = $this->pdo->prepare('INSERT INTO usuarios (userrname,email,password) values (:u,:e,:p)');
        $cmd->bindValue(':u',$username);
        $cmd->bindValue(':e',$email);
        $cmd->bindValue(':p',md5($password));
        $cmd->execute();
    }
    public function AddMensage($mensage,$id){
        $cmd = $this->pdo->prepare('INSERT INTO mensagens (mensagem,origem) VALUES (:m,:o)');
        $cmd->bindValue(':m',$mensage);
        $cmd->bindValue(':o',$id);
        $cmd->execute();
        $cmd = $this->pdo->prepare('INSERT INTO mensagem_temp (mensagem,origem) VALUES (:m,:o)');
        $cmd->bindValue(':m',$mensage);
        $cmd->bindValue(':o',$id);
        $cmd->execute();
    }
    public function searchMensage(){
        $cmd = $this->pdo->prepare('SELECT * FROM mensagens');
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function searchTempMenssages(){
        $cmd = $this->pdo->prepare('SELECT * FROM mensagens_temp');
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data; 
    }
    public function login($email,$password){
        $cmd = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = :e and password = :p');
        $cmd->bindValue(':e',$email);
        $cmd->bindValue(':p',md5($password));
        $cmd->execute();
        if($cmd->rowCount() > 0 ){
            $dados = $cmd->fetch();
            session_start();
            $_SESSION['id_user'] = $dados['id_user'];
            return true;
        }else{
            return false;
        }
    }
}