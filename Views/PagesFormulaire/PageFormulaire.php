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
        return "        
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
                        <input type=\"radio\" id=\"Appartement\" name=\"typeLogement\" required>
                        <label for=\"Appartement\">Appartement</label>
                        <input type=\"radio\" id=\"Maison\" name=\"typeLogement\" required>
                        <label for=\"Maison\">Maison</label>
                        <input type=\"radio\" id=\"Autre\" name=\"typeLogement\" required>
                        <label for=\"Autre\">Autre</label>
                        <input type=\"text\" id=\"textautre\" size=\"5\">
                    </div>
                    <div class=\"l3\">
                        <label for=\"SURFACE\" class=\"putbold\">SURFACE :</label>
                        <input type=\"number\" id=\"SURFACE\" placeholder=\"m²\" required>
                        <label for=\"nbpiece\" class=\"putbold\">NOMBRE DE PIÈCES PRINCIPALES :</label>
                        <input type=\"number\" id=\"nbpiece\" required>
                    </div>
                    <div class=\"l4\">
                        <label for=\"adresse\" class=\"putbold\">ADRESSE :</label>
                        <textarea id=\"adresse\" rows=\"3\" cols=\"50\" required></textarea>
                    </div>
                </fieldset>
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
                            <input type=\"text\" id=\"prenom_bailleur\" required>
                            <label for=\"nom_bailleur\" class=\"putbold\">NOM :</label>
                            <input type=\"text\" id=\"nom_bailleur\" required>
                            <label for=\"adresse_bailleur\" class=\"putbold\">ADRESSE :</label>
                            <textarea id=\"adresse_bailleur\" rows=\"3\" required></textarea>
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
                            <input type=\"text\" id=\"prenom_locataire\" required>
                            <label for=\"nom_locataire\" class=\"putbold\">NOM :</label>
                            <input type=\"text\" id=\"nom_locataire\" required>
                            <label for=\"adresse_locataire\" class=\"putbold\">ADRESSE :</label>
                            <p class=\"petit\">(Si état des lieux de sortie, mentionner la nouvelle adresse de domiciliation)</p>
                            <textarea id=\"adresse_locataire\" rows=\"3\" required></textarea>
                        </td>
                    </tr>
                </table>
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
                        <td><textarea name=\"mur1\" id=\"mur1\"></textarea></td>
                        <td><select id=\"Mur2\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"Mur3\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Sol</td>
                        <td><textarea name=\"sol1\" id=\"sol1\"></textarea></td>
                        <td><select id=\"sol2\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"sol3\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Vitrage et volets</td>
                        <td><textarea name=\"Vitrage1\" id=\"Vitrage1\"></textarea></td>
                        <td><select id=\"Vitrage2\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select>
                    
                        <td>
                            
                                <select id=\"Vitrage3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                                </select>
                        </td>
                 
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Plafond</td>
                        <td><textarea name=\"Plafond1\" id=\"Plafond1\"></textarea></td>
                        <td><select id=\"Plafond2\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"Plafond3\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Éclairage et interrupteurs</td>
                        <td><textarea name=\"eclairage1\" id=\"eclairage1\"></textarea></td>
                        <td><select id=\"eclairage2\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"eclairage3\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Prise électrique nombre : <input type=\"number\"> </td>
                        <td><textarea name=\"prise1\" id=\"prise1\"></textarea></td>
                        <td><select id=\"prise2\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"prise3\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Placards et tiroirs</td>
                        <td><textarea name=\"placard1\" id=\"placard1\"></textarea></td>
                        <td><select id=\"placard2\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"placard3\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Évier (et robinetterie)</td>
                        <td><textarea name=\"evier1\" id=\"evier1\"></textarea></td>
                        <td><select id=\"evier2\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"evier3\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Plaques de cuisson et four</td>
                        <td><textarea name=\"plaque1\" id=\"plaque1\"></textarea></td>
                        <td><select id=\"plaque2\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"plaque3\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Hotte</td>
                        <td><textarea name=\"hotte1\" id=\"hotte1\"></textarea></td>
                        <td><select id=\"hotte2\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                        <td><select id=\"hotte3\">
                            <option value=\"p\">P</option>
                            <option value=\"m\">M</option>
                            <option value=\"b\">B</option>
                            <option value=\"tb\">TB</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">
                            Électroménager : 
                            <input type=\"text\">
                        </td>
                        <td>
                            <textarea name=\"electromenager1\" id=\"electromenager1\" style=\"width: 100%;\"></textarea>
                        </td>
                        <td>
                            <select id=\"electromenager2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"electromenager3\">
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
                        <td><textarea id=\"mur_sdb1\"></textarea></td>
                        <td><textarea id=\"mur_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_mur_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_mur_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Sol</td>
                        <td><textarea id=\"sol_sdb1\"></textarea></td>
                        <td><textarea id=\"sol_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_sol_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_sol_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Vitrage et volets</td>
                        <td><textarea id=\"vitrage_sdb1\"></textarea></td>
                        <td><textarea id=\"vitrage_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_vitrage_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_vitrage_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Plafond</td>
                        <td><textarea id=\"plafond_sdb1\"></textarea></td>
                        <td><textarea id=\"plafond_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_plafond_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_plafond_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Éclairage et interrupteurs</td>
                        <td><textarea id=\"eclairage_sdb1\"></textarea></td>
                        <td><textarea id=\"eclairage_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_eclairage_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_eclairage_sortie\">
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
                            <strong>Nombre</strong> : <input id=\"prise_sdb1\" type=\"number\" min=\"0\" placeholder=\"Nombre de prises\">
                        </td>
                        <td>
                            <strong>Nombre</strong> : <input id=\"prise_sdb2\" type=\"number\" min=\"0\" placeholder=\"Nombre de prises\">
                        </td>
                        <td>
                            <select id=\"etat_prise_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_prise_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Lavabo et robinetterie</td>
                        <td><textarea id=\"lavabo_sdb1\"></textarea></td>
                        <td><textarea id=\"lavabo_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_lavabo_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_lavabo_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Baignoire / douche</td>
                        <td><textarea id=\"baignoire_sdb1\"></textarea></td>
                        <td><textarea id=\"baignoire_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_baignoire_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_baignoire_sortie\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">WC</td>
                        <td><textarea id=\"wc_sdb1\"></textarea></td>
                        <td><textarea id=\"wc_sdb2\"></textarea></td>
                        <td>
                            <select id=\"etat_wc_entree\">
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etat_wc_sortie\">
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
                        <td><textarea id=\"murChambre1\"></textarea></td>
                        <td><textarea id=\"murChambre2\"></textarea></td>
                        <td><textarea id=\"murChambre3\"></textarea></td>
                        <td>
                            <select id=\"etatEntreeMur1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreeMur2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreeMur3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieMur1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieMur2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieMur3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"PremiereColonneChambre\">Sol</td>
                        <td><textarea id=\"solChambre1\"></textarea></td>
                        <td><textarea id=\"solChambre2\"></textarea></td>
                        <td><textarea id=\"solChambre3\"></textarea></td>
                        <td>
                            <select id=\"etatEntreeSol1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreeSol2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreeSol3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieSol1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieSol2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieSol3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"PremiereColonneChambre\">Vitrages et volets</td>
                        <td><textarea id=\"vitrages1\"></textarea></td>
                        <td><textarea id=\"vitrages2\"></textarea></td>
                        <td><textarea id=\"vitrages3\"></textarea></td>
                        <td>
                            <select id=\"etatEntreeVitrages1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreeVitrages2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreeVitrages3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieVitrages1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieVitrages2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieVitrages3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"PremiereColonneChambre\">Plafond</td>
                        <td><textarea id=\"plafond1\"></textarea></td>
                        <td><textarea id=\"plafond2\"></textarea></td>
                        <td><textarea id=\"plafond3\"></textarea></td>
                        <td>
                            <select id=\"etatEntreePlafond1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreePlafond2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreePlafond3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortiePlafond1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortiePlafond2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortiePlafond3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"PremiereColonneChambre\">Éclairage et interrupteurs</td>
                        <td><textarea id=\"eclairageChambre1\"></textarea></td>
                        <td><textarea id=\"eclairageChambre2\"></textarea></td>
                        <td><textarea id=\"eclairageChambre3\"></textarea></td>
                        <td>
                            <select id=\"etatEntreeEclairage1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreeEclairage2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreeEclairage3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieEclairage1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieEclairage2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortieEclairage3\">
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
                                    <input type=\"number\" class=\"nbPrise\" min=\"0\" id=\"nbPlafondElectrique1\">
                                </div>
                                <textarea id=\"plafondElectrique1\"></textarea>
                            </div>
                        </td>
                        <td>
                            <div class=\"description-group\">
                                <div class=\"input-inline\">
                                    <span>Nombre :</span>
                                    <input type=\"number\" class=\"nbPrise\" min=\"0\" id=\"nbPlafondElectrique2\">
                                </div>
                                <textarea id=\"plafondElectrique2\"></textarea>
                            </div>
                        </td>
                        <td>
                            <div class=\"description-group\">
                                <div class=\"input-inline\">
                                    <span>Nombre :</span>
                                    <input type=\"number\" class=\"nbPrise\" min=\"0\" id=\"nbPlafondElectrique3\">
                                </div>
                                <textarea id=\"plafondElectrique3\"></textarea>
                            </div>
                        </td>
                        <td>
                            <select id=\"etatEntreePlafondElectrique1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreePlafondElectrique2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatEntreePlafondElectrique3\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortiePlafondElectrique1\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortiePlafondElectrique2\">
                                <option value=\"p\">P</option>
                                <option value=\"m\">M</option>
                                <option value=\"b\">B</option>
                                <option value=\"tb\">TB</option>
                            </select>
                        </td>
                        <td>
                            <select id=\"etatSortiePlafondElectrique3\">
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
                        <td><textarea ></textarea></td>
                        <td><textarea ></textarea></td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Sol</td>
                        <td><textarea></textarea></td>
                        <td><textarea></textarea></td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Vitrage et volets</td>
                        <td><textarea></textarea></td>
                        <td><textarea></textarea></td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Tuyauterie</td>
                        <td><textarea></textarea></td>
                        <td><textarea></textarea></td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class=\"middleandbold\">Luminaire</td>
                        <td><textarea></textarea></td>
                        <td><textarea></textarea></td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=\"très bon\">TB</option>
                                <option value=\"bon\">B</option>
                                <option value=\"passable\">P</option>
                                <option value=\"mauvais\">M</option>
                            </select>
                        </td>
                        <td>
                            <select>
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
                <textarea class=\"comment-textarea\" placeholder=\"Veuillez saisir les informations supplémentaires que vous souhaitez nous faire parvenir \"></textarea>
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

        </form>
    </div>";
    }
 




}

?>