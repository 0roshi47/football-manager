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
    public function update(): void;
    public function deleteById(int $id): void;
}
?>