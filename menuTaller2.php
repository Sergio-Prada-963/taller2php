<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller 2 php</title>
    <link rel="stylesheet" href="menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <form action="menuTaller2.php" method="post" id="menuP">
        <select name="menu" class="form-select form-select-lg mb-3 text-center" aria-label=".form-select-lg example">
            <option id="opt">--MENU TALLER 2 PHP--</option>
            <option value="lectura" id="opt">1. Lectura de Datos</option>
            <option value="crearO" id="opt">2. Crear Objeto</option>
            <option value="mostrarO" id="opt">3. Mostrar Objeto</option>
            <option value="crearA" id="opt">4. Crear Array</option>
            <option value="mostrarA" id="opt">5. Mostrar Array</option>
            <option value="eliminarPrimerArray" id="opt">6. Eliminar Primer Elemento Del Array</option>
            <option value="eliminarUltimoArray" id="opt">7. Eliminar Ultimo Elemento Del Array</option>
            <option value="eliminarXArray" id="opt">8. Eliminar Cuanquier Elemento del Array</option>
            <option value="agregarComienzoArray" id="opt">9. Agregar Elemento Al Comienzo de Array</option>
            <option value="agregarFinalArray" id="opt">10. Agregar Elemento Al Final de Array</option>
        </select>
        <div class="d-flex gap-5">
            <input type="submit" value="Enviar" name="submit" class="btn btn-light">
            <input type="submit" value="Limpiar" name="limpiar" class="btn btn-danger">
        </div>
    </form>

    <form action="menuTaller2.php" method="post" id="menuSegundario">
        <?php
            session_start();
            if(isset($_POST["submit"])){
                $array = [];
                $seleccion2 = $_POST["menu"];
                $_SESSION['menu'] = $seleccion2;
                switch($seleccion2){
                    case "lectura":
                        echo '<h2>Datos Personales</h2>
                            <label>Nombre</label>
                            <input type="text" placeholder="Ingrese su Nombre" name="nombre" id="input">
                            <label>Edad</label>
                            <input type="number" placeholder="Ingrese su Edad" name="edad" id="input">';
                        break;
                    case "crearO":
                        echo '<h2>Creando Objeto...</h2>
                            <label>Nombre de tu mascota</label>
                            <input type="text" placeholder="Ingrese el nombre de la mascota" name="nombreMascota" id="input">
                            <label>Tipo de Mascota</label>
                            <input type="text" placeholder="Ingrese el tipo de mascota" name="tipoMascota" id="input">
                            <label>Edad</label>
                            <input type="number" placeholder="Ingrese la edad de la mascota" name="edadMascota" id="input">
                            <label>Color</label>
                            <input type="text" placeholder="Ingrese el color de su mascota" name="colorMascota" id="input" id="input">';
                        break;
                    case "crearA":
                        echo '<h2>Creando Array sobre lenguajes de Programacion...</h2>
                        <label>Digite los lenguajes de Programacion que sabes</label>
                        <input type="text" placeholder="Digite el nombre" name="nombresLenguajes1" id="input">
                        <input type="text" placeholder="Digite el nombre" name="nombresLenguajes2" id="input">
                        <input type="text" placeholder="Digite el nombre" name="nombresLenguajes3" id="input">
                        <input type="text" placeholder="Digite el nombre" name="nombresLenguajes4" id="input">';
                        break;
                    case "mostrarO":
                        $pet = new Objetos($_SESSION['tipoMascota'], $_SESSION['nombreMascota'], $_SESSION['edadMascota'], $_SESSION['colorMascota']);
                        echo "<h2>Tipo de Mascota: </h2>";
                        echo "<label>".$pet->getMascota()."</label>" . "<h3>Nombre de la Mascota: </h3>";
                        echo "<label>".$pet->getNombre()."</label>" . "<h3>Edad de la Mascota: </h3>";
                        echo "<label>".$pet->getEdad()."</label>" . "<h3>Color de la Mascota: </h3>";
                        echo "<label>".$pet->getColor()."</label>";
                        break;
                    case "mostrarA":
                        echo "<h2>Array recorrido con FOREACH</h2>" . "";
                        $i = 0;
                        foreach ($_SESSION["saveArray"] as $key => $value) {
                            $i++;
                            echo "<label>Nombre del Lenguaje #$i :  " . $value . "</label><br>";
                        }
                        echo "<label>Visualizando el Array con print_r</label>";
                        echo print_r($_SESSION["saveArray"]);
                        echo "<label>Visualizando el Array con var_dump</label>";
                        echo var_dump($_SESSION["saveArray"]);
                        break;
                    case "eliminarPrimerArray":
                        $first = array_shift($_SESSION["saveArray"]);
                        echo "<label>Primer elemento eliminado  El elemento eliminado fue:  $first</label>";
                        break;
                    case "eliminarUltimoArray":
                        $last = array_pop($_SESSION["saveArray"]);
                        echo "<label>Ultimo elemento del array eliminado  El elemento eliminado Fue:  $last</label>";
                        break;
                    case "eliminarXArray":
                        echo "<h2>Seleccione el Elemento a ELIMINAR</h2>";
                        echo '<select name="deleteX" class="form-select form-select-lg mb-3 text-center" aria-label=".form-select-lg example">
                        <option value="">->-OPCIONES-<-</option>';
                            foreach ($_SESSION["saveArray"] as $key => $value) {
                                echo '<option value="'.$key.'">'."$value".'</option>';
                            }
                        echo "</select>";
                        break;
                    case "agregarComienzoArray":
                        echo "<h2>Agregar al Comienzo del Array</h2>";
                        echo '<input type="text" placeholder="Digite el nuevo nombre" name="nombresLenguajesE" id="input">';
                        break;
                    case "agregarFinalArray":
                        echo "<h2>Agregar al Final del Array</h2>";
                        echo '<input type="text" placeholder="Digite el nuevo nombre" name="nombresLenguajesE" id="input">';
                        break;
                }
            }    
            //objeto del punto 2 y 3
            class Objetos {
                private $mascota;
                private $nombre;
                private $edad;
                private $color;
                public function __construct($mascota, $nombre, $edad, $color){
                    $this->mascota = $mascota;
                    $this->nombre = $nombre;
                    $this->edad = $edad;
                    $this->color = $color;
                }
                public function getMascota(){
                    return $this->mascota;
                }
                public function getNombre(){
                    return $this->nombre;
                }
                public function getEdad(){
                    return $this->edad;
                }
                public function getColor(){
                    return $this->color;
                }
            }
            echo '<input type="submit" value="Subir Datos" name="enviarD" class="btn btn-warning">';
            if(isset($_POST["enviarD"])){
                // Punto #1
                if($_SESSION['menu'] == "lectura"){
                    $nombre = $_POST["nombre"];
                    $edad = $_POST["edad"];
                    echo "<label>Su Nombre es: ". $nombre  . " y su Edad es: " .$edad . "</label>";
                }
                // Punto #2
                if($_SESSION['menu'] == "crearO"){
                    $_SESSION['tipoMascota'] = $_POST["tipoMascota"];
                    $_SESSION['nombreMascota'] = $_POST["nombreMascota"];
                    $_SESSION['edadMascota'] = $_POST["edadMascota"];
                    $_SESSION['colorMascota'] = $_POST["colorMascota"];
                    echo "<label>Objeto creado ✔</label>";
                }
                // Punto #4
                if($_SESSION['menu'] == "crearA"){
                    for ($i=1; $i < 5; $i++) { 
                        $_SESSION["nombresLenguajes$i"] = $_POST["nombresLenguajes$i"];
                        $elemento = $_POST["nombresLenguajes$i"];
                        $array["nombresLenguajes$i"] = $elemento;
                        print_r($array);
                    }
                    echo "<label>Array Creado ✔</label>";
                    $_SESSION["saveArray"] = $array;
                } 
                //punto #8
                if($_SESSION['menu'] == "eliminarXArray"){
                    $delete = $_POST["deleteX"];
                    unset($_SESSION["saveArray"]["$delete"]);
                    echo "Eliminado Con Exito ✔";
                }
                //Punto #9
                if($_SESSION['menu'] == "agregarComienzoArray"){
                    $añadirPrincipio = $_POST["nombresLenguajesE"];
                    $_SESSION["saveArray"] = ["$añadirPrincipio" => "$añadirPrincipio"] + $_SESSION["saveArray"];
                    print_r($_SESSION["saveArray"]);
                }
                //punto #10
                if($_SESSION['menu'] == "agregarFinalArray"){
                    $añadirFinal = $_POST["nombresLenguajesE"];
                    $_SESSION["saveArray"] = $_SESSION["saveArray"]+["$añadirFinal" => "$añadirFinal"];
                    print_r($_SESSION["saveArray"]);
                }
            } 
            if(isset($_POST["limpiar"])) {
                $_SESSION['menu'] = [];
                $_SESSION['tipoMascota'] = [];
                $_SESSION['nombreMascota'] = [];
                $_SESSION['edadMascota'] = [];
                $_SESSION['colorMascota'] = [];
                $_SESSION["saveArray"] = [];
                echo "<label>Limpiado ✔...</label>";
            }
        ?>
    </form>
</body>
</html>