<?php
/**
 * Classe représentant un locataire.
 */
class T_Locataire {
    /**
     * id de l'état des lieux
     * @var int
     */
    private $idEtatDesLieux;

    /**
     * id de la personne
     * @var int
     */
    private $idPersonne;

    /**
     * Constructeur de la classe
     */
    public function __construct() {
    }

    /**
     * Getter pour l'id de l'état des lieux
     * @return int 
     */
    public function getIdEtatDesLieux() {
        return $this->idEtatDesLieux;
    }

    /**
     * Getter pour l'id de la personne
     * @return int 
     */
    public function getIdPersonne() {
        return $this->idPersonne;
    }

    /**
     * Setter pour l'id de l'état des lieux
     * @param int $idEtatDesLieux 
     */
    public function setIdEtatDesLieux($idEtatDesLieux) {
        $this->idEtatDesLieux = $idEtatDesLieux;
    }

    /**
     * Setter pour l'id de la personne
     * @param int $idPersonne 
     */
    public function setIdPersonne($idPersonne) {
        $this->idPersonne = $idPersonne;
    }
}