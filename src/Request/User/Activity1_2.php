<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Request\User;

use GuzzleHttp\Message\ResponseInterface;
use Lsv\UberApi\AbstractRequest;

class Activity1_2 extends AbstractRequest
{
    /**
     * @param null $offset
     * @param null $limit
     *
     * @return mixed
     */
    public function query($offset = null, $limit = null)
    {
        return $this->doQuery([
            'offset' => $offset,
            'limit'  => $limit,
        ]);
    }

    /**
     * Parse the query response.
     *
     * @param ResponseInterface $response
     *
     * @return mixed
     */
    protected function parseResponse(ResponseInterface $response)
    {
        // TODO: Implement parseResponse() method.
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
     * Which HTTP method should be used to this endpoint.
     *
     * @return string
     */
    protected function httpMethod()
    {
        return 'GET';
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
}
