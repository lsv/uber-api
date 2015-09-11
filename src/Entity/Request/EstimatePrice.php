<?php
namespace Lsv\UberApi\Entity\Request;

use Lsv\UberApi\Util\EntityUtil;

class EstimatePrice
{
    /**
     * @var string
     */
    protected $surgeConfirmationHref;

    /**
     * @var int
     */
    protected $highEstimate;

    /**
     * @var string
     */
    protected $surgeConfirmationId;

    /**
     * @var int
     */
    protected $minimum;

    /**
     * @var int
     */
    protected $lowEstimate;

    /**
     * @var float
     */
    protected $surgeMultiplier;

    /**
     * @var string
     */
    protected $display;

    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @param string $surgeConfirmationHref
     * @param int $highEstimate
     * @param string $surgeConfirmationId
     * @param int $minimum
     * @param int $lowEstimate
     * @param float $surgeMultiplier
     * @param string $display
     * @param string $currencyCode
     */
    public function __construct($surgeConfirmationHref = null, $highEstimate = null, $surgeConfirmationId = null, $minimum = null, $lowEstimate = null, $surgeMultiplier = null, $display = null, $currencyCode = null)
    {
        $this->surgeConfirmationHref = $surgeConfirmationHref;
        $this->highEstimate = $highEstimate;
        $this->surgeConfirmationId = $surgeConfirmationId;
        $this->minimum = $minimum;
        $this->lowEstimate = $lowEstimate;
        $this->surgeMultiplier = $surgeMultiplier;
        $this->display = $display;
        $this->currencyCode = $currencyCode;
    }

    /**
     * Gets the SurgeConfirmationHref
     * @return string
     */
    public function getSurgeConfirmationHref()
    {
        return $this->surgeConfirmationHref;
    }

    /**
     * Sets the SurgeConfirmationHref
     * @param string $surgeConfirmationHref
     * @return EstimatePrice
     */
    public function setSurgeConfirmationHref($surgeConfirmationHref)
    {
        $this->surgeConfirmationHref = $surgeConfirmationHref;
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
     * @return EstimatePrice
     */
    public function setHighEstimate($highEstimate)
    {
        $this->highEstimate = $highEstimate;
        return $this;
    }

    /**
     * Gets the SurgeConfirmationId
     * @return string
     */
    public function getSurgeConfirmationId()
    {
        return $this->surgeConfirmationId;
    }

    /**
     * Sets the SurgeConfirmationId
     * @param string $surgeConfirmationId
     * @return EstimatePrice
     */
    public function setSurgeConfirmationId($surgeConfirmationId)
    {
        $this->surgeConfirmationId = $surgeConfirmationId;
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
     * @return EstimatePrice
     */
    public function setMinimum($minimum)
    {
        $this->minimum = $minimum;
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
     * @return EstimatePrice
     */
    public function setLowEstimate($lowEstimate)
    {
        $this->lowEstimate = $lowEstimate;
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
     * @return EstimatePrice
     */
    public function setSurgeMultiplier($surgeMultiplier)
    {
        $this->surgeMultiplier = $surgeMultiplier;
        return $this;
    }

    /**
     * Gets the Display
     * @return string
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * Sets the Display
     * @param string $display
     * @return EstimatePrice
     */
    public function setDisplay($display)
    {
        $this->display = $display;
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
     * @return EstimatePrice
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $results);
    }
}
