<?php
class Database
{

    public $connection;

    public function __construct()
    {
        // Connexion automatique à la BDD
        $this->open_db_connection();
    }

    // Permet d'ouvrir la connection à la BDD
    public function open_db_connection()
    {
        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        // Vérifier si la connection est bien établie 
        if(mysqli_connect_errno())
        {
            die("Connection a la base de donnée imposssible" . mysqli_error());
        } 

    }

    // Permet d'envoyer des requêtes à la BDD
    public function query($sql){

        $res = mysqli_query($this->connection, $sql);
        return $res;
    }

    // Permet de confirmer la requête 
    private function confirm_query($res){
        if(!$res){
            die("Requête échouée");
        }
    }

    // Permet d'échapper les caractères non valide
    public function escape_string($string)
    {
        $escaped_string = mysqli_real_escape_string($this->connection, $string);
        return $escaped_string;
    }


}

$database = new Database;
