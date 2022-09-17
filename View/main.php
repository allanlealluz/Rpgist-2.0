<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='CSS/main.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body onload='search()'>

        <div class="navbar bg-danger">
             <h1 class='nav-brand'>Rpgist</h1>
             <?php if(isset($SESSION['admin']) or isset($SESSION['id_user'])){
                ?> <h2 class='nav-link'>Sair</h2> <?php
             }
                 ?>
             <a class='nav-link' href='/rpgnip/login'><h3>Login</h3></a>
        </div>
        <img src='loading-90.gif' id='bg'>
<div id='Conteudo'>
        <div class='container-fluid'>
            <img src='ddd.jpg' style='width:100%;height:10rem;'>
            <?php 
            if(isset($_SESSION['admin'])){
                ?>
                <input type="file" name="bgn" id=""> 
                <input type='submit' name='submit'>
                <?php
            }
            ?>
        </div>
    <?php 
    session_start();
    ?>
    
    <div class='container' style='margin-left:1rem;'>
    <div class='container bg-dark ' style='width:70%;height:20rem;' id='blank'>
           <div class='card bg-light' style='height:20rem'>  
           <div class='card bg-light' style='overflow:auto;'  id='menssages'>
               <?php foreach($dadosModel as $v ){
                   ?><h2 class='text-secondary'><?php echo $v['userrname'] ?> <?php
                   ?><h2><?php echo $v['mensagem'] ?></h2><?php
               }
                ?>
           </div>  
           <?php if(isset($_SESSION['id_user']) || isset($SESSION['admin'])){ ?>  
               <form>
                   <input class='form-control' type='text' id='mensage'>
                   <input class='form-control' type='submit'>
               <?php if(isset($SESSION['admin'])){
                ?>
                <input class='file' type='file'>
                <?php
               } ?> 
               </form>
            <?php } ?>
            </div>
    </div>
    </div>
            </div>
    <script src='JS/chat.js'></script>
</body>
</html>