<?php

class MySQL
{
    public $datos = []; // Array de datos inicializado como vacío
    public $query = '';
    public $ultimoId = '';
    private $error = ''; // Variable para almacenar mensajes de error

    public function __construct($consulta)
    {
        if (!empty($consulta)) {
            $this->query = $consulta;
            $this->datos = []; // Reinicia los datos a un array vacío

            // Crear la conexión a la base de datos
            $conexion = mysqli_connect("localhost", "root", "", "innersync");

            // Verificar si la conexión falló
            if (!$conexion) {
                $this->error = "Error en la conexión: " . mysqli_connect_error();
                return;
            }

            // Ejecutar la consulta
            $salida = mysqli_query($conexion, $consulta);
            $this->ultimoId = mysqli_insert_id($conexion);

            // Verificar si ocurrió un error durante la ejecución de la consulta
            if (!$salida) {
                $this->error = "Error en la consulta SQL: " . mysqli_error($conexion);
            } else {
                if (stripos($consulta, "SELECT") === 0) {
                    // Leer los resultados con MYSQLI_ASSOC para devolver los nombres de columna
                    while ($fila = mysqli_fetch_array($salida, MYSQLI_ASSOC)) {
                        $this->datos[] = $fila;
                    }
                }
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);
        }
    }

    // Devuelve un ítem específico del resultado
    public function getItem($fila, $col)
    {
        return isset($this->datos[$fila][$col]) ? $this->datos[$fila][$col] : "";
    }

    // Devuelve el número total de filas en los datos
    public function getFilas()
    {
        return count($this->datos);
    }

    // Devuelve el número de columnas de una fila dada
    public function getColumnas($fila)
    {
        return count($this->datos[$fila] ?? []);
    }

    // Devuelve la consulta SQL
    public function getQuery()
    {
        return $this->query;
    }

    // Devuelve el último ID insertado
    public function getUltimoId()
    {
        return $this->ultimoId;
    }

    // Devuelve el mensaje de error
    public function getError()
    {
        return $this->error;
    }
}
