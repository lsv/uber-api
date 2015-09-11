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

use Lsv\UberApi\Util\EntityUtil;

/**
 * Class ProductTypePriceFee
 * @package Lsv\UberApi\Entity
 */
class ProductTypePriceFee implements EntityInterface
{
    /**
     * The name of the service fee.
     * @var string
     */
    protected $name;

    /**
     * The amount of the service fee.
     * @var float
     */
    protected $fee;

    /**
     * Constructor
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
     * @return ProductTypePriceFee
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
     * @return ProductTypePriceFee
     */
    public function setFee($fee)
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * {@inheritdoc}
     * @param array|null $results
     * @return array
     */
    public static function createFromArray(array $results = null)
    {
        return EntityUtil::multipleCreateFromArray(self::class, $results);
    }
}
