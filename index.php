<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
    <div class="container mt-4 shadow mb-5 bg-white rounded">
        <h1 class="display-4 text-center">Agregar usuario</h1>
        <hr>
        <form method="post">
            <div class="row">
                <div class="form-group col-sm-12 col-md-6">
                    <label for="nombres" class="text-primary">Nombres</label>
                    <input type="text" class="form-control" name="nombres" id="nombres" required>
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="apellidos" class="text-primary">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" id="apellidos" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12 col-md-6">
                    <label for="edad" class="text-primary">Edad</label>
                    <select name="edad" class="form-control" id="edad" required>
                        <option value="">-- Seleccione una opción --</option>
                        <?php
                            for($i=1; $i<=90; $i++){
                        ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group-col-sm-12 col-md-6">
                    <label for="telefono" class="text-primary">Teléfono</label>
                    <input type="tel" class="form-control" name="telefono" id="telefono" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12 col-md-6">
                    <label for="fecha" class="text-primary">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fecha" id="fecha">
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="estado" class="text-primary">Estado civil</label>
                    <select name="estado" class="form-control" id="estado">
                        <option value="">-- Seleccione una opción --</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                        <option value="Divorciado">Acompañado</option>
                        <option value="Viudo">Viudo</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 text-center">
                    <hr>
                    <button class="btn btn-success" name="boton" id="boton">Agregar</button>
                </div>
            </div>
        </form>
    </div>
    <?php
        if (isset($_POST['boton'])){
            include ("conexion.php");
            $nombres=$_POST['nombres'];
            $apellidos=$_POST['apellidos'];
            $edad=$_POST['edad'];
            $telefono=$_POST['telefono'];
            $fecha=$_POST['fecha'];
            $estado=$_POST['estado'];
            $consulta="INSERT INTO usuario3 VALUES (null, '$nombres', '$apellidos', '$edad', '$telefono', '$fecha', '$estado')";
            if (mysqli_query($conexion, $consulta)) {
            ?>
            <script type="text/javascript">
                Swal.fire({
                    type: 'success',
                    title: 'Registro agregado con éxito',
                    html: '<img class="img-fluid shadow p-3 mb-5 bg-white rounded" src="./assets/gif2.gif">',
                    showConfirmButton: false,
                    timer: 4000
                });
            </script>
            <?php
            }
            else {
            ?>
                <script type="text/javascript">
                    Swal.fire({
                        type: 'error',
                        title: 'No se pudo agregar',
                        html: '<img class="img-fluid shadow p-3 mb-2 bg-white rounded" width="250px" src="./assets/gato.jpg">',
                        showConfirmButton: false,
                        timer: 3000
                    });
                </script>
            <?php
            }
        }
    ?>
</body>
</html>