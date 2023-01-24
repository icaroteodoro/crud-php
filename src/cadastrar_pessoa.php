<?php
require_once '../db/connection.php';

$nome = filter_input(INPUT_POST, 'nome');
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
$genero = filter_input(INPUT_POST, 'genero');
$email = filter_input(INPUT_POST, 'email');
// Verificação para validar o cadastro
// Também usei o o required nos inputs na página de cadastro
if(!$nome || !$data_nascimento || !$genero || !$email){
    // Se algum campo ficar em branco, não poderá ser cadastrado e retornará a página de cadastro passando um erro como parametro na url
    header("Location: ../views/cadastro.php?err=true");
}else{
        
    $query = "INSERT INTO pessoa (nome, data_nascimento, genero, email) VALUES ('{$nome}', '{$data_nascimento}', '{$genero}', '{$email}')";

    mysqli_query($conn, $query);
    
    mysqli_close($conn);

    header("Location: ../views/cadastro.php?err=false");
}
?>