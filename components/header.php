<?php
    // Verificação para conseguir mudar de página independentemente da pagina atual usando a url 
    $pag = $_SERVER['SCRIPT_NAME'].$_SERVER['QUERY_STRING'];
    if($pag == '/index.php'){
        $url = './';
        $view = './views/';
    }else{
        $url = '../';
        $view = './';
    }
    // Verificando se foi feita alguma busca para inserir o valor no input
    $busca = filter_input(INPUT_POST,('busca'));
    if($busca){
        $input = "<input type='text' placeholder = 'Busque uma pessoa pelo nome' name = 'busca' value='{$busca}'> ";
    }else{
        $input = "<input type='text' placeholder = 'Busque uma pessoa pelo nome' name = 'busca'>";
    }
?>
<!-- Header -->
<div class="menu-horizontal">
        <ul>
            <li><a href="<?php echo $url ?>index.php"><h1>Click</h1></a></li>
            <li id ="li-form">
                <form method="POST" action="<?php echo $url ?>index.php">
                    <?php echo $input ?> 
                    <input type="submit" value="Buscar">
                </form>
            </li>
            <li><a href="<?php echo $view ?>cadastro.php">Cadastrar</a></li>
            
        </ul>
</div>
<!-- Header -->