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
        # $userObject->id = $userBDD['id'];
        # $userObject->user_name = $userBDD['username'];
        # $userObject->first_name = $userBDD["first_name";

        #_______________
        # Les colonnes (id, username, first_name..) des tables en BDD deviennent des propriétés pour un User $obj)
        # property correspond aux colonnes des tables , 
        #_______________
        foreach($userBDD as $attribute => $value)
        {
            # Vérifier si l'objet a bien ces propriétés, si oui on fait l'assignement 
            if(User::has_the_attribute($attribute))
            {
                $userBDD->attribute = $value;
            }
        }
       # var_dump($userObject);

        # Une fois instancié et les propriétés envoyées, on le retourne
        return $userObject;
    }

    private static function has_the_attribute($attribute)
    {   
        // Liste des propriétés de l'objet
         $userKeyList = get_object_vars(new self);
        
        # Si l'attribut (id, username ..) BDD correspond a une propriété alors on retourne booleen
        array_key_exists($attribute, $userKeyList);
        
    }



}