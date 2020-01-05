<?php
session_start() ;
require('../db.class.php');
$DB=new DB;
if(isset($_SESSION["envoyer"])){
  $nom     = $_SESSION["envoyer"]["nom"];
  $prenom    = $_SESSION["envoyer"]["prenom"];
  $login       = $_SESSION["envoyer"]["login"];
  $pwd       = $_SESSION["envoyer"]["pwd"];
  $pwd2       = $_SESSION["envoyer"]["pwd2"];
  $telephone   = $_SESSION["envoyer"]["telephone"];
  $age   = $_SESSION["envoyer"]["age"];
  $adresse = $_SESSION["envoyer"]["adresse"];
  $etat_civil = $_SESSION["envoyer"]["etat_civil"];
  $email    = $_SESSION["envoyer"]["email"];
 
  unset($_SESSION["envoyer"]);
}

?>
<!DOCTYPE html>
<html lang="fr">

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
  <section id="container" class="sidebar-closed">
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
            <a class="" href="admin.php">
              <i class="fa fa-envelope"></i>
              <span>Liste admin </span>
              </a>
          </li>
          <li>
            <a class="active" href="adminAjout.php">
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
    <section id="main-content" >
      <section class="wrapper">
        <!-- page start-->
        <?php if(isset($_SESSION["message"])) {
               echo $_SESSION['message'];
               unset($_SESSION['message']);
               } ?>
        <?php if(isset($_GET["id"]) && $_GET["id"] == "terminé") : ?>
          <div class="alert alert-success" role="alert">
              <h4 align="center">Fin de traitement de la admin :)</h4>
          </div>
        <?php endif ; ?>
      </section>
      <!-- /wrapper -->
    </section>

    <div id="login-page">
        <div class="container">
            <form class="form-login" method="post" style="max-width: 700px;
	margin: 10px auto 0;
	background: #fff;
	border-radius: 5px;
    -webkit-border-radius: 5px;
    " action="ajoutAdminTraitement.php">
                <h2 class="form-login-heading" style="background: rgb(45, 158, 211);">Inscrire Admin</h2>
                <div class="login-wrap" style="width:100%;">
                    <input type="text" class="form-control" placeholder="Nom" name="nom" value="<?php if (isset($nom)) {
                        echo $nom;
                    } ?>">
                    <br>
                    <input type="text" class="form-control" placeholder="Prenom" name="prenom" value="<?php if (isset($prenom)) {
                        echo $prenom;
                    } ?>">
                    <br>
                    <input type="text" class="form-control" placeholder="Login" name="login" value="<?php if (isset($ogin)) {
                        echo $login;
                    } ?>">
                    <br>
                    <input type="password" class="form-control" placeholder="Password" name="pwd">
                    <br>
                    <input type="password" class="form-control" placeholder="Password Confirmation" name="pwd2">
                    <br>
                    <p class="form-title">Privilege</p>
                    <select class="form-control" name="privilege">
                        <option value="1">Super Administrateur</option>
                        <option value="2">Administrateur</option>
                    </select>
                    <br>
                    <p class="form-title">Age</p>
                    <select class="form-control" name="age">
                        <?php
                                                $annee = date("Y") ;
                                                echo $annee ;
                                                $arret = $annee - 18 ;
                                                for($i = 1945 ; $i <= $arret ; $i++ ) : $r=$annee;?>
                        <option value="<?= $r-$i;?>"> <?= $r-$i .' ans';?> </option>
                        <?php endfor ?>
                    </select>
                    <br>
                    <br>
                    <input type=" text" class="form-control" placeholder="Adresse" name="adresse" value="<?php if (isset($adresse)) {
                        echo $adresse;
                    } ?>">
                    <br>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php if (isset($email)) {
                        echo $email;
                    } ?>">
                    <br>
                    <input type="text" class="form-control" placeholder="Telephone" name="telephone" value="<?php if (isset($telephone
                    )) {
                        echo $telephone;
                    } ?>">
                    <br>
                    <p class="form-title">Etat civil</p>
                    <select name="etat_civil" class="form-control">
                        <?php 
                            $selectEC=$DB->prepare("SELECT * From etat_civil;");
                            $selectEC->execute();
                            foreach ($selectEC as $key => $ec) {
                                ?>
                        <option value="<?=$ec['idetat_civil']?>"><?= $ec['libelle_etat_civil']?></option>
                        <?php
                       
                        }
                        ?>

                    </select>
                    <br>
                    <label class="checkbox">
                        <!-- <input type="checkbox" value="remember-me"> Remember me -->
                        <span class="pull-right">
                            <!-- <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a> -->
                        </span>
                    </label>
                    <button class="btn btn-theme btn-block" type="submit" name="envoyer"
                        style="background: rgb(45, 158, 211);"><i class="fa fa-lock"></i>
                        S'Inscrire</button>
                    <button class="btn btn-theme btn-block" type="submit" name="raz"
                        style="background: rgb(45, 158, 211);"><i class="fa fa-remove"></i>
                        Clear All</button>
                    <hr>
                    <div class="login-social-link centered">
                        <!-- <p>or you can sign in via your social network</p>
                        <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                        <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button> -->
                    </div>
                    <div class="registration">
                        <!-- Don't have an account yet?<br />
                        <a class="" href="#">
                            Create an account
                        </a> -->
                    </div>
                </div>
                <!-- Modal -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal"
                    class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Forgot Password ?</h4> -->
                            </div>
                            <div class="modal-body">
                                <!-- <p>Enter your e-mail address below to reset your password.</p>
                                <input type="text" name="email" placeholder="Email" autocomplete="off"
                                    class="form-control placeholder-no-fix"> -->
                            </div>
                            <div class="modal-footer">
                                <!-- <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button> -->
                                <button class="btn btn-theme" type="button"
                                    style="background: rgb(45, 158, 211);">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
            </form>
        </div>
    </div>


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
