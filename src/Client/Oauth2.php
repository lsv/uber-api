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

/**
 * Oauth2 client
 */
class Oauth2 extends Client
{
    /**
     * Create oauth2 client
     *
     * @param string $accessToken Oauth2 access token
     * @param array  $config Other Guzzle configs
     */
    public function __construct($accessToken, array $config = [])
    {
        $config['headers']['Authorization'] = sprintf('Bearer %s', $accessToken);
        parent::__construct($config);
    }
}
