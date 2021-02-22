<?php

    function resumen($conn) {
        // Almacenamos el resultado en una variable.
        $tabla_summary = $conn->mostrarTodo('titles');
                                
        // Recorremos el resultado y se imprime.
        $titulos = ['ID', 'T&iacute;tulo', 'Trama', 'Creadores', 'Inicio', 'Fin', 'Temporadas', 'G&eacute;nero'];

        foreach ($tabla_summary as $summary) {
            $titles = (array_keys($summary));

            for($i=0; $i<count($summary); $i++) {
                echo ('<tr>');
                echo('<td class="grey">' . $titulos[$i] .'</td>');                                                            
                echo ('</tr>');  
                echo ('<tr>');
                echo('<td>' . $summary[$titles[$i]]. '</td>');
                echo ('</tr>');  
            };
        };

    };


    // Función que carga las opciones de episodios.
    function mostrarSelect($conn) {
        
        $episodios = $conn->mostrarColumna('season_ep', 'episode');
                        
        // Creamos el Select
        echo('<label for="episodios">Selecciona Episodio</label>');
        echo('<select name="episodios" id="episodios">'); 
        
        // Recorremos el resultado y se imprimen las opciones.
        foreach ($episodios as $episodio) {
            echo('<option value=' . $episodio['episode'] . '>' . $episodio['episode'] . '</option>');                                
        };
        
        // Fin del Select
        echo('</select>');

    };
    
?>