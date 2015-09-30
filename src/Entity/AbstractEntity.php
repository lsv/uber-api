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
     * Gets the QueryParameters.
     *
     * @return array
     */
    public function getQueryParameters()
    {
        return $this->queryParameters;
    }

    /**
     * Gets the PathParameters.
     *
     * @return array
     */
    public function getPathParameters()
    {
        return $this->pathParameters;
    }
}
