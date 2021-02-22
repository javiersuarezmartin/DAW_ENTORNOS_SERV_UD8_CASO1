<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game of Thrones (Ampliaci&oacute;n)</title>
    <link rel="stylesheet" href="../../css/styles.css" type="text/css">
</head>

<body>
    <div class="container">

        <div class="container-body">
            <img src="../../img/medieval.jpg" class="logo" alt="Casco_Medieval">
            <h1>Game of Thrones</h1>
            <p>Por favor, pulsa sobre la opci&oacute;n deseada</p>

            <div class="links">
                <a href="./actores.php" class="btn">ACTORES</a>
            </div>
                
            <!-- Formulario Episodios -->
            <form action="./actoresTemp.php" method="POST" class="formulario">

                <!-- Comienza código PHP -->
                    
                <?php                            
                    // Incluimos los archivo externo que contiene la función que usaremos para cargar las opciones.
                    include '../models/thronesDB.php';
                    include '../models/thronesTablesDB.php';

                    // Incluimos un fichero auxiliar que contiene función para mostrar el resumen.
                    include './views.php';

                    // Creamos el objeto para manejar la tabla.
                    $conn = new thronesTablesDB();

                    if($conn->hayError()) {
                        // ERROR CONEXIÓN
                        echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');    
                    } else {
                        // CONEXIÓN CORRECTA -> MOSTRAMOS OPCIONES DE SELECT DESPLEGABLE
                        mostrarSelect($conn);
                    };            
                    
                ?>          
                <!-- Finaliza código PHP -->
                <br>
                <input type="submit" class="btn" value="ACTORES (POR EPISODIO)">
            </form>       
            
            <a href="./index.php" class="btn">VER ORIGINAL</a>
           
            <div class="summary">
                <div class="summary-body">
                <h2>RESUMEN</h2>
                    <table>
                        <!-- Continua código PHP -->
                        <?php                    
                            
                            if($conn->hayError()) {
                                // ERROR CONEXIÓN
                                echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');    
                            } else {
                                // CONEXIÓN CORRECTA -> MOSTRAMOS TABLA RESUMEN
                                echo('<table>');
                                resumen($conn);
                                echo('</table>');
                            };
                        ?>          
                        <!-- Finaliza código PHP -->
                    </table>
                </div>
            </div>
            
        </div>

    </div>
</body>

</html>