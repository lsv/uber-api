<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Endpoints\Request;

use Lsv\UberApi\AbstractRequest;
use Lsv\UberApi\Entity\Request\Map as MapEntity;
use Psr\Http\Message\ResponseInterface;

/**
 * Get a map with a visual representation of a Request.
 */
class Map extends AbstractRequest
{
    /**
     * Query for the map.
     *
     * @param string $requestId Unique identifier representing a Request.
     *
     * @return MapEntity
     */
    public function query($requestId)
    {
        return $this->doQuery([], [
            'request_id' => $requestId,
        ]);
    }

    /**
     * Parse the query response.
     *
     * @param ResponseInterface $response
     *
     * @return MapEntity
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $results = json_decode($response->getBody(), true);

        return MapEntity::createFromArray($results);
    }

    /**
     * API Endpoint.
     *
     * @return string
     */
    protected function getEndPoint()
    {
        return 'requests/{request_id}/map';
    }

    /**
     * {@inheritdoc}
     */
    protected function requireOauth()
    {
        return true;
    }
}
