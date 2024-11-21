<?php

namespace Model;

/**
 * Classe représentant une personne.
 */
class Personne {
    
    // Id de la personne
    private int $idPersonne;

    // Civilité de la personne (Mr, Mme, ...)
    private string $civilite;
    
    // Prénom de la personne
    private string $prenom;
    
    // Nom de la personne
    private string $nom;
    
    // Adresse de la personne
    private string $adresse;

    /**
     * Constructeur de la classe
     */
    public function __construct() {
    }

    /**
     * Getter pour l'id de la personne
     * @return int L'id de la personne
     */
    public function getIdPersonne() {
        return $this->idPersonne ?? null;
    }

    /**
     * Getter pour la civilité
     * @return string La civilité
     */
    public function getCivilite() {
        return $this->civilite ?? null;
    }

    /**
     * Getter pour le prénom
     * @return string Le prénom
     */
    public function getPrenom() {
        return $this->prenom ?? null;
    }

    /**
     * Getter pour le nom
     * @return string Le nom
     */
    public function getNom() {
        return $this->nom ?? null;
    }

    /**
     * Getter pour l'adresse
     * @return string L'adresse
     */
    public function getAdresse() {
        return $this->adresse ?? null;
    }

    /**
     * Setter pour l'id de la personne
     * @param int $idPersonne L'id de la personne
     */
    public function setIdPersonne($idPersonne) {
        $this->idPersonne = $idPersonne;
    }

    /**
     * Setter pour la civilité
     * @param string $civilite La civilité
     */
    public function setCivilite($civilite) {
        $this->civilite = $civilite;
    }

    /**
     * Setter pour le prénom
     * @param string $prenom Le prénom
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    /**
     * Setter pour le nom
     * @param string $nom Le nom
     */
    public function setNom($nom) {
        $this->nom = $nom;
    }

    /**
     * Setter pour l'adresse
     * @param string $adresse L'adresse
     */
    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    /**
     * Méthode d'hydratation d'une classe
     * @param array $donnees Données à intégrer
     * @return void
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
            
            // Si le setter correspondant existe.
            if (method_exists($this, $method)&& $value != null)
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }
}
?>