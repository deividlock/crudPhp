<?php
include ('empleado.php');

$emp = new empleado();

$emp->obtenerDatos();
$emp->actualizarEmpleado();

header('Location: /');
