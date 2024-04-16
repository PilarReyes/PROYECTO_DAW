<?php

class MySQL
{
    public $datos; // Array de datos
    public $query = '';
    public $ultimoId = '';

    public function __construct($consulta)
    {
        if (!empty($consulta)) {
            $this->query = $consulta;
            $conexion = mysqli_connect("localhost", "root", "", "BulletJournal");

            if (!$conexion) {
                die("Error en la conexión: " . mysqli_connect_error());
            }

            $salida = mysqli_query($conexion, $consulta);
            $this->ultimoId = mysqli_insert_id($conexion);

            if (!mysqli_error($conexion)) {
                if (substr($consulta, 0, 6) == "SELECT") {
                    while ($fila = mysqli_fetch_array($salida, MYSQLI_BOTH)) // Leer dato a dato el resultado
                    {
                        $this->datos[] = $fila;
                    }
                }
            }
            mysqli_close($conexion);
        }
    }

    public function getItem($fila, $col)
    {
        (isset($this->datos[$fila][$col])) ? $ret = $this->datos[$fila][$col] : $ret = "";
        return $ret;
    }

    public function getFilas()
    {
        (isset($this->datos)) ? $ret = count($this->datos) : $ret = 0;
        return $ret;
    }

    public function getColumnas($fila)
    {
        return count($this->datos[$fila]);
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function getUltmoId()
    {
        return $this->ultimoId;
    }
}

?>
