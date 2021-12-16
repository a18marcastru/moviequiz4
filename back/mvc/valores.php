<?php

// magic constant
require_once ("DBAbstractModel.php");//modificar

class valores extends DBAbstractModel {

<<<<<<< HEAD
=======
    private $id;
    private $nombre_pelicula;
    private $anyo;
    private $valoracion;
    private $comentario;
>>>>>>> 02947b91e17d7337a59677f13949962e0d666111
    private $id_user;
    private $id_pelicula;
    private $puntuacion;
    private $comentario;

    // public $message;

    function __construct() {
        $this->db_name = "moviequiz4";
    }

    function __toString() {
        echo "entro string <br>";
<<<<<<< HEAD
        return "(" . $this->id_user . ", " . $this->id_pelicula . ", " . $this->puntuacion .", " . $this->comentario . ")";
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
        $this->query .= " FROM valoracion";
        // $this->query = "SELECT * FROM usuario";
        $this->get_results_from_query();
        return $this->rows;

    }

<<<<<<< HEAD
    public function select($id_pelicula="") {
        if (!empty($id_pelicula)) {
            $this->query = "SELECT *
                    FROM valoracion
                    WHERE id_pelicula = '$id_pelicula'";
=======
    public function select($nombre_pelicula="") {
        if (!empty($nombre_pelicula)) {
            $this->query = "SELECT *
                    FROM valores
                    WHERE nombre_pelicula = '$nombre_pelicula'";
>>>>>>> 02947b91e17d7337a59677f13949962e0d666111
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
<<<<<<< HEAD
        if (array_key_exists("id_pelicula", $user_data)) {
            $result = $this->select($user_data["id_pelicula"]);
            if (empty($result)) {
                foreach ($user_data as $field => $value)
                    $$field = $value;
                $this->query="INSERT INTO valoracion (id_user, id_pelicula, puntuacion, comentario)
                      VALUES ('$id_user','$id_pelicula','$puntuacion','$comentario')";
                $this->execute_single_query();
                $this->message = "Se ha insertado un comentario";
            } else $this->message = "Ya hay un comentario";
=======
        if (array_key_exists("nombre_pelicula", $user_data)) {
            $result = $this->select($user_data["nombre_pelicula"]);
            if (empty($result)) {
                foreach ($user_data as $field => $value)
                    $$field = $value;
                $this->query="INSERT INTO valores (nombre_pelicula, anyo, valoracion, comentario, id_user)
                      VALUES ('$nombre_pelicula','$anyo','$valoracion','$comentario','$id_user')";
                $this->execute_single_query();
                $this->message = "Se ha insertado una pelicula";
            } else $this->message = "Ya hay una pelicula";
>>>>>>> 02947b91e17d7337a59677f13949962e0d666111
        } else $this->message = "Usuari no inserit";
    }

    public function update ($userData = array()) {

    }

    public function delete ($nom="") {

    }
}

?>
