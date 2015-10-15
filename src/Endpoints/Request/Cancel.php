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
use Lsv\UberApi\Entity\Request\Detail;
use Psr\Http\Message\ResponseInterface;

/**
 * Cancel an ongoing Request on behalf of a rider.
 */
class Cancel extends AbstractRequest
{
    /**
     * Cancel an request.
     *
     * @param string $requestId Unique identifier representing a Request.
     *
     * @return string
     */
    public function query($requestId)
    {
        return $this->doQuery([], [
            'request_id' => $requestId,
        ]);
    }

    /**
     * Cancel by detail.
     *
     * @param Detail $detail
     *
     * @return string
     */
    public function queryByDetail(Detail $detail)
    {
        return $this->query($detail->getRequestId());
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
     * Which HTTP method should be used to this endpoint.
     *
     * @return string
     */
    protected function httpMethod()
    {
        return 'DELETE';
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
        if ($response->getStatusCode() === 204) {
            return true;
        }

        return sprintf('[%d] %s', $response->getStatusCode(), $response->getBody());
    }
}
