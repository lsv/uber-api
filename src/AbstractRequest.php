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
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Lsv\UberApi\Client\Oauth2;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AbstractRequest.
 */
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
     * HTTP Client.
     *
     * @var Client
     */
    private static $client = null;

    /**
     * Should we use the uber sandbox.
     *
     * @var bool
     */
    private static $useSandbox = false;

    /**
     * The request object.
     *
     * @var Request
     */
    private $request;

    /**
     * The response object.
     *
     * @var Response
     */
    private $response;

    /**
     * Constructor.
     *
     * @param ClientInterface|null $client
     * @param bool|null            $sandbox
     */
    public function __construct(ClientInterface $client = null, $sandbox = null)
    {
        if ($client) {
            self::setClient($client);
        }

        self::setSandboxMode($sandbox);
    }

    /**
     * Set the HTTP client.
     *
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
     * Get the request object.
     *
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Get the response object.
     *
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Create and execute the actual query.
     *
     * @param array $queryParameters
     * @param array $pathParameters
     *
     * @return mixed
     */
    protected function doQuery(array $queryParameters, array $pathParameters = [])
    {
        if (self::$client === null) {
            throw new \RuntimeException('Client needs to be set before doing any requests');
        }

        if ($this->requireOauth() && !self::$client instanceof Oauth2) {
            throw new \RuntimeException('This request requires a Oauth2 client');
        }

        try {
            $options = [];
            switch (strtolower($this->httpMethod())) {
                default:
                case 'get':
                    $options['query'] = $queryParameters;
                    break;
                case 'post':
                    $options['json'] = json_encode($queryParameters);
                    break;
                case 'delete':
                    break;
            }

            $this->request = new Request($this->httpMethod(), $this->makeEndpoint($pathParameters), $options);
            $this->response = self::$client->send($this->getRequest());

            return $this->parseResponse($this->getResponse());
        } catch (ClientException $e) {
            throw $e;
        }
    }

    /**
     * URL to fetch.
     *
     * @param array $pathParameters
     *
     * @return string
     */
    private function makeEndpoint(array $pathParameters)
    {
        $endpoint = $this->getEndPoint();
        foreach ($pathParameters as $key => $value) {
            $keyString = '{'.$key.'}';
            if (strpos($endpoint, $keyString) !== false) {
                $endpoint = str_replace($keyString, $value, $endpoint);
                unset($pathParameters[$key]);
            }
        }

        return sprintf(
            '%s/%s/%s%s',
            self::useSandbox(),
            $this->getApiVersion(),
            $endpoint,
            ($pathParameters ? '/'.implode('/', $pathParameters) : '')
        );
    }

    /**
     * Get the endpoint base url.
     *
     * @return string
     */
    private static function useSandbox()
    {
        return self::$useSandbox ? self::SANDBOX_ENDPOINT : self::ENDPOINT;
    }

    /**
     * Does this request require Oauth.
     *
     * @return bool
     */
    protected function requireOauth()
    {
        return false;
    }

    /**
     * Which HTTP method should be used to this endpoint.
     *
     * @return string
     */
    protected function httpMethod()
    {
        return 'GET';
    }

    /**
     * API version of the method.
     *
     * @return string
     */
    protected function getApiVersion()
    {
        return 'v1';
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
}
