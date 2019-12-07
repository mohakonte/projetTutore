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
                $select=$DB->prepare("SELECT * From admin where email=:email AND password=:mdp");
                $select->execute(array('email'=>$email,'mdp'=>$mdp));
                $privilege = $DB->fetchallobject($select) ;
                foreach ($privilege as $rs) {
                  $privilege =intval($rs->privilege);
                }
                
                $AdminVerifie=$select->rowcount();


        if ($AdminVerifie == 1) {
//------(Debut)---On test le privilege--------------------------------------------------------------

//------(Debut)---On verifie si privilege est egale a 1,on le redirige vers ses pages --------------
            if ($privilege == 1) {
                         $_SESSION["message"]='<div class="col-sm-12 ">
    <div class="form-group">
        <div class="alert alert-success" role="alert">
            <h4 align="center">Erreur!!!<br>Admin Super</h4>
        </div>
    </div>
</div>';
            }
//------(Fin)---On verifie si privilege est egale a 1,on le redirige vers ses pages autorisees--------------
            else{
//------(Debut)---On verifie si privilege est egale a 2(vu  qu'on a deux niveaux pour l'instant),on le redirige vers ses pages ----
     $_SESSION["message"]='<div class="col-sm-12 ">
    <div class="form-group">
        <div class="alert alert-success" role="alert">
            <h4 align="center">Erreur!!!<br>Admin Simple</h4>
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
header('Location:loginAdmin.php');
?>