<?php
namespace Lsv\UberApi\Entity;

/**
 * Interface EntityInterface
 * @package Lsv\UberApi\Entity
 */
interface EntityInterface
{
    /**
     * Create entity from array
     * @param array|null $results
     * @return array|null|object
     */
    public static function createFromArray(array $results = null);
}
