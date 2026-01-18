<?php
/**
 * @template T
 */
interface Dao {

    public function createInstance(array $res): mixed;

    public function create(mixed $entity): void;

    public function findById(int $id): mixed;

    public function findAll(): array;

    public function update(mixed $entity): void;

    public function deleteById(int $id): void;
    
}
?>