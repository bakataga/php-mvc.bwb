<?php

abstract class DAO implements CRUDInterface, RepositoryInterface {
    protected $pdo;

    public function __construct() {
        // Instanciation de PDO en dur
        $this->pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Implémentation des méthodes de CRUDInterface et RepositoryInterface
    public function create(array $properties) {
        // Implémentation de la méthode create
    }

    public function retrieve(int $id) {
        // Implémentation de la méthode retrieve
    }

    public function update(int $id, array $properties): bool {
        // Implémentation de la méthode update
    }

    public function delete(int $id): bool {
        // Implémentation de la méthode delete
    }

    public function getAllBy(array $conditions) {
        // Implémentation de la méthode getAllBy
    }
}
?>
