<?php

    require_once('pelis.php');

    if (!empty($_POST['imdbId']) && !empty($_POST['nombre']) && !empty($_POST['poster']) && !empty($_POST['anyo'])) {
        //$contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
        $nuevoPeli = array("imdbId" => $_POST['imdbId'], "nombre" => $_POST['nombre'], "poster" => $_POST['poster'],
            "anyo" => $_POST['anyo']);
        $valor = new pelis();
        $valor->insert($nuevoPeli);
        //$user2->select($newUser["correo"]);
    }

?>