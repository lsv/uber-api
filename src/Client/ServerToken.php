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
 * App server token client
 */
class ServerToken extends Client
{
    /**
     * Create server token client
     *
     * @param string $token App server token
     * @param array  $config Other Guzzle configs
     */
    public function __construct($token, array $config = [])
    {
        $config['headers']['Authorization'] = sprintf('Token %s', $token);
        parent::__construct($config);
    }
}
