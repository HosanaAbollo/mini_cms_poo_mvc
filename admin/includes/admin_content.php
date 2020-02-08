<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ADMIN
            <small>Subheading</small>
        </h1>

        <?php
            if(!$database->connection) { echo "NON CONNECTE A LA BDD"; return false;}

            // Instanciation de la classe User

            $res = User::find_all_users();  // récupérer tout les users

            // Parcourir le tableau et afficher les résultats
            while($row = mysqli_fetch_array($res))
            {
                    echo $row['username'] . ' <br/>';
            }

            $user = User::find_user_by_id(2);

            echo $user["username"];

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