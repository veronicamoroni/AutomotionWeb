<?php
// Manejo de rutas
switch ($request) {
   
    case '/menu':
        $smarty->display('templates/menu.tpl');
        break;
    case '/menu/crearCliente':
        $smarty->display('templates/crearCliente.tpl');
        break;
    case '/menu/modificarCliente':
        $smarty->display('templates/modificarCliente.tpl');
        break;
    case '/menu/eliminarCliente':
        $smarty->display('templates/eliminarCliente.tpl');
        break;            
    case '/menu/listarClientes':
        // Obtener y mostrar la lista de clientes
        $clientes = $clienteController->obtenerClientes();
        $smarty->assign('clientes', $clientes);
        $smarty->display('listarClientes.tpl');
        break;
    case '/menu/crearVehiculo':
        $smarty->display('templates/crearVehiculo.tpl');
        break;
    case '/menu/modificarVehiculo':
        $smarty->display('templates/modificarVehiculo.tpl');
        break;
    case '/menu/eliminarVehiculo':
        $smarty->display('templates/eliminarVehiculo.tpl');
        break;
    case '/menu/listarVehiculos':
            $vehiculos = $vehiculoController->obtenerVehiculos();
            $smarty->assign('vehiculos', $vehiculos);
            $smarty->display('listarVehiculos.tpl');
            break;    
    case '/menu/crearTurno':
        $smarty->display('templates/crearTurno.tpl');
        break;
    case '/menu/modificarTurno':
        $smarty->display('templates/modificarTurno.tpl');
        break;
    case '/menu/eliminarTurno':
        $smarty->display('templates/eliminarTurno.tpl');
        break;

    
    case '/menu/listarTurnos':
        // Obtener y mostrar la lista de turnos
        $turnos = $turnoController->obtenerTurnos();  // Llamamos al método para obtener los turnos
        $smarty->assign('turnos', $turnos);  // Asignamos los turnos a Smarty
        $smarty->display('listarTurnos.tpl');  // Mostramos la plantilla para listar los turnos
        break;

    // Rutas para gestionar Servicios
    case '/menu/crearServicio':
        $smarty->display('templates/crearServicio.tpl'); // Mostrar formulario de creación de servicio
        break;
    case '/menu/modificarServicio':
        $smarty->display('templates/modificarServicio.tpl'); 
        break;
    case '/menu/eliminarServicio':
        // Mostrar el formulario de eliminación
        $smarty->display('eliminarServicio.tpl'); 
        break;
    case '/menu/listarServicios':
        // Obtener y mostrar la lista de servicios
        $servicioController->listarServicios(); // Llamar al método que lista los servicios
        break;
    case '/menu/crearServicioRealizado':
        // Mostrar el formulario de eliminación
        $smarty->display('crearServicioRealizado.tpl'); 
        break;   
        case '/menu/modificarServicioRealizado':
            // Mostrar el formulario de eliminación
            $smarty->display('modificarServicioRealizado.tpl'); 
            break;
case '/menu/eliminarServicioRealizado':
            // Mostrar el formulario de eliminación
            $smarty->display('eliminarServiciosRealizados.tpl'); 
            break;
    case '/menu/listarServicioRealizado':
        $servicios = $serviciorealizadoController->obtenerServiciosRealizados();
        $smarty->assign('servicios_realizados', $servicios);
        $smarty->display('listarServiciosRealizados.tpl'); 
        break;
      
       
    }       