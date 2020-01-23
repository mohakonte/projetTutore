<?php
require "../db.class.php" ;
$DB = new DB() ;
$matricule = $_GET['numero_admin'];
$requete_prepare_supp = $DB->prepare("DELETE FROM admin WHERE idadmin = '$matricule' ");
        $requete_prepare_supp->execute();
header("location:admin.php");
?>