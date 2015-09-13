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
use Lsv\UberApi\Entity\Request\Receipt as ReceiptEntity;
use Psr\Http\Message\ResponseInterface;

/**
 * Get the receipt information of the completed request.
 */
class Receipt extends AbstractRequest
{
    /**
     * Get the receipt
     *
     * @param string $requestId Unique identifier representing a Request.
     *
     * @return ReceiptEntity
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
