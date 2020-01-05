<?php
session_start() ;
require('../db.class.php');
$DB=new DB;
//------(Debut)--------Declaration de la variable $_SESSION['message']----------------------------
$_SESSION['message']="";
//------(Fin)--------Declaration de la variable $_SESSION['message']------------------------------


//------(Debut)------Verifie si le formulaire est bien envoye -------------------------------------
//Debut Verification
if (isset($_POST['envoyer'])) {
//------(Debut)-----On test si les champs sont remplis---------------------------------------------
   if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
//------(Debut)-----On recupere les donnees de l'utilisateur---------------------------------------
         $email=htmlspecialchars($_POST['email']);
         $mdp=sha1(sha1($_POST['mdp']));
//------(Fin)-----On recupere les donnees de l'utilisateur-----------------------------------------

//------(Debut)---On fait select sur la base de donnees pour verifie si l'utilisateur existe-------
                $select=$DB->prepare("SELECT * From admin ad, etat_civil ec
                WHERE ad.login=:email
                AND ad.password=:mdp
                AND ad.fk_idetat_civil_admin = ec.idetat_civil ");
                $select->execute(array('email'=>$email,'mdp'=>$mdp));
                $privilege = $DB->fetchallobject($select) ;
                foreach ($privilege as $rs) {
                  $privilege =intval($rs->privilege);
                  $_SESSION["prenom_admin"] = $rs->prenom ;
                  $_SESSION["nom_admin"] = $rs->nom ;
                  $_SESSION["privilege"] = $privilege ;
                  $_SESSION["etat_civil"] = $rs->libelle_etat_civil ;
                }
                $AdminVerifie=$select->rowcount();
        if ($AdminVerifie == 1) {
//------(Debut)---On test le privilege--------------------------------------------------------------

//------(Debut)---On verifie si privilege est egale a 1,on le redirige vers ses pages --------------
            if ($privilege == 1) {
                         $_SESSION["messages"]='<div class="col-sm-12 ">
    <div class="form-group">
        <div class="alert alert-success" role="alert">
            <h4 align="center">Vous etes connecter en tant que super Administrateur. N\'est ce pas Incroyable :)</h4>
        </div>
    </div>
</div>';
            }
//------(Fin)---On verifie si privilege est egale a 1,on le redirige vers ses pages autorisees--------------
            else{
//------(Debut)---On verifie si privilege est egale a 2(vu  qu'on a deux niveaux pour l'instant),on le redirige vers ses pages ----
     $_SESSION["messages"]='<div class="col-sm-12 ">
    <div class="form-group">
        <div class="alert alert-success" role="alert">
            <h4 align="center">Vous etes connecter en tant que Administrateur simple</h4>
        </div>
    </div>
</div>';
//------(Fin)---On verifie si privilege est egale a 2(vu  qu'on a deux niveaux pour l'instant),on le redirige vers ses pages ------
            }
//------(Fin)---On test le privilege--------------------------------------------------------------
        }else{
            $_SESSION["message"]='<div class="col-sm-12 ">
    <div class="form-group">
        <div class="alert alert-danger" role="alert">
            <h4 align="center">Erreur!!!<br>Ce Compte n\'existe pas</h4>
        </div>
    </div>
</div>';
        }
//------(Debut)---On fait select sur la base de donnees pour verifie si l'utilisateur existe-------
   }else{
     $_SESSION["message"]='<div class="col-sm-12 ">
    <div class="form-group">
        <div class="alert alert-danger" role="alert">
            <h4 align="center">Erreur!!!<br>Veuillez renseigner les champs</h4>
        </div>
    </div>
</div>';
   }
//------(Fin)-----On test si les champs sont remplis-----------------------------------------------
}
//------(Debut)------Verifie si le formulaire est bien envoye -------------------------------------
header('Location:inbox.php?cas=naissance');
?>