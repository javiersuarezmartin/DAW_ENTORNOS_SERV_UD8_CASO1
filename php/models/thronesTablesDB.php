<?php

    class thronesTablesDB extends thronesDB {

        // Atributos
        
        // Constructor
        public function __construct() {
            parent::__construct();              
        }
        
        // No incluimos los métodos Get y Set ya que no interesa que estos datos sean accesibles en este caso.

        // Otros métodos

        // Método para mostar todos los datos de una tabla.
        public function mostrarTodo($tabla, $episodio = -1) {

            // Primero diferenciamos si nos solicitan todos los episodios o solo uno en concreto.
            if ($episodio == -1){
                $sql = 'SELECT * FROM ' . $tabla;
            } else {
                $sql = 'SELECT * FROM ' . $tabla . ' WHERE episode = ' . $episodio;
            };           
        
            // Realizamos la consulta.
            $res = $this->consulta($sql);          

            // Si se completa la consulta montamos la tabla de respuesta.
            if ($res != null) {
                $tabla = []; 
                while($row = $res->fetch_assoc()) {
                    $tabla[] = $row;
                };
                return $tabla;
            } else {
                return null;
            };
        }

        // Método para obtener solo 1 columna (En el caso del ejemplo seria episodios).
        public function mostrarColumna($tabla, $columna) {

            $sql = 'SELECT DISTINCT ' . $columna . ' FROM ' . $tabla;
            
            // Realizamos la consulta.
            $res = $this->consulta($sql);

            // Si se completa la consulta montamos la tabla de respuesta.
            if ($res != null) {
                $tabla = []; 
                while($row = $res->fetch_assoc()) {
                    $tabla[] = $row;
                };
                return $tabla;
            } else {
                return null;
            };
        }

    };
?>