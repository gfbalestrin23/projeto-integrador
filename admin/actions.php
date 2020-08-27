<?php

require_once("conexao.php");

switch ($_POST['acao']) {
    case 'cadastrar':
        // Upload da imagem
        $path_imagem = "images/" . $_FILES['imagem']['name'];
        $nome_tmp = $_FILES['imagem']['tmp_name'];
        if (move_uploaded_file($nome_tmp, $path_imagem)) {
            // Inserção no banco de dados
            $query = $conn->prepare("INSERT INTO atv9_produtos (nome, preco, imagem) VALUES (?, ?, ?)");
            $parametros = array($_POST['nome'], $_POST['preco'], $path_imagem);
            $query->execute($parametros);
            if ($query->rowCount() > 0) {
                header("Location: index.php?cadastrar=sucesso");
            } else {
                header("Location: index.php?cadastrar=erro");
            }
        } else {
            header("Location: index.php?cadastrar=erro_upload");
        }
        break;
    case 'atualizar':
        // Atualizar produto
        break;
    case 'excluir':
        // Excluir produto
        break;
    default:
        header("Location: index.php");
}
