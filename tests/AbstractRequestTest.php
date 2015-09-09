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

use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\Mock;
use Lsv\UberApi\Request\Estimates\Price;
use Lsv\UberApi\Request\ProductTypes;
use Lsv\UberApiTest\stubs\QueryFailClass;

class AbstractRequestTest extends AbstractTestCase
{
    public function test_fails_when_no_client_set()
    {
        $this->setExpectedException('RuntimeException', 'Client needs to be set before doing any requests');
        (new ProductTypes())->query($this->getCoordinates());
    }

    public function test_class_does_not_overwrite_query()
    {
        $this->setExpectedException('\RuntimeException', 'The method "query" should be overwritten');
        require_once __DIR__.'/stubs/QueryFailClass.php';
        $class = new QueryFailClass();
        $class->query();
    }

    public function test_client_exception()
    {
        $this->setExpectedException('GuzzleHttp\Exception\ClientException', 'https://sandbox-api.uber.com/v1/estimates/price?start_latitude=123&start_longitude=123&end_latitude=123&end_longitude=123 [status code] 401 [reason phrase] Unauthorized');
        $mock = new Mock([
            new Response(401, [], Stream::factory(self::getReturnStub('estimates_price.json'))),
        ]);
        $client = $this->getServerTokenClient();
        $client->getEmitter()->attach($mock);
        (new Price($client, true))->query($this->getCoordinates(), $this->getCoordinates());
    }
}
