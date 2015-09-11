<?php
namespace Lsv\UberApi\Entity\Request;

use Lsv\UberApi\Util\EntityUtil;

class Receipt
{
    /**
     * @var string
     */
    protected $requestId;

    /**
     * @var ReceiptCharge[]
     */
    protected $charges;

    /**
     * @var ReceiptSurgeCharge
     */
    protected $surgeCharge;

    /**
     * @var ReceiptChargeAdjustment[]
     */
    protected $chargeAdjustments;

    /**
     * @var float
     */
    protected $normalFare;

    /**
     * @var float
     */
    protected $subtotal;

    /**
     * @var float
     */
    protected $totalCharged;

    /**
     * @var float
     */
    protected $totalOwed;

    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @var string
     */
    protected $duration;

    /**
     * @var string
     */
    protected $distance;

    /**
     * @var string
     */
    protected $distanceLabel;

    /**
     * @param string $requestId
     * @param ReceiptCharge[] $charges
     * @param ReceiptSurgeCharge $surgeCharges
     * @param ReceiptChargeAdjustment[] $chargeAdjustments
     * @param float $normalFare
     * @param float $subtotal
     * @param float $totalCharged
     * @param float $totalOwed
     * @param string $currencyCode
     * @param string $duration
     * @param string $distance
     * @param string $distanceLabel
     */
    public function __construct($requestId = null, array $charges = null, ReceiptSurgeCharge $surgeCharges = null, array $chargeAdjustments = null, $normalFare = null, $subtotal = null, $totalCharged = null, $totalOwed = null, $currencyCode = null, $duration = null, $distance = null, $distanceLabel = null)
    {
        $this->requestId = $requestId;
        $this->charges = $charges;
        $this->surgeCharge = $surgeCharges;
        $this->chargeAdjustments = $chargeAdjustments;
        $this->normalFare = $normalFare;
        $this->subtotal = $subtotal;
        $this->totalCharged = $totalCharged;
        $this->totalOwed = $totalOwed;
        $this->currencyCode = $currencyCode;
        $this->duration = $duration;
        $this->distance = $distance;
        $this->distanceLabel = $distanceLabel;
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
     * @return Receipt
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
        return $this;
    }

    /**
     * Gets the Charges
     * @return ReceiptCharge[]
     */
    public function getCharges()
    {
        return $this->charges;
    }

    /**
     * Sets the Charges
     * @param ReceiptCharge[] $charges
     * @return Receipt
     */
    public function setCharges($charges)
    {
        $this->charges = $charges;
        return $this;
    }

    /**
     * Gets the SurgeCharges
     * @return ReceiptSurgeCharge
     */
    public function getSurgeCharge()
    {
        return $this->surgeCharge;
    }

    /**
     * Sets the SurgeCharges
     * @param ReceiptSurgeCharge $surgeCharge
     * @return Receipt
     */
    public function setSurgeCharge($surgeCharge)
    {
        $this->surgeCharge = $surgeCharge;
        return $this;
    }

    /**
     * Gets the ChargeAdjustments
     * @return ReceiptChargeAdjustment[]
     */
    public function getChargeAdjustments()
    {
        return $this->chargeAdjustments;
    }

    /**
     * Sets the ChargeAdjustments
     * @param ReceiptChargeAdjustment[] $chargeAdjustments
     * @return Receipt
     */
    public function setChargeAdjustments($chargeAdjustments)
    {
        $this->chargeAdjustments = $chargeAdjustments;
        return $this;
    }

    /**
     * Gets the NormalFare
     * @return float
     */
    public function getNormalFare()
    {
        return $this->normalFare;
    }

    /**
     * Sets the NormalFare
     * @param float $normalFare
     * @return Receipt
     */
    public function setNormalFare($normalFare)
    {
        $this->normalFare = $normalFare;
        return $this;
    }

    /**
     * Gets the Subtotal
     * @return float
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Sets the Subtotal
     * @param float $subtotal
     * @return Receipt
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
        return $this;
    }

    /**
     * Gets the TotalCharged
     * @return float
     */
    public function getTotalCharged()
    {
        return $this->totalCharged;
    }

    /**
     * Sets the TotalCharged
     * @param float $totalCharged
     * @return Receipt
     */
    public function setTotalCharged($totalCharged)
    {
        $this->totalCharged = $totalCharged;
        return $this;
    }

    /**
     * Gets the TotalOwed
     * @return float
     */
    public function getTotalOwed()
    {
        return $this->totalOwed;
    }

    /**
     * Sets the TotalOwed
     * @param float $totalOwed
     * @return Receipt
     */
    public function setTotalOwed($totalOwed)
    {
        $this->totalOwed = $totalOwed;
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
     * @return Receipt
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * Gets the Duration
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Sets the Duration
     * @param string $duration
     * @return Receipt
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * Gets the Distance
     * @return string
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Sets the Distance
     * @param string $distance
     * @return Receipt
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
        return $this;
    }

    /**
     * Gets the DistanceLabel
     * @return string
     */
    public function getDistanceLabel()
    {
        return $this->distanceLabel;
    }

    /**
     * Sets the DistanceLabel
     * @param string $distanceLabel
     * @return Receipt
     */
    public function setDistanceLabel($distanceLabel)
    {
        $this->distanceLabel = $distanceLabel;
        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $results, [
            'Charges' => ['setter' => 'setCharges', 'class' => ReceiptCharge::class],
            'SurgeCharge' => ['setter' => 'setSurgeCharge', 'class' => ReceiptSurgeCharge::class],
            'ChargeAdjustments' => ['setter' => 'setChargeAdjustments', 'class' => ReceiptChargeAdjustment::class],
        ]);
    }
}
