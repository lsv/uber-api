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

class Promotion
{
    /**
     * @var string
     */
    protected $displayText;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $localizedValue;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $currencyCode;

    /**
     * @param string $displayText
     * @param string $localizedValue
     * @param string $type
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

    public static function createFromArray(array $results = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $results);
    }
}
