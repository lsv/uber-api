<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi\Client;

use GuzzleHttp\Client;

class Oauth2 extends Client
{
    /**
     * @param string $accessToken
     * @param array $config
     */
    public function __construct($accessToken, array $config = [])
    {
        $config['headers']['Authorization'] = sprintf('Bearer %s', $accessToken);
        parent::__construct($config);
    }
}
