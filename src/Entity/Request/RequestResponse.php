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

class RequestResponse
{
    /**
     * @var string
     */
    protected $requestId;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var Vehicle
     */
    protected $vehicle;

    /**
     * @var Driver
     */
    protected $driver;

    /**
     * @var Location
     */
    protected $location;

    /**
     * @var int
     */
    protected $eta;

    /**
     * @var float
     */
    protected $surgeMultiplier;

    /**
     * @param string        $requestId
     * @param string        $status
     * @param Vehicle|null  $vehicle
     * @param Driver|null   $driver
     * @param Location|null $location
     * @param int           $eta
     * @param float         $surgeMultiplier
     */
    public function __construct($requestId = null, $status = null, Vehicle $vehicle = null, Driver $driver = null, Location $location = null, $eta = null, $surgeMultiplier = null)
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
     * @return RequestResponse
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
     * @return RequestResponse
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Gets the Vehicle.
     *
     * @return Vehicle
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * Sets the Vehicle.
     *
     * @param Vehicle $vehicle
     *
     * @return RequestResponse
     */
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    /**
     * Gets the Driver.
     *
     * @return Driver
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * Sets the Driver.
     *
     * @param Driver $driver
     *
     * @return RequestResponse
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * Gets the Location.
     *
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the Location.
     *
     * @param Location $location
     *
     * @return RequestResponse
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
     * @return RequestResponse
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
     * @return RequestResponse
     */
    public function setSurgeMultiplier($surgeMultiplier)
    {
        $this->surgeMultiplier = $surgeMultiplier;

        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        $obj = new self();
        if (!$results) {
            return [];
        }

        foreach ($results as $key => $value) {
            $key = ucfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            switch ($key) {
                case 'Driver':
                    $obj->setDriver(Driver::createFromArray($value));
                    break;
                case 'Location':
                    $obj->setLocation(Location::createFromArray($value));
                    break;
                case 'Vehicle':
                    $obj->setVehicle(Vehicle::createFromArray($value));
                    break;
                default:
                    $setter = 'set'.$key;
                    $obj->{$setter}($value);
                    break;
            }
        }

        return $obj;
    }
}
