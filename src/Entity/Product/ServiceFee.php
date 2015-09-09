<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Entity\Product;

class ServiceFee
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $fee;

    /**
     * @param string $name
     * @param float  $fee
     */
    public function __construct($name = null, $fee = null)
    {
        $this->name = $name;
        $this->fee = $fee;
    }

    /**
     * Gets the Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the Name.
     *
     * @param string $name
     *
     * @return ServiceFee
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the Fee.
     *
     * @return float
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * Sets the Fee.
     *
     * @param float $fee
     *
     * @return ServiceFee
     */
    public function setFee($fee)
    {
        $this->fee = $fee;

        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        if (!$results) {
            return;
        }

        $objects = [];
        foreach ($results as $result) {
            $obj = new self();
            foreach ($result as $key => $value) {
                $key = ucfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
                $setter = 'set'.$key;
                $obj->{$setter}($value);
            }
            $objects[] = $obj;
        }

        return $objects;
    }
}
