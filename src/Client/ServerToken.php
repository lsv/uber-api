<?php
namespace Lsv\UberApi\Client;

use GuzzleHttp\Client;

class ServerToken extends Client
{
    /**
     * @param string $token
     * @param array $config
     */
    public function __construct($token, array $config = [])
    {
        $config['headers']['Authorization'] = sprintf('Token %s', $token);
        parent::__construct($config);
    }
}
