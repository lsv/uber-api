<?php
namespace Lsv\UberApi\Entity\Estimate;

class Price
{
    /**
     * @var string
     */
    protected $productId;

    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @var string
     */
    protected $displayName;

    /**
     * @var string
     */
    protected $localizedDisplayName;

    /**
     * @var string
     */
    protected $estimate;

    /**
     * @var int
     */
    protected $lowEstimate;

    /**
     * @var int
     */
    protected $minimum;

    /**
     * @var int
     */
    protected $highEstimate;

    /**
     * @var float
     */
    protected $surgeMultiplier;

    /**
     * @var int
     */
    protected $duration;

    /**
     * @var float
     */
    protected $distance;

    /**
     * @param string $productId
     * @param string $currencyCode
     * @param string $localizedDisplayName
     * @param string $displayName
     * @param string $estimate
     * @param int $lowEstimate
     * @param int $minimum
     * @param int $highEstimate
     * @param float $surgeMultiplier
     * @param int $duration
     * @param float $distance
     */
    public function __construct($productId = null, $currencyCode = null, $localizedDisplayName = null, $displayName = null, $estimate = null, $lowEstimate = null, $minimum = null, $highEstimate = null, $surgeMultiplier = null, $duration = null, $distance = null)
    {
        $this->productId = $productId;
        $this->currencyCode = $currencyCode;
        $this->localizedDisplayName = $localizedDisplayName;
        $this->displayName = $displayName;
        $this->estimate = $estimate;
        $this->lowEstimate = $lowEstimate;
        $this->minimum = $minimum;
        $this->highEstimate = $highEstimate;
        $this->surgeMultiplier = $surgeMultiplier;
        $this->duration = $duration;
        $this->distance = $distance;
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
     * @return Price
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * Gets the CurrencyCode
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Sets the CurrencyCode
     * @param string $currencyCode
     * @return Price
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * Gets the LocalizedDisplayName
     * @return string
     */
    public function getLocalizedDisplayName()
    {
        return $this->localizedDisplayName;
    }

    /**
     * Sets the LocalizedDisplayName
     * @param string $localizedDisplayName
     * @return Price
     */
    public function setLocalizedDisplayName($localizedDisplayName)
    {
        $this->localizedDisplayName = $localizedDisplayName;
        return $this;
    }

    /**
     * Gets the DisplayName
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Sets the DisplayName
     * @param string $displayName
     * @return Price
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * Gets the Estimate
     * @return string
     */
    public function getEstimate()
    {
        return $this->estimate;
    }

    /**
     * Sets the Estimate
     * @param string $estimate
     * @return Price
     */
    public function setEstimate($estimate)
    {
        $this->estimate = $estimate;
        return $this;
    }

    /**
     * Gets the LowEstimate
     * @return int
     */
    public function getLowEstimate()
    {
        return $this->lowEstimate;
    }

    /**
     * Sets the LowEstimate
     * @param int $lowEstimate
     * @return Price
     */
    public function setLowEstimate($lowEstimate)
    {
        $this->lowEstimate = $lowEstimate;
        return $this;
    }

    /**
     * Gets the Minimum
     * @return int
     */
    public function getMinimum()
    {
        return $this->minimum;
    }

    /**
     * Sets the Minimum
     * @param int $minimum
     * @return Price
     */
    public function setMinimum($minimum)
    {
        $this->minimum = $minimum;
        return $this;
    }

    /**
     * Gets the HighEstimate
     * @return int
     */
    public function getHighEstimate()
    {
        return $this->highEstimate;
    }

    /**
     * Sets the HighEstimate
     * @param int $highEstimate
     * @return Price
     */
    public function setHighEstimate($highEstimate)
    {
        $this->highEstimate = $highEstimate;
        return $this;
    }

    /**
     * Gets the SurgeMultiplier
     * @return float
     */
    public function getSurgeMultiplier()
    {
        return $this->surgeMultiplier;
    }

    /**
     * Sets the SurgeMultiplier
     * @param float $surgeMultiplier
     * @return Price
     */
    public function setSurgeMultiplier($surgeMultiplier)
    {
        $this->surgeMultiplier = $surgeMultiplier;
        return $this;
    }

    /**
     * Gets the Duration
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Sets the Duration
     * @param int $duration
     * @return Price
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
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
     * @return Price
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        $objects = [];
        if (! $results) {
            return [];
        }
        foreach ($results as $result) {
            $obj = new self;
            foreach ($result as $key => $value) {
                $key = ucfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
                $setter = 'set' . $key;
                $obj->{$setter}($value);
            }
            $objects[] = $obj;
        }
        return $objects;
    }
}
