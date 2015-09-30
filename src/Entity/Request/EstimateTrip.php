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
 * Trip estimate.
 */
class EstimateTrip extends AbstractEntity implements EntityInterface
{
    /**
     * Expected activity distance.
     *
     * @var float
     */
    protected $distanceEstimate;

    /**
     * The unit of distance (mile or km).
     *
     * @var string
     */
    protected $distanceUnit;

    /**
     * Expected activity duration (in minutes).
     *
     * @var int
     */
    protected $durationEstimate;

    /**
     * Constructor.
     *
     * @param float  $distanceEstimate Expected activity distance.
     * @param string $distanceUnit     The unit of distance (mile or km).
     * @param int    $durationEstimate Expected activity duration (in minutes).
     */
    public function __construct($distanceEstimate = null, $distanceUnit = null, $durationEstimate = null)
    {
        $this->distanceEstimate = $distanceEstimate;
        $this->distanceUnit = $distanceUnit;
        $this->durationEstimate = $durationEstimate;
    }

    /**
     * Gets the DistanceEstimate.
     *
     * @return float
     */
    public function getDistanceEstimate()
    {
        return $this->distanceEstimate;
    }

    /**
     * Sets the DistanceEstimate.
     *
     * @param float $distanceEstimate
     *
     * @return EstimateTrip
     */
    public function setDistanceEstimate($distanceEstimate)
    {
        $this->distanceEstimate = $distanceEstimate;

        return $this;
    }

    /**
     * Gets the DistanceUnit.
     *
     * @return string
     */
    public function getDistanceUnit()
    {
        return $this->distanceUnit;
    }

    /**
     * Sets the DistanceUnit.
     *
     * @param string $distanceUnit
     *
     * @return EstimateTrip
     */
    public function setDistanceUnit($distanceUnit)
    {
        $this->distanceUnit = $distanceUnit;

        return $this;
    }

    /**
     * Gets the DurationEstimate.
     *
     * @return int
     */
    public function getDurationEstimate()
    {
        return $this->durationEstimate;
    }

    /**
     * Sets the DurationEstimate.
     *
     * @param int $durationEstimate
     *
     * @return EstimateTrip
     */
    public function setDurationEstimate($durationEstimate)
    {
        $this->durationEstimate = $durationEstimate;

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
        return EntityUtil::singleCreateFromArray(self::class, $queryParameters, $pathParameters, $results);
    }
}
