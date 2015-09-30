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

/**
 * Utility for the entities.
 */
class EntityUtil
{
    /**
     * Set parameters for a entity.
     *
     * @param string $objClass Which class
     * @param array  $results  Array of the results
     * @param array  $setters  Which keys should be overwritten
     *
     * @return object
     */
    private static function createFromArray($objClass, array $queryParameters, array $pathParameters, array $results, array $setters)
    {
        /** @var EntityInterface $obj */
        $obj = new $objClass();
        foreach ($results as $key => $value) {
            $key = ucfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            if (isset($setters[$key])) {
                $method = $setters[$key]['setter'];
                /** @var EntityInterface $class */
                $class = $setters[$key]['class'];
                $value = $class::createFromArray($value, $queryParameters, $pathParameters);
                $obj->$method($value);
                continue;
            }

            $setter = 'set'.$key;
            $obj->{$setter}($value);
        }

        $obj->setQueryParameters($queryParameters);
        $obj->setPathParameters($pathParameters);
        return $obj;
    }

    /**
     * Set parameters for a entity.
     *
     * @param string $class   Which class
     * @param array  $results Array of the results
     * @param array  $setters Which keys should be overwritten
     *
     * @return null|object
     */
    public static function singleCreateFromArray($class, array $queryParameters = null, array $pathParameters = null, array $results = null, array $setters = [])
    {
        if (! $results) {
            return null;
        }

        return self::createFromArray($class, $queryParameters, $pathParameters, $results, $setters);
    }

    /**
     * Set parameters for a entity.
     *
     * @param string $class   Which class
     * @param array  $results Array of the results
     * @param array  $setters Which keys should be overwritten
     *
     * @return array
     */
    public static function multipleCreateFromArray($class, array $queryParameters = null, array $pathParameters = null, array $results = null, array $setters = [])
    {
        $objects = [];
        if (!$results) {
            return $objects;
        }

        foreach ($results as $result) {
            $objects[] = self::createFromArray($class, $queryParameters, $pathParameters, $result, $setters);
        }

        return $objects;
    }
}
