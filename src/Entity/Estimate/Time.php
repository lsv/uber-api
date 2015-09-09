<?php
namespace Lsv\UberApi\Entity\Estimate;

class Time
{
    /**
     * @var string
     */
    protected $productId;

    /**
     * @var string
     */
    protected $displayName;

    /**
     * @var string
     */
    protected $localizedDisplayName;

    /**
     * @var int
     */
    protected $estimate;

    /**
     * @param string $productId
     * @param string $localizedDisplayName
     * @param string $displayName
     * @param int $estimate
     */
    public function __construct($productId = null, $localizedDisplayName = null, $displayName = null, $estimate = null)
    {
        $this->productId = $productId;
        $this->displayName = $displayName;
        $this->estimate = $estimate;
        $this->localizedDisplayName = $localizedDisplayName;
    }

    /**
     * Gets the ProductId
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Sets the ProductId
     * @param string $productId
     * @return Time
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * Gets the LocalizedDisplayName
     * @return string
     */
    public function getLocalizedDisplayName()
    {
        return $this->localizedDisplayName;
    }

    /**
     * Sets the LocalizedDisplayName
     * @param string $localizedDisplayName
     * @return Time
     */
    public function setLocalizedDisplayName($localizedDisplayName)
    {
        $this->localizedDisplayName = $localizedDisplayName;
        return $this;
    }

    /**
     * Gets the DisplayName
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Sets the DisplayName
     * @param string $displayName
     * @return Time
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * Gets the Estimate
     * @return int
     */
    public function getEstimate()
    {
        return $this->estimate;
    }

    /**
     * Sets the Estimate
     * @param int $estimate
     * @return Time
     */
    public function setEstimate($estimate)
    {
        $this->estimate = $estimate;
        return $this;
    }

    public static function createFromArray(array $results = null)
    {
        $objects = [];
        if (! $results) {
            return [];
        }
        foreach ($results as $result) {
            $obj = new self;
            foreach ($result as $key => $value) {
                $key = ucfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
                $setter = 'set' . $key;
                $obj->{$setter}($value);
            }
            $objects[] = $obj;
        }
        return $objects;
    }
}
