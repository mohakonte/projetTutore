<?php
session_start() ;

require "../db.class.php" ;
$etat_civil = $_SESSION["etat_civil"] ;
$DB = new DB() ;
$requete_prepare_admin=$DB->prepare("SELECT *
    FROM admin ad, etat_civil ec 
    WHERE ad.fk_idetat_civil_admin = ec.idetat_civil
    AND ec.libelle_etat_civil = 'pikine'") ;
$requete_prepare_admin->execute() ;
$admins = $DB->fetchallobject($requete_prepare_admin) ;
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
  <section id="container" class="">
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
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
        <p class="centered"><a href="profile.html"><img src="../assets/images/logo2.png" class="img-circle" width="80"></a></p>
        <h5 class="centered"><?=$_SESSION["prenom_admin"]?> <?=$_SESSION["nom_admin"]?></h5>
        
        <li>
            <a class="active" href="admin.php">
              <i class="fa fa-envelope"></i>
              <span>Liste admin </span>
              </a>
          </li>
          <li>
            <a class="" href="adminAjout.php">
              <i class="fa fa-envelope"></i>
              <span>Ajouter admin</span>
              </a>
          </li>
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
        <?php if(isset($_GET["id"]) && $_GET["id"] == "terminé") : ?>
          <div class="alert alert-success" role="alert">
              <h4 align="center">Fin de traitement de la admin :)</h4>
          </div>
        <?php endif ; ?>
        <div class="row mt">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading wht-bg">
                <h4 class="gen-case">
                <b> Liste des admin <b>
                    <form action="#" class="pull-right mail-src-position">
                      <div class="input-append">
                        <input type="text" class="form-control " placeholder="Numero admin">
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
                          <tr class="alert alert-success">
                            <td class="inbox-small-cells">N°</td>
                            <td class="view-message  dont-show"><a href="contactform.html">Prenom et Nom</a></td>
                            <td class="view-message dont-show"><a href="contactform.html">Login</a></td>
                            <td class="view-message "><a href="contactform.html">Telephone</a></td>
                            <td class="view-message  text-right">Adresse</td>
                            <td class="view-message dont-show"> </td>
                            </tr>
                  <?php
                    foreach($admins as $admin) :
                    $numero_admin = $admin->idadmin ;
                    $prenom = $admin->prenom ;
                    $nom = $admin->nom;
                    $login = $admin->login ;
                    $numero_telephone = $admin->telephone ;
                    $adresse = $admin->adresse ;
                    $email = $admin->email ;
                    $etat_civil = $admin->libelle_etat_civil ;
                    
                    ?>
                        <form action= "contactform3.php" method ="post">
                        
                            <tr class="">
                            <td class="inbox-small-cells">
                            <?=$numero_admin?>
                            </td>
                            <td class="view-message  dont-show"><?=$prenom." ".$nom?></a></td>
                            <td class="view-message dont-show"><?=$login?></a></td>
                            <td class="view-message "><?=$numero_telephone?> </a></td>
                            <td class="view-message  text-right"><?=$adresse?></td>
                            <input type="hidden" name="numero_admin" value=<?=$numero_admin?>>
                            <input type="hidden" name="firstname" value=<?=$prenom?>>
                            <input type="hidden" name="lastname" value=<?=$nom?>>
                            <input type="hidden" name="etat_civil" value=<?=$etat_civil?>>
                            <input type="hidden" name="adresse" value=<?=$adresse?>>
                            <input type="hidden" name="email" value=<?=$email?>>
                            <td class="view-message dont-show"><button type="submit" class="btn btn-primary pull-right"> VOIR DETAIL</button></td>
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
