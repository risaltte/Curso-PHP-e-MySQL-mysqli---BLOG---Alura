<?php

require_once '../config.php';
require_once '../src/Artigo.php';
require_once '../src/redireciona.php';

/*
NO método POST os dados do formulário são enviados para um arquivo especificado na propriedade 
"action" da tag "form" do HTML. 

No PHP as tags rececibas de formulários pelo método POST podem ser acessadas pelo array $_POST['chave']. A chave de acesso é o valor da propriedade "name" definida nas tags "imput" do formulário.
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $artigo = new Artigo($mysql);
    $artigo->adicionar($_POST['titulo'], $_POST['conteudo']);

    redireciona('/blog/admin/index.php');
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar-artigo.php" method="POST">
            <p>
                <label for="titulo">Digite o título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="conteudo">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <button class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>