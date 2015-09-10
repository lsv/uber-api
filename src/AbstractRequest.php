<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApi;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use Lsv\UberApi\Client\Oauth2;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractRequest
{
    /**
     * Production endpoint.
     */
    const ENDPOINT = 'https://api.uber.com';

    /**
     * Sandbox endpoint.
     */
    const SANDBOX_ENDPOINT = 'https://sandbox-api.uber.com';

    /**
     * @var Client
     */
    private static $client = null;

    /**
     * @var bool
     */
    private static $useSandbox = false;

    /**
     * @param ClientInterface|null $client
     * @param bool                 $sandbox
     */
    public function __construct(ClientInterface $client = null, $sandbox = false)
    {
        if ($client) {
            self::setClient($client);
        }

        self::setSandboxMode($sandbox);
    }

    /**
     * @param ClientInterface $client
     */
    public static function setClient(ClientInterface $client = null)
    {
        self::$client = $client;
    }

    /**
     * Use sandbox mode.
     *
     * @param bool $useSandbox
     */
    public static function setSandboxMode($useSandbox)
    {
        self::$useSandbox = $useSandbox;
    }

    /**
     * @param array $parameters
     *
     * @throws ClientException
     *
     * @return mixed
     */
    protected function doQuery(array $parameters)
    {
        if (self::$client === null) {
            throw new \RuntimeException('Client needs to be set before doing any requests');
        }

        $options = [];
        if ($this->requireOauth() && !self::$client instanceof Oauth2) {
            throw new \RuntimeException('This request requires a Oauth2 client');
        }

        try {
            /* @var ResponseInterface $response */
            switch (strtolower($this->httpMethod())) {
                default:
                case 'get':
                    $options['query'] = $parameters;
                    $response = self::$client->get($this->makeEndpoint(), $options);
                    break;
                case 'post':
                    $options['json'] = json_encode($parameters);
                    $response = self::$client->post($this->makeEndpoint(), $options);
                    break;
            }

            return $this->parseResponse($response);
        } catch (ClientException $e) {
            throw $e;
        }
    }

    /**
     * URL to fetch.
     *
     * @return string
     */
    private function makeEndpoint()
    {
        return sprintf(
            '%s/%s/%s',
            self::$useSandbox ? self::SANDBOX_ENDPOINT : self::ENDPOINT,
            $this->getApiVersion(),
            $this->getEndpoint()
        );
    }

    /**
     * Parse the query response.
     *
     * @param ResponseInterface $response
     *
     * @return mixed
     */
    abstract protected function parseResponse(ResponseInterface $response);

    /**
     * API Endpoint.
     *
     * @return string
     */
    abstract protected function getEndPoint();

    /**
     * Does this request require Oauth.
     *
     * @return bool
     */
    abstract protected function requireOauth();

    /**
     * Which HTTP method should be used to this endpoint.
     *
     * @return string
     */
    abstract protected function httpMethod();

    /**
     * API version of the method.
     *
     * @return string
     */
    abstract protected function getApiVersion();
}
