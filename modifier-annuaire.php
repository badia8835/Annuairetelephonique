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

    <title>Modifier un annuaire</title>
</head>
<body>
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Modifier un annuaire téléphonique
                            <a href="acceuil.php" class="btn btn-danger float-end">Retournez à la page d'accueil</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $annuaire_id = $_GET['id'];
                            $stmt = $con->prepare("SELECT * FROM annuaires WHERE id=:id");
                            $stmt->bindParam(':id', $annuaire_id);
                            $stmt->execute();
                            
                            if($stmt->rowCount() > 0)
                            {
                                $annuaire = $stmt->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $annuaire['id']; ?>">

                                    <div class="mb-3">
                                        <label>Nom</label>
                                        <input type="text" name="nom" value="<?=$annuaire['nom'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Prenom</label>
                                        <input type="text" name="prenom" value="<?=$annuaire['prenom'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Numéro de Telephone</label>
                                        <input type="tel" name="telephone" value="<?=$annuaire['telephone'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Adresse</label>
                                        <input type="text" name="adresse" value="<?=$annuaire['adresse'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Ville</label>
                                        <input type="text" name="ville" value="<?=$annuaire['ville'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Province</label>
                                        <input type="text" name="province" value="<?=$annuaire['province'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="button-confirmation-modification" class="btn btn-primary">
                                            Confirmer
                                        </button>
                                        <a href="acceuil.php" class="btn btn-danger">Annuler</a>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>Aucun annuaire ñ'a pas été trouvé</h4>";
                            }
                        }
                        ?>
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