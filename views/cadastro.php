<?php
    require_once '../db/connection.php';
    
    // Verificação de erro para o apontar na página
    // Fiz a validação pegando o 'QUERY_STRING' pois não consegui validar pelo INPUT_GET
    $end = $_SERVER['QUERY_STRING'];
    if($end === 'err=true'){
        $color = 'red';
        $alert = "É necessário preencher todos os campos para concluir o cadastro.";
        $style = 'style = " border: 2px solid ';
    }elseif($end === 'err=false'){
        $color = 'green';
        $alert = "Cadastro concluído com sucesso.";
        $style = 'style = " border: 2px solid ';
    }elseif($end === ''){
        $style = '';
        $color = '';
        $alert = '';
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
        <form method= "POST" class="form-cadastro" action="../src/cadastrar_pessoa.php">
            <h1>Cadastrar Pessoa</h1>
            <input name = "nome" placeholder ="Nome completo" type="text" required>
            <input name = "data_nascimento" placeholder ="Data de nascimento" type="text" required>
            <input name = "genero" placeholder ="Gênero" type="text" required>
            <input name = "email" placeholder ="E-mail" type="text" required>
            <p style = "color: '.$color.';">'. $alert.'</p>
            <div class="btn-form">
                <input type="submit"  value="Cadastrar"> 
            </div> 
        </form>
    </div>
    
    ';
    ?>
</body>
</html>