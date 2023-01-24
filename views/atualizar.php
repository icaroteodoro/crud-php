<?php
    require_once '../db/connection.php';
    //QUery para selecionar o id da pessoa à ser atualizada
    $id = filter_input(INPUT_GET, 'id');
    $query = "SELECT * FROM pessoa WHERE id = {$id}";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);

    //Verificação de erro para o apontar na página
    $err = filter_input(INPUT_GET, 'err');
    if($err == true){
        $color = 'red';
        $alert = "É necessário preencher todos os campos para concluir a atualização.";
        $style = 'style = " border: 2px solid ';
    }else if(!$err){
        $style = '';
        $alert = '';
        $color = '';
    }
    
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>CRUD - Teste Técnico</title>
</head>
<body>
    <?php
        include("../components/header.php");
    
    echo ' 
    <div ' . $style . $color.'" class="container-cadastro">
        <form method= "POST" class="form-cadastro" action="../src/atualizar_pessoa.php?id='.$id.'">
            <h1>Atualizar Dados</h1>
            
            <input name= "nome" type="text" value = "'.$result['nome'] .'" required>
                    <input name= "data_nascimento" type="text" value = "'.$result['data_nascimento'] .'" required>
                    <input name= "genero" type="text" value = "'.$result['genero'] .'" required>
                    <input name= "email" type="text" value = "'.$result['email'] .'" required>
                    <p style=" color: red;">'. $alert.'</p>
            <div class=btn-form>
            <input type="submit"  value="Atualizar"> 
            </div>
            
        </form>
        
    </div>
    ';
    ?>
</body>
</html>