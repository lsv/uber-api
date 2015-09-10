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

use Lsv\UberApi\Entity\User\History1_1;
use Psr\Http\Message\ResponseInterface;

class Activity1_1 extends Activity1_2
{
    /**
     * @param null $offset
     * @param null $limit
     *
     * @return History1_1[]
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
     * @return History1_1[]
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $results = json_decode($response->getBody(), true);

        return History1_1::createFromArray($results['history']);
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
