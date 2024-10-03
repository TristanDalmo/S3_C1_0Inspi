<?php

// Insertion de toutes les pages contenues dans le dossier CreationPages
foreach (glob("CreationPages/*.php") as $nomFichier) 
{
    include $nomFichier;
}
// Et dans le dossier PagesSecondaires
foreach (glob("CreationPages/PagesSecondaires/*.php") as $nomFichier) 
{
    include $nomFichier;
}

/**
 * Classe permettant de générer différentes pages selon un paramètre donné
 */
class PagesFactory {

    /**
     * Attribut abstrait contenant une instance de générateur de page
     * @var AbstractGenerationPage
     */
    private AbstractGenerationPage $generateur;

    /**
     * Méthode permettant de générer une page à l'aide d'un paramètre donné
     * @param string $page Nom de la page à générer
     * @return string Page générée ensuite
     */
    public function create(string $page): string { 
    
        // Selon le paramètre entré, on créera une instance différente pour générer la page.
        switch ($page) {

            case "Accueil" :
                $this->generateur = new GenerationAccueil();
                break;
            
            case "Formulaire":
                $this->generateur = new GenerationFormulaire();
                break;

            case "Gestionnaire":
                $this->generateur = new GenerationGestionnaire();
                break;

            case "TableauDeBord":
                $this->generateur = new GenerationTableauDeBord();
                break;

            case "APropos":
                $this->generateur = new GenerationAPropos();
                break;

            case "Conditions":
                $this->generateur = new GenerationConditions();
                break;

            case "Confidentialite":
                $this->generateur = new GenerationConfidentialite();
                break;
        }

        // On génère ensuite la page et on la retourne
        return $this->generateur->GeneratePage();

    }

}

// On récupère la page entrée en paramètre et, si aucune n'a été envoyée, on renverra vers la page d'accueil par défaut
$nomPage = $_GET['page'] ?? 'Accueil';

echo (new PagesFactory)->create(page: $nomPage);

?>