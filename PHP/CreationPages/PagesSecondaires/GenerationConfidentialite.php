<?php

require_once("AbstractGenerationPage.php");

/**
 * Classe de génération des clauses de confidentialité du site web
 */
class GenerationConfidentialite extends AbstractGenerationPage
{
    public function __construct()
    {
        // On appelle le constructeur de la classe abstraite, définissant les chemins vers le script et le style
        parent::__construct(cssChemin: "../SiteWeb/Confidentialite.css");
    }

    protected function GenerateContent() : string
    {
        return "<main>
        <section class=\"privacy-policy\">
            <h2>Introduction</h2>
            <p>
                Nous attachons une grande importance à la protection de vos données personnelles. 
                Cette politique de confidentialité explique comment nous collectons, utilisons, stockons et protégeons vos informations lorsque vous utilisez notre logiciel.
            </p>

            <h2>Informations que nous collectons</h2>
            <p>
                Nous pouvons collecter les types d'informations suivants :
            </p>
            <ul>
                <li><strong>Données d'identification :</strong> nom, adresse e-mail, numéro de téléphone.</li>
                <li><strong>Données de localisation :</strong> informations sur l'emplacement de la propriété.</li>
                <li><strong>Données d'utilisation :</strong> informations sur la manière dont vous utilisez notre logiciel.</li>
                <li><strong>Données de fichiers :</strong> photos et documents téléchargés dans le cadre des états des lieux.</li>
            </ul>

            <h2>Utilisation de vos informations</h2>
            <p>
                Nous utilisons les informations que nous collectons pour :
            </p>
            <ul>
                <li>Fournir et gérer notre logiciel.</li>
                <li>Améliorer notre service et personnaliser votre expérience.</li>
                <li>Communiquer avec vous concernant votre compte et notre logiciel.</li>
                <li>Effectuer des analyses pour améliorer notre produit.</li>
            </ul>

            <h2>Protection de vos données</h2>
            <p>
                Nous mettons en œuvre des mesures de sécurité appropriées pour protéger vos informations contre tout accès non autorisé, utilisation ou divulgation. 
                Cependant, aucune méthode de transmission sur Internet ou de stockage électronique n'est totalement sécurisée.
            </p>

            <h2>Partage de vos informations</h2>
            <p>
                Nous ne vendons, n'échangeons ni ne louons vos données personnelles à des tiers. 
                Nous ne partageons vos informations qu'avec des partenaires de confiance qui nous aident à fournir nos services, et uniquement dans le cadre des finalités pour lesquelles nous avons collecté vos informations.
            </p>

            <h2>Vos droits</h2>
            <p>
                Vous avez le droit de demander l'accès à vos données personnelles, de les corriger ou de les supprimer. 
                Pour exercer ces droits, veuillez nous contacter à l'adresse e-mail indiquée ci-dessous.
            </p>

            <h2>Contact</h2>
            <p>
                Si vous avez des questions concernant notre politique de confidentialité, n'hésitez pas à nous contacter :
            </p>
            <p>
                Email : <a href=\"mailto:contact@exemple.com\">contact@exemple.com</a><br>
                Téléphone : +33 1 23 45 67 89
            </p>
        </section>
    </main>";

    }

}

$instance = new GenerationConfidentialite();

echo $instance->GeneratePage();

?>