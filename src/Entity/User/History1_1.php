<?php
namespace Lsv\UberApi\Entity\User;

use Lsv\UberApi\Entity\City;

class History1_1
{
    /**
     * @var string
     */
    protected $uuid;

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
     * @param string $uuid
     * @param integer $requestTime
     * @param string $productId
     * @param string $status
     * @param float $distance
     * @param integer $startTime
     * @param integer $endTime
     */
    public function __construct($uuid = null, $requestTime = null, $productId = null, $status = null, $distance = null, $startTime = null, $endTime = null)
    {
        $this->uuid = $uuid;
        $this->requestTime = $requestTime;
        $this->productId = $productId;
        $this->status = $status;
        $this->distance = $distance;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    /**
     * Gets the Uuid
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Sets the Uuid
     * @param string $uuid
     * @return History1_1
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
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
                $setter = 'set'.$key;
                $obj->{$setter}($value);
            }
            $objects[] = $obj;
        }

        return $objects;
    }
}
