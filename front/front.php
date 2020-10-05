<?php
require_once("../outils/fonctions.php");
//d'abord faire l'appel avec 'require'.donc je connecte la librairie de fonction.php . et donc je stock dans une variable ($connection) le resultat de la fonction connection().
$connection=connexion();
//ouvrir l'acces à la base de donner.
$contact="form_contact.html";

//on teste si le bouton 'envoyer' a été utilisé
if(isset($_POST['submit']))
{
    //on déclare la variable type tableau associatif
    $message=array();
    $color=array();
    //on teste les champs obligatoirs
    if(empty($_POST['nom_contact']))
    {
        $message['nom_contact']="<label class=\"pas_ok\">Mettez votre nom</label>";
        $color['nom_contact']=" class=\"avertissement\"";
    }
    if(empty($_POST['prenom_contact']))
    {
        $message['prenom_contact']="<label class=\"pas_ok\">Mettez votre prenom</label>";
        $color['prenom_contact']=" class=\"avertissement\"";
    }
    if(empty($_POST['message_contact']))
    {
        $message['message_contact']="<label class=\"pas_ok\">Mettez votre massage</label>";
        $color['message_contact']=" class=\"avertissement\"";
    }
    if(empty($_POST['mel_contact']))
    {
        $message['mel_contact']="<label class=\"pas_ok\">Mettez votre email</label>";
        $color['mel_contact']=" class=\"avertissement\"";
    }
    //si tout est bien rempli 
    if(!empty($_POST['nom_contact']) && !empty($_POST['mel_contact']) && !empty($_POST['message_contact']))
    {
        //on cré la requete d'insertion des données dans la base ou dans la table conctact.
        //addslashes permet l'insertion de caracteres speciaux dans la table.
        $requete="INSERT INTO contacts
                   SET nom_contact='".addslashes($_POST['nom_contact'])."', 
                   prenom_contact='".addslashes($_POST['prenom_contact'])."',
                   message_contact='".addslashes($_POST['message_contact'])."',
                   mel_contact='".$_POST['mel_contact']."', 
                   date_contact='".date("Y-m-d H:i:s")."'";
        $resultat=mysqli_query($connection,$requete);
        //c'est le resultat de la requete,le reusltat etant je stock ce qu'a taper l'internaute.
       $contact="merci.html";
    }
}

mysqli_close($connection);
//obligé de fermer la connection ouverte ligne 4 : $connection=connexion(); car sinon ça va saturer le serveur.

include("front.html");

?>