<?php

namespace ApiBundle\Tests\Entity;

use ApiBundle\Entity\Category;
use ApiBundle\Entity\Product;

class ProductTest extends \PHPUnit_Framework_TestCase
{
    public function testGettersAndSetters()
    {
        $category = new Category();
        $product = (new Product())
            ->setId(1234)
            ->setName('foo')
            ->setImage('http://foo.bar/image.png')
            ->setCategory($category)
            ->setPrice(12.34)
            ->setDescription('description');

        $this->assertEquals(1234, $product->getId());
        $this->assertEquals('foo', $product->getName());
        $this->assertEquals('http://foo.bar/image.png', $product->getImage());
        $this->assertEquals($category, $product->getCategory());
        $this->assertEquals(12.34, $product->getPrice());
        $this->assertEquals('description', $product->getDescription());
    }
}
