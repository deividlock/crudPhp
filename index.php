<?php
if(isset($_GET['accion'])) 
    $accion = $_GET['accion'];
else 
    $accion = 'index';
include ('empleado.php');
if($accion == 'index')
{
    $emp = new empleado();
    $empleados = $emp->obtenerTodos();
    //print_r($empleados);
    $count = count($empleados);
    //print_r($count);
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary">
            <a class="navbar-brand" href="#">
                CRUD PHP
            </a>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <br />
                    <h1> Listar Empleados </h1>
                    <br />
                    <a href="/?accion=agregar" class="btn btn-primary">Agregar</a>
                    <br />
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($count > 0) {
                            foreach($empleados as $r) { 
                                echo '<tr scope="row">
                                <td>'.$r -> id.'</td>
                                <td>'.$r -> dni.'</td>
                                <td>'.$r -> nombre.'</td>
                                <td>'.$r -> apellido.'</td>
                                <td>'.$r -> telefono.'</td>
                                <td>
                                <a class="btn btn-primary" href="/?accion=editar&id='.$r->id.'"> <i class="fa fa-pencil"></i> Editar</a>
                                <a class="btn btn-danger" href="/?accion=eliminar&id='.$r->id.'"> <i class="fa fa-trash"></i> Eliminar</a>
                                </tr>';
                                
                                }
                                }?>
                    </table>
                </div>
            </div>
        </div>
    </body>
    </html>
<?php
}
if($accion == 'agregar')
{
?>
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary">
            <a class="navbar-brand" href="#">
                CRUD PHP
            </a>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <br />
                    <h1> Agregar Empleado </h1>
                    <br />
                    <form method="POST" action="guardar.php">
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="number" class="form-control" id="dni" name="dni" aria-describedby="dniHelp">
                        <small id="dniHelp" class="form-text text-muted">Numero de identificación del empleado.</small>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombreHelp">
                        <small id="nombreHelp" class="form-text text-muted">Nombre del empleado.</small>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="apellidoHelp">
                        <small id="apellidoHelp" class="form-text text-muted">Apellido del empleado.</small>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="telefonoHelp">
                        <small id="telefonoHelp" class="form-text text-muted">Número de contacto del empleado.</small>
                    </div>
                        <a href="/" class="btn btn-danger">Volver</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
<?php
}
if($accion == 'editar')
{
    $id = $_GET['id'];
    $emp = new empleado();
    $empleado = $emp->obtenerEmpleado($id);
    //print_r($empleado);
?>
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary">
            <a class="navbar-brand" href="#">
                CRUD PHP
            </a>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <br />
                    <h1> Editar Empleado </h1>
                    <br />
                    <form method="POST" action="actualizar.php">
                    <input type="hidden" name="id" value="<?php echo $empleado[0]['id'] ?>" />
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="number" class="form-control" id="dni" name="dni" aria-describedby="dniHelp" value="<?php echo $empleado[0]['dni'] ?>">
                        <small id="dniHelp" class="form-text text-muted">Numero de identificación del empleado.</small>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombreHelp" value="<?php echo $empleado[0]['nombre'] ?>">
                        <small id="nombreHelp" class="form-text text-muted">Nombre del empleado.</small>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="apellidoHelp" value="<?php echo $empleado[0]['apellido'] ?>">
                        <small id="apellidoHelp" class="form-text text-muted">Apellido del empleado.</small>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="telefonoHelp" value="<?php echo $empleado[0]['telefono'] ?>">
                        <small id="telefonoHelp" class="form-text text-muted">Número de contacto del empleado.</small>
                    </div>
                        <a href="/" class="btn btn-danger">Volver</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
<?php
}
if($accion == 'eliminar')
{
    $id = $_GET['id'];
    $emp = new empleado();
    $empleado = $emp->obtenerEmpleado($id);
?>
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary">
            <a class="navbar-brand" href="#">
                CRUD PHP
            </a>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <br />
                    <h1> Eliminar Empleado </h1>
                    <p>¿Está seguro de eliminar?</p>
                    <form method="POST" action="eliminar.php">
                    <input type="hidden" name="id" value="<?php echo $empleado[0]['id'] ?>" />
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="number" class="form-control" id="dni" name="dni" aria-describedby="dniHelp" value="<?php echo $empleado[0]['dni'] ?>" disabled>
                        <small id="dniHelp" class="form-text text-muted">Numero de identificación del empleado.</small>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombreHelp" value="<?php echo $empleado[0]['nombre'] ?>" disabled>
                        <small id="nombreHelp" class="form-text text-muted">Nombre del empleado.</small>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="apellidoHelp" value="<?php echo $empleado[0]['apellido'] ?>" disabled>
                        <small id="apellidoHelp" class="form-text text-muted">Apellido del empleado.</small>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="telefonoHelp" value="<?php echo $empleado[0]['telefono'] ?>" disabled>
                        <small id="telefonoHelp" class="form-text text-muted">Número de contacto del empleado.</small>
                    </div>
                        <a href="/" class="btn btn-danger">Volver</a>
                        <button type="submit" class="btn btn-primary">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
<?php
}