<?php
namespace Lsv\UberApiTest\stubs;

use Lsv\UberApi\AbstractRequest;
use Psr\Http\Message\ResponseInterface;

class QueryFailClass extends AbstractRequest
{

    /**
     * Parse the query response
     * @param ResponseInterface $response
     * @return mixed
     */
    protected function parseResponse(ResponseInterface $response)
    {
    }

    /**
     * API Endpoint
     * @return string
     */
    protected function getEndPoint()
    {
    }

    /**
     * Does this request require Oauth
     * @return bool
     */
    protected function requireOauth()
    {
    }

    /**
     * Which HTTP method should be used to this endpoint
     * @return string
     */
    protected function httpMethod()
    {
    }

    /**
     * API version of the method
     * @return string
     */
    protected function getApiVersion()
    {
        return '';
    }
}
