<?php
namespace Lsv\UberApiTest;

use Geocoder\Model\Coordinates;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase
{

    protected function getClassName($class)
    {
        return 'Lsv\UberApi\\' . $class;
    }

    /**
     * @return Coordinates
     */
    protected function getCoordinates()
    {
        return new Coordinates(123, 123);
    }

    /**
     * @param $file
     * @return Client
     */
    protected function getFileResultsHandler($file)
    {
        $mock = new MockHandler([
            new Response(200, [], self::getReturnStub($file))
        ]);
        return new Client(['handler' => HandlerStack::create($mock)]);
    }

    /**
     * @param $code
     * @return Client
     */
    protected function getNullResultsHandler($code)
    {
        if ($code === null) {
            $mock = new MockHandler([
                new Response(200, [], '[]'),
                new Response(200, [], 'null')
            ]);
        } else {
            $mock = new MockHandler([
                new Response(200, [], '{"' . $code . '": null}'),
                new Response(200, [], '{"' . $code . '": []}')
            ]);
        }

        return new Client(['handler' => HandlerStack::create($mock)]);
    }

    /**
     * @param $file
     * @return string
     */
    static protected function getReturnStub($file)
    {
        return file_get_contents(__DIR__ . '/stubs/' . $file);
    }

}
