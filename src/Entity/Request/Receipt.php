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
 * Request receipt.
 */
class Receipt extends AbstractEntity implements EntityInterface
{
    /**
     * Unique identifier representing a Request.
     *
     * @var string
     */
    protected $requestId;

    /**
     * Describes the charges made against the rider.
     *
     * @var ReceiptCharge[]
     */
    protected $charges;

    /**
     * Describes the surge charge. May be null if surge pricing was not in effect.
     *
     * @var ReceiptSurgeCharge
     */
    protected $surgeCharge;

    /**
     * Adjustments made to the charges such as promotions, and fees.
     *
     * @var ReceiptChargeAdjustment[]
     */
    protected $chargeAdjustments;

    /**
     * The summation of the charges.
     *
     * @var float
     */
    protected $normalFare;

    /**
     * The summation of the normal_fare and surge_charge.
     *
     * @var float
     */
    protected $subtotal;

    /**
     * The total amount charged to the users payment method.
     * This is the the subtotal (split if applicable) with taxes included.
     *
     * @var float
     */
    protected $totalCharged;

    /**
     * The total amount still owed after attempting to charge the user.
     * May be null if amount was paid in full.
     *
     * @var float
     */
    protected $totalOwed;

    /**
     * Currency in ISO 4217.
     *
     * @var string
     */
    protected $currencyCode;

    /**
     * Time duration of the trip in ISO 8061 HH:MM:SS format.
     *
     * @var string
     */
    protected $duration;

    /**
     * Distance of the trip charged.
     *
     * @var string
     */
    protected $distance;

    /**
     * The localized unit of distance.
     *
     * @var string
     */
    protected $distanceLabel;

    /**
     * Constructor.
     *
     * @param string                    $requestId         Unique identifier representing a Request.
     * @param ReceiptCharge[]           $charges           Describes the charges made against the rider.
     * @param ReceiptSurgeCharge        $surgeCharges      Describes the surge charge. May be null if surge pricing was not in effect.
     * @param ReceiptChargeAdjustment[] $chargeAdjustments Adjustments made to the charges such as promotions, and fees.
     * @param float                     $normalFare        The summation of the charges.
     * @param float                     $subtotal          The summation of the normal_fare and surge_charge.
     * @param float                     $totalCharged      The total amount charged to the users payment method.
     * @param float                     $totalOwed         The total amount still owed after attempting to charge the user
     * @param string                    $currencyCode      Currency in ISO 4217
     * @param string                    $duration          Time duration of the trip in ISO 8061 HH:MM:SS format.
     * @param string                    $distance          Distance of the trip charged.
     * @param string                    $distanceLabel     The localized unit of distance.
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
     * @return Receipt
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * Gets the Charges.
     *
     * @return ReceiptCharge[]
     */
    public function getCharges()
    {
        return $this->charges;
    }

    /**
     * Sets the Charges.
     *
     * @param ReceiptCharge[] $charges
     *
     * @return Receipt
     */
    public function setCharges($charges)
    {
        $this->charges = $charges;

        return $this;
    }

    /**
     * Gets the SurgeCharges.
     *
     * @return ReceiptSurgeCharge
     */
    public function getSurgeCharge()
    {
        return $this->surgeCharge;
    }

    /**
     * Sets the SurgeCharges.
     *
     * @param ReceiptSurgeCharge $surgeCharge
     *
     * @return Receipt
     */
    public function setSurgeCharge($surgeCharge)
    {
        $this->surgeCharge = $surgeCharge;

        return $this;
    }

    /**
     * Gets the ChargeAdjustments.
     *
     * @return ReceiptChargeAdjustment[]
     */
    public function getChargeAdjustments()
    {
        return $this->chargeAdjustments;
    }

    /**
     * Sets the ChargeAdjustments.
     *
     * @param ReceiptChargeAdjustment[] $chargeAdjustments
     *
     * @return Receipt
     */
    public function setChargeAdjustments($chargeAdjustments)
    {
        $this->chargeAdjustments = $chargeAdjustments;

        return $this;
    }

    /**
     * Gets the NormalFare.
     *
     * @return float
     */
    public function getNormalFare()
    {
        return $this->normalFare;
    }

    /**
     * Sets the NormalFare.
     *
     * @param float $normalFare
     *
     * @return Receipt
     */
    public function setNormalFare($normalFare)
    {
        $this->normalFare = $normalFare;

        return $this;
    }

    /**
     * Gets the Subtotal.
     *
     * @return float
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Sets the Subtotal.
     *
     * @param float $subtotal
     *
     * @return Receipt
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * Gets the TotalCharged.
     *
     * @return float
     */
    public function getTotalCharged()
    {
        return $this->totalCharged;
    }

    /**
     * Sets the TotalCharged.
     *
     * @param float $totalCharged
     *
     * @return Receipt
     */
    public function setTotalCharged($totalCharged)
    {
        $this->totalCharged = $totalCharged;

        return $this;
    }

    /**
     * Gets the TotalOwed.
     *
     * @return float
     */
    public function getTotalOwed()
    {
        return $this->totalOwed;
    }

    /**
     * Sets the TotalOwed.
     *
     * @param float $totalOwed
     *
     * @return Receipt
     */
    public function setTotalOwed($totalOwed)
    {
        $this->totalOwed = $totalOwed;

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
     * @return Receipt
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * Gets the Duration.
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Sets the Duration.
     *
     * @param string $duration
     *
     * @return Receipt
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Gets the Distance.
     *
     * @return string
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Sets the Distance.
     *
     * @param string $distance
     *
     * @return Receipt
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Gets the DistanceLabel.
     *
     * @return string
     */
    public function getDistanceLabel()
    {
        return $this->distanceLabel;
    }

    /**
     * Sets the DistanceLabel.
     *
     * @param string $distanceLabel
     *
     * @return Receipt
     */
    public function setDistanceLabel($distanceLabel)
    {
        $this->distanceLabel = $distanceLabel;

        return $this;
    }

    /**
     * Create entity from array.
     *
     * @param array|null $results
     * @param array $queryParameters
     * @param array $pathParameters
     * @return array|null|object
     */
    public static function createFromArray(array $results = null, array $queryParameters = null, array $pathParameters = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $queryParameters, $pathParameters, $results, [
            'Charges'           => ['setter' => 'setCharges', 'class' => ReceiptCharge::class],
            'SurgeCharge'       => ['setter' => 'setSurgeCharge', 'class' => ReceiptSurgeCharge::class],
            'ChargeAdjustments' => ['setter' => 'setChargeAdjustments', 'class' => ReceiptChargeAdjustment::class],
        ]);
    }
}
