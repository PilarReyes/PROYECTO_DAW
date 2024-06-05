<?php

class MySQL
{
    public $datos = []; 
    public $query = '';
    public $ultimoId = '';
    private $error = ''; 

    public function __construct($consulta)
    {
        if (!empty($consulta)) {
            $this->query = $consulta;
            $this->datos = []; 

           
            $conexion = mysqli_connect("localhost", "root", "", "innersync");

         
            if (!$conexion) {
                $this->error = "Error en la conexión: " . mysqli_connect_error();
                return;
            }

         
            $salida = mysqli_query($conexion, $consulta);
            $this->ultimoId = mysqli_insert_id($conexion);

         
            if (!$salida) {
                $this->error = "Error en la consulta SQL: " . mysqli_error($conexion);
            } else {
                if (stripos($consulta, "SELECT") === 0) {
                    
                    while ($fila = mysqli_fetch_array($salida, MYSQLI_ASSOC)) {
                        $this->datos[] = $fila;
                    }
                }
            }

           
            mysqli_close($conexion);
        }
    }

    
    public function getItem($fila, $col)
    {
        return isset($this->datos[$fila][$col]) ? $this->datos[$fila][$col] : "";
    }

   
    public function getFilas()
    {
        return count($this->datos);
    }


    public function getColumnas($fila)
    {
        return count($this->datos[$fila] ?? []);
    }

    
    public function getQuery()
    {
        return $this->query;
    }

    public function getUltimoId()
    {
        return $this->ultimoId;
    }

    
    public function getError()
    {
        return $this->error;
    }
}
