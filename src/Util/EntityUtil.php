<?php
namespace Lsv\UberApi\Util;

class EntityUtil
{
    /**
     * @param string $obj
     * @param array $results
     * @param array $setters
     * @return object
     */
    private static function createFromArray($obj, array $results, array $setters)
    {
        foreach ($results as $key => $value) {
            $key = ucfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            if (isset($setters[$key])) {
                $method = $setters[$key]['setter'];
                $value = $setters[$key]['class']::createFromArray($value);
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
     * @param array $results
     * @param array $setters
     * @return null|object
     */
    public static function singleCreateFromArray($class, array $results = null, array $setters = [])
    {
        if (! $results) {
            return null;
        }

        return self::createFromArray(new $class, $results, $setters);
    }

    /**
     * @param string $class
     * @param array $results
     * @param array $setters
     * @return array
     */
    public static function multipleCreateFromArray($class, array $results = null, array $setters = [])
    {
        $objects = [];
        if (! $results) {
            return $objects;
        }

        foreach ($results as $result) {
            $objects[] = self::createFromArray(new $class, $result, $setters);
        }

        return $objects;
    }
}
