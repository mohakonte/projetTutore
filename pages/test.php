<?php 
require "../Outil.php" ;
$Outil = new Outil() ;
$jour_semaine = date("D") ;
$jour = "Tue" ;
$jour = $Outil->convert_jour($jour) ;
echo $jour ;
$mois = date("M") ;
$annee = date("Y") ;
$date_complete = date("y-m-j") ;
$jour_semaine = $Outil->convert_jour($jour_semaine) ;   
$mois = $Outil->convert_mois($mois) ;
$date_complet = $jour_semaine." le ".$jour." ".$mois." ".$annee." à ".date("H:i:s") ;
echo $date_complet ;
//echo $date_complet."\n" ;
//echo $date_complete."\n" ;

// Test insertion 




?>