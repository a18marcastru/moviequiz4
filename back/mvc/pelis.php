<?php

// magic constant
require_once ("DBAbstractModel.php");//modificar

class pelis extends DBAbstractModel {

<<<<<<< HEAD
    private $imdbId;
    private $nombre_pelicula;
    private $poster;
    private $anyo;
=======
    private $id;
    private $nombre_pelicula;
    private $anyo;
    private $valoracion;
    private $comentario;
    private $id_user;
>>>>>>> 02947b91e17d7337a59677f13949962e0d666111

    // public $message;

    function __construct() {
        $this->db_name = "moviequiz4";
    }

    function __toString() {
        echo "entro string <br>";
<<<<<<< HEAD
        return "(" . $this->imdbId . ", " . $this->nombre_pelicula . ", " . $this->poster .", " . $this->anyo . ")";
=======
        return "(" . $this->id . ", " . $this->nombre_pelicula . ", " . $this->anyo .", " . $this->valoracion . ", " .
            $this->comentario .", " . $this->id_user . ")";
>>>>>>> 02947b91e17d7337a59677f13949962e0d666111
    }

    function __destruct() {
    }

    //select dels camps passats de tots els registres
    //stored in $rows property
    public function selectAll($fields=array()) {

        $this->query="SELECT ";
        $firstField = true;
        for ($i=0; $i<count($fields); $i++) {
            if ($firstField) {
                $this->query .= $fields[$i];
                $firstField=false;
            }
            else $this->query .= ", " . $fields[$i];
        }
<<<<<<< HEAD
        $this->query .= " FROM peliculas";
=======
        $this->query .= " FROM valores";
>>>>>>> 02947b91e17d7337a59677f13949962e0d666111
        // $this->query = "SELECT * FROM usuario";
        $this->get_results_from_query();
        return $this->rows;

    }

    public function select($nombre_pelicula="") {
        if (!empty($nombre_pelicula)) {
            $this->query = "SELECT *
<<<<<<< HEAD
                    FROM peliculas
=======
                    FROM valores
>>>>>>> 02947b91e17d7337a59677f13949962e0d666111
                    WHERE nombre_pelicula = '$nombre_pelicula'";
            $this->get_results_from_query();
        }
        // Any register selected
        if (count($this->rows)==1) {
            foreach ($this->rows[0] as $property => $value)
                $this->$property = $value;
        }
        return $this->rows;
    }


    public function insert($user_data = array()) {
        if (array_key_exists("nombre_pelicula", $user_data)) {
            $result = $this->select($user_data["nombre_pelicula"]);
            if (empty($result)) {
                foreach ($user_data as $field => $value)
                    $$field = $value;
<<<<<<< HEAD
                $this->query="INSERT INTO peliculas (imdbId, nombre_pelicula, poster, anyo)
                      VALUES ('$imdbId','$nombre_pelicula','$poster','$anyo')";
=======
                $this->query="INSERT INTO valores (nombre_pelicula, anyo, valoracion, comentario, id_user)
                      VALUES ('$nombre_pelicula','$anyo','$valoracion','$comentario','$id_user')";
>>>>>>> 02947b91e17d7337a59677f13949962e0d666111
                $this->execute_single_query();
                $this->message = "Se ha insertado una pelicula";
            } else $this->message = "Ya hay una pelicula";
        } else $this->message = "Usuari no inserit";
    }

    public function update ($userData = array()) {

    }

    public function delete ($nom="") {

    }
}