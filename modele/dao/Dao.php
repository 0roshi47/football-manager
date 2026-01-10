<?php
/**
 * @template T
 */
interface Dao {
    /**
     * @param array<string,mixed> $res
     * @return T
     */
    public function createInstance(array $res): mixed;

    /**
     * @param int $id
     * @return T|null
     */
    public function findById(int $id): mixed;

    /**
     * @return T[]
     */
    public function findAll(): array;

     /**
     * @param mixed $entity
     * @return void
     */
    public function update(mixed $entity): void;
    public function deleteById(int $id): void;
}
?>