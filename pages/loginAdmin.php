<?php
session_start() ;
require('../db.class.php');
$DB=new DB;
//--------(Debut)------Declaration et Affichage de la variable $_SESSION['message']-----------------------
echo $_SESSION['message'];
$_SESSION['message']="";
//--------(Fin)------Declaration et Affichage de la variable $_SESSION['message']-----------------------

//--------(Debut)----Recuperer les valeurs envoyees dans la page traitement nommee loginAdminTraitement.php-
if(isset($_SESSION["envoyer"])){
  $email     = $_SESSION["envoyer"]["email"];
  $mdp    = $_SESSION["envoyer"]["mdp"]; 

//--------(Debut)----Recuperer les valeurs envoyees dans la page traitement nommee loginAdminTraitement.php-
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
    <link href="/img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="../ressources/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="../ressources/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../ressources/css/style.css" rel="stylesheet">
    <link href="../ressources/css/style-responsive.css" rel="stylesheet">

    <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <div id="login-page">
        <div class="container">
            <form class="form-login" method="post" style="max-width: 700px; margin: 190px auto 0;
	background: #fff;
	border-radius: 5px;
    -webkit-border-radius: 5px;
    " action="loginAdminTraitement.php">
                <h2 class="form-login-heading" style="background: rgb(45, 158, 211);">Connexion</h2>
                <div class="login-wrap" style="width:100%;">
                    <input type="text" class="form-control" placeholder="E mail" name="email" value="<?php if (isset($nom)) {
                        echo $email;
                    } ?>">
                    <br>
                    <input type="password" class="form-control" placeholder="Mot de passe" name="mdp" value="<?php if (isset($prenom)) {
                        echo $mdp;
                    } ?>">
                    <br>


                    <label class="checkbox">
                        <!-- <input type="checkbox" value="remember-me"> Remember me -->
                        <span class="pull-right">
                            <!-- <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a> -->
                        </span>
                    </label>
                    <button class="btn btn-theme btn-block" type="submit" name="envoyer"
                        style="background: rgb(45, 158, 211);"><i class="fa fa-lock"></i>
                        Se Connecter</button>
                    <br>
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
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../ressources/lib/jquery/jquery.min.js"></script>
    <script src="../ressources/lib/bootstrap/js/bootstrap.min.js"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="../ressources/lib/jquery.backstretch.min.js"></script>
    <script>
    $.backstretch("../assets/images/logo2.png", {
        speed: 500
    });
    </script>
</body>

</html>