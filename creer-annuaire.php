<?php
session_start();
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

    <title>Creer un annuaire</title>
</head>
<body>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ajouter un nouveau annuaire téléphonique
                            <a href="acceuil.php" class="btn btn-danger float-end">Retournez à la page d'accueil</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" class="needs-validation" novalidate>

                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" name="nom" class="form-control" required>
                                <div class="invalid-feedback">
                                  SVP entrez un nom valide!
                                </div>                                
                            </div>
                            <div class="mb-3">
                                <label>Prenom</label>
                                <input type="text" name="prenom" class="form-control" required>
                                <div class="invalid-feedback">
                                  SVP entrez un prenom valide!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Numéro de Telephone</label>
                                <input type="tel" name="telephone" class="form-control" required>
                                <div class="invalid-feedback">
                                  SVP entrez un numéro de telephone valide!
                                </div>                                
                            </div>
                            <div class="mb-3">
                                <label>Adresse</label>
                                <input type="text" name="adresse" class="form-control" required>
                                <div class="invalid-feedback">
                                  SVP entrez une adresse valide
                                </div>                                
                            </div>
                            <div class="mb-3">
                                <label>Ville</label>
                                <input type="text" name="ville" class="form-control" required>
                                <div class="invalid-feedback">
                                  SVP entrez une ville valide
                                </div>                                
                            </div>
                            <div class="mb-3">
                                <label>Province</label>
                                <input type="text" name="province" class="form-control" required>
                                <div class="invalid-feedback">
                                  SVP entrez une province valide
                                </div>                                
                            </div                            
                            <div class="mb-3">
                                <button type="submit" name="button-confirmation-creation" class="btn btn-primary">Confirmer</button>
                                <a href="acceuil.php" class="btn btn-danger">Annuler</a>
                            </div> 

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>
</body>


<?php
   // Include the footer
   include 'footer.php';
?>
</html>
