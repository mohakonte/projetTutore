<?php
session_start() ;
if(!isset($_SESSION["privilege"])){
  header("location:loginAdmin.php") ;
}
// quel document en fonction de la categorie 
if((isset($_GET["cas"])) && ($_GET["cas"] == "naissance")){

  $_SESSION["document"] = "extrait naissance" ;
  $_SESSION["titre"] = "Traitement des demande d'extrait de naissance" ;

} elseif((isset($_GET["cas"])) && ($_GET["cas"] == "mariage")){

$_SESSION["document"] = "certificat mariage" ;
$_SESSION["titre"] = "Traitement des demande de certificat de mariage" ;

} elseif((isset($_GET["cas"])) && ($_GET["cas"] == "deces")){

$_SESSION["document"] = "certificat deces" ;
$_SESSION["titre"] = "Traitement des demande de certificat de deces" ;
}
$document = $_SESSION["document"] ;
$etat_civil = $_SESSION['etat_civil'] ;
$titre = $_SESSION["titre"] ;

require "../db.class.php" ;
$DB = new DB() ;
$requete_prepare_demande=$DB->prepare("SELECT *
    FROM demande de ,demandeur pe,date_demande da,reference re,paiement pa,confirmation_paiement cp,type_document td ,document do,etat_civil ec,category_demande cd 
    WHERE pe.iddemandeur = de.fk_iddemandeur
    AND da.iddate_demande = de.fk_iddate
    AND pa.idpaiement = de.fk_idpaiement
    AND do.iddocument = de.fk_iddocument
    AND cd.idcategory_demande = de.fk_idcategory_demande  
    AND cp.idconfirmation_paiement = pa.fk_idconfirmation_paiement
    AND re.idreference = pa.fk_idreference
    AND td.idtype_document = do.fk_idtype_document
    AND ec.idetat_civil = do.fk_idetat_civil_document
    AND cd.libelle_category='a_traiter'
    AND td.libelle_type_document = '$document'
    AND ec.libelle_etat_civil = '$etat_civil' ") ;
$requete_prepare_demande->execute() ;
$demandes = $DB->fetchallobject($requete_prepare_demande) ;
$requete_a_traitee_prepare= $DB->prepare("SELECT COUNT(iddemande) as nombre
FROM demande de ,demandeur pe,date_demande da,reference re,paiement pa,confirmation_paiement cp,type_document td ,document do,etat_civil ec,category_demande cd
WHERE pe.iddemandeur = de.fk_iddemandeur
    AND da.iddate_demande = de.fk_iddate
    AND pa.idpaiement = de.fk_idpaiement
    AND do.iddocument = de.fk_iddocument
    AND cd.idcategory_demande = de.fk_idcategory_demande  
    AND cp.idconfirmation_paiement = pa.fk_idconfirmation_paiement
    AND re.idreference = pa.fk_idreference
    AND td.idtype_document = do.fk_idtype_document
    AND ec.idetat_civil = do.fk_idetat_civil_document
    AND cd.libelle_category='a_traiter'
    AND td.libelle_type_document = '$document'
    AND ec.libelle_etat_civil = '$etat_civil' ") ;
$requete_a_traitee_prepare->execute() ;
$a_traitees = $DB->fetchallobject($requete_a_traitee_prepare) ;
foreach($a_traitees as $a_traitee) {
  $nombre_a_traitee = $a_traitee->nombre ;
}
$requete_en_cours_prepare= $DB->prepare("SELECT COUNT(iddemande) as nombre
FROM demande de ,demandeur pe,date_demande da,reference re,paiement pa,confirmation_paiement cp,type_document td ,document do,etat_civil ec,category_demande cd
WHERE pe.iddemandeur = de.fk_iddemandeur
    AND da.iddate_demande = de.fk_iddate
    AND pa.idpaiement = de.fk_idpaiement
    AND do.iddocument = de.fk_iddocument
    AND cd.idcategory_demande = de.fk_idcategory_demande  
    AND cp.idconfirmation_paiement = pa.fk_idconfirmation_paiement
    AND re.idreference = pa.fk_idreference
    AND td.idtype_document = do.fk_idtype_document
    AND ec.idetat_civil = do.fk_idetat_civil_document
    AND cd.libelle_category='en_cours'
    AND td.libelle_type_document = '$document'
    AND ec.libelle_etat_civil = '$etat_civil' ") ;
$requete_en_cours_prepare->execute() ;
$en_courss = $DB->fetchallobject($requete_en_cours_prepare) ;
foreach($en_courss as $en_cours) {
  $nombre_en_cours = $en_cours->nombre ;
}
$requete_a_terminer_prepare= $DB->prepare("SELECT COUNT(iddemande) as nombre
FROM demande de ,demandeur pe,date_demande da,reference re,paiement pa,confirmation_paiement cp,type_document td ,document do,etat_civil ec,category_demande cd
WHERE pe.iddemandeur = de.fk_iddemandeur
    AND da.iddate_demande = de.fk_iddate
    AND pa.idpaiement = de.fk_idpaiement
    AND do.iddocument = de.fk_iddocument
    AND cd.idcategory_demande = de.fk_idcategory_demande  
    AND cp.idconfirmation_paiement = pa.fk_idconfirmation_paiement
    AND re.idreference = pa.fk_idreference
    AND td.idtype_document = do.fk_idtype_document
    AND ec.idetat_civil = do.fk_idetat_civil_document
    AND cd.libelle_category='terminer'
    AND td.libelle_type_document = '$document'
    AND ec.libelle_etat_civil = '$etat_civil' ") ;
$requete_a_terminer_prepare->execute() ;
$a_terminers = $DB->fetchallobject($requete_a_terminer_prepare) ;
foreach($a_terminers as $a_terminer) {
  $nombre_terminer = $a_terminer->nombre ;
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="../assets/css/main.css">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="../index.html" class="logo"><b>Etat<span>Civil</span> DE <span> <?=$_SESSION["etat_civil"]?></span></b></a>
      <!--logo end-->
      
      <div class="top-menu pull-right ">
        <ul class="nav top-menu ">
          <li><a class="logout" href="inbox.php?cas=naissance"> naissance </a></li>
          <li><a class="logout" href="inbox.php?cas=mariage"> mariage </a></li>
          <li><a class="logout" href="inbox.php?cas=deces"> deces</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        <p class="centered"><a href="../index.php"><img src="../assets/images/logo2.png" class="img-circle" width="80"></a></p>
        <h5 class="centered"> <?=$_SESSION["prenom_admin"]?> <?=$_SESSION["nom_admin"]?> </h5>
          <li>
            <a class="active" href="inbox.php">
              <i class="fa fa-envelope"></i>
              <span>A TRAITER </span>
              <span class="label label-theme pull-right mail-info"><?=$nombre_a_traitee?></span>
              </a>
          </li>
          <li>
            <a class="" href="inbox2.php">
              <i class="fa fa-envelope"></i>
              <span>EN COURS...  </span>
              <span class="label label-theme pull-right mail-info"><?=$nombre_en_cours?></span>
              </a>
          </li>
          <li>
            <a class="" href="inbox3.php">
              <i class="fa fa-envelope"></i>
              <span>TERMINER </span>
              <span class="label label-theme pull-right mail-info"><?=$nombre_terminer?></span>
              </a>
          </li>
          <?php if(isset($_SESSION["privilege"]) && $_SESSION["privilege"] == 1) :?>
          <li>
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Gerrer Etat civil</span>
              </a>
            <ul class="">
              <li><a href="admin.php">Gerrer les membres</a></li>
              <li><a href="document.php">Gerrer les document</a></li>
            </ul>
          </li>
          <?php endif ?>
          <li>
            <a class="active2" href="disconnect.php">
              <i class=""></i>
              <span> Deconnexion </span>
              
              </a>
          </li>
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!-- page start-->
        <?php if(isset($_SESSION["messages"])) {
               echo $_SESSION['messages'];
               unset($_SESSION['messages']);
               } ?>
        <div class="row mt">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading wht-bg">
                <h4 class="gen-case">
                <b> <span><?=$titre?> </span><b>
                    
                      
                    <form action="#" class="pull-right mail-src-position">
                      <div class="input-append">
                        <input type="text" class="form-control " placeholder="Numero demande">
                      </div>
                    </form>
                  </h4>
              </header>
              <div class="panel-body minimal">
              <div class="mail-option">
                  
                  <div class="btn-group">
                    <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="inbox3.php" class="btn mini tooltips">
                      <i class=" fa fa-refresh"></i>
                      </a>
                  </div>
                  
                  
                  <ul class="unstyled inbox-pagination">
                    <li><span>1-50 of 99</span></li>
                    <li>
                      <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                    </li>
                    <li>
                      <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                    </li>
                  </ul>
                </div>
                <div class="table-inbox-wrap ">
                  <table class="table table-inbox table-hover">
                  <tbody>
                          <tr class="">
                            <td class="inbox-small-cells">N°</td>
                            <td class="view-message  dont-show"><a href="contactform.html">Prenom et Nom</a></td>
                            <td class="view-message dont-show"><a href="contactform.html">Document demander</a></td>
                            <td class="view-message "><a href="contactform.html">Numero de registre</a></td>
                            <td class="view-message  text-right">Date demande</td>
                            <td class="view-message dont-show"> </td>
                            </tr>
                  <?php
                    foreach($demandes as $demande) :
                    $numero_demande = $demande->iddemande ;
                    $prenom = $demande->prenom ;
                    $nom = $demande->nom;
                    $age = $demande->age ;
                    $numero_telephone = $demande->numero_telephone ;
                    $adresse = $demande->adresse ;
                    $email = $demande->email ;
                    $document = $demande->libelle_type_document ;
                    $jour_demande = $demande->jour ;
                    $mois_demande = $demande->mois ;
                    $annee_enregistrement = $demande->annee_enregistrement ;
                    $annee_demande = $demande->annee ;
                    $date_complet = $demande->date_complet ;

                    $etat_civil = $demande->libelle_etat_civil ;
                    $nombre_copie = $demande->nombre_copie ;
                    $numero_registre = $demande->numero_registre ;
                    ?>
                        <form action= "contactform.php" method ="post">
                        
                            <tr class="">
                            <td class="inbox-small-cells">
                            <?=$numero_demande?>
                            </td>
                            <td class="view-message  dont-show"><?=$prenom." ".$nom?></a></td>
                            <td class="view-message dont-show"><?=$document?></a></td>
                            <td class="view-message "><?=$numero_registre?> </a></td>
                            <td class="view-message  text-right"><?=$date_complet?></td>
                            <input type="hidden" name="numero_demande" value=<?=$numero_demande?>>
                            <input type="hidden" name="firstname" value=<?=$prenom?>>
                            <input type="hidden" name="lastname" value=<?=$nom?>>
                            <input type="hidden" name="document" value=<?=$document?>>
                            <input type="hidden" name="numero_registre" value=<?=$numero_registre?>>
                            <input type="hidden" name="annee_enregistrement" value=<?=$annee_enregistrement?>>
                            <input type="hidden" name="nombre_copie" value=<?=$nombre_copie?>>
                            <input type="hidden" name="etat_civil" value=<?=$etat_civil?>>
                            <input type="hidden" name="numero_telephone" value=<?=$numero_telephone?>>
                            <input type="hidden" name="date_complet" value=<?=$date_complet?>>
                            <input type="hidden" name="adresse" value=<?=$adresse?>>
                            <input type="hidden" name="email" value=<?=$email?>>
                            <input type="hidden" name="jour_demande" value=<?=$jour_demande?>>
                            <input type="hidden" name="mois_demande" value=<?=$mois_demande?>>
                            <input type="hidden" name="annee_demande" value=<?=$annee_demande?>>
                            <input type="hidden" name="age" value=<?=$age?>>
                            <td class="view-message dont-show"><button type="submit" class="btn btn-primary pull-right">TRAITER</button></td>
                            
                            </tr>
                        </tbody>
                        </form>
                  <?php endforeach ; ?>

                  </table>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
        &copy; Copyrights <strong>EstimGroup</strong>. All Rights Reserved
        </p>
        <div class="credits">
        <div class="credits">
                    <!--
              You are NOT allowed to delete the credit link to TemplateMag with free version.
              You can delete the credit link only if you bought the pro version.
              Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
              Licensing information: https://templatemag.com/license/-->
                    Developpe par <a href="https://templatemag.com/">ESTIM Groupe2</a>
                </div>
        <a href="inbox.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->

</body>

</html>
