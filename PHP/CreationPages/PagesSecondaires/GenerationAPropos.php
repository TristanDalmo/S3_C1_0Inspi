<?php

require_once("AbstractGenerationPage.php");

/**
 * Classe de génération de la page "à propos" du site web
 */
class GenerationAPropos extends AbstractGenerationPage
{
    public function __construct()
    {
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../SiteWeb/Apropos.css");
    }

    protected function GenerateContent() : string
    {
        return " <main>
        <section class=\"about-us\">
            <h2>Qui sommes-nous ?</h2>
            <p>
                Nous sommes une entreprise spécialisée dans le développement de solutions logicielles innovantes pour le secteur immobilier. 
                Notre logiciel de réalisation des états des lieux a été conçu pour faciliter la documentation des conditions des propriétés, 
                en assurant une gestion efficace et précise des rapports d'état des lieux.
            </p>

            <h2>Notre Mission</h2>
            <p>
                Notre mission est d'apporter une solution simple et efficace pour documenter l'état des propriétés. 
                Nous nous engageons à offrir des outils qui aident les gestionnaires immobiliers à créer et gérer des rapports clairs, 
                intégrant des informations détaillées comme la date d'ouverture, le nom du locataire, la salle concernée, et la date des travaux.
            </p>

            <h2>Nos Valeurs</h2>
            <ul>
                <li><strong>Précision :</strong> Nous croyons que la documentation précise est essentielle pour une gestion immobilière réussie.</li>
                <li><strong>Innovation :</strong> Nous nous engageons à améliorer constamment notre logiciel pour répondre aux besoins changeants de nos utilisateurs.</li>
                <li><strong>Accessibilité :</strong> Nous visons à rendre notre solution accessible à tous, avec une interface intuitive et conviviale.</li>
                <li><strong>Fiabilité :</strong> Nos utilisateurs peuvent compter sur notre logiciel pour des rapports fiables, intégrant photos et observations.</li>
            </ul>

            <h2>Notre Équipe</h2>
            <p>
                Notre équipe est composée de professionnels passionnés par la technologie et l'immobilier. 
                Chaque membre apporte une expertise unique, ce qui nous permet de créer des solutions adaptées aux défis du secteur. 
                Ensemble, nous travaillons à améliorer la gestion immobilière à travers notre logiciel innovant.
            </p>
            <p>
                Nous valorisons la diversité et l'esprit d'équipe, car nous croyons que la collaboration favorise l'innovation.
            </p>
        </section>
    </main>";

    }

}

$instance = new GenerationAPropos();

echo $instance->GeneratePage();

?>