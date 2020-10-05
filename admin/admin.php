<?php
require_once("../outils/fonctions.php");
//d'abord faire l'appel avec 'require'.donc je connecte la librairie de fonction.php . et donc je stock dans une variable ($connection) le resultat de la fonction connection().
$connection=connexion();
//si admin.php reçoit le parametre action (si un client a cliqué sur un bouton)
if(isset($_GET['action']))
	{
	$contenu="form_" . $_GET['action'] . ".html";
	
	switch($_GET['action'])
		{
		case "comptes":
		
		break;	
		
		case "actus":


		break;	
		
		case "slider":

		break;	
		
		case "messagerie":
			$contenu="messagerie.html";
			//on calcule les notifications des nouveaux messages
			$requete="SELECT id_contact FROM contacts WHERE lu=0";
			// 'where' s'apelle un predica
			$resultat=mysqli_query($connexion,$requete);
			$nb_lignes=mysqli_num_rows($resultat);
			$notification=" <span class=\"notif\">".$nb_lignes."</spans>";
		break;		
		}	
	}
else//personne n'a cliqué sur un bouton ( à l'arrivée sur le tableau de bord)
	{
	$contenu="intro.html";
	}

include("admin.html");
?>