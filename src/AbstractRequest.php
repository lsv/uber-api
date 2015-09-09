<?php
namespace Lsv\UberApi;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractRequest
{
    /**
     * Production endpoint
     */
    const ENDPOINT = 'https://api.uber.com';

    /**
     * Sandbox endpoint
     */
    const SANDBOX_ENDPOINT = 'https://sandbox-api.uber.com';

    /**
     * @var ClientInterface
     */
    private static $client = null;

    /**
     * @var bool
     */
    private static $useSandbox = false;

    /**
     * @var string
     */
    private static $token = null;

    /**
     * @param ClientInterface|null $client
     * @param string $server_token
     * @param bool $sandbox
     */
    public function __construct(ClientInterface $client = null, $server_token = null, $sandbox = false)
    {
        if ($client) {
            self::setClient($client);
        }

        if ($server_token) {
            self::setServerToken($server_token);
        }

        self::setSandboxMode($sandbox);
    }

    /**
     * Use sandbox mode
     * @param bool $useSandbox
     */
    public static function setSandboxMode($useSandbox)
    {
        self::$useSandbox = $useSandbox;
    }

    /**
     * @param ClientInterface $client
     */
    public static function setClient(ClientInterface $client = null)
    {
        self::$client = $client;
    }

    /**
     * @param string $token
     */
    public static function setServerToken($token)
    {
        self::$token = $token;
    }

    /**
     * Run the query up to the REST API
     */
    public function query()
    {
        throw new \RuntimeException('The method "query" should be overwritten');
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws ClientException
     */
    protected function doQuery(array $parameters)
    {
        $this->setAuthentication($parameters);
        if (self::$client === null) {
            throw new \RuntimeException('Client needs to be set before doing any requests');
        }

        try {
            $response = self::$client->request($this->httpMethod(), $this->makeEndpoint(), [
                'query' => $parameters
            ]);
            return $this->parseResponse($response);
        } catch (ClientException $e) {
            throw $e;
        }
    }

    private function setAuthentication(array &$parameters)
    {
        if (! $this->requireOauth()) {
            $parameters['server_token'] = self::$token;
        }
    }

    /**
     * URL to fetch
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
     * Parse the query response
     * @param ResponseInterface $response
     * @return mixed
     */
    abstract protected function parseResponse(ResponseInterface $response);

    /**
     * API Endpoint
     * @return string
     */
    abstract protected function getEndPoint();

    /**
     * Does this request require Oauth
     * @return bool
     */
    abstract protected function requireOauth();

    /**
     * Which HTTP method should be used to this endpoint
     * @return string
     */
    abstract protected function httpMethod();

    /**
     * API version of the method
     * @return string
     */
    abstract protected function getApiVersion();
}
