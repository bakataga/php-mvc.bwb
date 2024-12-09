<?php

abstract class DAO implements CRUDInterface, RepositoryInterface {
    protected $pdo;

    public function __construct() {
        // Instanciation de PDO en dur
        $this->pdo = new PDO('mysql:host=localhost;dbname=test_db', 'username', 'password');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Implémentation de la méthode create
    public function create(array $properties) {
        // Exemple d'implémentation
        $columns = implode(", ", array_keys($properties));
        $placeholders = ":" . implode(", :", array_keys($properties));
        $sql = "INSERT INTO users ($columns) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);
        foreach ($properties as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    // Implémentation de la méthode retrieve
    public function retrieve(int $id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Implémentation de la méthode update
    public function update(int $id, array $properties): bool {
        $setClause = [];
        foreach ($properties as $key => $value) {
            $setClause[] = "$key = :$key";
        }
        $setClause = implode(", ", $setClause);
        $sql = "UPDATE users SET $setClause WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        foreach ($properties as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Implémentation de la méthode delete
    public function delete(int $id): bool {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Implémentation de la méthode getAllBy
    public function getAllBy(array $conditions) {
        $sql = "SELECT * FROM users WHERE ";
        $clauses = [];
        foreach ($conditions as $key => $value) {
            $clauses[] = "$key = :$key";
        }
        $sql .= implode(' AND ', $clauses);
        $stmt = $this->pdo->prepare($sql);
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Implémentation de la méthode getAll
    public function getAll() {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
