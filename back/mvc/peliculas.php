<?php

    require_once('pelis.php');
    require_once('valores.php');

session_start();
if (isset($_SESSION['usuario'])) {
    $user = $_SESSION['usuario'];


        $nuevoPeli = array("imdbId" => $_POST['imdbId'], "nombre_pelicula" => $_POST['nombre_pelicula'], "poster" => $_POST['poster'],
            "anyo" => $_POST['anyo']);
        $peli = new pelis();
        $peli->insert($nuevoPeli);

        $nuevoValor = array("id_user" => $user['id'], "id_pelicula" => $_POST['imdbId'], "puntuacion" => $_POST['puntuacion'],
            "comentario" => $_POST['comentario']);
        $valor = new valores();
        $valor->insert($nuevoValor);
        //$user2->select($newUser["correo"]);
}

    if (!empty($_POST['imdbId']) && !empty($_POST['nombre']) && !empty($_POST['poster']) && !empty($_POST['anyo'])) {
        //$contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
        $nuevoPeli = array("imdbId" => $_POST['imdbId'], "nombre" => $_POST['nombre'], "poster" => $_POST['poster'],
            "anyo" => $_POST['anyo']);
        $valor = new pelis();
        $valor->insert($nuevoPeli);
        //$user2->select($newUser["correo"]);
    }
?>