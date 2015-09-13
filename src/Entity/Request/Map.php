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
 * Map object
 */
class Map implements EntityInterface
{
    /**
     * Unique identifier representing a Request.
     *
     * @var string
     */
    protected $requestId;

    /**
     * URL to a map representing the requested trip.
     *
     * @var string
     */
    protected $href;

    /**
     * Constructor
     *
     * @param string $requestId Unique identifier representing a Request.
     * @param string $href URL to a map representing the requested trip.
     */
    public function __construct($requestId = null, $href = null)
    {
        $this->requestId = $requestId;
        $this->href = $href;
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
     * @return Map
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * Gets the Href.
     *
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Sets the Href.
     *
     * @param string $href
     *
     * @return Map
     */
    public function setHref($href)
    {
        $this->href = $href;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @param array|null $results
     * @return null|object
     */
    public static function createFromArray(array $results = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $results);
    }
}
