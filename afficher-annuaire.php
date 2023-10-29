<?php
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

    <title>Afficher un annuaire</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Afficher le detail d'un annuaire téléphonique
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
                                
                                    <div class="mb-3">
                                        <label>Nom</label>
                                        <p class="form-control">
                                            <?=$annuaire['nom'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Prenom</label>
                                        <p class="form-control">
                                            <?=$annuaire['prenom'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Numéro de Telephone</label>
                                        <p class="form-control">
                                            <?=$annuaire['telephone'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Adresse</label>
                                        <p class="form-control">
                                            <?=$annuaire['adresse'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>Ville</label>
                                        <p class="form-control">
                                            <?=$annuaire['ville'];?>
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>Province</label>
                                        <p class="form-control">
                                            <?=$annuaire['province'];?>
                                        </p>
                                    </div>
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