<?php
namespace Lsv\UberApi\Entity;

abstract class AbstractEntity
{
    protected $queryParameters = [];

    protected $pathParameters = [];

    public function setQueryParameters(array $queryParameters)
    {
        $this->queryParameters = $queryParameters;
    }

    public function setPathParameters(array $pathParameters)
    {
        $this->pathParameters = $pathParameters;
    }

    /**
     * Gets the QueryParameters
     * @return array
     */
    public function getQueryParameters()
    {
        return $this->queryParameters;
    }

    /**
     * Gets the PathParameters
     * @return array
     */
    public function getPathParameters()
    {
        return $this->pathParameters;
    }
}
