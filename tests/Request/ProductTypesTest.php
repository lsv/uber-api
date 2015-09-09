<?php
namespace Lsv\UberApiTest\Request;

use Lsv\UberApi\Request\ProductTypes;
use Lsv\UberApiTest\AbstractTestCase;

class ProductTypesTest extends AbstractTestCase
{

    private function getProductTypes()
    {
        return new ProductTypes($this->getFileResultsHandler('producttypes.json'), 123, true);
    }

    public function test_null_results()
    {
        $client = $this->getNullResultsHandler('products');

        $results = (new ProductTypes($client, 123, true))->query($this->getCoordinates());
        $this->assertEquals(0, count($results));
        $results = (new ProductTypes($client, 123, true))->query($this->getCoordinates());
        $this->assertEquals(0, count($results));
    }

    public function test_count_results()
    {
        $results = $this->getProductTypes()->query($this->getCoordinates());
        $this->assertEquals(5, count($results));
    }

    /**
     * @depends test_count_results
     */
    public function test_type_getter()
    {
        $results = $this->getProductTypes()->query($this->getCoordinates());
        $detail = $results[0];

        $this->assertEquals(4, $detail->getCapacity());
        $this->assertEquals('The low-cost Uber', $detail->getDescription());
        $this->assertInstanceOf($this->getClassName('Entity\Product\PriceDetail'), $detail->getPriceDetails());
        $this->assertEquals('http://d1a3f4spazzrp4.cloudfront.net/car.jpg', $detail->getImage());
        $this->assertEquals('uberX', $detail->getDisplayName());
        $this->assertEquals('a1111c8c-c720-46c3-8534-2fcdd730040d', $detail->getProductId());
    }

    /**
     * @depends test_type_getter
     */
    public function test_pricedetails_getter()
    {
        $results = $this->getProductTypes()->query($this->getCoordinates());
        $detail = $results[0]->getPriceDetails();

        $this->assertEquals('mile', $detail->getDistanceUnit());
        $this->assertEquals(0.26, $detail->getCostPerMinute());
        $this->assertEquals(1, count($detail->getServiceFees()));
        $this->assertEquals(5, $detail->getMinimum());
        $this->assertEquals(1.3, $detail->getCostPerDistance());
        $this->assertEquals(2.2, $detail->getBase());
        $this->assertEquals(5, $detail->getCancellationFee());
        $this->assertEquals('USD', $detail->getCurrencyCode());
    }

    /**
     * @depends test_pricedetails_getter
     */
    public function test_servicefee_getter()
    {
        $results = $this->getProductTypes()->query($this->getCoordinates());
        $detail = $results[0]->getPriceDetails()->getServiceFees()[0];

        $this->assertEquals('Safe Rides Fee', $detail->getName());
        $this->assertEquals(1, $detail->getFee());
    }

    /**
     * @depends test_count_results
     */
    public function test_nullable_servicefee()
    {
        $results = $this->getProductTypes()->query($this->getCoordinates());
        $detail = $results[2]->getPriceDetails()->getServiceFees();

        $this->assertEquals(0, count($detail));
    }

    /**
     * @depends test_count_results
     */
    public function test_nullable_pricedetails()
    {
        $results = $this->getProductTypes()->query($this->getCoordinates());
        $detail = $results[4];

        $this->assertNull($detail->getPriceDetails());
    }

}
