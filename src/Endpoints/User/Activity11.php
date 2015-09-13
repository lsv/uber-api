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

use Lsv\UberApi\Entity\User\History11;
use Psr\Http\Message\ResponseInterface;

/**
 * {@inheritdoc}
 */
class Activity11 extends Activity12
{
    /**
     * {@inheritdoc}
     *
     * @param null $offset Offset the list of returned results by this amount. Default is zero.
     * @param null $limit  Number of items to retrieve. Default is 5, maximum is 50.
     *
     * @return History11[]
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
     * @return History11[]
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $results = json_decode($response->getBody(), true);

        return History11::createFromArray($results['history']);
    }

    /**
     * API version of the method.
     *
     * @return string
     */
    protected function getApiVersion()
    {
        return 'v1.1';
    }
}
