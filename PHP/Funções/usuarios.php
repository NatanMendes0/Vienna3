<?php
    //seleciona usuário no banco de dados
    function banco_select($email, $senha){
        global $mysqli;

        //codificação da senha
        $hash_senha = hash("sha256", $senha, false);

        try{
            //variaveis
            $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$hash_senha'";
            $obj = null;
            $quantidade = 0;

            //busca e retorno dos valores do metodo post
            if($resultado = $mysqli->query($sql)){
                //valores retornados do banco são atribuidos à obj
                $obj = $resultado -> fetch_object();
            }
            $resultado->close();
            unset($obj);

            header("location: ../../Telas/telaHome.html");
            return $obj;
        } catch(mysqli_sql_exception $e) {
            die ("Usuario não encontrado. ({$e->getMessage()})");
        }
    }
?>