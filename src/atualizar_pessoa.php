<?php 
require_once '../db/connection.php';


$id = filter_input(INPUT_GET, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
$genero = filter_input(INPUT_POST, 'genero');
$email = filter_input(INPUT_POST, 'email');

// Verificação para validar o cadastro
// Também usei o o required nos inputs na página de atualização
if(!$nome || !$data_nascimento || !$genero || !$email){
    // Se algum campo ficar em branco, não poderá ser atualizado e retornará a pagina de cadastro passando uma parametro de erro
    header("Location: ../views/atualizar.php?id={$id}&err=true");
}else{
        
    $query = "UPDATE pessoa SET nome =  '{$nome}' , data_nascimento = '{$data_nascimento}', genero = '{$genero}' ,email = '{$email}' WHERE id = {$id}";

    mysqli_query($conn, $query);
    
    mysqli_close($conn);

    header("Location: ../index.php");
}




?>