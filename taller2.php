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
            };
            echo "<input type='submit' value='subir datos' name='envio'class='btn btn-warning m-2' ><br>";
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];
            echo "Su nombre es: $nombre y su edad es: $edad";
        ?>
    </form>



    <div class="caja6">
        <form action="taller2.php" method="post">
            <label for="contador">Ingrese la cantidad de estudiantes: </label>
            <input type="number" name="contador">
            <input type="submit" value="Enviar" class="btn btn-warning m-2">
        </form>
        <form action="" method="post">
            <?php
                $contador = $_POST["contador"];
                $nombres = [];
                $sexos = [];
                $notas = [];
                $numeroMujeres = 0;
                $numeroHombres = 0;
                for ($i=1; $i <= $contador; $i++) {
                    echo "
                    <label>Digitar Nombre {$i}</label>
                    <input type='text' name='nombre$i' >
                    <label>Digitar Sexo {$i}</label>
                    <select name='genero$i'>
                        <option value=''>Seleccione</option>
                        <option value='hombre'>hombre</option>
                        <option value='mujer'>mujer</option>
                    </select>
                    <label>Digitar Nota {$i}</label>
                    <input type='number' name='nota$i' step='0.1'><br><br>";
                }
                echo "<input type='hidden' name='contador' value='$contador'>";
                echo "<input type='submit' value='subir datos' name='envio'class='btn btn-warning m-2' ><br>";
                for ($i=1; $i <= $contador; $i++) {
                    $nombre = $_POST["nombre$i"];
                    $sexo = $_POST["genero$i"];
                    $nota = $_POST["nota$i"];
                    $nombres[] = $nombre;
                    $sexos[] = $sexo;
                    $notas[] = $nota;
                
                    if($sexo){
                        if($sexo == 'hombre'){
                            $numeroHombres++;
                        }else{
                            $numeroMujeres++;
                        }
                    }
                } 

                $notaMayor = max($notas);
                $notaMenor = min($notas);
                $posicionMayor = array_search($notaMayor, $notas);
                $posicionMenor = array_search($notaMenor, $notas);
                $estudianteMax = array_values($nombres)[$posicionMayor];
                $estudianteMin = array_values($nombres)[$posicionMenor];    
            
                echo "<br>El estudiante con mayor nota es: $estudianteMax con una nota de $notaMayor";
                echo "<br>El estudiante con menor nota es: $estudianteMin con una nota de $notaMenor";
                echo "<br>Hay un total de $numeroHombres hombres y $numeroMujeres mujeres"
            ?>
        </form>
    </div>
</body>
</html>