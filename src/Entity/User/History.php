<?php
namespace Lsv\UberApi\Entity\User;

use Lsv\UberApi\Entity\City;

class History
{
    /**
     * @var string
     */
    protected $requestId;

    /**
     * @var \DateTime
     */
    protected $requestTime;

    /**
     * @var string
     */
    protected $productId;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var float
     */
    protected $distance;

    /**
     * @var \DateTime
     */
    protected $startTime;

    /**
     * @var \DateTime
     */
    protected $endTime;

    /**
     * @var City
     */
    protected $startCity;

    /**
     * @param string $requestId
     * @param integer $requestTime
     * @param string $productId
     * @param string $status
     * @param float $distance
     * @param integer $startTime
     * @param integer $endTime
     * @param City $startCity
     */
    public function __construct($requestId = null, $requestTime = null, $productId = null, $status = null, $distance = null, $startTime = null, $endTime = null, City $startCity = null)
    {
        $this->requestId = $requestId;
        $this->requestTime = $requestTime;
        $this->productId = $productId;
        $this->status = $status;
        $this->distance = $distance;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->startCity = $startCity;
    }

    /**
     * Gets the RequestId
     * @return string
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * Sets the RequestId
     * @param string $requestId
     * @return History
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
        return $this;
    }

    /**
     * Gets the RequestTime
     * @return \DateTime
     */
    public function getRequestTime()
    {
        return $this->requestTime;
    }

    /**
     * Sets the RequestTime
     * @param int $requestTime
     * @return History
     */
    public function setRequestTime($requestTime)
    {
        $date = new \DateTime('@' . $requestTime);
        $this->requestTime = $date;
        return $this;
    }

    /**
     * Gets the ProductId
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Sets the ProductId
     * @param string $productId
     * @return History
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * Gets the Status
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the Status
     * @param string $status
     * @return History
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Gets the Distance
     * @return float
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Sets the Distance
     * @param float $distance
     * @return History
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
        return $this;
    }

    /**
     * Gets the StartTime
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Sets the StartTime
     * @param int $startTime
     * @return History
     */
    public function setStartTime($startTime)
    {
        $date = new \DateTime('@' . $startTime);
        $this->startTime = $date;
        return $this;
    }

    /**
     * Gets the EndTime
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Sets the EndTime
     * @param int $endTime
     * @return History
     */
    public function setEndTime($endTime)
    {
        $date = new \DateTime('@' . $endTime);
        $this->endTime = $date;
        return $this;
    }

    /**
     * Gets the StartCity
     * @return City
     */
    public function getStartCity()
    {
        return $this->startCity;
    }

    /**
     * Sets the StartCity
     * @param City $startCity
     * @return History
     */
    public function setStartCity(City $startCity)
    {
        $this->startCity = $startCity;
        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        $objects = [];
        if (!$results) {
            return [];
        }
        foreach ($results as $result) {
            $obj = new self();
            foreach ($result as $key => $value) {
                $key = ucfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
                switch ($key) {
                    case 'StartCity':
                        $obj->setStartCity(City::createFromArray($value));
                        break;
                    default:
                        $setter = 'set'.$key;
                        $obj->{$setter}($value);
                        break;
                }
            }
            $objects[] = $obj;
        }

        return $objects;
    }
}
