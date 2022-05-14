<?php
if(!isset($_GET['codigo'])){
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';

$codigo = $_GET['codigo']; 
$sql = "DELETE FROM persona WHERE codigo = ?;";
$sentecia = $bd->prepare($sql);
$resultado = $sentecia->execute([$codigo]);

if($resultado){
    header('Location: index.php?mensaje=eliminado');
}else{
    header('Location: index.php?mensaje=error');
}
?>
