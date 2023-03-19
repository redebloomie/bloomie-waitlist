<?php
    //arquivo conexao.php
    function conectar(){
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "waitlist";
    
        $connect = new mysqli($servername, $username, $password, $dbname);
    
        //verifica se houve algum erro ao conectar
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }
    
        //define o charset para UTF8 para evitar problemas com acentuação
        $connect->set_charset("utf8");
    
        return $connect;
    }
?>