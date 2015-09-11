<?php
namespace Lsv\UberApiTest\Endpoints\Request;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lsv\UberApi\Endpoints\Request\Cancel;
use Lsv\UberApiTest\AbstractTestCase;

class CancelTest extends AbstractTestCase
{

    private function getRequest()
    {
        $mock = new MockHandler([
            new Response(204, [], 'Success')
        ]);
        $handler = HandlerStack::create($mock);
        $client = $this->getOauthClient(['handler' => $handler]);
        return new Cancel($client, true);
    }

    public function test_method_url()
    {
        $key = 789654123;
        $request = $this->getRequest();
        $request->query($key);
        $req = $request->getRequest();

        $this->assertEquals('DELETE', $req->getMethod());
        $this->assertEquals('/v1/requests/' . $key, $req->getUri()->getPath());
    }

    public function test_can_cancel()
    {
        $request = $this->getRequest()->query(123);
        $this->assertEquals('[204] Success', $request);
    }

}