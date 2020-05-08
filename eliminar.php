<?php
include ('empleado.php');

$emp = new empleado();

$emp->obtenerDatos();
$emp->eliminarEmpleado();

header('Location: /');