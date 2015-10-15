<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lsv\UberApiTest\Endpoints\Request;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lsv\UberApi\Endpoints\Request\Cancel;
use Lsv\UberApi\Entity\Request\Detail;
use Lsv\UberApiTest\AbstractTestCase;

class CancelTest extends AbstractTestCase
{
    private function getRequest()
    {
        $mock = new MockHandler([
            new Response(204, [], 'Success'),
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

        self::assertEquals('DELETE', $req->getMethod());
        self::assertEquals('/v1/requests/'.$key, $req->getUri()->getPath());
    }

    public function test_by_detail()
    {
        $detail = new Detail(123);
        $request = $this->getRequest()->queryByDetail($detail);
        self::assertTrue($request);
    }

    public function test_can_cancel()
    {
        $request = $this->getRequest()->query(123);
        self::assertTrue($request);
    }

    public function test_cannot_cancel()
    {
        $mock = new MockHandler([
            new Response(202, [], 'Error'),
        ]);
        $handler = HandlerStack::create($mock);
        $client = $this->getOauthClient(['handler' => $handler]);
        $cancel = new Cancel($client, true);

        $request = $cancel->query(123);
        self::assertEquals($request, '[202] Error');
    }

}
