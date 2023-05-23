<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller 2 php</title>
</head>
<body>
    <form action="menuTaller2.php" method="post">
        <select name="menu">
            <option value="">--MENU--</option>
            <option value="lectura">1. Lectura de Datos</option>
            <option value="crearO">2. Crear Objeto</option>
            <option value="mostrarO">3. Mostrar Objeto</option>
            <option value="crearA">4. Crear Array</option>
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
        <input type="submit" value="Enviar" name="submit">
    </form>

    <form action="menuTaller2.php" method="post">
        <?php
            session_start();
            if(isset($_POST["submit"])){
                $seleccion2 = $_POST["menu"];
                $_SESSION['menu'] = $seleccion2;
                switch($seleccion2){
                    case "lectura":
                        echo '<h2>Datos Personales</h2>
                            <label>Nombre</label>
                            <input type="text" placeholder="Ingrese su Nombre" name="nombre">
                            <label>Edad</label>
                            <input type="number" placeholder="Ingrese su Edad" name="edad">';
                        break;
                    case "crearO":
                        echo '<h2>Creando Objeto...</h2>
                            <label>Nombre de tu mascota</label>
                            <input type="text" placeholder="Ingrese el nombre de la mascota" name="nombreMascota">
                            <label>Tipo de Mascota</label>
                            <input type="text" placeholder="Ingrese el tipo de mascota" name="tipoMascota">
                            <label>Edad</label>
                            <input type="number" placeholder="Ingrese la edad de la mascota" name="edadMascota">
                            <label>Color</label>
                            <input type="text" placeholder="Ingrese el color de su mascota" name="colorMascota">';
                        break;
                    case "crearA":
                        echo '<h2>Creando Array sobre lenguajes de Programacion...</h2>
                        <label>Digite los lenguajes de Programacion que sabes</label><br>
                        <input type="text" placeholder="Digite el nombre" name="nombresLenguajes1"><br>
                        <input type="text" placeholder="Digite el nombre" name="nombresLenguajes2"><br>
                        <input type="text" placeholder="Digite el nombre" name="nombresLenguajes3"><br>
                        <input type="text" placeholder="Digite el nombre" name="nombresLenguajes4">';
                        break;
                }
                //Punto #3
                if($_SESSION['menu'] == "mostrarO"){
                    $pet = new Objetos($_SESSION['tipoMascota'], $_SESSION['nombreMascota'], $_SESSION['edadMascota'], $_SESSION['colorMascota']);
                    echo "<h3>Tipo de Mascota: </h3>";
                    echo $pet->getMascota() . "<br>" . "<h3>Nombre de la Mascota: </h3>";
                    echo $pet->getNombre() . "<br>" . "<h3>Edad de la Mascota: </h3>";
                    echo $pet->getEdad() . "<br>" . "<h3>Color de la Mascota: </h3>";
                    echo 
                    $pet->getColor();
                }
                //Punto #5
                if($_SESSION['menu'] == "mostrarA"){
                    echo "aqui se muestra el array" . "<br>";
                    for ($i=1; $i < 4+1; $i++) { 
                        echo "Lenguaje #$i:   -> ";
                        echo $_SESSION["nombresLenguajes$i"] . "<br>";
                    }
                }
            }
            //objeto del punto 2, 3, 12, 13, 14
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
            echo '<input type="submit" value="Subir Datos" name="enviarD"><br>';
            if(isset($_POST["enviarD"])){
                // Punto #1
                if($_SESSION['menu'] == "lectura"){
                    $nombre = $_POST["nombre"];
                    $edad = $_POST["edad"];
                    echo "Su Nombre es: ". $nombre  . " y su Edad es: " .$edad;
                }
                // Punto #2
                if($_SESSION['menu'] == "crearO"){
                    $_SESSION['tipoMascota'] = $_POST["tipoMascota"];
                    $_SESSION['nombreMascota'] = $_POST["nombreMascota"];
                    $_SESSION['edadMascota'] = $_POST["edadMascota"];
                    $_SESSION['colorMascota'] = $_POST["colorMascota"];
                    echo "Objeto creado ✔";
                }
                // Punto #4
                if($_SESSION['menu'] == "crearA"){
                    for ($i=1; $i < 4+1; $i++) { 
                        $_SESSION["nombresLenguajes$i"] = $_POST["nombresLenguajes$i"];
                    }
                    echo "Array Creado ✔";
                } 
            }
            
        ?>
    </form>




    <!-- Punto #6 -->
    



</body>
</html>