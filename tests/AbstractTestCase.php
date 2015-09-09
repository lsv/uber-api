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
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\Mock;
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
     * @return Client
     */
    protected function getFileResultsHandler($file)
    {
        $mock = new Mock([
            new Response(200, [], Stream::factory(self::getReturnStub($file))),
        ]);
        $client = $this->getServerTokenClient();
        $client->getEmitter()->attach($mock);
        return $client;
    }

    /**
     * @param $code
     *
     * @return Client
     */
    protected function getNullResultsHandler($code)
    {
        if ($code === null) {
            $mock = new Mock([
                new Response(200, [], Stream::factory('[]')),
                new Response(200, [], Stream::factory('null')),
            ]);
        } else {
            $mock = new Mock([
                new Response(200, [], Stream::factory('{"'.$code.'": null}')),
                new Response(200, [], Stream::factory('{"'.$code.'": []}')),
            ]);
        }

        $client = $this->getServerTokenClient();
        $client->getEmitter()->attach($mock);
        return $client;
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
     * @return ServerToken
     */
    protected function getServerTokenClient()
    {
        return new ServerToken(123);
    }
}
