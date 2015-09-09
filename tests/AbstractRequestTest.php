<?php
namespace Lsv\UberApiTest;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
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
        require_once __DIR__ . '/stubs/QueryFailClass.php';
        $class = new QueryFailClass();
        $class->query();
    }

    public function test_client_exception()
    {
        $this->setExpectedException('GuzzleHttp\Exception\ClientException', 'Client error: 401');
        $mock = new MockHandler([
            new Response(401, [], self::getReturnStub('estimates_price.json'))
        ]);
        $client = new Client(['handler' => HandlerStack::create($mock)]);
        (new Price($client, 123, true))->query($this->getCoordinates(), $this->getCoordinates());
    }

}
