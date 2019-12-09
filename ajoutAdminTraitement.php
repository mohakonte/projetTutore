<?php
session_start();
require "../db.class.php" ;
$DB = new DB();
$_SESSION["message"]="";
//--------------(Debut)-------------Verifie si le bouton existe et envoi bien les donnees------------------
if (isset($_POST['envoyer'])) {

//--------------(Debut)-------------Verifie si les chmaps ne sont pas vides--------------------------------
   if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['login']) && !empty($_POST['pwd']) 
   && !empty($_POST['pwd2']) && !empty($_POST['privilege']) && !empty($_POST['age']) && !empty($_POST['adresse']) && !empty($_POST['email'])
   && !empty($_POST['telephone']) && !empty($_POST['etat_civil'])) {
//--------------(Fin)-------------Verifie si les chmaps ne sont pas vides----------------------------------


//--------------(Debut)-----------Recupere les donnees saisient par l'utilisateur--------------------------
       $nom=htmlspecialchars($_POST['nom']);
       $prenom=htmlspecialchars($_POST['prenom']);
       $login=htmlspecialchars($_POST['login']);
       $pwd=sha1(sha1($_POST['pwd']));
       $pwd2=sha1(sha1($_POST['pwd2']));
       $age=htmlspecialchars($_POST['age']);
       $privilege=htmlspecialchars($_POST['privilege']);
       $adresse=htmlspecialchars($_POST['adresse']);
       $email=htmlspecialchars($_POST['email']);
       $telephone=htmlspecialchars($_POST['telephone']);
       $etat_civil=htmlspecialchars($_POST['etat_civil']);

//--------------(Fin)-----------Recupere les donnees saisient par l'utilisateur--------------------------


//--------------(Debut)---------Regroupe les donnees dans un tableau $data-------------------------------
       $data=array(
           'nom'=>$nom,
           'prenom'=>$prenom,
           'login'=>$login,
           'pwd'=>$pwd,
           'age'=>$age,
           'privilege'=>$privilege,
           'adresse'=>$adresse,
           'email'=>$email,
           'telephone'=>$telephone,
           'etat_civil'=>$etat_civil,
       );
//--------------(Fin)---------Regroupe les donnees dans un tableau--------------------------------------------

//--------------(Debut)-------Verification des donnees par l'utilisateur--------------------------------------
if ($pwd == $pwd2) {
           if (strlen($_POST['pwd']) >= 6) { 
                if (strlen($telephone)== 14 || strlen($telephone)== 18) {
                    
                            $select=$DB->prepare("SELECT * From admin where email=:email;");
                            $select->execute(array('email'=>$email));
                            $emailV=$select->rowcount();
                if ($emailV==0) {
                    //------------(Debut)--------Insertion des donnees saisient par l'utilisateur dans la base de donnee --------------------------------------
 $requete_insert="INSERT INTO admin(login,password,privilege,prenom,nom,age,adresse,email,telephone,fk_idetat_civil_admin)
  VALUES(:login,:pwd,:privilege,:prenom,:nom,:age,:adresse,:email,:telephone,:etat_civil)";
 $requete_execute=$DB->prepare($requete_insert) ;
$requete_final=$DB->executePrepared($requete_execute,$data);
                
$_SESSION["message"]='<div class="col-sm-12 ">
    <div class="form-group">
        <div class="alert alert-success" role="alert">
            <h4 align="center">Succes<br>Ajout Reussi</h4>
        </div>
    </div>
</div>';

//------------(Fin)----------Insertion des donnees saisient par l'utilisateur  dans la base de donnee--------------------------------------
                }else{
                
$_SESSION["message"]='<div class="col-sm-12 ">
    <div class="form-group">
        <div class="alert alert-danger" role="alert">
            <h4 align="center">Erreur!!!<br>L\'email existe deja!!!</h4>
        </div>
    </div>
</div>';

}


}else{

$_SESSION["message"]='<div class="col-sm-12 ">
    <div class="form-group">
        <div class="alert alert-danger" role="alert">
            <h4 align="center">Erreur!!!<br>Le numero de telephone n\'est pas valide </h4>
        </div>
    </div>
</div>';
}
            } else {
            
$_SESSION["message"]='<div class="col-sm-12 ">
    <div class="form-group">
        <div class="alert alert-danger" role="alert">
            <h4 align="center">Erreur!!!<br>Le mot de passe doit depasser 6 caracteres</h4>
        </div>
    </div>
</div>';
            }
    }else{
        
$_SESSION["message"]='<div class="col-sm-12 ">
    <div class="form-group">
        <div class="alert alert-danger" role="alert">
            <h4 align="center">Erreur!!!<br>Vos mot de passes ne correspondent pas</h4>
        </div>
    </div>
</div>';
    }
}else{

$_SESSION["message"]='<div class="col-sm-12 ">
    <div class="form-group">
        <div class="alert alert-danger" role="alert">
            <h4 align="center">Erreur!!!<br>Veuillez remplir tous les champs</h4>
        </div>
    </div>
</div>';
}
if (isset($_POST['raz'])) {
require 'ajoutAdmin.php';
}
}//--------------(Fin)-------------Verifie si le bouton existe et envoi bien les donnees saisient par l'utilisateur--------------------
header("Location:ajoutAdmin.php");
?>