<?php
include "config.php";

// Consulta para obter todos os leitores
$sql_leitores = "SELECT CodLeitor, Nome FROM leitores ORDER BY Nome";
$result_leitores = mysqli_query($conn, $sql_leitores);

// Consulta para obter todos os livros
$sql_livros = "SELECT CodLivro, Titulo FROM livros ORDER BY Titulo";
$result_livros = mysqli_query($conn, $sql_livros);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empréstimos</title>
    <link rel="stylesheet" href="cadastra.css">
</head>
<body>
    <header>
        <a href="index.html"><button title="Voltar ao início">Home</button></a>
        <h1 class="text-center">SISTEMA BIBLIOTECA</h1>
        <h3 class="text-center">CADASTRO DE EMPRÉSTIMOS</h3>
        <hr>
    </header>
    <div class="container">
        <form action="cadastra-emprestimo.php" method="post">
            <div>
                <label for="CodLeitor">Leitor:</label>
                <select id="CodLeitor" name="CodLeitor" required>
                    <option value="">Selecione um leitor</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_leitores)) {
                        echo "<option value='" . $row['CodLeitor'] . "'>" . $row['CodLeitor'] . " - " . $row['Nome'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="CodLivro">Livro:</label>
                <select id="CodLivro" name="CodLivro" required>
                    <option value="">Selecione um livro</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_livros)) {
                        echo "<option value='" . $row['CodLivro'] . "'>" . $row['CodLivro'] . " - " . $row['Titulo'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="Data_Emprestimo">Data do Empréstimo:</label>
                <input type="date" id="Data_Emprestimo" name="Data_Emprestimo" required />
            </div>
            <div>
                <label for="Data_Eevolucao">Data de Devolução:</label>
                <input type="date" id="Data_Devolucao" name="Data_Devolucao" required />
            </div>
            <div>
                <button type="submit">Cadastrar Empréstimo</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>