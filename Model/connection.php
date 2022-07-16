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
        $cmd->bindValue(':p',hash('sha256',$password));
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
        $cmd = $this->pdo->prepare('SELECT *,userrname FROM mensagens inner join usuarios  on id_user = origem');
        $cmd->execute();
        $data = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function searchTempMenssages($id){  
        $cmd = $this->pdo->prepare('SELECT *,userrname FROM mensagem_temp inner join usuarios on id_user = origem where id > :id LIMIT 1');
        $cmd->bindValue(':id',$id);
        $cmd->execute();
        $data = $cmd->fetchAll();
        return $data; 
    }
    public function login($email,$password){
        $cmd = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = :e and password = :p');
        $cmd->bindValue(':e',$email);
        $cmd->bindValue(':p',hash('sha256',$password));
        $cmd->execute();
        if($cmd->rowCount() > 0 ){
            $dados = $cmd->fetch();
            session_start();
            if($dados['id_user'] == 1){
                $_SESSION['id_user'] = $dados['admin'];
            }else{
                $_SESSION['id_user'] = $dados['id_user'];
            }      
           return true;
        }else{
            return false;
        }
    }
    public function DelTempMensages($id){
        $cmd = $this->pdo->prepare('DELETE FROM mensagem_temp where id = :id');
        $cmd->bindValue(':id',$id);
        $cmd->execute();
    }
}