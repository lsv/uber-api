<?php
namespace Lsv\UberApi\Endpoints\Request;

use Lsv\UberApi\AbstractRequest;
use Lsv\UberApi\Entity\Request\Receipt as ReceiptEntity;
use Psr\Http\Message\ResponseInterface;

class Receipt extends AbstractRequest
{
    /**
     * @param string $requestId
     *
     * @return ReceiptEntity
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
     * @return ReceiptEntity
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $results = json_decode($response->getBody(), true);

        return ReceiptEntity::createFromArray($results);
    }

    /**
     * API Endpoint.
     *
     * @return string
     */
    protected function getEndPoint()
    {
        return 'requests/{request_id}/receipt';
    }

    /**
     * {@inheritdoc}
     */
    protected function requireOauth()
    {
        return true;
    }
}
