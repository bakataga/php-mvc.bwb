<?php

interface RepositoryInterface {
 
 private function getAll();
    public function getAllBy(array $conditions);   // Vous pouvez ajouter des méthodes supplémentaires spécifiques au repository ici
}
?>
