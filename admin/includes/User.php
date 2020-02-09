<?php
/*
    Trouver un moyen d'appeler une fois global $database ..
    objectif : DRY mais important de se répéter pour comprendre le problème..
*/
class User{

    # Propriétés 
    public $id;
    public $user_name;
    public $first_name;
    public $password;

    # Permet de récuperer tout les utilisateurs
    public static function find_all_users()
    {
        global $database;
        $req = "select * from users";
        return self::find_this_query($req);
    }

    # Permet de trouver un user par son id
    public static function find_user_by_id($userId)
    {   global $database;

        $userBDD = self::find_this_query("select * from users where id = $userId LIMIT 1");

        # Etape de vérification necessaire avant retour ..
        return $userBDD;
    }

    # Permet d'executer une requete 
    public static function find_this_query($req)
    {
        global $database;

        # Envoie de la requete
        $res = $database->query($req);
        
        # Recuperation des résultats en forme de tableau assoc
        $arr_res = mysqli_fetch_array($res);

        return $arr_res;

    }

    # Permet de creer un user via resultat d'enregistrement BDD
    public static function instanciation($userBDD)
    {
        # Instanciation de la class User pour la création d'un nouvel Objet
        $userObject = new self;

        # Insertion des propriétés de l'objet user via l'enregistrement BDD ( fetch_array necessaire )
         $userObject->id = $userBDD['id'];
         $userObject->user_name = $userBDD['username'];
         $userObject->first_name = $userBDD["first_name"];

       # var_dump($userObject);

        # Une fois instancié et les propriétés envoyées, on le retourne
        return $userObject;
    }

}