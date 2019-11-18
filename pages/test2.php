<?php
require "../db.class.php" ;
$DB = new DB() ;



$requete_prepare_demande=$DB->prepare("SELECT *
    FROM demande de ,personne pe,date_demande da,reference re,paiement pa,confirmation_paiement cp,type_document td ,document do,etat_civil ec,category_demande cd 
    WHERE pe.idpersonne = de.fk_idpersonne
    AND da.iddate_demande = de.fk_iddate
    AND pa.idpaiement = de.fk_idpaiement
    AND do.iddocument = de.fk_iddocument
    AND cd.idcategory_demande = de.fk_idcategory_demande  
    AND cp.idconfirmation_paiement = pa.fk_idconfirmation_paiement
    AND re.idreference = pa.fk_idreference
    AND td.idtype_document = do.fk_idtype_document
    AND ec.idetat_civil = do.fk_idetat_civil_document
    AND cd.libelle_category='a_traiter' ") ;
$requete_prepare_demande->execute() ;
$demandes = $DB->fetchallobject($requete_prepare_demande) ;
foreach($demandes as $demande) :
    $numero_demande = $demande->iddemande ;
    $prenom = $demande->prenom ;
    $nom = $demande->nom;
    $age = $demande->age ;
    $numero_telephone = $demande->numero_telephone ;
    $adresse = $demande->adresse ;
    $email = $demande->email ;
    $document = $demande->libelle_type_document ;
    $jour = $demande->jour ;
    $mois = $demande->mois ;
    $annee = $demande->annee ;
    $date_complet = $demande->date_complet ;

    $etat_civil = $demande->libelle_etat_civil ;
    $nombre_copie = $demande->nombre_copie ;
    $numero_registre = $demande->numero_registre ;
    $montant = 500*$nombre_copie ;
    ?>
        <form action= "test2.php" method ="post">
        <tbody>
            <tr class="">
            <td class="inbox-small-cells">
            <?=$numero_demande?>
            </td>
            <td class="view-message  dont-show"><a href="contactform.html"><?=$prenom." ".$nom?></a></td>
            <td class="view-message dont-show"><a href="contactform.html"><?=$document?></a></td>
            <td class="view-message "><a href="contactform.html"><?=$numero_registre?> </a></td>
            <td class="view-message  text-right"><?=$date_complet?></td>
            <input type="hidden" name="numero_telephone" value=<?=$numero_telephone?>>
            <input type="hidden" name="adresse" value=<?=$adresse?>>
            <input type="hidden" name="email" value=<?=$email?>>
            <input type="hidden" name="jour" value=<?=$jour?>>
            <input type="hidden" name="mois" value=<?=$annee?>>
            <input type="hidden" name="annee" value=<?=$annee?>>
            <input type="hidden" name="age" value=<?=$age?>>
            <td class="view-message dont-show"><button type="submit" class="btn btn-primary pull-right">TRAITER</button></td>
            <td class="view-message dont-show"><button type="submit" class="btn btn btn-theme pull-right"><i class="fa fa-refresh"></i> MIS A JOUR </button></td>
            <td class="view-message dont-show"><button type="submit" class="btn btn-primary pull-right">DETAIL</button></td>
            
            </tr>
        </tbody>
        </form>
<?php endforeach ; ?>



<?php var_dump($_POST) ; ?>