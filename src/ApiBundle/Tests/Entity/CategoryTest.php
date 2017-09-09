<?php

namespace ApiBundle\Tests\Entity;

use ApiBundle\Entity\Category;

class CategoryTest extends \PHPUnit_Framework_TestCase
{
    public function testGettersAndSetters()
    {
        $category = (new Category())->setId(1234)->setName('foo');

        $this->assertEquals(1234, $category->getId());
        $this->assertEquals('foo', $category->getName());
        $this->assertEquals([], $category->getProducts());
    }
}
