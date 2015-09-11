<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Entity;

/**
 * Interface EntityInterface.
 */
interface EntityInterface
{
    /**
     * Create entity from array.
     *
     * @param array|null $results
     *
     * @return array|null|object
     */
    public static function createFromArray(array $results = null);
}
