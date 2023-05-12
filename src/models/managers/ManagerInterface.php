<?php
// Déclaration de l'interface abstraite

/**
 * @template T
 */
interface ManagerInterface  {

    /**
     * @param T $entity
     */
    static function add($entity):bool;

    /**
     * @param int $id
     * @return T
     */
    static function getById(int $id);

    static function getAll(): array;
    
    /**
     * @param T $entity
     */
    static function update($entity): bool;

    /**
     * @param T $entity
     */
    static function delete(int $id): bool;

}