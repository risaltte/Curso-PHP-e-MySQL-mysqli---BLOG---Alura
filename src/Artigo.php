<?php

class Artigo 
{

    private mysqli $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function adicionar(string $titulo, string $conteudo): void
    {
        $sqlInsert = 'INSERT INTO artigos (titulo, conteudo) VALUES (?, ?);';
        $insereArtigo = $this->mysql->prepare($sqlInsert);
        $insereArtigo->bind_param('ss', $titulo, $conteudo);
        $insereArtigo->execute();
        
    }

    public function atualizar(string $id, string $titulo, string $conteudo): void
    {
        $sqlUpdate = 'UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?;';
        $atualizarArtigo = $this->mysql->prepare($sqlUpdate);
        $atualizarArtigo->bind_param('sss', $titulo, $conteudo, $id);
        $atualizarArtigo->execute();
    }

    public function remover(string $id): void
    {
        $sqlRemover = 'DELETE FROM artigos WHERE id = ?';
        $removerArtigo = $this->mysql->prepare($sqlRemover);
        $removerArtigo->bind_param('s', $id);
        $removerArtigo->execute();
    }

    public function exbirTodos(): array
    {
        $resultado = $this->mysql->query('SELECT id, titulo, conteudo FROM artigos;');
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $artigos;
    }

    public function encontrarPorId(string $id): array 
    {
        $sqlQuery = "SELECT id, titulo, conteudo FROM artigos WHERE id = ?;";
        $selecionaArtigo = $this->mysql->prepare($sqlQuery);
        $selecionaArtigo->bind_param('s', $id);         // 's' de string - tipo do parametro.
        $selecionaArtigo->execute();
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();

        return $artigo;
        
    }
}

?>
