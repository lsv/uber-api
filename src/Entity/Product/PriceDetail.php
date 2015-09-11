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

use Doctrine\Common\Collections\ArrayCollection;
use Lsv\UberApi\Util\EntityUtil;

class PriceDetail
{
    /**
     * @var float
     */
    protected $base;

    /**
     * @var float
     */
    protected $minimum;

    /**
     * @var float
     */
    protected $costPerMinute;

    /**
     * @var float
     */
    protected $costPerDistance;

    /**
     * @var string
     */
    protected $distanceUnit;

    /**
     * @var float
     */
    protected $cancellationFee;

    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @var ServiceFee[]|ArrayCollection
     */
    protected $serviceFees;

    /**
     * @param float      $base
     * @param float      $minimum
     * @param float      $costPerMinute
     * @param float      $costPerDistance
     * @param string     $distanceUnit
     * @param float      $cancellationFee
     * @param string     $currencyCode
     * @param array|null $serviceFees
     */
    public function __construct($base = null, $minimum = null, $costPerMinute = null, $costPerDistance = null, $distanceUnit = null, $cancellationFee = null, $currencyCode = null, array $serviceFees = null)
    {
        $this->serviceFees = new ArrayCollection();

        $this->base = $base;
        $this->minimum = $minimum;
        $this->costPerMinute = $costPerMinute;
        $this->costPerDistance = $costPerDistance;
        $this->distanceUnit = $distanceUnit;
        $this->cancellationFee = $cancellationFee;
        $this->currencyCode = $currencyCode;
        $this->serviceFees = $serviceFees;
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
     * @return PriceDetail
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
     * @return PriceDetail
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
     * @return PriceDetail
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
     * @return PriceDetail
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
     * @return PriceDetail
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
     * @return PriceDetail
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
     * @return PriceDetail
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * Gets the ServiceFees.
     *
     * @return ArrayCollection|ServiceFee[]
     */
    public function getServiceFees()
    {
        return $this->serviceFees;
    }

    /**
     * Sets the ServiceFees.
     *
     * @param ServiceFee[] $serviceFees
     *
     * @return PriceDetail
     */
    public function setServiceFees(array $serviceFees = null)
    {
        $this->serviceFees = new ArrayCollection();
        if ($serviceFees) {
            foreach ($serviceFees as $fee) {
                $this->addServiceFee($fee);
            }
        }

        return $this;
    }

    /**
     * Add a service fee.
     *
     * @param ServiceFee $fee
     *
     * @return PriceDetail
     */
    public function addServiceFee(ServiceFee $fee)
    {
        $this->serviceFees->add($fee);

        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $results, [
            'ServiceFees' => ['setter' => 'setServiceFees', 'class' => ServiceFee::class],
        ]);
    }
}
