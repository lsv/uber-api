<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Entity\Estimate;

use Lsv\UberApi\Entity\AbstractEntity;
use Lsv\UberApi\Entity\EntityInterface;
use Lsv\UberApi\Util\EntityUtil;

/**
 * Estimated price object.
 */
class Price extends AbstractEntity implements EntityInterface
{
    /**
     * Unique identifier representing a specific product for a given latitude & longitude.
     *
     * @var string
     */
    protected $productId;

    /**
     * ISO 4217 currency code.
     *
     * @var string
     */
    protected $currencyCode;

    /**
     * Display name of product.
     *
     * @var string
     */
    protected $displayName;

    /**
     * Localized display name of product.
     *
     * @var string
     */
    protected $localizedDisplayName;

    /**
     * Formatted string of estimate in local currency of the start location.
     * Estimate could be a range, a single number (flat rate) or "Metered" for TAXI.
     *
     * @var string
     */
    protected $estimate;

    /**
     * Lower bound of the estimated price.
     *
     * @var int
     */
    protected $lowEstimate;

    /**
     * Minimum bound of the estimated price.
     *
     * @var int
     */
    protected $minimum;

    /**
     * Upper bound of the estimated price.
     *
     * @var int
     */
    protected $highEstimate;

    /**
     * Expected surge multiplier.
     * Surge is active if surge_multiplier is greater than 1.
     * Price estimate already factors in the surge multiplier.
     *
     * @var float
     */
    protected $surgeMultiplier;

    /**
     * Expected activity duration (in seconds).
     * Always show duration in minutes.
     *
     * @var int
     */
    protected $duration;

    /**
     * Expected activity distance (in miles).
     *
     * @var float
     */
    protected $distance;

    /**
     * Constructor.
     *
     * @param string $productId            Unique identifier representing a specific product
     * @param string $currencyCode         ISO 4217 currency code.
     * @param string $localizedDisplayName Display name of product.
     * @param string $displayName          Display name of product.
     * @param string $estimate             Formatted string of estimate in local currency
     * @param int    $lowEstimate          Lower bound of the estimated price.
     * @param int    $minimum              Minimum bound of the estimated price.
     * @param int    $highEstimate         Upper bound of the estimated price.
     * @param float  $surgeMultiplier      Expected surge multiplier
     * @param int    $duration             Expected activity duration (in seconds)
     * @param float  $distance             Expected activity distance (in miles).
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
     * Gets the ProductId.
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Sets the ProductId.
     *
     * @param string $productId
     *
     * @return Price
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

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
     * @return Price
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * Gets the LocalizedDisplayName.
     *
     * @return string
     */
    public function getLocalizedDisplayName()
    {
        return $this->localizedDisplayName;
    }

    /**
     * Sets the LocalizedDisplayName.
     *
     * @param string $localizedDisplayName
     *
     * @return Price
     */
    public function setLocalizedDisplayName($localizedDisplayName)
    {
        $this->localizedDisplayName = $localizedDisplayName;

        return $this;
    }

    /**
     * Gets the DisplayName.
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Sets the DisplayName.
     *
     * @param string $displayName
     *
     * @return Price
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Gets the Estimate.
     *
     * @return string
     */
    public function getEstimate()
    {
        return $this->estimate;
    }

    /**
     * Sets the Estimate.
     *
     * @param string $estimate
     *
     * @return Price
     */
    public function setEstimate($estimate)
    {
        $this->estimate = $estimate;

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
     * @return Price
     */
    public function setLowEstimate($lowEstimate)
    {
        $this->lowEstimate = $lowEstimate;

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
     * @return Price
     */
    public function setMinimum($minimum)
    {
        $this->minimum = $minimum;

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
     * @return Price
     */
    public function setHighEstimate($highEstimate)
    {
        $this->highEstimate = $highEstimate;

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
     * @return Price
     */
    public function setSurgeMultiplier($surgeMultiplier)
    {
        $this->surgeMultiplier = $surgeMultiplier;

        return $this;
    }

    /**
     * Gets the Duration.
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Sets the Duration.
     *
     * @param int $duration
     *
     * @return Price
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Gets the Distance.
     *
     * @return float
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Sets the Distance.
     *
     * @param float $distance
     *
     * @return Price
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

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
        return EntityUtil::multipleCreateFromArray(self::class, $queryParameters, $pathParameters, $results);
    }
}
