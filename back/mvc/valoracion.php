<?php
    require_once('valores.php');
    session_start();
    if (isset($_SESSION['usuario'])) {
        $user = $_SESSION['usuario'];

        if(!empty($_POST['nombre']) && !empty($_POST['anyo']) && !empty($_POST['comentario'])) {
            //$contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
            $nuevoValor = array ("nombre_pelicula" => $_POST['nombre'],"anyo" => $_POST['anyo'],"valoracion" => 1,"comentario" => $_POST['comentario'],
                "id_user" => $user['id']);
            $valor = new valores();
            $valor->insert($nuevoValor);
            //$user2->select($newUser["correo"]);

            /*session_start();
            $arr = array('exito' => true, 'mensage' => $user2, 'nombre' => $_POST['nombre'], 'apellido' => $_POST['apellido']);
            $myJSON = json_encode($arr);
            echo $myJSON;*/
        }
    }
?>