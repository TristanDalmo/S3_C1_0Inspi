<?php

namespace Views\PagesFormulaire;
require_once(__DIR__ . "/../AbstractPage.php");
use Views\AbstractPage;

/**
 * Classe de génération de la page d'accueil de l'application
 */
class PageFormulaire extends AbstractPage
{
    public function __construct()
    {
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../../Public/CSS/formulaire.css",nom:"E-Lieu ~ Formulaire",jsChemin: "../../Public/JavaScript/formulaire.js");
    }    

    protected function GenerateContent() : string
    { // ./BDD/test/main.php
        return        
   
"<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Document</title>
</head>
<body>
    <div class=\"formulaire\">
        <form action='./ControllerPartage.php' method='POST' enctype='multipart/form-data'>
            <fieldset class=\"grandfield\">
                <div class=\"Containerhaut\">
                    <div class=\"texte-gauche\">
                        <p class=\"Gras\">ÉTAT DES LIEUX</p>
                        <p id=\"petit\">(Conforme LOI ALUR)</p>
                    </div>
                    <div class=\"date-droite\">
                        <label for=\"fDate\" class=\"putbold\">DATE D'ENTRÉE :</label>
                        <input type=\"date\" id=\"fDate\" name=\"fDate\" required>
                    </div>
                </div>
                <div class=\"ligne2\">
                    <div class=\"texte-gauche1\">
                        <input type=\"radio\" id=\"ENTREE\" name=\"fPermis\" value=\"Entrée\">
                        <label for=\"ENTREE\">Entrée</label>
                        <input type=\"radio\" id=\"SORTIE\" name=\"fPermis\" value=\"Sortie\">
                        <label for=\"SORTIE\">Sortie</label>
                    </div>
                    <div class=\"date-droite1\">
                        <label for=\"fDateS\" class=\"putbold\">DATE DE SORTIE :</label>
                        <input type=\"date\" id=\"fDateS\" name=\"fDateS\" required>
                    </div>
                </div>
                <br>
                <div class=\"loi\">
                    <p>L'état des lieux doit être établi entre les deux parties (locataire et propriétaire) lors de la remise des clés du logement et lors de leur restitution. En effet, le bail (loi n° 89-462 du 6 juillet 1989) stipule que l'état des lieux doit porter sur l'ensemble des locaux et équipements d'usage privatif mentionnés au contrat de location, et dont le locataire a la jouissance exclusive.</p>
                </div>
                <br>
                <fieldset class=\"Logement\">
                    <div class=\"l1\">
                        <p class=\"putbold\">LOGEMENT</p>
                    </div>
                    <div class=\"l2\">
                        <input type=\"radio\" id=\"Appartement\" name=\"typeLogement\" value=\"Appartement\">
                        <label for=\"Appartement\">Appartement</label>
                        <input type=\"radio\" id=\"Maison\" name=\"typeLogement\" value=\"Maison\">
                        <label for=\"Maison\">Maison</label>
                        <input type=\"radio\" id=\"Autre\" name=\"typeLogement\" value=\"Autre\">
                        <label for=\"Autre\">Autre</label>
                        <input type=\"text\" id=\"textautre\" name=\"textautre\" size=\"5\">
                    </div>
                    <div class=\"l3\">
                        <label for=\"SURFACE\" class=\"putbold\">SURFACE :</label>
                        <input type=\"text\" id=\"SURFACE\" name=\"SURFACE\" placeholder=\"m²\">
                        <label for=\"nbpiece\" class=\"putbold\">NOMBRE DE PIÈCES PRINCIPALES :</label>
                        <input type=\"number\" id=\"nbpiece\" name=\"nbpiece\" >
                    </div>
                    <div class=\"l4\">
                        <label for=\"adresse\" class=\"putbold\">ADRESSE :</label>
                        <textarea id=\"adresse\" name=\"adresse\" rows=\"3\" cols=\"50\"></textarea>
                    </div>
    
                    <br>
                    
                    <table>
                        <tr>
                            <th id=\"tab1\" class=\"putbold\">LE BAILLEUR (OU SON MANDATAIRE)</th>
                            <th id=\"tab2\" class=\"putbold\">LE(S) LOCATAIRE(S)</th>
                        </tr>
                        <tr>
                            <td>
                                <div class=\"civilite-container\">
                                    <label for=\"mr_bailleur\" class=\"putbold\">CIVILITÉ :</label>
                                    <span class=\"civilite\">
                                        <input type=\"radio\" id=\"mr_bailleur\" name=\"civilite_bailleur\" required>
                                        <label for=\"mr_bailleur\">Mr</label>
                                        <input type=\"radio\" id=\"mme_bailleur\" name=\"civilite_bailleur\" required>
                                        <label for=\"mme_bailleur\">Mme</label>
                                        <input type=\"radio\" id=\"mlle_bailleur\" name=\"civilite_bailleur\" required>
                                        <label for=\"mlle_bailleur\">Mlle</label>
                                    </span>
                                </div>
                                <label for=\"prenom_bailleur\" class=\"putbold\" >PRÉNOM :</label>
                                <input type=\"text\" id=\"prenom_bailleur\" name=\"prenom_bailleur\" required>
                                <label for=\"nom_bailleur\" class=\"putbold\">NOM :</label>
                                <input type=\"text\" id=\"nom_bailleur\" name=\"nom_bailleur\" required>
                                <label for=\"adresse_bailleur\" class=\"putbold\">ADRESSE :</label>
                                <textarea id=\"adresse_bailleur\" name=\"adresse_bailleur\" rows=\"3\" required></textarea>
                            </td>
                            <td>
                                <div class=\"civilite-container\">
                                    <label for=\"mr_locataire\" class=\"putbold\">CIVILITÉ :</label>
                                    <span class=\"civilite\">
                                        <input type=\"radio\" id=\"mr_locataire\" name=\"civilite_locataire\" required>
                                        <label for=\"mr_locataire\">Mr</label>
                                        <input type=\"radio\" id=\"mme_locataire\" name=\"civilite_locataire\" required>
                                        <label for=\"mme_locataire\">Mme</label>
                                        <input type=\"radio\" id=\"mlle_locataire\" name=\"civilite_locataire\" required>
                                        <label for=\"mlle_locataire\">Mlle</label>
                                    </span>
                                </div>
                                <label for=\"prenom_locataire\" class=\"putbold\">PRÉNOM :</label>
                                <input type=\"text\" id=\"prenom_locataire\" name=\"prenom_locataire\" required>
                                <label for=\"nom_locataire\" class=\"putbold\">NOM :</label>
                                <input type=\"text\" id=\"nom_locataire\" name=\"nom_locataire\" required>
                                <label for=\"adresse_locataire\" class=\"putbold\">ADRESSE :</label>
                                <p class=\"petit\">(Si état des lieux de sortie, mentionner la nouvelle adresse de domiciliation)</p>
                                <textarea id=\"adresse_locataire\" name=\"adresse_locataire\" rows=\"3\" required></textarea>
                            </td>
                        </tr>
                    </table>
    
    
                </fieldset>
                
            </fieldset>
            <p id=\"notationetat\">Complétez les colonnes État avec les lettres <strong>M</strong> (mauvais), <strong>P</strong> (passable), <strong>B</strong> (bon), <strong>TB</strong> (très bon).</p>          
            <table id=\"tableauCuisine\">
                <thead>
                    <tr>
                        <th class=\"rond\">Cuisine</th>
                        <th class=\"details\">Description / détails</th>
                        <th class=\"etat\">État (entrée)</th>
                        <th class=\"etat\">État (sortie)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class=\"middleandbold\">Mur</td>
                        <td><textarea name=\"description_mur_cuisine\" id=\"description_mur_cuisine\"></textarea></td>
                        <td><select id=\"etat_cuisine_mur_entree\" name=\"etat_cuisine_mur_entree\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>

                        <td><select id=\"etat_cuisine_mur_sortie\" name=\"etat_cuisine_mur_sortie\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Sol</td>
                        <td><textarea name=\"description_sol_cuisine\" id=\"description_sol_cuisine\"></textarea></td>
                        <td><select id=\"etat_cuisine_sol_entree\" name=\"etat_cuisine_sol_entree\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"etat_cuisine_sol_sortie\" name=\"etat_cuisine_sol_sortie\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>        
                    <tr>
                        <td class=\"middleandbold\">Vitrage et volets</td>
                        <td><textarea name=\"description_vitrage_volets\" id=\"description_vitrage_volets\"></textarea></td>
                        <td><select id=\"etat_cuisine_vitrage_volets_entree\" name=\"etat_cuisine_vitrage_volets_entree\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"etat_cuisine_vitrage_volets_sortie\" name=\"etat_cuisine_vitrage_volets_sortie\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>               
                    <tr>
                        <td class=\"middleandbold\">Plafond</td>
                        <td><textarea name=\"description_plafond_cuisine\" id=\"description_plafond_cuisine\"></textarea></td>
                        <td><select id=\"etat_cuisine_plafond_entree\" name=\"etat_cuisine_plafond_entree\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"etat_cuisine_plafond_sortie\" name=\"etat_cuisine_plafond_sortie\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>                
                    <tr>
                        <td class=\"middleandbold\">Éclairage et interrupteurs</td>
                        <td><textarea name=\"description_eclairage_interrupteurs\" id=\"description_eclairage_interrupteurs\"></textarea></td>
                        <td><select id=\"etat_cuisine_eclairage_interrupteurs_entree\" name=\"etat_cuisine_eclairage_interrupteurs_entree\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"etat_cuisine_eclairage_interrupteurs_sortie\" name=\"etat_cuisine_eclairage_interrupteurs_sortie\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>                
                    <tr>
                        <td class=\"middleandbold\">Prise électrique nombre : <input type=\"number\" id=\"nombre_prise_electrique\" name=\"nombre_prise_electrique\"></td>
                        <td><textarea name=\"description_prise_electrique\" id=\"description_prise_electrique\"></textarea></td>
                        <td><select id=\"etat_cuisine_prise_electrique_entree\" name=\"etat_cuisine_prise_electrique_entree\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"etat_cuisine_prise_electrique_sortie\" name=\"etat_cuisine_prise_electrique_sortie\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>     
                    <tr>
                        <td class=\"middleandbold\">Placards et tiroirs</td>
                        <td><textarea name=\"description_placards_tiroirs\" id=\"description_placards_tiroirs\"></textarea></td>
                        <td><select id=\"etat_cuisine_placards_tiroirs_entree\" name=\"etat_cuisine_placards_tiroirs_entree\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"etat_cuisine_placards_tiroirs_sortie\" name=\"etat_cuisine_placards_tiroirs_sortie\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>        
                    <tr>
                        <td class=\"middleandbold\">Évier (et robinetterie)</td>
                        <td><textarea name=\"description_evier_robinetterie\" id=\"description_evier_robinetterie\"></textarea></td>
                        <td><select id=\"etat_cuisine_evier_robinetterie_entree\" name=\"etat_cuisine_evier_robinetterie_entree\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"etat_cuisine_evier_robinetterie_sortie\" name=\"etat_cuisine_evier_robinetterie_sortie\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>                
                    <tr>
                        <td class=\"middleandbold\">Plaques de cuisson et four</td>
                        <td><textarea name=\"description_plaque_four\" id=\"description_plaque_four\"></textarea></td>
                        <td><select id=\"etat_cuisine_plaque_four_entree\" name=\"etat_cuisine_plaque_four_entree\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"etat_cuisine_plaque_four_sortie\" name=\"etat_cuisine_plaque_four_sortie\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>                
                    <tr>
                        <td class=\"middleandbold\">Hotte</td>
                        <td><textarea name=\"description_hotte\" id=\"description_hotte\"></textarea></td>
                        <td><select id=\"etat_cuisine_hotte_entree\" name=\"etat_cuisine_hotte_entree\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"etat_cuisine_hotte_sortie\" name=\"etat_cuisine_hotte_sortie\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>                
                    <tr>
                        <td class=\"middleandbold\">
                            Électroménager :
                            <input type=\"text\" id=\"electromenager_nom\" name=\"electromenager_nom\">
                        </td>
                        <td>
                            <textarea name=\"description_electromenager\" id=\"description_electromenager\" style=\"width: 100%;\"></textarea>
                        </td>
                        <td>
                            <select id=\"etat_cuisine_electromenager_entree\" name=\"etat_cuisine_electromenager_entree\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_cuisine_electromenager_sortie\" name=\"etat_cuisine_electromenager_sortie\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                    </tr>                
                </tbody>
            </table>
            <table id=\"tableauSDB\">
                <thead>
                    <tr>
                        <th rowspan=\"2\">Salle de bain</th>
                        <th colspan=\"2\" class=\"sdb\">Description / détails</th>
                        <th colspan=\"2\">État</th>
                    </tr>
                    <tr>
                        <th class=\"sdb\">Salle de bain 1</th>
                        <th class=\"sdb\">Salle de bain 2</th>
                        <th class=\"etat\">(entrée)</th>
                        <th class=\"etat\">(sortie)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class=\"middleandbold\">Mur</td>
                        <td><textarea id=\"mur_sdb1\" name=\"mur_sdb1\"></textarea></td>
                        <td><textarea id=\"mur_sdb2\" name=\"mur_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_mur_entree\" name=\"etat_mur_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_mur_sortie\" name=\"etat_mur_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Sol</td>
                        <td><textarea id=\"sol_sdb1\" name=\"sol_sdb1\"></textarea></td>
                        <td><textarea id=\"sol_sdb2\" name=\"sol_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_sol_entree\" name=\"etat_sol_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_sol_sortie\" name=\"etat_sol_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Vitrage et volets</td>
                        <td><textarea id=\"vitrage_sdb1\" name=\"vitrage_sdb1\"></textarea></td>
                        <td><textarea id=\"vitrage_sdb2\" name=\"vitrage_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_vitrage_entree\" name=\"etat_vitrage_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_vitrage_sortie\" name=\"etat_vitrage_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Plafond</td>
                        <td><textarea id=\"plafond_sdb1\" name=\"plafond_sdb1\"></textarea></td>
                        <td><textarea id=\"plafond_sdb2\" name=\"plafond_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_plafond_entree\" name=\"etat_plafond_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_plafond_sortie\" name=\"etat_plafond_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Éclairage et interrupteurs</td>
                        <td><textarea id=\"eclairage_sdb1\" name=\"eclairage_sdb1\"></textarea></td>
                        <td><textarea id=\"eclairage_sdb2\" name=\"eclairage_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_eclairage_entree\" name=\"etat_eclairage_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_eclairage_sortie\" name=\"etat_eclairage_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Prise électrique</td>
                        <td>
                            <strong>Nombre</strong> : <input id=\"prise_sdb1\" name=\"prise_sdb1\" name=\"prise_sdb1\" type=\"number\" min=\"0\" placeholder=\"Nombre de prises\">
                        </td>
                        <td>
                            <strong>Nombre</strong> : <input id=\"prise_sdb2\" name=\"prise_sdb2\" name=\"prise_sdb2\" type=\"number\" min=\"0\" placeholder=\"Nombre de prises\">
                        </td>
                        <td>
                            <select id=\"etat_prise_entree\" name=\"etat_prise_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_prise_sortie\" name=\"etat_prise_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Lavabo et robinetterie</td>
                        <td><textarea id=\"lavabo_sdb1\" name=\"lavabo_sdb1\"></textarea></td>
                        <td><textarea id=\"lavabo_sdb2\" name=\"lavabo_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_lavabo_entree\" name=\"etat_lavabo_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_lavabo_sortie\" name=\"etat_lavabo_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Baignoire / douche</td>
                        <td><textarea id=\"baignoire_sdb1\" name=\"baignoire_sdb1\"></textarea></td>
                        <td><textarea id=\"baignoire_sdb2\" name=\"baignoire_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_baignoire_entree\" name=\"etat_baignoire_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_baignoire_sortie\" name=\"etat_baignoire_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">WC</td>
                        <td><textarea id=\"wc_sdb1\" name=\"wc_sdb1\"></textarea></td>
                        <td><textarea id=\"wc_sdb2\" name=\"wc_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_wc_entree\" name=\"etat_wc_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_wc_sortie\" name=\"etat_wc_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
               
            <table id=\"tableauChambres\">
                <thead>
                    <tr>
                        <th rowspan=\"2\" class=\"PremiereColonneChambre\">Chambres</th>
                        <th colspan=\"3\" class=\"description\">Description / détails</th>
                        <th colspan=\"3\" class=\"etat\">État entrée</th>
                        <th colspan=\"3\" class=\"etat\">État sortie</th>
                    </tr>
                    <tr>
                        <th class=\"description\">Chambre 1</th>
                        <th class=\"description\">Chambre 2</th>
                        <th class=\"description\">Chambre 3</th>
                        <th class=\"etat\">1</th>
                        <th class=\"etat\">2</th>
                        <th class=\"etat\">3</th>
                        <th class=\"etat\">1</th>
                        <th class=\"etat\">2</th>
                        <th class=\"etat\">3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class=\"PremiereColonneChambre\">Mur</td>
                        <td><textarea id=\"murChambre1\" name=\"murChambre1\"></textarea></td>
                        <td><textarea id=\"murChambre2\" name=\"murChambre2\"></textarea></td>
                        <td><textarea id=\"murChambre3\" name=\"murChambre3\"></textarea></td>
                        <td>
                            <select id=\"etatEntreeMur1\" name=\"etatEntreeMur1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreeMur2\" name=\"etatEntreeMur2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreeMur3\" name=\"etatEntreeMur3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieMur1\" name=\"etatSortieMur1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieMur2\" name=\"etatSortieMur2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieMur3\" name=\"etatSortieMur3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                    </tr>  
                    <tr>
                        <td class=\"PremiereColonneChambre\">Sol</td>
                        <td><textarea name=\"solChambre1\" id=\"solChambre1\"></textarea></td>
                        <td><textarea name=\"solChambre2\" id=\"solChambre2\"></textarea></td>
                        <td><textarea name=\"solChambre3\" id=\"solChambre3\"></textarea></td>
                        <td>
                            <select id=\"etat_chambre_sol_entree1\" name=\"etat_chambre_sol_entree1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_sol_entree2\" name=\"etat_chambre_sol_entree2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_sol_entree3\" name=\"etat_chambre_sol_entree3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_sol_sortie1\" name=\"etat_chambre_sol_sortie1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_sol_sortie2\" name=\"etat_chambre_sol_sortie2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_sol_sortie2\" name=\"etat_chambre_sol_sortie3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class=\"PremiereColonneChambre\">Vitrages et volets</td>
                        <td><textarea name=\"vitrages1\" id=\"vitrages1\"></textarea></td>
                        <td><textarea name=\"vitrages2\" id=\"vitrages2\"></textarea></td>
                        <td><textarea name=\"vitrages3\" id=\"vitrages3\"></textarea></td>
                        <td>
                            <select id=\"etat_chambre_vitrages_entree1\" name=\"etat_chambre_vitrages_entree1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_vitrages_entree2\" name=\"etat_chambre_vitrages_entree2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_vitrages_entree3\" name=\"etat_chambre_vitrages_entree3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_vitrages_sortie1\" name=\"etat_chambre_vitrages_sortie1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_vitrages_sortie2\" name=\"etat_chambre_vitrages_sortie2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_vitrages_sortie3\" name=\"etat_chambre_vitrages_sortie3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                    </tr>                            
                    <tr>
                        <td class=\"PremiereColonneChambre\">Plafond</td>
                        <td><textarea name=\"plafond1\" id=\"plafond1\"></textarea></td>
                        <td><textarea name=\"plafond2\" id=\"plafond2\"></textarea></td>
                        <td><textarea name=\"plafond3\" id=\"plafond3\"></textarea></td>
                        <td>
                            <select id=\"etat_chambre_plafond_entree1\" name=\"etat_chambre_plafond_entree1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_plafond_entree2\" name=\"etat_chambre_plafond_entree2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_plafond_entree3\" name=\"etat_chambre_plafond_entree3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_plafond_sortie1\" name=\"etat_chambre_plafond_sortie1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_plafond_sortie2\" name=\"etat_chambre_plafond_sortie2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_plafond_sortie3\" name=\"etat_chambre_plafond_sortie3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                    </tr>                        
                    <tr>
                        <td class=\"PremiereColonneChambre\">Éclairage et interrupteurs</td>
                        <td><textarea name=\"eclairage1\" id=\"eclairageChambre1\"></textarea></td>
                        <td><textarea name=\"eclairage2\" id=\"eclairageChambre2\"></textarea></td>
                        <td><textarea name=\"eclairage3\" id=\"eclairageChambre3\"></textarea></td>
                        <td>
                            <select id=\"etat_chambre_eclairage_entree1\" name=\"etat_chambre_eclairage_entree1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_eclairage_entree2\" name=\"etat_chambre_eclairage_entree2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_eclairage_entree3\" name=\"etat_chambre_eclairage_entree3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_eclairage_sortie1\" name=\"etat_chambre_eclairage_sortie1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_eclairage_sortie2\" name=\"etat_chambre_eclairage_sortie2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_chambre_eclairage_sortie3\" name=\"etat_chambre_eclairage_sortie3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                    </tr> 
                    
                    
                    
                    <tr>
                        <td class=\"PremiereColonneChambre\">Plafonds électriques</td>
                        <td>
                            <div class=\"description-group\">
                                <div class=\"input-inline\">
                                    <span>Nombre :</span>
                                    <input type=\"number\" class=\"nbPrise\" min=\"0\" id=\"nbPlafondElectrique1\" name=\"nbPlafondElectrique1\">
                                </div>
                                <textarea id=\"plafondElectrique1\" name=\"plafondElectrique1\"></textarea>
                            </div>
                        </td>
                        <td>
                            <div class=\"description-group\">
                                <div class=\"input-inline\">
                                    <span>Nombre :</span>
                                    <input type=\"number\" class=\"nbPrise\" min=\"0\" id=\"nbPlafondElectrique2\" name=\"nbPlafondElectrique2\">
                                </div>
                                <textarea id=\"plafondElectrique2\" name=\"plafondElectrique2\"></textarea>
                            </div>
                        </td>
                        <td>
                            <div class=\"description-group\">
                                <div class=\"input-inline\">
                                    <span>Nombre :</span>
                                    <input type=\"number\" class=\"nbPrise\" min=\"0\" id=\"nbPlafondElectrique3\" name=\"nbPlafondElectrique3\">
                                </div>
                                <textarea id=\"plafondElectrique3\" name=\"plafondElectrique3\"></textarea>
                            </div>
                        </td>
                        <td>
                            <select id=\"etatEntreePlafondElectrique1\" name=\"etatEntreePlafondElectrique1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreePlafondElectrique2\" name=\"etatEntreePlafondElectrique2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreePlafondElectrique3\" name=\"etatEntreePlafondElectrique3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortiePlafondElectrique1\" name=\"etatSortiePlafondElectrique1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortiePlafondElectrique2\" name=\"etatSortiePlafondElectrique2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortiePlafondElectrique3\" name=\"etatSortiePlafondElectrique3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            
            <table id=\"tableauWC\">
                <thead>
                    <tr>
                        <th rowspan=\"2\">WC</th>
                        <th colspan=\"2\" >Description / détails</th>
                        <th colspan=\"2\" class=\"etat\">Etat entrée</th>
                        <th colspan=\"2\" class=\"etat\">Etat sortie</th>
                    </tr>
                    <tr>
                        <th class=\"sdb\">WC 1</th>
                        <th class=\"sdb\">WC 2</th>
                        <th class=\"etat\">1</th>
                        <th class=\"etat\">2</th>
                        <th class=\"etat\">1</th>
                        <th class=\"etat\">2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class=\"middleandbold\">Mur</td>
                        <td><textarea id=\"description_mur_wc1\" name=\"description_mur_wc1\"></textarea></td>
                        <td><textarea id=\"description_mur_wc2\" name=\"description_mur_wc2\" ></textarea></td>
                        <td>
                            <select id=\"etat_wc1_entree\" name=\"etat_wc1_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_wc2_entree\" name=\"etat_wc2_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_wc1_sortie\" name=\"etat_wc1_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_wc2_sortie\" name=\"etat_wc2_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
    
                    <tr>
                        <td class=\"middleandbold\">Sol</td>
                        <td><textarea id=\"description_sol1\" name=\"description_sol1\"></textarea></td>
                        <td><textarea id=\"description_sol2\" name=\"description_sol2\"></textarea></td>
                        <td>
                            <select id=\"etat_entree_sol1\" name=\"etat_entree_sol1\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_entree_sol2\" name=\"etat_entree_sol2\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_sortie_sol1\" name=\"etat_sortie_sol1\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_sortie_sol2\" name=\"etat_sortie_sol2\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td class=\"middleandbold\">Vitrage et volets</td>
                        <td><textarea id=\"vitrage_volet1\" name=\"vitrage_volet1\"></textarea></td>
                        <td><textarea id=\"vitrage_volet2\" name=\"vitrage_volet2\"></textarea></td>
                        <td>
                            <select id=\"etat_entree_vitrage_volet1\" name=\"etat_entree_vitrage_volet1\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_entree_vitrage_volet2\" name=\"etat_entree_vitrage_volet2\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_sortie_vitrage_volet1\" name=\"etat_sortie_vitrage_volet1\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_sortie_vitrage_volet2\" name=\"etat_sortie_vitrage_volet2\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                   
    
                    <tr>
                        <td class=\"middleandbold\">Tuyauterie</td>
                        <td><textarea id=\"tuyauterie1\" name=\"tuyauterie1\"></textarea></td>
                        <td><textarea id=\"tuyauterie2\" name=\"tuyauterie2\"></textarea></td>
                        <td>
                            <select id=\"etat_entree_tuyauterie1\" name=\"etat_entree_tuyauterie1\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_entree_tuyauterie2\" name=\"etat_entree_tuyauterie2\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_sortie_tuyauterie1\" name=\"etat_sortie_tuyauterie1\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_sortie_tuyauterie2\" name=\"etat_sortie_tuyauterie2\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Luminaire</td>
                        <td><textarea id=\"luminaire1\" name=\"luminaire1\"></textarea></td>
                        <td><textarea id=\"luminaire2\" name=\"luminaire2\"></textarea></td>
                        <td>
                            <select id=\"etat_entree_luminaire1\" name=\"etat_entree_luminaire1\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_entree_luminaire2\" name=\"etat_entree_luminaire2\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_sortie_luminaire3\" name=\"etat_sortie_luminaire3\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_sortie_luminaire2\" name=\"etat_sortie_luminaire2\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
    
    
            <fieldset class=\"comment-fieldset\">
                <legend>Zone de Commentaires</legend>
                <textarea class=\"comment-textarea\" id=\"zone_de_commentaire\" name=\"zone_de_commentaire\" placeholder=\"Veuillez saisir les informations supplémentaires que vous souhaitez nous faire parvenir \"></textarea>
            </fieldset>
    
            <label for=\"Documents\" class=\"drop-container\" id=\"dropcontainer\">
                <span class=\"drop-title\">Déposez vos fichiers</span>
                ou
                <input type=\"file\" name=\"Documents[]\" id=\"Documents\" accept=\".jpg,.jpeg,.png,.mp4,.mov\" multiple capture>
            </label>
    
            
            <div class=\"boutonsBasDePage\">
                <input type=\"reset\" value=\"Effacer\" />
                <input type=\"submit\" value=\"Valider\" />
            </div>
                <div class=\"file-generation\">
        <p>Choisissez le format de fichier à générer :</p>
            <input type=\"radio\" id=\"format_pdf\" name=\"file_format\" value=\"pdf\" required>
            <label for=\"format_pdf\">PDF</label>
    
            <input type=\"radio\" id=\"format_word\" name=\"file_format\" value=\"word\">
            <label for=\"format_word\">Word</label>
    
            <br><br>
            <button type=\"submit\" target=\"_blank\" id=\"generateFile\">Générer le fichier</button>
        </div>
    
        </form>
    </div>
</body>
</html>";
}

}

?>