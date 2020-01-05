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
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-divya.jpg"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-danro.jpg"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-sherman.jpg"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu pull-right ">
      <ul class="nav top-menu ">
          <li><a class="logout" href="inbox.php">Naissance</a></li>
          <li><a class="logout" href="">Mariage</a></li>
          <li><a class="logout" href="">Deces</a></li>
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
          <div class="col-lg-12 col-md-6 col-sm-6">
          <form  action="contactform2.php" method="post">
            <div class="form-group">
              <textarea class="form-control" name="message" id="contact-message" placeholder="Message..." rows="5" data-rule="required" data-msg="Please write something for us" ></textarea>
              <div class="validate"></div>
            </div>
              <input type="hidden" name = "numero_demande" value="<?=$_POST['numero_demande']?>">
              <button type="submit" name ="envoyer" value = "envoyer" class="btn btn-large btn-primary">Mettre a jour</button>
          </form>
          </div>
          <div class="col-lg-12 col-md-6 col-sm-6">
            <form  action="contactform2.php" method="post">
              <input type="hidden" name = "numero_demande" value="<?=$_POST['numero_demande']?>">
              <button type="submit" name ="terminer" value = "terminer" class="btn btn-large btn-primary pull-right">Mettre fin a la demande</button>
            </form>
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
