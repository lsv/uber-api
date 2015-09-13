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

use Lsv\UberApi\Entity\EntityInterface;
use Lsv\UberApi\Util\EntityUtil;

/**
 * Details of the estimated fare. If end location is omitted, only the minimum is returned.
 */
class EstimatePrice implements EntityInterface
{
    /**
     * The URL a user must visit to accept surge pricing.
     *
     * @var string
     */
    protected $surgeConfirmationHref;

    /**
     * Upper bound of the estimated price.
     *
     * @var int
     */
    protected $highEstimate;

    /**
     * The unique identifier of the surge session for a user. null if no surge is currently in effect.
     *
     * @var string
     */
    protected $surgeConfirmationId;

    /**
     * The minimum fare of a trip. Should only be displayed or used if no end location is provided.
     *
     * @var int
     */
    protected $minimum;

    /**
     * Lower bound of the estimated price.
     *
     * @var int
     */
    protected $lowEstimate;

    /**
     * Expected surge multiplier.
     * Surge is active if surge_multiplier is greater than 1.
     * Fare estimates below factor in the surge multiplier.
     *
     * @var float
     */
    protected $surgeMultiplier;

    /**
     * Formatted string of estimate in local currency.
     *
     * @var string
     */
    protected $display;

    /**
     * ISO 4217 currency code.
     *
     * @var string
     */
    protected $currencyCode;

    /**
     * Constructor.
     *
     * @param string $surgeConfirmationHref The URL a user must visit to accept surge pricing.
     * @param int    $highEstimate          Upper bound of the estimated price.
     * @param string $surgeConfirmationId   The unique identifier of the surge session for a user. null if no surge is currently in effect.
     * @param int    $minimum               The minimum fare of a trip. Should only be displayed or used if no end location is provided.
     * @param int    $lowEstimate           Lower bound of the estimated price.
     * @param float  $surgeMultiplier       Expected surge multiplier
     * @param string $display               Formatted string of estimate in local currency
     * @param string $currencyCode          ISO 4217 currency code.
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
     * Gets the SurgeConfirmationHref.
     *
     * @return string
     */
    public function getSurgeConfirmationHref()
    {
        return $this->surgeConfirmationHref;
    }

    /**
     * Sets the SurgeConfirmationHref.
     *
     * @param string $surgeConfirmationHref
     *
     * @return EstimatePrice
     */
    public function setSurgeConfirmationHref($surgeConfirmationHref)
    {
        $this->surgeConfirmationHref = $surgeConfirmationHref;

        return $this;
    }

    /**
     * Gets the HighEstimate.
     *
     * @return int
     */
    public function getHighEstimate()
    {
        return $this->highEstimate;
    }

    /**
     * Sets the HighEstimate.
     *
     * @param int $highEstimate
     *
     * @return EstimatePrice
     */
    public function setHighEstimate($highEstimate)
    {
        $this->highEstimate = $highEstimate;

        return $this;
    }

    /**
     * Gets the SurgeConfirmationId.
     *
     * @return string
     */
    public function getSurgeConfirmationId()
    {
        return $this->surgeConfirmationId;
    }

    /**
     * Sets the SurgeConfirmationId.
     *
     * @param string $surgeConfirmationId
     *
     * @return EstimatePrice
     */
    public function setSurgeConfirmationId($surgeConfirmationId)
    {
        $this->surgeConfirmationId = $surgeConfirmationId;

        return $this;
    }

    /**
     * Gets the Minimum.
     *
     * @return int
     */
    public function getMinimum()
    {
        return $this->minimum;
    }

    /**
     * Sets the Minimum.
     *
     * @param int $minimum
     *
     * @return EstimatePrice
     */
    public function setMinimum($minimum)
    {
        $this->minimum = $minimum;

        return $this;
    }

    /**
     * Gets the LowEstimate.
     *
     * @return int
     */
    public function getLowEstimate()
    {
        return $this->lowEstimate;
    }

    /**
     * Sets the LowEstimate.
     *
     * @param int $lowEstimate
     *
     * @return EstimatePrice
     */
    public function setLowEstimate($lowEstimate)
    {
        $this->lowEstimate = $lowEstimate;

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
     * @return EstimatePrice
     */
    public function setSurgeMultiplier($surgeMultiplier)
    {
        $this->surgeMultiplier = $surgeMultiplier;

        return $this;
    }

    /**
     * Gets the Display.
     *
     * @return string
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * Sets the Display.
     *
     * @param string $display
     *
     * @return EstimatePrice
     */
    public function setDisplay($display)
    {
        $this->display = $display;

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
     * @return EstimatePrice
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

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
        return EntityUtil::singleCreateFromArray(self::class, $results);
    }
}
