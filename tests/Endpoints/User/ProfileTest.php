<?php

/*
 * This file is part of the Lsv\UberApi package
 *
 * (c) Martin Aarhof <martin.aarhof@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Endpoints\User;

use Lsv\UberApi\Endpoints\User\Profile;
use Lsv\UberApiTest\AbstractTestCase;

class ProfileTest extends AbstractTestCase
{
    private function getRequest()
    {
        return new Profile($this->getFileResultsHandler('profile.json', true), true);
    }

    public function test_method_url()
    {
        $request = $this->getRequest();
        $request->query();
        $req = $request->getRequest();

        self::assertEquals('GET', $req->getMethod());
        self::assertEquals('/v1/me', $req->getUri()->getPath());
    }

    public function test_type_getter()
    {
        $result = $this->getRequest()->query();

        self::assertEquals('Uber', $result->getFirstName());
        self::assertEquals('Developer', $result->getLastName());
        self::assertEquals('developer@uber.com', $result->getEmail());
        self::assertEquals('https://d1w2poirtb3as9.cloudfront.net/default.jpeg', $result->getPicture());
        self::assertEquals('teypo', $result->getPromoCode());
        self::assertEquals('91d81273-45c2-4b57-8124-d0165f8240c0', $result->getUuid());
    }
}
