<?php 
class Outil {
    // Cette classe regroupe l'ensemble de nos fonction 
    

    //creation de la fonction qui nous permettra de prendre en parametre un jour en anglais et de nou le convertir en francais 
    public function convert_jour($jour) {                
        if($jour == "Fri"){
            $jour = "vendredi" ;
        }   else if($jour == "Mon") {
            $jour = "lundi" ;
        }   else if($jour == "Tue") {
            $jour == "mardi" ;
        }   else if($jour == "Wen") {
            $jour = "mercredi" ;   
        }   else if($jour == "Thu") {
            $jour = "jeudi" ;   
        }   else if($jour == "Sat") {
            $jour = "samedi" ;   
        }   else if($jour == "Sun") {
            $jour = "dimanche" ;   
        }
        return $jour ;
    } 
//creation de la fonction qui nous permettra de prendre en parametre un mois en anglais et de nous le convertir en francais 

    public function convert_mois($mois) {                
        if($mois == "Jan"){
            $mois = "Janvier" ;
        }   else if($mois == "Feb") {
            $mois = "Fevrier" ;
        }   else if($mois == "Mar") {
            $mois = "Mars" ;
        }   else if($mois == "Apr") {
            $mois = "Avril" ;   
        }   else if($mois == "May") {
            $mois = "Mai" ;   
        }   else if($mois == "Jun") {
            $mois = "Juin" ;   
        }   else if($mois == "Jul") {
            $mois = "Julliet" ;   
        }   else if($mois == "Aug") {
            $mois = "Aout" ;   
        }   else if($mois == "Sep") {
            $mois = "Septembre" ;   
        }   else if($mois == "Oct") {
            $mois = "Octobre" ;   
        }   else if($mois == "Nov") {
            $mois = "Novembre" ;   
        }   else if($mois == "Dec") {
            $mois = "Decembre" ;   
        }
        return $mois ;
    } 
}



?>