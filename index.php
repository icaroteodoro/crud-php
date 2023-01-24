<?php
    require_once './db/connection.php';
    
    // query para criar banco de dados só pra garantir que não vai dar erro na hora da visualização da página
    
    $query = 'CREATE TABLE IF NOT EXISTS id19419726_crud.pessoa (id INT NOT NULL AUTO_INCREMENT , nome TEXT NOT NULL , data_nascimento TEXT NOT NULL , genero TEXT NOT NULL , email TEXT NOT NULL , PRIMARY KEY (id))';
    $result = mysqli_query($conn, $query);
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>CRUD - Teste Técnico</title>
</head>
<body>
    <?php
        include("./components/header.php");
        $busca = filter_input(INPUT_POST,('busca'));
        if($busca){
            $query = "SELECT * FROM pessoa WHERE NOME LIKE '%{$busca}%'";
            
            mysqli_query($conn, $query);
            $data = mysqli_query($conn, $query);
            $result = mysqli_fetch_assoc($data);
            if($result == null){
                echo '<h1 style="position:absolute;top: 90px;left:30px;">Nenhum resultado encontrado</h1>';
            }else{
                echo '<h1 style="position:absolute;top: 90px;left:30px;">Resultado da pesquisa</h1>';
            }
        }
    ?>

    <div class="container-cards">
        <?php
            $busca = filter_input(INPUT_POST,('busca'));
            
            // Verificando se há uma busca para renderizar os cards com o nome buscado
            
            if(!$busca){
                
                // Renderização sem a busca
                
                $query = 'SELECT * FROM pessoa ORDER BY nome asc';
                $data = mysqli_query($conn, $query);
                if($data == false){
                    die(mysqli_error($conn));
                }
                while ($result = mysqli_fetch_assoc($data)) { 
                    echo '<div class="card" >
                            <h3>' . $result['nome'] . '</h3> 
                            <p><b>E-mail:</b> ' . $result['email'] . '</p>
                            <p><b>Data de Nascimento:</b> '. $result['data_nascimento'] .' </p>
                            <p><b>Gênero:</b> '. $result['genero'] .' </p>
                            <div class="buttons">
                            <a  href = "./src/deletar_pessoa.php?id='. $result['id'].'"><div class="remove">Remover</div></a>
                            <a  href="./views/atualizar.php?id='. $result['id'].'"><div class="update">Atualizar</div></a>
                            </div>
                    </div>';
            }
            mysqli_close($conn);
            }else{
            
                // Renderização com a busca
            
                $query = "SELECT * FROM pessoa WHERE NOME LIKE '%{$busca}%'";
            
                mysqli_query($conn, $query);
                $data = mysqli_query($conn, $query);
                if($data == false){
                    die(mysqli_error($conn));
                }
                
                while ($result = mysqli_fetch_assoc($data)) { 
                    echo '<div class="card" >
                            <h3>' . $result['nome'] . '</h3> 
                            <p><b>E-mail:</b> ' . $result['email'] . '</p>
                            <p><b>Data de Nascimento:</b> '. $result['data_nascimento'] .' </p>
                            <p><b>Gênero:</b> '. $result['genero'] .' </p>
                            <div class="buttons">
                            <a  href = "./src/deletar_pessoa.php?id='. $result['id'].'"><div class="remove">Remover</div></a>
                            <a  href="./views/atualizar.php?id='. $result['id'].'"><div class="update">Atualizar</div></a>
                            </div>
                    </div>';
                }
                mysqli_close($conn);
            }
        ?>     
    </div>
</body>
</html>
