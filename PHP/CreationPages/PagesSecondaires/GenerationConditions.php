<?php

require_once(__DIR__ . "/../AbstractGenerationPage.php");

/**
 * Classe de génération des conditions d'utilisation du site web
 */
class GenerationConditions extends AbstractGenerationPage
{
    public function __construct()
    {
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "/S3_C1_0Inspi/SiteWeb/ConditionUtilisation.css", nom:"E-Lieu ~ Conditions d'utilisation");
    }

    protected function GenerateContent() : string
    {
        return "<main>
        <section class=\"terms-of-use\">
            <h2>1. Introduction</h2>
            <p>
                En utilisant notre logiciel, vous acceptez de respecter les présentes conditions d'utilisation. 
                Si vous n'acceptez pas ces conditions, veuillez ne pas utiliser notre service.
            </p>

            <h2>2. Acceptation des Conditions</h2>
            <p>
                En accédant à notre logiciel, vous confirmez que vous avez lu, compris et accepté ces conditions d'utilisation. 
                Ces conditions peuvent être mises à jour de temps à autre, et nous vous encourageons à les consulter régulièrement.
            </p>

            <h2>3. Utilisation du Service</h2>
            <p>
                Vous vous engagez à utiliser notre logiciel uniquement à des fins légales et conformément à toutes les lois applicables. 
                Vous êtes responsable de toutes les activités réalisées sous votre compte.
            </p>

            <h2>4. Propriété Intellectuelle</h2>
            <p>
                Tout le contenu, y compris le texte, les graphiques, les logos et le logiciel, est la propriété de notre entreprise ou de nos partenaires. 
                Vous n'êtes pas autorisé à reproduire, distribuer ou modifier ces éléments sans notre consentement préalable.
            </p>

            <h2>5. Responsabilité</h2>
            <p>
                Nous ne sommes pas responsables des dommages directs, indirects, accessoires ou consécutifs résultant de l'utilisation de notre logiciel. 
                Vous utilisez notre service à vos propres risques.
            </p>

            <h2>6. Modifications des Conditions</h2>
            <p>
                Nous nous réservons le droit de modifier ces conditions d'utilisation à tout moment. 
                Les modifications entreront en vigueur dès leur publication sur notre site. 
                Votre utilisation continue du service constitue votre acceptation de ces modifications.
            </p>

            <h2>7. Contact</h2>
            <p>
                Pour toute question concernant ces conditions d'utilisation, veuillez nous contacter :
            </p>
            <p>
                Email : <a href=\"mailto:contact@exemple.com\">contact@exemple.com</a><br>
                Téléphone : +33 1 23 45 67 89
            </p>
        </section>
    </main>";

    }

}

?>