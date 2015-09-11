<?php
namespace Lsv\UberApi\Entity\Request;

use Lsv\UberApi\Util\EntityUtil;

class Map
{
    /**
     * @var string
     */
    protected $requestId;

    /**
     * @var string
     */
    protected $href;

    /**
     * @param string $requestId
     * @param string $href
     */
    public function __construct($requestId = null, $href = null)
    {
        $this->requestId = $requestId;
        $this->href = $href;
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
     * @return Map
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
        return $this;
    }

    /**
     * Gets the Href
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * Sets the Href
     * @param string $href
     * @return Map
     */
    public function setHref($href)
    {
        $this->href = $href;
        return $this;
    }

    public static function createFromArray($results = null)
    {
        return EntityUtil::singleCreateFromArray(self::class, $results);
    }
}