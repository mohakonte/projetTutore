<?php 
session_start() ;
require "../db.class.php" ;
$DB = new DB() ;




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
    <div class="navbar navbar-inverse navbar-fixed-top headroom" >
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="index.html"><img src="../assets/images/logo2.png" width="70px"><spand style="font-weight: bold;">  Etat Civil</spand></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li class="active"><a href="index.php">Accueil</a></li>
                    <li><a href="apropos.php">A propos</a></li>
                    <li class="dropdown">
                        <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a> -->
                        <ul class="dropdown-menu">
                            <li><a href="#sidebar-left.html">Left Sidebar</a></li>
                            <li class="active"><a href="#sidebar-right.html">Right Sidebar</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a class="btn" href="form.php">Demander un document</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div> 
    <!-- /.navbar -->
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
                            <!-- dubut paiement -->
                            <div class="tab-pane" id="paiement">
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <div class="form-group">
                                            <div class="alert alert-success" role="alert">
                                                <h4 align="center">felicitation votre demande a ete valider, vous allez recevoir de ci peu message <br> de confirmation </h4>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='suivant' value='suivant' />
                                <a class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' href="form.php"> Accueil </a>

                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='precedant' value="precedant" />
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
