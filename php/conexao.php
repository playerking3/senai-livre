<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "senai_livre";
    $dsn = "mysql:host=$host;dbname=$banco";

    // tratativa de erro

    try{
        $conexao = new PDO($dsn, $usuario, $senha);
    }catch(\PDOException $e){
        var_dump($e ->getMessage());
    }