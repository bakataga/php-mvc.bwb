<?php

require_once './core/DAO.php';

class UserDAO extends DAO {
    public function create(array $properties) {
        $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $properties['name']);
        $stmt->bindParam(':email', $properties['email']);
        return $stmt->execute();
    }

    public function retrieve(int $id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(int $id, array $properties): bool {
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $properties['name']);
        $stmt->bindParam(':email', $properties['email']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete(int $id): bool {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getAllBy(array $conditions) {
        $sql = "SELECT * FROM users WHERE ";
        $clauses = [];
        foreach ($conditions as $key => $value) {
            $clauses[] = "$key = :$key";
        }
        $sql .= implode(' AND ', $clauses);
        $stmt = $this->pdo->prepare($sql);
        foreach ($conditions as $key => $value) {
            $stmt->bindParam(":$key", $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
