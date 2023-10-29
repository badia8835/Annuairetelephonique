<?php
    session_start();
    require 'dbcon.php';
   
    include 'header.php';
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Annuaire telephonique </title>
</head>
<body>


  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Gestionnaire d'annuaire téléphonique
                            <a href="creer-annuaire.php" class="btn btn-primary float-end">Ajouter un annuaire téléphonique</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Numero de telephone</th>
                                    <th>Adresse</th>
                                    <th>Ville</th>
                                    <th>Province</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                             //       $query = "SELECT * FROM annuaires ORDER BY nom ASC;";
                             //       $query_run = mysqli_query($con, $query);

                                    $query = "SELECT * FROM annuaires ORDER BY nom ASC;";
                                    $stmt = $con->query($query);
                                    $query_run = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    if(count($query_run) > 0)
                                    {
                                        foreach($query_run as $annuaire)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $annuaire['nom']; ?></td>
                                                <td><?= $annuaire['prenom']; ?></td>
                                                <td><?= $annuaire['telephone']; ?></td>
                                                <td><?= $annuaire['adresse']; ?></td>
                                                <td><?= $annuaire['ville']; ?></td>
                                                <td><?= $annuaire['province']; ?></td>
                                                <td>
                                                    <a href="afficher-annuaire.php?id=<?= $annuaire['id']; ?>" class="btn btn-info btn-sm">Afficher</a>
                                                    <a href="modifier-annuaire.php?id=<?= $annuaire['id']; ?>" class="btn btn-success btn-sm">Modifier</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="button-supprimer" value="<?=$annuaire['id'];?>" class="btn btn-danger btn-sm">Supprimer</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Aucun annuaire téléphonique n'a été trouvé </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

<?php
   // Include the footer
   include 'footer.php';
?>

</html>