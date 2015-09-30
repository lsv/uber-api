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
use Lsv\UberApi\Entity\Request\Detail as DetailEntity;
use Psr\Http\Message\ResponseInterface;

/**
 * Get the real time status of an ongoing trip that was created using the Ride Request endpoint.
 */
class Detail extends AbstractRequest
{
    /**
     * Get details for a request.
     *
     * @param string $requestId Unique identifier representing a Request.
     *
     * @return DetailEntity
     */
    public function query($requestId)
    {
        return $this->doQuery([], [
            'request_id' => $requestId,
        ]);
    }

    /**
     * API Endpoint.
     *
     * @return string
     */
    protected function getEndPoint()
    {
        return 'requests/{request_id}';
    }

    /**
     * Does this request require Oauth.
     *
     * @return bool
     */
    protected function requireOauth()
    {
        return true;
    }

    /**
     * Parse the query response.
     *
     * @param ResponseInterface $response
     * @param array             $queryParameters
     * @param array             $pathParameters
     *
     * @return mixed
     */
    protected function parseResponse(ResponseInterface $response, $queryParameters, $pathParameters)
    {
        $results = json_decode($response->getBody(), true);

        return DetailEntity::createFromArray($results, $queryParameters, $pathParameters);
    }
}
