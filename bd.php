<?php

function dbcon()
{
$servidor = "localhost";
$usuario = "root";
$senha = "elaborata";
$database = "escola";

$con = mysqli_connect($servidor, $usuario, $senha, $database);
mysqli_set_charset($con, "utf8");

return $con;

}