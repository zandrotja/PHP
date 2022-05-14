<?Php include 'template/header.php';?>

<?Php
   include_once "model/conexion.php";
    $sentencia = $bd ->query("select *from persona");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
                <!--Inicio alerta -->
                <?Php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
                ?>
                    <div class="alert alert-danger alert-dismissible fade show fade show" role="alert">
                        <strong>Error!</strong>Rellena Todos los campos
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?Php
                    }
                ?>

                <?Php
                    if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'registrado'){
                ?>
                    <div class="alert alert-success alert-dismissible fade show fade show" role="alert">
                        <strong>Success!</strong>Registrado Correctamente
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?Php
                    }
                ?>

                <?Php
                    if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'error'){
                ?>
                    <div class="alert alert-danger alert-dismissible fade show fade show" role="alert">
                        <strong>Error!</strong>Vuelve a intentarlo
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?Php
                    }
                ?>

                <?Php
                    if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'editado'){
                ?>
                    <div class="alert alert-success alert-dismissible fade show fade show" role="alert">
                        <strong>Success!</strong>Modificado
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?Php
                    }
                ?>

                <?Php
                    if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'eliminado'){
                ?>
                    <div class="alert alert-success alert-dismissible fade show fade show" role="alert">
                        Eliminado Correctamente
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?Php
                    }
                ?>
                <!--Fin alerta -->
            <div class="card">
                <div class="card-header">
                    lista de personas
                </div>
                <div class="p-4">
                    <table class="table align-middle"> 
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Signo</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?Php
                                foreach($persona as $dato){
                            ?>
                            <tr>
                            <td scope="row"><?Php echo $dato->codigo ?></td>
                                <td><?Php echo $dato->nombre ?></td>
                                <td><?Php echo $dato->edad ?></td>
                                <td><?Php echo $dato->signo ?></td>
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            <?Php
                            
                                } 
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresa Datos:
                </div>
                <form action="registrar.php" method="POST" class="p-4">
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad:</label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Signo:</label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input class="btn btn-primary" type="submit" value="Registrar">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?Php include 'template/footer.php';?>
