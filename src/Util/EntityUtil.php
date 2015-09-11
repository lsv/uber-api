<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Util;

use Lsv\UberApi\Entity\EntityInterface;

class EntityUtil
{
    /**
     * @param string $objClass
     * @param array  $results
     * @param array  $setters
     *
     * @return object
     */
    private static function createFromArray($objClass, array $results, array $setters)
    {
        $obj = new $objClass();
        foreach ($results as $key => $value) {
            $key = ucfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            if (isset($setters[$key])) {
                $method = $setters[$key]['setter'];
                /** @var EntityInterface $class */
                $class = $setters[$key]['class'];
                $value = $class::createFromArray($value);
                $obj->$method($value);
                continue;
            }

            $setter = 'set'.$key;
            $obj->{$setter}($value);
        }

        return $obj;
    }

    /**
     * @param string $class
     * @param array  $results
     * @param array  $setters
     *
     * @return null|object
     */
    public static function singleCreateFromArray($class, array $results = null, array $setters = [])
    {
        if (!$results) {
            return null;
        }

        return self::createFromArray($class, $results, $setters);
    }

    /**
     * @param string $class
     * @param array  $results
     * @param array  $setters
     *
     * @return array
     */
    public static function multipleCreateFromArray($class, array $results = null, array $setters = [])
    {
        $objects = [];
        if (!$results) {
            return $objects;
        }

        foreach ($results as $result) {
            $objects[] = self::createFromArray($class, $result, $setters);
        }

        return $objects;
    }
}
