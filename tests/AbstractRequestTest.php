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

use Lsv\UberApi\Request\Estimates\Price;
use Lsv\UberApi\Request\ProductTypes;
use Lsv\UberApiTest\stubs\QueryFailClass;

class AbstractRequestTest extends AbstractTestCase
{
    public function test_fails_when_no_client_set()
    {
        $this->setExpectedException('\RuntimeException', 'Client needs to be set before doing any requests');
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
        $this->setExpectedException('GuzzleHttp\Exception\ClientException', 'Client error: 401');
        $client = $this->createResultMock([
            ['status' => 401, 'body' => '']
        ]);
        (new Price($client, true))->query($this->getCoordinates(), $this->getCoordinates());
    }
}
