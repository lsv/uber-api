<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Entity;

use Lsv\UberApi\Util\EntityUtil;

/**
 * Promotion object.
 */
class Promotion extends AbstractEntity implements EntityInterface
{
    /**
     * A localized string we recommend to use when offering the promotion to users.
     *
     * @var string
     */
    protected $displayText;

    /**
     * The value of the promotion that is available to a user in this location in the local currency.
     *
     * @var string
     */
    protected $value;

    /**
     * The localized value of the promotion.
     *
     * @var string
     */
    protected $localizedValue;

    /**
     * The type of the promo which is either "trip_credit" or "account_credit".
     *
     * @var string
     */
    protected $type;

    /**
     * ISO 4217 currency code.
     *
     * @var string
     */
    protected $currencyCode;

    /**
     * Constructor.
     *
     * @param string $displayText    A localized string we recommend to use when offering the promotion to users.
     * @param string $value          The value of the promotion that is available to a user in this location in the local currency.
     * @param string $localizedValue The localized value of the promotion.
     * @param string $type           The type of the promo which is either "trip_credit" or "account_credit".
     * @param string $currencyCode   ISO 4217 currency code.
     */
    public function __construct($displayText = null, $value = null, $localizedValue = null, $type = null, $currencyCode = null)
    {
        $this->displayText = $displayText;
        $this->value = $value;
        $this->localizedValue = $localizedValue;
        $this->type = $type;
        $this->currencyCode = $currencyCode;
    }

    /**
     * Gets the DisplayText.
     *
     * @return string
     */
    public function getDisplayText()
    {
        return $this->displayText;
    }

    /**
     * Sets the DisplayText.
     *
     * @param string $displayText
     *
     * @return Promotion
     */
    public function setDisplayText($displayText)
    {
        $this->displayText = $displayText;

        return $this;
    }

    /**
     * Gets the Value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets the Value.
     *
     * @param string $value
     *
     * @return Promotion
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Gets the LocalizedValue.
     *
     * @return string
     */
    public function getLocalizedValue()
    {
        return $this->localizedValue;
    }

    /**
     * Sets the LocalizedValue.
     *
     * @param string $localizedValue
     *
     * @return Promotion
     */
    public function setLocalizedValue($localizedValue)
    {
        $this->localizedValue = $localizedValue;

        return $this;
    }

    /**
     * Gets the Type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the Type.
     *
     * @param string $type
     *
     * @return Promotion
     */
    public function setType($type)
    {
        $this->type = $type;

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
     * @return Promotion
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

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
