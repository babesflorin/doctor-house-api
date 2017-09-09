<?php

namespace ApiBundle\Tests\Controller;

use ApiBundle\DataFixtures\ORM\LoadCategoryData;
use ApiBundle\DataFixtures\ORM\LoadProductData;
use ApiBundle\Entity\Category;
use ApiBundle\Entity\Product;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManager;
use JMS\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var Serializer
     */
    private $serializer;

    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();

        $this->entityManager = static::$kernel->getContainer()->get('doctrine')->getManager();
        $this->serializer = static::$kernel->getContainer()->get('jms_serializer');

        $loader = new Loader();
        $loader->addFixture(new LoadCategoryData);
        $loader->addFixture(new LoadProductData);

        $purger = new ORMPurger($this->entityManager);
        $executor = new ORMExecutor($this->entityManager, $purger);
        $executor->execute($loader->getFixtures());
    }

    public function testSwagger()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals(
            'text/html; charset=UTF-8',
            $client->getResponse()->headers->get('Content-Type')
        );
        $this->assertContains(
            'Get a category by id',
            $client->getResponse()->getContent()
        );
        $this->assertContains(
            'Get a list of all categories',
            $client->getResponse()->getContent()
        );
        $this->assertContains(
            'Get a product by id',
            $client->getResponse()->getContent()
        );
        $this->assertContains(
            'Get products list grouped by categories',
            $client->getResponse()->getContent()
        );
    }

    public function testGetCategory()
    {
        $category = $this->entityManager->getRepository(Category::class)->findOneBy([]);
        $client = static::createClient();
        $crawler = $client->request(
            'GET',
            '/v1/category/' . $category->getId()
        );

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals(
            'application/json',
            $client->getResponse()->headers->get('Content-Type')
        );
        $this->assertEquals(
            $this->serializer->serialize($category, 'json'),
            $client->getResponse()->getContent()
        );
    }

    public function testGetCategoryNotFound()
    {
        $category = $this->entityManager->getRepository(Category::class)->findOneBy([]);
        $client = static::createClient();
        $crawler = $client->request(
            'GET',
            '/v1/category/' . ($category->getId() - 1)
        );

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
        $this->assertEquals(
            'application/json',
            $client->getResponse()->headers->get('Content-Type')
        );
    }

    public function testGetCategories()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/v1/category');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals(
            'application/json',
            $client->getResponse()->headers->get('Content-Type')
        );

        $data = $this->serializer->serialize(
            $this->entityManager->getRepository(Category::class)->findAll(),
            'json'
        );

        $this->assertEquals($data, $client->getResponse()->getContent());
    }

    public function testGetProduct()
    {
        $product = $this->entityManager->getRepository(Product::class)->findOneBy([]);
        $client = static::createClient();
        $crawler = $client->request(
            'GET',
            '/v1/product/' . $product->getId()
        );

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals(
            'application/json',
            $client->getResponse()->headers->get('Content-Type')
        );
        $this->assertEquals(
            $this->serializer->serialize($product, 'json'),
            $client->getResponse()->getContent()
        );
    }

    public function testGetProductNotFound()
    {
        $product = $this->entityManager->getRepository(Product::class)->findOneBy([]);
        $client = static::createClient();
        $crawler = $client->request(
            'GET',
            '/v1/product/' . ($product->getId() - 1)
        );

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
        $this->assertEquals(
            'application/json',
            $client->getResponse()->headers->get('Content-Type')
        );
    }

    public function testGetProducts()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/v1/product');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals(
            'application/json',
            $client->getResponse()->headers->get('Content-Type')
        );

        $data = $this->serializer->serialize(
            $this->entityManager->getRepository(Product::class)->findAll(),
            'json'
        );

        $this->assertEquals($data, $client->getResponse()->getContent());
    }
}
