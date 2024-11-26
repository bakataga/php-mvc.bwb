<?php

interface CRUDInterface {
    public function create(array $properties);
    public function retrieve(int $id);
    public function update(int $id, array $properties): bool;
    public function delete(int $id): bool;
    public function getAllBy(array $conditions);
}
?>
