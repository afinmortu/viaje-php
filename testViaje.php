<?php

// Incluir la clase Viaje
require_once 'Viaje.php';

// Crear una instancia de Viaje
$viaje = new Viaje('V001', 'San Martín de los Andes', 4);

// Mostrar el menú
$viaje->mostrar_menu();

// Leer la opción del usuario
$opcion = intval(readline());

// Mientras la opción del usuario no sea salir
while($opcion != 7) {
    switch($opcion) {
        case 1:
            $viaje->modificar_codigo();
            break;
        case 2:
            $viaje->modificar_destino();
            break;
        case 3:
            $viaje->modificar_max_pasajeros();
            break;
        case 4:
            $viaje->agregar_pasajero();
            break;
        case 5:
            $viaje->quitar_pasajero();
            break;
        case 6:
            $viaje->mostrar_info();
            break;
        default:
            echo "Opción inválida.\n\n";
            break;
    }
    // Mostrar el menú nuevamente
    $viaje->mostrar_menu();
    // Leer la opción del usuario nuevamente
    $opcion = intval(readline());
}

echo "Gracias por utilizar el Sistema de Viaje Felíz...\n\n";
