<?php
include "config.php";
if (!$conn){
    die("Falha na conexão " . mysqli_connect_error());
}

//Recebe os dados do formulário
$nome = $_POST["nome"];
$dtnasc = $_POST["dtnasc"];
$celular = $_POST["celular"];
$email = $_POST["email"];
$ra = $_POST["ra"];
$endereco = $_POST["endereco"];
$num_end = $_POST["num_end"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];

//Cria variável para inserir um registro
$sql = "INSERT INTO `leitores` 
(`Nome`, `DtNasc`, `Celular`, `Email`, `RA`, `Endereco`, `NumEnd`, `Bairro`, `CidadeUF`) VALUES
('$nome', '$dtnasc', '$celular', '$email', '$ra', '$endereco', '$num_end', '$bairro', '$cidade')";

//Executa a consulta SQL. Se falhar, exibe o erro do banco de dados
$query = mysqli_query(mysql:$conn,query:$sql) or 
die(mysqli_error(mysql:$db));

if($query){
    echo "<center>";
    echo "Cadastro realizado com sucesso! <br>";
    echo "<a href='index.html'><button title='Home page'>Voltar</button></a>";
    echo "</center>";
}
else{
    echo "<center>";
    echo "Erro ao cadastrar!<br>";
    echo "a href='index.html'>button title='Home Page'>Voltar<button></a>";
    echo "</center>";
}
?>
