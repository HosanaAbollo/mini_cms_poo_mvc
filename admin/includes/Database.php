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
}

$database = new Database;
