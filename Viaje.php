<?php 

/**
 * Clase Viaje.php 
 * Permite gestionar un viaje y sus pasajeros
 * 
 * Autor: Mauricio Ferreyra
 * 
 * para probar el código, ejecutar el archivo testViaje.php:
 * php testViaje.php
 * 
 */
class Viaje {
    private $codigo;
    private $destino;
    private $max_pasajeros;
    private $pasajeros = array();
    
    public function __construct($codigo, $destino, $max_pasajeros) 
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->max_pasajeros = $max_pasajeros;
    }
    
    public function mostrar_menu() 
    {
        echo "\n";
        echo "---- Sistema Viaje Felíz ----\n\n";
        echo "Menú:\n";
        echo " 1. Modificar código del viaje\n";
        echo " 2. Modificar destino del viaje\n";
        echo " 3. Modificar cantidad máxima de pasajeros\n";
        echo " 4. Agregar pasajero\n";
        echo " 5. Quitar pasajero\n";
        echo " 6. Mostrar información del viaje\n";
        echo " 7. Salir\n";
        echo "\n";
    }
    
    public function modificar_codigo() 
    {
        echo "Ingrese el nuevo código del viaje:\n";
        $this->codigo = readline();
        echo "Código del viaje modificado correctamente.\n";
    }
    
    public function modificar_destino() 
    {
        echo "Ingrese el nuevo destino del viaje:\n";
        $this->destino = readline();
        echo "Destino del viaje modificado correctamente.\n";
    }
    
    public function modificar_max_pasajeros() 
    {
        echo "Ingrese la nueva cantidad máxima de pasajeros:\n";
        $this->max_pasajeros = intval(readline());
        echo "Cantidad máxima de pasajeros modificada correctamente.\n";
    }
    
    public function agregar_pasajero() 
    {
        if(count($this->pasajeros) >= $this->max_pasajeros) {
            echo "El viaje está completo, no se pueden agregar más pasajeros.\n";
            return;
        }
        
        echo "Ingrese el Nombre del pasajero:\n";
        $nombre = readline();
        
        echo "Ingrese el Apellido del pasajero:\n";
        $apellido = readline();
        
        echo "Ingrese el DNI del pasajero:\n";
        $documento = intval(readline());
        
        $this->pasajeros[$documento]['nombre']      = $nombre;
        $this->pasajeros[$documento]['apellido']    = $apellido;
        
        echo "Pasajero ".count($this->pasajeros)." agregado correctamente.\n";
    }
    
    public function quitar_pasajero() 
    {
        echo "Ingrese el número de documento del pasajero a quitar:\n";
        
        $documento = intval(readline());
        if(isset($this->pasajeros[$documento])) {
            unset($this->pasajeros[$documento]);
            echo "Pasajero eliminado correctamente.\n";
        } else {
            echo "No se encontró ningún pasajero con ese número de DNI.\n";
        }
    }
    
    public function mostrar_info() 
    {
        echo "----Información del Viaje----\n";
        echo "*** Código: ".$this->codigo."\n";
        echo "*** Destino: ".$this->destino."\n";
        echo "*** Cantidad máxima de pasajeros: ".$this->max_pasajeros."\n";
        echo "*** Pasajeros:\n";
        
        $orden = 1;
        foreach($this->pasajeros as $documento => $datos) 
        {
            echo "*** ".$orden." --> DNI ".$documento.": ".$datos['apellido'].", ".$datos['nombre']."\n";
            $orden++;
        }
        echo "----------------------------\n";
    }
}
