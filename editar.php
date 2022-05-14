<?php include 'template/header.php' ?>

<?php
if(!isset($_GET['codigo'])){
    header('Location: index.php?mensaje=error');
}

include_once 'model/conexion.php';
$codigo = $_GET['codigo'];
$sql = "select *from persona where codigo = ?;";
$sentencia = $bd->prepare($sql);
$sentencia->execute([$codigo]);
$pers = $sentencia->fetch(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card">
                <div class="card-header">
                    Ingresa Datos:
                </div>
                <form action="editarProceso.php" method="POST" class="p-4">
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required value="<?php echo $pers->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad:</label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required value="<?php echo $pers->edad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo:</label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required value="<?php echo $pers->signo; ?>">
                    </div>
                    <div class="d-grid">
                    <input type="hidden" name="codigo" value="<?php echo$pers->codigo ?>">
                        <input class="btn btn-primary" type="submit" value="Editar">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php include 'template/footer.php' ?>
