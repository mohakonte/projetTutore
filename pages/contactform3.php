<?php 
session_start() ;
if(isset($_POST["envoyer"])) {
  require "../db.class.php" ;
  $DB = new DB() ;
  $numero_demande = (int)$_POST['numero_demande'] ;
  $requete_prepare_maj = $DB->prepare("UPDATE demande,paiement pa,date_demande dd,category_demande cd,demandeur pe,document do SET fk_idcategory_demande = 2
  WHERE demande.iddemande = $numero_demande
  AND demande.fk_idpaiement = pa.idpaiement
  AND demande.fk_iddate = dd.iddate_demande
  AND demande.fk_idcategory_demande = cd.idcategory_demande
  AND demande.fk_iddemandeur = pe.iddemandeur
  AND demande.fk_iddocument = do.iddocument ") ;
  $requete_prepare_maj->execute() ;
  $new = 'maj' ;
    header("location:inbox2.php?id=".$new) ;
}
if(isset($_POST["terminer"])){
  require "../db.class.php" ;
  $DB = new DB() ;
  $numero_demande = (int)$_POST['numero_demande'] ;
  $requete_prepare_maj = $DB->prepare("UPDATE demande,paiement pa,date_demande dd,category_demande cd,demandeur pe,document do SET fk_idcategory_demande = 3
  WHERE demande.iddemande = $numero_demande
  AND demande.fk_idpaiement = pa.idpaiement
  AND demande.fk_iddate = dd.iddate_demande
  AND demande.fk_idcategory_demande = cd.idcategory_demande
  AND demande.fk_iddemandeur = pe.iddemandeur
  AND demande.fk_iddocument = do.iddocument ") ;
  $requete_prepare_maj->execute() ;
  $new = 'terminé' ;
    header("location:inbox3.php?id=".$new) ;
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
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

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
          <li><a class="logout" href="inbox3.php">Retour</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content2">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Detail de la demande N°<?=$_POST['numero_demande']?> </h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-6 col-md-6 col-sm-6" >
              <div class="col-sm-12">
                  <div class="content-panel">
                  <h4 align="center"> Identifiant demandeur  </h4>
                      <div class="col-sm-12">
                          <hr>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>Prenom</th>
                                  <th><?=$_POST["firstname"]?></th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>Nom</td>
                                  <td><?=$_POST["lastname"]?></td>
                              
                              </tr>
                              <tr>
                                  <td>Age</td>
                                  <td>                      
                                    <?php
                                        $annee_enregistrement = date("Y") ;
                                        $age = $annee_enregistrement - $_POST["age"] ;
                                        $_POST['age'] = $age ;
                                        echo $age ;
                                    ?>
                                  </td>
                                  
                              </tr>
                              <tr>
                                  <td>telephone</td>
                                  <td><?=$_POST["numero_telephone"]?></td>
                              </tr>
                              <tr>
                                  <td>Adresse</td>
                                  <td><?=$_POST["adresse"]?></td>
                                  
                              </tr>
                              <tr>
                                  <td>Email</td>
                                  <td><?=$_POST["email"]?>
                              </tbody>
                          </table>
                      </div>      
                  </div>
              </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="col-sm-12">
                  <div class="content-panel">
                  <h4 align="center"> Demande </h4>
                      <div class="col-sm-12">
                          <hr>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>Etat civil de </th>
                                  <th><?=$_POST["etat_civil"]?></th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>Document</td>
                                  <td><?=$_POST["document"]?></td>
                              
                              </tr>
                              <tr>
                                  <td>Numero de registre</td>
                                  <td><?=$_POST["numero_registre"]?></td>
                                  
                              </tr>
                              <tr>
                                  <td>Anne d'neregistrement</td>
                                  <td><?=$_POST["annee_enregistrement"]?></td>
                              </tr>
                              <tr>
                                  <td>Nombre de copie</td>
                                  <td><?=$_POST["nombre_copie"]?></td>
                                  
                              </tr>
                              <tr>
                                  <td>Montant a payer</td>
                                  <td><?=500*$_POST["nombre_copie"]?></td>
                              </tr>
                              </tbody>
                          </table>
                      </div>      
                  </div>
              </div>
          </div>
          
        
        <!-- /row -->


        <!-- /row -->
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
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!--custom switch-->
  <script src="lib/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="lib/jquery.tagsinput.js"></script>

  <!--Contactform Validation-->
  <script src="lib/php-mail-form/validate.js"></script>

</body>

</html>
