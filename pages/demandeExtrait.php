
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>PlateForme de Demande de documents d'etat civil en Ligne</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
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
				<a class="navbar-brand" href="index.php"><img src="../assets/images/logo2.png" width="70px"><spand style="font-weight: bold;">  Etat Civil</spand></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="index.php">Accueil</a></li>
					<li><a href="about.php">A propos</a></li>
					<li class="dropdown">
						<!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a> -->
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.php">Left Sidebar</a></li>
							<li class="active"><a href="sidebar-right.php">Right Sidebar</a></li>
						</ul>
					</li>
					<li><a href="contact.php">Contact</a></li>
					<li><a class="btn" href="signin.php">Se Connecter / S'inscrire</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Accueil</a></li>
			<li class="active">S'inscrire</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Choisir un document</h1>
				</header>
              <form method="post" >
                    <div class="col-md-5 pr-md-1">
                      <div class="form-group">
                      <label for="type" class="bmd-label-floating">Type:</label>
                          <select name="type" class="form-control" >
                            <option value="1" style="color:Black;">Demande d’extrait de naissance</option>
                            <option value="2" style="color:Black;">Demande de certificat de mariage</option>
                            <option value="3" style="color:Black;">Demande de certificat de décès</option>
                        </select>
                      </div>
                      <div class="col-md-8 text-right">
										<button class="btn btn-action" name="valider" type="submit">Valider</button>
									</div>
                    </div>
</form>
<?php
require_once('../db.class.php');
// require_once("../confandtestconnex.php");
if (isset($_POST['valider'])) {
  ?>
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Créer un nouveau compte</h3>
							<p class="text-center text-muted">Cliquer sur ce bouton , <a href="signin.php">Se connecter</a> pour vous connectez maintenant. </p>
							<hr>

							<form>
								<div class="top-margin">
									<label>Nom</label>
									<input type="text" class="form-control">
								</div>
								<div class="top-margin">
									<label>Prenom</label>
									<input type="text" class="form-control">
								</div>
								<div class="top-margin">
									<label>Email  <span class="text-danger">*</span></label>
									<input type="text" class="form-control">
								</div>

								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Mot de passe <span class="text-danger">*</span></label>
										<input type="text" class="form-control">
									</div>
									<div class="col-sm-6">
										<label>Confirmation du mot de passe<span class="text-danger">*</span></label>
										<input type="text" class="form-control">
									</div>
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<!-- <label class="checkbox">
											<input type="checkbox"> 
											I've read the <a href="page_terms.php">Terms and Conditions</a>
										</label>                         -->
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit">S'inscrire</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
  <?php
}
?>
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	
	<footer id="footer" class="top-space">

<div class="footer1">
	<div class="container">
		<div class="row">
			
			<div class="col-md-3 widget">
				<h3 class="widget-title">Contact</h3>
				<div class="widget-body">
					<p>+33 825 45 25<br>
						<a href="mailto:#">etat-civil-senegal@gmail.sn</a><br>
						<br>
						
					</p>	
				</div>
			</div>

			<!-- <div class="col-md-3 widget">
				<h3 class="widget-title">Follow me</h3>
				<div class="widget-body">
					<p class="follow-me-icons">
						<a href=""><i class="fa fa-twitter fa-2"></i></a>
						<a href=""><i class="fa fa-dribbble fa-2"></i></a>
						<a href=""><i class="fa fa-github fa-2"></i></a>
						<a href=""><i class="fa fa-facebook fa-2"></i></a>
					</p>	
				</div>
			</div> -->

		<!-- 	<div class="col-md-6 widget">
				<h3 class="widget-title">Text widget</h3>
				<div class="widget-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
					<p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
				</div>
			</div>
-->
		</div> <!-- /row of widgets -->
	</div>
</div>

<div class="footer2">
	<div class="container">
		<div class="row">
			
			<div class="col-md-6 widget">
				<div class="widget-body">
					<p class="simplenav">
						<a href="#">Accueil</a> | 
						<a href="#apropos.php">A propos</a> |
						<a href="#contact.php">Contact</a> |
						<b><a href="#signup.php">S'inscrire</a></b>
					</p>
				</div>
			</div>

			<div class="col-md-6 widget">
				<div class="widget-body">
					<p class="text-right">
						Copyright &copy; 2019, Estim Work Group.
					</p>
				</div>
			</div>

		</div> <!-- /row of widgets -->
	</div>
</div>

</footer>	






	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="../assets/js/headroom.min.js"></script>
	<script src="../assets/js/jQuery.headroom.min.js"></script>
	<script src="../assets/js/template.js"></script>
</body>
</html>