<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller 2</title>
</head>
<body>
    <form action="taller2.php" method="POST">
        <select name="menu">
            <option value="">---MENU---</option>
            <option value="lectura">1. Lectura de Datos</option>
            <option value="crearO">2. Crear Objeto</option>
            <option value="mostrarO">3. Mostrar Objeto</option>
            <option value="crarA">4. Crear Array</option>
            <option value="mostrarA">5. Mostrar Array</option>
            <option value="eliminarPrimerArray">6. Eliminar Primer Elemento Del Array</option>
            <option value="eliminarUltimoArray">7. Eliminar Ultimo Elemento Del Array</option>
            <option value="eliminarXArray">8. Eliminar Cuanquier Elemento del Array</option>
            <option value="agregarComienzoArray">9. Agregar Elemento Al Comienzo de Array</option>
            <option value="agregarFinalArray">10. Agregar Elemento Al Final de Array</option>
            <option value="crearObjeto">11. Crear Array Con Objetos</option>
            <option value="objetoFor">12. Iterar Objetos Con FOR</option>
            <option value="objetoForEach">13. Iterar Objetos Con ForEach</option>
            <option value="objetoMap">14. Iterar Objeto con MAP y crear copia</option>
        </select>
        <input type="submit" value="Enviar" name="ejecutar">
    </form>
    <form method="POST">
        <?php
            $menu = $_POST["menu"];
            $nombre;
            $edad;
            switch($menu){
                case "lectura";
                    echo "
                        <h2>Datos Personales</h2>
                        <label>Nombre</label>
                        <input type='text' placeholder='Ingrese su nombre' name='nombre'>
                        <label>Edad</label>
                        <input type='number' placeholder='Ingrese su edad' name='edad'>";
                    break;
                case "creaarO";
                    echo "<h2>Creando Objeto...</h2>";
            };
            echo "<input type='submit' value='subir datos' name='envio'class='btn btn-warning m-2' ><br>";
            /* punto #1 */
                $nombre = $_POST["nombre"];
                $edad = $_POST["edad"];
                echo "Su nombre es: $nombre y su edad es: $edad";
            /* punto #2 */
                class Objetos 
                {
                    public $nombre = "Firulais";
                }
        ?>
    </form>
</body>
</html>