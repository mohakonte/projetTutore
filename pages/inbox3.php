<?php 
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
    AND cd.libelle_category='terminer' ") ;
$requete_prepare_demande->execute() ;
$demandes = $DB->fetchallobject($requete_prepare_demande) ;
$requete_a_traitee_prepare= $DB->prepare("SELECT COUNT(iddemande) as nombre
FROM demande de,category_demande cd
WHERE cd.libelle_category = 'a_traiter'
AND cd.idcategory_demande = de.fk_idcategory_demande" ) ;
$requete_a_traitee_prepare->execute() ;
$a_traitees = $DB->fetchallobject($requete_a_traitee_prepare) ;
foreach($a_traitees as $a_traitee) {
  $nombre_a_traitee = $a_traitee->nombre ;
}
$requete_en_cours_prepare= $DB->prepare("SELECT COUNT(iddemande) as nombre
FROM demande de,category_demande cd
WHERE cd.libelle_category = 'en_cours'
AND cd.idcategory_demande = de.fk_idcategory_demande") ;
$requete_en_cours_prepare->execute() ;
$en_courss = $DB->fetchallobject($requete_en_cours_prepare) ;
foreach($en_courss as $en_cours) {
  $nombre_en_cours = $en_cours->nombre ;
}
$requete_terminer_prepare= $DB->prepare("SELECT COUNT(iddemande) as nombre
FROM demande de,category_demande cd
WHERE cd.libelle_category = 'terminer'
AND cd.idcategory_demande = de.fk_idcategory_demande") ;
$requete_terminer_prepare->execute() ;
$terminers = $DB->fetchallobject($requete_terminer_prepare) ;
foreach($terminers as $terminer) {
  $nombre_terminer = $terminer->nombre ;
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
      <a href="index.html" class="logo"><b>moha<span>konte</span></b></a>
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
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <li>
            <a class="" href="inbox.php">
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
            <a class="active" href="inbox3.php">
              <i class="fa fa-envelope"></i>
              <span>TERMINER </span>
              <span class="label label-theme pull-right mail-info"><?=$nombre_terminer?></span>
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
        <div class="row mt">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading wht-bg">
                <h4 class="gen-case">
                    <b>Extrait de naissance</b> 
                    <form action="#" class="pull-right mail-src-position">
                      <div class="input-append">
                        <input type="text" class="form-control " placeholder="Numero demande">
                      </div>
                    </form>
                  </h4>
              </header>
              <div class="panel-body minimal">
                <div class="mail-option">
                  <div class="chk-all">
                    <div class="pull-left mail-checkbox">
                      <input type="checkbox" class="">
                    </div>
                    <div class="btn-group">
                      <a data-toggle="dropdown" href="#" class="btn mini all">
                        All
                        <i class="fa fa-angle-down "></i>
                        </a>
                      <ul class="dropdown-menu">
                        <li><a href="#"> None</a></li>
                        <li><a href="#"> Read</a></li>
                        <li><a href="#"> Unread</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="btn-group">
                    <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                      <i class=" fa fa-refresh"></i>
                      </a>
                  </div>
                  <div class="btn-group hidden-phone">
                    <a data-toggle="dropdown" href="#" class="btn mini blue">
                      More
                      <i class="fa fa-angle-down "></i>
                      </a>
                    <ul class="dropdown-menu">
                      <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                      <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                    </ul>
                  </div>
                  <div class="btn-group">
                    <a data-toggle="dropdown" href="#" class="btn mini blue">
                      Move to
                      <i class="fa fa-angle-down "></i>
                      </a>
                    <ul class="dropdown-menu">
                      <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                      <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                    </ul>
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
                        <form action= "contactform2.php" method ="post">
                        
                            <tr class="">
                            <td class="inbox-small-cells">
                            <?=$numero_demande?>
                            </td>
                            <td class="view-message  dont-show"><?=$prenom." ".$nom?></a></td>
                            <td class="view-message dont-show"><?=$document?></a></td>
                            <td class="view-message "><?=$numero_registre?> </a></td>
                            <td class="view-message  text-right"><?=$date_complet?></td>
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
                            <td class="view-message dont-show"><button type="submit" class="btn btn-primary pull-right">DETAIL</button></td>
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
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
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
