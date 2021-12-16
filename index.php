<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        $user = $_SESSION['usuario'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="./web/css/index.css"/>
    <link rel="apple-touch-icon" sizes="180x180" href="./web/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./web/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./web/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="./web/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="./web/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>InfoFilms</title>
    <style>
        .oculto {
            display: none !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row" id="resultat">
            <div class="col s12">
                <div class="header">
                    <img src="./web/img/logofilms.png"/>
                    <div id="info-usuari" class="noactiva">
                        <!--<h4>Bienvenido de nuevo <?= $user['nombre']; ?> <?= $user['apellido']; ?></h4>!-->
                        <div id="inicio">
                        </div>
                        <button class="waves-effect waves-light btn" type="button"><a href="/back/php/logout.php" id="botonlogout">Logout</a></button>
                    </div>
                        <div id="login" class="activa">
                            <input type="text" id="correo" name="correo" placeholder="Tu correo" value="" required/>
                            <input type="password" id="contrasena" name="contrasena" placeholder="Tu contraseña" value="" required/>
                            <center>
                                <button class="waves-effect waves-light btn" id="botonLogin" type="button">LOGIN</button>
                                <img src="./web/img/loading.gif" id="loading" height="100px" hidden/>
                            </center>
                        </div>

                    <button class="boton" type="button"><a class="register" href="./web/registro.html">REGISTRO</a></button>
                </div>
                <div class="buscador" class="oculto">
                    <center>
                        <div class="row">
                            <form class="col s12">
                                <input type="text" class="col s5" name="pelis" id="search" placeholder="Busca tu película favorita" value="">
                            </form>
                            <button class="waves-effect waves-light btn" id="enviar">BUSCAR</button>
                        </div>
                    </center>
                </div>
                <div class="row center">
                    <div id="peliculas"></div>
                </div>
            </div>
        </div>
    </div>            
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./web/js/index.js"></script>
</body>
</html>