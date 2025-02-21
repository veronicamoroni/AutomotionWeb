<?php
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'registrarse':
        $usuarioController->registrarse();
        break;
    case 'crearCliente':
        $clienteController->crearCliente();
        break;
    case 'modificarCliente':
        $clienteController->modificarCliente();
        break;
    case 'eliminarCliente':
        $dni = isset($_POST['dni']) ? $_POST['dni'] : die("Falta el DNI");
        $clienteController->eliminarCliente($dni);
        break;
    case 'crearVehiculo':
        $vehiculoController->crearVehiculo();
        break;    
    case 'modificarVehiculo':
        $vehiculoController->modificarVehiculo();
        break;    
    case 'eliminarVehiculo':
        $patente = isset($_POST['patente']) ? $_POST['patente'] : die("Falta la patente");
        $vehiculoController->eliminarVehiculo($patente);
        break;
    case 'crearTurno':
        $turnoController->crearTurno();
        break;  
    case 'modificarTurno':
        $turnoController->modificarTurno();
        break;
    case 'eliminarTurno':
        $id = isset($_POST['id']) ? $_POST['id'] : die("Falta id");
        $turnoController->eliminarTurno();
        break;

    // Acciones para Servicios
    case 'crearServicio':
        $servicioController->crearServicio(); // Llamar al método para crear un servicio
        break;
    case 'modificarServicio':
        $servicioController->modificarServicio(); 
        break;
    case 'eliminarServicio':
        $id = isset($_POST['id']) ? $_POST['id'] : die("Falta id");
        $servicioController->eliminarServicio(); // Llamar al método para eliminar un servicio
        break;
    case 'crearServicioRealizado':
        $serviciorealizadoController->crearServicioRealizado(); // Llamar al método para crear un servicio realizado
        break;
        case 'modificarServicioRealizado':
            $serviciorealizadoController->modificarServicioRealizado(); // Llamar al método para crear un servicio
            break;
    case 'eliminarServicioRealizado':
        $serviciorealizadoController->eliminarServicioRealizado(); // Llamar al método para crear un servicio
        break;
    }          