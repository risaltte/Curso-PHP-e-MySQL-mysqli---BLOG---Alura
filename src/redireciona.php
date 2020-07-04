<?php

function redireciona(string $url): void
{
    // Redirecionar após o POST para uma página usando o método GET
    //padrão de projeto Post Redirect Get
    header("Location: $url");

    // Interromper a execução do código após a inserão no banco e redirecinamento da página
    die();
}