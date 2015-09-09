<?php
namespace Lsv\UberApi\Client;

use CommerceGuys\Guzzle\Oauth2\GrantType\PasswordCredentials;
use CommerceGuys\Guzzle\Oauth2\GrantType\RefreshToken;
use CommerceGuys\Guzzle\Oauth2\Oauth2Subscriber;
use GuzzleHttp\Client;

class Oauth2 extends Client
{

    const BASE_URL = 'https://login.uber.com';

    public function __construct($username, $password, $clientId, $scope, array $config = [])
    {
        $client = new Client(['base_url' => self::BASE_URL]);

        $oauth2config = [
            'username' => $username,
            'password' => $password,
            'client_id' => $clientId,
            'scope' => $scope,
        ];

        $token = new PasswordCredentials($client, $oauth2config);
        $refresh = new RefreshToken($client, $oauth2config);
        $oauth2 = new Oauth2Subscriber($token, $refresh);

        $config['base_url'] = self::BASE_URL;
        $config['defaults'] = [
            'auth' => 'oauth2',
            'subscribers' => [$oauth2]
        ];
        parent::__construct($config);
    }
}
