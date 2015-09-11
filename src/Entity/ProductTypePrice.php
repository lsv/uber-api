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
 * Class ProductTypePrice.
 */
class ProductTypePrice implements EntityInterface
{
    /**
     * The base price.
     *
     * @var float
     */
    protected $base;

    /**
     * The minimum price of a trip.
     *
     * @var float
     */
    protected $minimum;

    /**
     * The charge per minute (if applicable for the product type).
     *
     * @var float
     */
    protected $costPerMinute;

    /**
     * The charge per distance unit (if applicable for the product type).
     *
     * @var float
     */
    protected $costPerDistance;

    /**
     * The unit of distance used to calculate the fare (either mile or km).
     *
     * @var string
     */
    protected $distanceUnit;

    /**
     * The fee if a rider cancels the trip after the grace period.
     *
     * @var float
     */
    protected $cancellationFee;

    /**
     * ISO 4217 currency code.
     *
     * @var string
     */
    protected $currencyCode;

    /**
     * Array containing additional fees added to the price of a product.
     *
     * @var ProductTypePriceFee[]
     */
    protected $productTypePriceFees;

    /**
     * Constructor.
     *
     * @param float      $base
     * @param float      $minimum
     * @param float      $costPerMinute
     * @param float      $costPerDistance
     * @param string     $distanceUnit
     * @param float      $cancellationFee
     * @param string     $currencyCode
     * @param array|null $productTypePriceFees
     */
    public function __construct($base = null, $minimum = null, $costPerMinute = null, $costPerDistance = null, $distanceUnit = null, $cancellationFee = null, $currencyCode = null, array $productTypePriceFees = null)
    {
        $this->base = $base;
        $this->minimum = $minimum;
        $this->costPerMinute = $costPerMinute;
        $this->costPerDistance = $costPerDistance;
        $this->distanceUnit = $distanceUnit;
        $this->cancellationFee = $cancellationFee;
        $this->currencyCode = $currencyCode;
        $this->productTypePriceFees = $productTypePriceFees;
    }

    /**
     * Gets the Base.
     *
     * @return float
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Sets the Base.
     *
     * @param float $base
     *
     * @return ProductTypePrice
     */
    public function setBase($base)
    {
        $this->base = $base;

        return $this;
    }

    /**
     * Gets the Minimum.
     *
     * @return float
     */
    public function getMinimum()
    {
        return $this->minimum;
    }

    /**
     * Sets the Minimum.
     *
     * @param float $minimum
     *
     * @return ProductTypePrice
     */
    public function setMinimum($minimum)
    {
        $this->minimum = $minimum;

        return $this;
    }

    /**
     * Gets the CostPerMinute.
     *
     * @return float
     */
    public function getCostPerMinute()
    {
        return $this->costPerMinute;
    }

    /**
     * Sets the CostPerMinute.
     *
     * @param float $costPerMinute
     *
     * @return ProductTypePrice
     */
    public function setCostPerMinute($costPerMinute)
    {
        $this->costPerMinute = $costPerMinute;

        return $this;
    }

    /**
     * Gets the CostPerDistance.
     *
     * @return float
     */
    public function getCostPerDistance()
    {
        return $this->costPerDistance;
    }

    /**
     * Sets the CostPerDistance.
     *
     * @param float $costPerDistance
     *
     * @return ProductTypePrice
     */
    public function setCostPerDistance($costPerDistance)
    {
        $this->costPerDistance = $costPerDistance;

        return $this;
    }

    /**
     * Gets the DistanceUnit.
     *
     * @return string
     */
    public function getDistanceUnit()
    {
        return $this->distanceUnit;
    }

    /**
     * Sets the DistanceUnit.
     *
     * @param string $distanceUnit
     *
     * @return ProductTypePrice
     */
    public function setDistanceUnit($distanceUnit)
    {
        $this->distanceUnit = $distanceUnit;

        return $this;
    }

    /**
     * Gets the CancellationFee.
     *
     * @return float
     */
    public function getCancellationFee()
    {
        return $this->cancellationFee;
    }

    /**
     * Sets the CancellationFee.
     *
     * @param float $cancellationFee
     *
     * @return ProductTypePrice
     */
    public function setCancellationFee($cancellationFee)
    {
        $this->cancellationFee = $cancellationFee;

        return $this;
    }

    /**
     * Gets the CurrencyCode.
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Sets the CurrencyCode.
     *
     * @param string $currencyCode
     *
     * @return ProductTypePrice
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * Gets the ProductTypePriceFee.
     *
     * @return ProductTypePriceFee[]
     */
    public function getProductTypePriceFees()
    {
        return $this->productTypePriceFees;
    }

    /**
     * Sets the ProductTypePriceFee.
     *
     * @param ProductTypePriceFee[] $productTypePriceFees
     *
     * @return ProductTypePrice
     */
    public function setProductTypePriceFees($productTypePriceFees)
    {
        $this->productTypePriceFees = $productTypePriceFees;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @param array|null $results
     *
     * @return null|object
     */
    public static function createFromArray(array $results = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $results, [
            'ServiceFees' => ['setter' => 'setProductTypePriceFees', 'class' => ProductTypePriceFee::class],
        ]);
    }
}
