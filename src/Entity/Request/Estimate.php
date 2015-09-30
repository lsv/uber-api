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

use Lsv\UberApi\Entity\AbstractEntity;
use Lsv\UberApi\Entity\EntityInterface;
use Lsv\UberApi\Util\EntityUtil;

/**
 * Estimate object.
 */
class Estimate extends AbstractEntity implements EntityInterface
{
    /**
     * Details of the estimated fare. If end location is omitted, only the minimum is returned.
     *
     * @var EstimatePrice
     */
    protected $price;

    /**
     * Details of the estimated distance. null if end location is omitted.
     *
     * @var EstimateTrip
     */
    protected $trip;

    /**
     * The estimated time of vehicle arrival in minutes. null if there are no cars available.
     *
     * @var int
     */
    protected $pickupEstimate;

    /**
     * Constructor.
     *
     * @param EstimatePrice $price          Details of the estimated fare
     * @param EstimateTrip  $trip           Details of the estimated distance
     * @param int           $pickupEstimate The estimated time of vehicle arrival in minutes. null if there are no cars available.
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

    /**
     * Create entity from array.
     *
     * @param array|null $results
     * @param array      $queryParameters
     * @param array      $pathParameters
     *
     * @return array|null|object
     */
    public static function createFromArray(array $results = null, array $queryParameters = null, array $pathParameters = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $queryParameters, $pathParameters, $results, [
            'Price' => ['setter' => 'setPrice', 'class' => EstimatePrice::class],
            'Trip'  => ['setter' => 'setTrip', 'class' => EstimateTrip::class],
        ]);
    }
}
