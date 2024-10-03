<?php
/**
 * Classe représentant une personne.
 */
class Personne {
    /**
     * id de la personne
     * @var int
     */
    private $idPersonne;
    /**
     * civilite
     * @var string
     */
    private $civilite;
    /**
     * prenom
     * @var string
     */
    private $prenom;
    /**
     * nom
     * @var string
     */
    private $nom;
    /**
     * adresse
     * @var string
     */
    private $adresse;
    /**
     * cle etrangere reliant la personne a un etat des lieux
     * @var int
     */
    private $idEtatDesLieux;

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
        return $this->idPersonne;
    }

    /**
     * Getter pour la civilité
     * @return string La civilité
     */
    public function getCivilite() {
        return $this->civilite;
    }

    /**
     * Getter pour le prénom
     * @return string Le prénom
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * Getter pour le nom
     * @return string Le nom
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Getter pour l'adresse
     * @return string L'adresse
     */
    public function getAdresse() {
        return $this->adresse;
    }

    /**
     * Getter pour l'id de l'état des lieux
     * @return int L'id de l'état des lieux
     */
    public function getIdEtatDesLieux() {
        return $this->idEtatDesLieux;
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
     * Setter pour l'id de l'état des lieux
     * @param int $idEtatDesLieux L'id de l'état des lieux
     */
    public function setIdEtatDesLieux($idEtatDesLieux) {
        $this->idEtatDesLieux = $idEtatDesLieux;
    }
}