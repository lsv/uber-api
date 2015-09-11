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

use Lsv\UberApi\Util\EntityUtil;

class Estimate
{
    /**
     * @var EstimatePrice
     */
    protected $price;

    /**
     * @var EstimateTrip
     */
    protected $trip;

    /**
     * @var int
     */
    protected $pickupEstimate;

    /**
     * @param EstimatePrice $price
     * @param EstimateTrip  $trip
     * @param int           $pickupEstimate
     */
    public function __construct(EstimatePrice $price = null, EstimateTrip $trip = null, $pickupEstimate = null)
    {
        $this->price = $price;
        $this->trip = $trip;
        $this->pickupEstimate = $pickupEstimate;
    }

    /**
     * Gets the Price.
     *
     * @return EstimatePrice
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the Price.
     *
     * @param EstimatePrice $price
     *
     * @return Estimate
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Gets the Trip.
     *
     * @return EstimateTrip
     */
    public function getTrip()
    {
        return $this->trip;
    }

    /**
     * Sets the Trip.
     *
     * @param EstimateTrip $trip
     *
     * @return Estimate
     */
    public function setTrip($trip)
    {
        $this->trip = $trip;

        return $this;
    }

    /**
     * Gets the PickupEstimate.
     *
     * @return int
     */
    public function getPickupEstimate()
    {
        return $this->pickupEstimate;
    }

    /**
     * Sets the PickupEstimate.
     *
     * @param int $pickupEstimate
     *
     * @return Estimate
     */
    public function setPickupEstimate($pickupEstimate)
    {
        $this->pickupEstimate = $pickupEstimate;

        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $results, [
            'Price' => ['setter' => 'setPrice', 'class' => EstimatePrice::class],
            'Trip'  => ['setter' => 'setTrip', 'class' => EstimateTrip::class],
        ]);
    }
}
