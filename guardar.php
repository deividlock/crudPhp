<?php
include ('empleado.php');

$emp = new empleado();

$emp->obtenerDatos();
$emp->guardarEmpleado();

header('Location: ./');

