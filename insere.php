<?php
date (d/m/Y);
?>

<?php

require "bd.php"; //include

$nome = $_POST["nome"];
$email = $_POST["email"];
$turma = $_POST["turma"];
$data = $_POST["data"];

$sql = "INSERT INTO alunos (id, nome, email, turma, data) 
VALUES (NULL, '$nome', '$email', '$turma', '$data')";

$con = dbcon();

$res = mysqli_query($con, $sql);

if ($res == true) 
{    
   echo "Dados cadastrados com sucesso!";
   header("Location: index.php");
} else {
echo "Ocorreu um erro ao cadastrar!";    
}






?>