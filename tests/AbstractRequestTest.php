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

use Lsv\UberApi\Endpoints\Estimates\Price;
use Lsv\UberApi\Endpoints\ProductTypes;
use Lsv\UberApi\Endpoints\User\Activity;

class AbstractRequestTest extends AbstractTestCase
{
    public function test_fails_when_no_client_set()
    {
        $this->setExpectedException('\RuntimeException', 'Client needs to be set before doing any requests');
        (new ProductTypes())->query($this->getCoordinates());
    }

    public function test_client_exception()
    {
        $this->setExpectedException('GuzzleHttp\Exception\ClientException', 'Client error: 401');
        $client = $this->createResultMock([
            ['status' => 401, 'body' => ''],
        ]);
        (new Price($client, true))->query($this->getCoordinates(), $this->getCoordinates());
    }

    public function test_request_require_oauth()
    {
        $this->setExpectedException('\RuntimeException', 'This request requires a Oauth2 client');
        $client = $this->getServerTokenClient();
        $activity = new Activity($client);
        $activity->query();
    }
}
