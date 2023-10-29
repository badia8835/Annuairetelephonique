<?php
session_start();
require 'dbcon.php';

    if(isset($_POST['button-login']))
    {

    if (isset($_POST['username']) && isset($_POST['password'])) {


        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare and execute SQL statement
        $stmt = $con->prepare("SELECT *  FROM login WHERE username = ? AND password = ?");
        $stmt->execute([$username, $password]);

        // Retrieve result set
        $row = $stmt->rowCount();

        // Check if username and password exist
        if ($row > 0) {

            $_SESSION['message'] = "vous avez connecte avec success";
    
            // On redirige vers la page d'accueil
            header("Location: acceuil.php");

        } else {

            $error_message = "Invalid username or password.";

            // Output JavaScript alert box
            echo "<script>alert('$error_message');</script>";
            header("Location: index.php");
            exit(0);
        }

        // Close connection
        unset($stmt);
        unset($con);
    }


}


 if(isset($_POST['button-supprimer']))
{
    $annuaire_id = $_POST['button-supprimer'];


    $query = "DELETE FROM annuaires WHERE id='$annuaire_id' ";
    $stmt = $con->query($query);
    $query_run = $stmt->execute();
    if($query_run)
    {
        $_SESSION['message'] = "L'annuaire a été supprimé avec succès";
        header("Location: acceuil.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "L'annuaire n'a pas été supprimé";
        header("Location: acceuil.php");
        exit(0);
    }
}

if(isset($_POST['button-confirmation-modification']))
{
    $annuaire_id = ($_POST['id']);
    $nom = ($_POST['nom']);
    $prenom = ($_POST['prenom']);
    $telephone = ($_POST['telephone']);
    $adresse = ($_POST['adresse']);
    $ville = ($_POST['ville']);
    $province = ($_POST['province']);
    

    $query = "UPDATE annuaires SET nom='$nom', prenom='$prenom', telephone='$telephone', adresse='$adresse', ville='$ville', province='$province' WHERE id='$annuaire_id' ";
    $stmt = $con->query($query);

    $query_run= $stmt->execute();
    if($query_run)
    {
        $_SESSION['message'] = "L'annuaire a été update avec succès";
        header("Location: acceuil.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "L'annuaire n'a pas été update";
        header("Location: acceuil.php");
        exit(0);
    }

}


if(isset($_POST['button-confirmation-creation']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $province = $_POST['province'];
    
    $query = "INSERT INTO annuaires (nom,prenom,telephone,adresse,ville,province) VALUES (:nom, :prenom, :telephone, :adresse, :ville, :province)";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':ville', $ville);
    $stmt->bindParam(':province', $province);
    
    $query_run = $stmt->execute();
    
    if($query_run)
    {
        $_SESSION['message'] = "Le nouveau annuaire a été creé avec succès";
        header("Location: acceuil.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Le nouveau annuaire n'a pas été cree";
        header("Location: acceuil.php");
        exit(0);
    }
} 

?>