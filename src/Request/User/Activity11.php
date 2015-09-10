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

use Lsv\UberApi\Entity\User\History11;
use Psr\Http\Message\ResponseInterface;

class Activity11 extends Activity12
{
    /**
     * @param null $offset
     * @param null $limit
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
