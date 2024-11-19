<?php

namespace TestUnitaire;


abstract class AbstractTestUnitaire {

    /**
     * Méthode appelée pour exécuter un code de test unitaire (appelée lors de l'affichage de tous les tests à la fois)
     * @return array Retourne un tableau contenant tous les résultats de tests
     */
    public abstract function Execute() : array; 

}

?>