<?php

interface Dao {
    public function createInstance(array $res): mixed;
    public function findById(int $id): mixed;
    public function findAll(): array;
    public function update(): void;
    public function deleteById(int $id): void;
}
?>