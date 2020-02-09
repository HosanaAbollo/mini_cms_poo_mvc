<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ADMIN
            <small>Subheading</small>
        </h1>

        <?php
            // Vérification de connection a la BDD
            if(!$database->connection) { echo "NON CONNECTE A LA BDD"; return false;}

            // Instanciation de la classe User

            // Utilisation de methode static
            // Avantages ?
            
            // On cherche un seul user par son id 
            $unUserBDD =  User::find_user_by_id(2);
            echo '<pre>';
            var_dump($unUserBDD);
            echo '<pre/>';

            // On l'instancie
            $unUser = User::instanciation($unUserBDD);

            // On récupère son id avec la notation : $classInst->prop
          //  echo $unUser->id;

        ?>

        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

</div>