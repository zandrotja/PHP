<?php 
if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtEdad"]) || empty($_POST["txtSigno"])){
    header('Location: index.php?mensaje=falta');        
    exit();
}

include_once 'model/conexion.php';
$nombre = $_POST["txtNombre"];
$edad = $_POST["txtEdad"];
$signo= $_POST["txtSigno"];

$sentencia = $bd->prepare("insert into persona(nombre,edad,signo) values (?,?,?);");
$resultado = $sentencia->execute([$nombre,$edad,$signo]);

if($resultado){
    header('Location: index.php?mensaje=registrado');
}else{
    header('Location: index.php?mensaje=error');        
    exit();
}

?> 
