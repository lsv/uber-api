<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Entity\Request;

/**
 * Trait for a charge
 */
trait ChargeTrait
{
    /**
     * The name of the charge.
     *
     * @var string
     */
    protected $name;

    /**
     * The amount of the charge.
     *
     * @var float
     */
    protected $amount;

    /**
     * The key of the type
     *
     * @var string
     */
    protected $type;

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
     * @return ChargeTrait
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the Amount.
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets the Amount.
     *
     * @param float $amount
     *
     * @return ChargeTrait
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Gets the Type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the Type.
     *
     * @param string $type
     *
     * @return ChargeTrait
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
