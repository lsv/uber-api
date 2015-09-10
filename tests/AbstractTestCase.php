<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApiTest;

use Geocoder\Model\Coordinates;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lsv\UberApi\Client\ServerToken;

abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase
{
    protected function getClassName($class)
    {
        return 'Lsv\UberApi\\'.$class;
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
     *
     * @return ServerToken
     */
    protected function getFileResultsHandler($file)
    {
        return $this->createResultMock([
            ['status' => 200, 'body' => self::getReturnStub($file)],
        ]);
    }

    /**
     * @param $code
     *
     * @return Client
     */
    protected function getNullResultsHandler($code)
    {
        if ($code === null) {
            return $this->createResultMock([
                ['status' => 200, 'body' => '[]'],
                ['status' => 200, 'body' => null],
            ]);
        } else {
            return $this->createResultMock([
                ['status' => 200, 'body' => '{"'.$code.'": null}'],
                ['status' => 200, 'body' => '{"'.$code.'": []}'],
            ]);
        }
    }

    /**
     * @param $file
     *
     * @return string
     */
    protected static function getReturnStub($file)
    {
        return file_get_contents(__DIR__.'/stubs/'.$file);
    }

    /**
     * @param array $config
     *
     * @return ServerToken
     */
    protected function getServerTokenClient(array $config = [])
    {
        return new ServerToken(123, $config);
    }

    /**
     * @param array $mockResults
     *
     * @return ServerToken
     */
    protected function createResultMock(array $mockResults)
    {
        $handles = [];
        foreach ($mockResults as $result) {
            $handles[] = new Response($result['status'], [], $result['body']);
        }

        $mock = new MockHandler($handles);
        $handler = HandlerStack::create($mock);

        return $this->getServerTokenClient(['handler' => $handler]);
    }
}
