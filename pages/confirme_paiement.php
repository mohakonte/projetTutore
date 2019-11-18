<?php 
session_start() ;
require "../db.class.php" ;
require "../Outil.php" ;
$DB = new DB() ;
$Outil = new Outil() ;
$validation = false ;
if(isset($_POST["terminer"])) {
    $electronique = $_POST["electronique"] ;
    $_SESSION["electronique"] = $electronique ;
    $code = $_POST["code"] ;
    $_SESSION["code"] = $code ;
    $numero_telephone= $_POST["numero_telephone"];
    $_SESSION["numero_telephone"] = $numero_telephone ;
    
    $requete_prepare_paiement=$DB->prepare("SELECT * from confirmation_paiement ") ;
    $requete_prepare_paiement->execute() ;
    $paiements = $DB->fetchallobject($requete_prepare_paiement) ;
    foreach($paiements as $paiement) {
        $code_confirmation = $paiement->code_confirmation ;
        $numero_telephone = $paiement->numero_telephone ;
        $valide = $paiement->valide ;
        if($code_confirmation == $_POST["code"] && $numero_telephone == $_POST["numero_telephone"] && $valide =='TRUE' ){
            $validation == true ;
            // ---------------------------------INSERTION DEDAMNDEUR--------------------------------------------
            //INSERTION
            $requete_insert_personne=$DB->prepare("INSERT INTO personne(prenom,nom,age,telephone,adresse,email) VALUES(:prenom,:nom,:age,:telephone,:adresse,:email)") ;
            $requete_insert_personne->execute(array(

                "prenom"=>$_SESSION["firstname"],
                "nom"=>$_SESSION["lastname"],
                "age"=>$_SESSION["age"],
                "telephone"=>$_SESSION["telephone"],
                "adresse"=>$_SESSION["adresse"],
                "email"=>$_SESSION["email"],
            )) ;
            // RECUPERATION DE ID
            $requete_prepare_personne=$DB->prepare("SELECT MAX(idpersonne) as idpersonne FROM personne ") ;
            $requete_prepare_personne->execute() ;
            $personnes = $DB->fetchallobject($requete_prepare_personne) ;
            foreach($personnes as $personne) {
                $idpersonne = $personne->idpersonne ;
            }
            // ---------------------------------------INSERTION DATE------------------------------------------
            $jour = date("D") ;
            $jour = $Outil->convert_jour($jour) ;
            $mois = date("M") ;
            $mois = $Outil->convert_mois($mois) ;
            $annee = date("Y") ;
            $date_complet = date("Y-m-d") ;
            $requete_insert_date=$DB->prepare("INSERT INTO date_demande (jour, mois, annee, date_complet) VALUES (:jour,:mois,:annee,:date_complet)") ;
            $requete_insert_date->execute(array(
                "jour"=>$jour,
                "mois"=>$mois,
                "annee"=>$annee,
                "date_complet"=>$date_complet

            )) ;
            //RECUPERATION ID DATE 
            $requete_date_prepare=$DB->prepare("SELECT MAX(iddate_demande) as iddate_demande FROM date_demande") ;
            $requete_date_prepare->execute() ;
            $dates = $DB->fetchallobject($requete_date_prepare) ;
            foreach($dates as $date) {
                $iddate_demande = $date->iddate_demande ;
            } $_SESSION["iddate_demande"] = $iddate_demande ;
            //--------------------------------------INSERTION PAIEMENT-------------------------------------------
            // on recupere l'id de la reference
            $electronique = $_SESSION["electronique"] ;
            $requete_reference_prepare=$DB->prepare("SELECT idreference FROM reference WHERE libelle_reference='$electronique' ") ;
            $requete_reference_prepare->execute() ;
            $references = $DB->fetchallobject($requete_reference_prepare) ;
            foreach($references as $reference) {
                $idreference = $reference->idreference ; 
            }
            $_SESSION["idreference"] = $idreference ;
            // On recupere l'id de la confirmation de paiement
            $code = $_SESSION["code"] ;
            $numero_telephone = $_SESSION["numero_telephone"] ;
            $requete_confirmation_paiement_prepare=$DB->prepare("SELECT idconfirmation_paiement FROM confirmation_paiement WHERE code_confirmation='$code' AND numero_telephone='$numero_telephone' AND valide='TRUE' ") ;
            $requete_confirmation_paiement_prepare->execute() ;
            $code_paiements = $DB->fetchallobject($requete_confirmation_paiement_prepare) ;
            foreach($code_paiements as $code_paiement) {
                $idconfirmation_paiement = $code_paiement->idconfirmation_paiement;
            }$_SESSION["idconfirmation_paiement"] = $idconfirmation_paiement ;
            // INSERER LE PAIEMENT DANS LA BD 
            $requete_insert=$DB->prepare("INSERT INTO paiement (fk_idreference,fk_idconfirmation_paiement) VALUES (:fk_idreference,:fk_idconfirmation_paiement)") ;
            $requete_insert->execute(array(
                "fk_idreference"=>$idreference,
                "fk_idconfirmation_paiement"=>$idconfirmation_paiement,

            ));
            // RECUPERAITON DE L'ID DU PAIEMENT
            $requete_paiement_prepare=$DB->prepare("SELECT MAX(idpaiement) as idpaiement FROM paiement") ;
            $requete_paiement_prepare->execute() ;
            $paiements = $DB->fetchallobject($requete_paiement_prepare) ;
            foreach($paiements as $paiement) {
                $idpaiement = $paiement->idpaiement ;
            }$_SESSION["idpaiement"] = $idpaiement ;
            //--------------------------------------------------RECUPERATION ETAT CIVIL---------------------------------------
            $etat_civil = $_SESSION["etat_civil"] ;
            $requete_prepare_etat_civil=$DB->prepare("SELECT idetat_civil FROM etat_civil WHERE libelle_etat_civil='$etat_civil' ") ;
            $requete_prepare_etat_civil->execute() ;
            $etat_civils = $DB->fetchallobject($requete_prepare_etat_civil) ;
            foreach($etat_civils as $etat_civil) {
                $idetat_civil = $etat_civil->idetat_civil ;
            } $_SESSION["idetat_civil"] = $idetat_civil ;
            //--------------------------------------------------RECUPERATION ID TYPE DOCUMENT ---------------------------------------
            $document = $_SESSION["document"] ;
            $requete_prepare_type_document=$DB->prepare("SELECT idtype_document FROM type_document WHERE libelle_type_document='$document' ") ;
            $requete_prepare_type_document->execute() ;
            $type_documents = $DB->fetchallobject($requete_prepare_type_document) ;
            foreach($type_documents as $type_document) {
                $idtype_document = $type_document->idtype_document ;
            } $_SESSION["idtype_document"] = $idtype_document ;
            //--------------------------------------------------RECUPERATION ID DOCUMENT ----------------------------------------
            $annee_enregistrement = $_SESSION['annee_enregistrement'] ; 
            $numero_registre = $_SESSION['numero_registre'] ;
            $requete_prepare_document=$DB->prepare("SELECT iddocument
                FROM document 
                WHERE fk_idtype_document = '$idtype_document'
                AND fk_idetat_civil_document = '$idetat_civil'
                AND numero_registre = '$numero_registre'
                AND annee_enregistrement = '$annee_enregistrement'
                ") ;
            $requete_prepare_document->execute() ;
            $documents=$DB->fetchallobject($requete_prepare_document) ;
            foreach($documents as $document) {
                $iddocument = $document->iddocument ;
            } $_SESSION["iddocument"] = $iddocument ;
            // INSERTION DE LA DEMANDE
            $nombre_copie = $_SESSION["nombre_copie"] ;
            $category = "1" ;
            $requete_insert_demande = $DB->prepare("INSERT INTO demande (fk_idpersonne,fk_iddate,fk_iddocument,fk_idpaiement,fk_idcategory_demande,nombre_copie)
                VALUES (:fk_idpersonne,:fk_iddate,:fk_iddocument,:fk_idpaiement,:fk_idcategory_demande,:nombre_copie)
                ");
            $requete_insert_demande->execute(array(
                'fk_idpersonne'=> $idpersonne,
                'fk_iddate'=> $iddate_demande,
                'fk_iddocument'=> $iddocument,
                'fk_idpaiement'=> $idpaiement,
                'fk_idcategory_demande'=> $category,
                'nombre_copie'=> $nombre_copie

            )) ;
            //-------------------------------------------FIN INSERTION DES DONNEE---------------------------------------------------------
            // c'est a cette endroit qu'on va stocker les donnee dans la base puis rediriger vers validation.php
            // travail en cours...
             
         header("location:validation.php") ;
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets-doc/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets-doc/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>plateforme</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
    <link href="../assets-doc/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets-doc/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="../assets-doc/css/demo.css" rel="stylesheet" />

    <!--L'autre template -->
    <!-- <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700"> -->
   <!--  <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <!-- Custom styles for our template -->
    <link rel="stylesheet" href="../assets/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
    <!-- Fixed navbar -->
    <!-- 
    <div class="navbar navbar-inverse navbar-fixed-top headroom" >
        <div class="container">
            <div class="navbar-header">
                 --Button for smallest screens-- 
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="index.html"><img src="../assets/images/logo2.png" width="70px"><spand style="font-weight: bold;">  Etat Civil</spand></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li class="active"><a href="index.php">Accueil</a></li>
                    <li><a href="apropos.php">A propos</a></li>
                    <li class="dropdown">
                        -- <a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a> --
                        <ul class="dropdown-menu">
                            <li><a href="#sidebar-left.html">Left Sidebar</a></li>
                            <li class="active"><a href="#sidebar-right.html">Right Sidebar</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a class="btn" href="form.php">Demander un document</a></li>
                </ul>
            </div>--/.nav-collapse --
        </div>
    </div> 
    -- /.navbar -->
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
<div class="image-container set-full-height" style="background-image: url('../assets/images/logo2.png')">
    <!--   Etat civil brand Tim Branding   -->

    <!--   Big container   -->
    <div class="container">
        <div class="row">
        
        <div class="col-sm-12">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    <form action="" method="post">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                        	<h3>
                        	   <b>Demande de document administrative</b> <br> 
                        	   <small>Remplire les informations suivantes </small>
                        	</h3>
                    	</div>

						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#paiement" data-toggle="tab">Paiemnt</a></li>
	                        </ul>

						</div>

                        <div class="tab-content">

                        <h4 class="info-text"> Confirmer votre paiement en reseignant les informations ci-dessous </h4>

                            <!-- dubut paiement -->
                            <div class="tab-pane" id="paiement">
                                <div class="row">
                                    <div class="col-sm-3 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Choix voix electronique</label>
                                            <select class="form-control" name = "electronique" >
                                            <?php
                                            $requete_reference_prepare= $DB->prepare("SELECT * FROM reference ") ;
                                            $requete_reference_prepare->execute() ;
                                            $references = $DB->fetchallobject($requete_reference_prepare) ;
                                            foreach($references as $reference) : ?> 
                                                <option value="<?=$reference->libelle_reference?>"> <?=ucfirst($reference->libelle_reference)?> </option>
                                            <?php endforeach ?>
                                        </select>
                                          </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Code fournie par le system de paiement </label>
                                            <input type="text" name="code" class="form-control" placeholder="2100085...">
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-sm-offset-1">
                                        <label>Telephone <small>(Obligatoire)</small></label> <br>
                                        <div class="form-group">
                                                <input name="numero_telephone" type="text" class="form-control" placeholder="78256...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='suivant' value='suivant' />
                                <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='terminer' value='terminer' /></button>

                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='precedant' value='precedant' />
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
             Copyright &copy; 2019, Estim Work Group.
        </div>    
    </div>

                  

</div>

</body>

	<!--   Core JS Files   -->
	<script src="../assets-doc/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="../assets-doc/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets-doc/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="../assets-doc/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="../assets-doc/js/jquery.validate.min.js"></script>

</html>
