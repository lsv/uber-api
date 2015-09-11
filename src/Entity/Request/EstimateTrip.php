<?php
namespace Lsv\UberApi\Entity\Request;

use Lsv\UberApi\Util\EntityUtil;

class EstimateTrip
{
    /**
     * @var float
     */
    protected $distanceEstimate;

    /**
     * @var string
     */
    protected $distanceUnit;

    /**
     * @var int
     */
    protected $durationEstimate;

    /**
     * @param float $distanceEstimate
     * @param string $distanceUnit
     * @param int $durationEstimate
     */
    public function __construct($distanceEstimate = null, $distanceUnit = null, $durationEstimate = null)
    {
        $this->distanceEstimate = $distanceEstimate;
        $this->distanceUnit = $distanceUnit;
        $this->durationEstimate = $durationEstimate;
    }

    /**
     * Gets the DistanceEstimate
     * @return float
     */
    public function getDistanceEstimate()
    {
        return $this->distanceEstimate;
    }

    /**
     * Sets the DistanceEstimate
     * @param float $distanceEstimate
     * @return EstimateTrip
     */
    public function setDistanceEstimate($distanceEstimate)
    {
        $this->distanceEstimate = $distanceEstimate;
        return $this;
    }

    /**
     * Gets the DistanceUnit
     * @return string
     */
    public function getDistanceUnit()
    {
        return $this->distanceUnit;
    }

    /**
     * Sets the DistanceUnit
     * @param string $distanceUnit
     * @return EstimateTrip
     */
    public function setDistanceUnit($distanceUnit)
    {
        $this->distanceUnit = $distanceUnit;
        return $this;
    }

    /**
     * Gets the DurationEstimate
     * @return int
     */
    public function getDurationEstimate()
    {
        return $this->durationEstimate;
    }

    /**
     * Sets the DurationEstimate
     * @param int $durationEstimate
     * @return EstimateTrip
     */
    public function setDurationEstimate($durationEstimate)
    {
        $this->durationEstimate = $durationEstimate;
        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $results);
    }
}
