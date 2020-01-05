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

		SELECT * FROM document as dc, type_document as td, etat_civil as ec  
        WHERE dc.fk_idtype_document = td.idtype_document
        AND td.libelle_type_document = "certficat mariage" 
        AND ec.idetat_civil=dc.fk_idetat_civil_document
        AND ec.libelle_etat_civil = 'dakar' ;




?>