<?php
    //chama as funções
    require_once('../funcoes/banco.php');
    require_once('../funcoes/usuarios.php'); 

    //variaveis
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //checa se campos "email" e "senha" estão definidos
    if(isset($_POST['email']) || isset($_POST['senha'])){
        if(strlen($_POST['email']) == 0){
            echo "Preencha seu email.";
        } 
        
        else if(strlen($_POST['senha']) == 0){
            echo "Preencha sua senha.";
        } 
        
        //se os campos estarem definidos, é feito a busca
        else {
            //variaveis
            $email = $mysqli->real_escape_string($_POST['email']);
            $selecionaUsuario = banco_select($email, $senha);
            
            if(!is_null($selecionaUsuario)){
                if(!isset($_SESSION)){
                    session_start();
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['nome'] = $usuario['nome'];
                    $_SESSION['email'] = $usuario['email'];
                }                
            }
        }
    }
?>