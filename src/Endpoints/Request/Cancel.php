<?php
namespace Lsv\UberApi\Endpoints\Request;

use Lsv\UberApi\AbstractRequest;
use Psr\Http\Message\ResponseInterface;

class Cancel extends AbstractRequest
{
    /**
     * @param $requestId
     * @return string
     */
    public function query($requestId)
    {
        return $this->doQuery([], [
            'request_id' => $requestId
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
        return sprintf('[%d] %s', $response->getStatusCode(), $response->getBody());
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
}
