<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Endpoints\User;

use Lsv\UberApi\AbstractRequest;
use Lsv\UberApi\Entity\User\History;
use Psr\Http\Message\ResponseInterface;

/**
 * The User Activity endpoint returns a limited amount of data about a user's lifetime activity with Uber.
 * The response will include pickup and dropoff times, the distance of past requests,
 * and information about which products were requested.
 *
 * The history array in the response will have a maximum length based on the limit parameter.
 * The response value count may exceed limit, therefore subsequent API requests may be necessary.
 */
class Activity12 extends AbstractRequest
{
    /**
     * Get activity.
     *
     * @param int $offset Offset the list of returned results by this amount. Default is zero.
     * @param int $limit  Number of items to retrieve. Default is 5, maximum is 50.
     *
     * @return History[]
     */
    public function query($offset = null, $limit = null)
    {
        return $this->doQuery([
            'offset' => $offset,
            'limit'  => $limit,
        ]);
    }

    /**
     * API Endpoint.
     *
     * @return string
     */
    protected function getEndPoint()
    {
        return 'history';
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
     * API version of the method.
     *
     * @return string
     */
    protected function getApiVersion()
    {
        return 'v1.2';
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

        return History::createFromArray($results['history'], $queryParameters, $pathParameters);
    }
}
