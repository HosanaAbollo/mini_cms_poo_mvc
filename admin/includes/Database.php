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
       // $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

       // Cet objet représente la connection à la BDD q 'on applique a la propriété conncetion 
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME); 

        // Vérifier si la connection est bien établie avec l'OBJET 
        if($this->connection->connect_errno)
        {
            die("Connection a la base de donnée imposssible" . $this->connection->error);
        } 

    }

    // Permet d'envoyer des requêtes à la BDD
    public function query($sql){

        $res = $this->connection->query($sql);

        $this->confirm_query($res);  // Vérifier si résultat req avant retour resultat 
        
        return $res;
    }

    // Permet de confirmer la requête 
    private function confirm_query($res){
        if(!$res){
            die("Requête échouée" . $this->connection->error);
        }
    }

    // Permet d'échapper les caractères non valide
    public function escape_string($string)
    {
        $escaped_string = $this->connection->real_escape_string($string);
        return $escaped_string;
    }

    public function the_insert_id(){
        return $this->connection->insert_id;
    }


}

$database = new Database;
