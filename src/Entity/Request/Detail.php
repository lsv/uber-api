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
 * Request detail.
 */
class Detail extends AbstractEntity implements EntityInterface
{
    /**
     * The unique ID of the Request.
     *
     * @var string
     */
    protected $requestId;

    /**
     * The status of the Request indicating state.
     *
     * @var string
     */
    protected $status;

    /**
     * The object that contains vehicle details.
     *
     * @var DetailVehicle
     */
    protected $vehicle;

    /**
     * The object that contains driver details.
     *
     * @var DetailDriver
     */
    protected $driver;

    /**
     * The object that contains the location information of the vehicle and driver.
     *
     * @var DetailLocation
     */
    protected $location;

    /**
     * The estimated time of vehicle arrival in minutes.
     *
     * @var int
     */
    protected $eta;

    /**
     * The surge pricing multiplier used to calculate the increased price of a Request.
     * A multiplier of 1.0 means surge pricing is not in effect.
     *
     * @var float
     */
    protected $surgeMultiplier;

    /**
     * Constructor.
     *
     * @param string              $requestId       The unique ID of the Request.
     * @param string              $status          The status of the Request indicating state.
     * @param DetailVehicle|null  $vehicle         The object that contains vehicle details.
     * @param DetailDriver|null   $driver          The object that contains driver details.
     * @param DetailLocation|null $location        The object that contains the location information of the vehicle and driver.
     * @param int                 $eta             The estimated time of vehicle arrival in minutes.
     * @param float               $surgeMultiplier The surge pricing multiplier used to calculate the increased price of a Request
     */
    public function __construct($requestId = null, $status = null, DetailVehicle $vehicle = null, DetailDriver $driver = null, DetailLocation $location = null, $eta = null, $surgeMultiplier = null)
    {
        $this->requestId = $requestId;
        $this->status = $status;
        $this->vehicle = $vehicle;
        $this->driver = $driver;
        $this->location = $location;
        $this->eta = $eta;
        $this->surgeMultiplier = $surgeMultiplier;
    }

    /**
     * Gets the RequestId.
     *
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * Sets the RequestId.
     *
     * @param string $requestId
     *
     * @return Detail
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * Gets the Status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the Status.
     *
     * @param string $status
     *
     * @return Detail
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Gets the Vehicle.
     *
     * @return DetailVehicle
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * Sets the Vehicle.
     *
     * @param DetailVehicle $vehicle
     *
     * @return Detail
     */
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    /**
     * Gets the Driver.
     *
     * @return DetailDriver
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * Sets the Driver.
     *
     * @param DetailDriver $driver
     *
     * @return Detail
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * Gets the Location.
     *
     * @return DetailLocation
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the Location.
     *
     * @param DetailLocation $location
     *
     * @return Detail
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Gets the Eta.
     *
     * @return int
     */
    public function getEta()
    {
        return $this->eta;
    }

    /**
     * Sets the Eta.
     *
     * @param int $eta
     *
     * @return Detail
     */
    public function setEta($eta)
    {
        $this->eta = $eta;

        return $this;
    }

    /**
     * Gets the SurgeMultiplier.
     *
     * @return float
     */
    public function getSurgeMultiplier()
    {
        return $this->surgeMultiplier;
    }

    /**
     * Sets the SurgeMultiplier.
     *
     * @param float $surgeMultiplier
     *
     * @return Detail
     */
    public function setSurgeMultiplier($surgeMultiplier)
    {
        $this->surgeMultiplier = $surgeMultiplier;

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
            'Driver'   => ['setter' => 'setDriver', 'class' => DetailDriver::class],
            'Location' => ['setter' => 'setLocation', 'class' => DetailLocation::class],
            'Vehicle'  => ['setter' => 'setVehicle', 'class' => DetailVehicle::class],
        ]);
    }
}
