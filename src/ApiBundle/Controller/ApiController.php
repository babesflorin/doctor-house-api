<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Category;
use ApiBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ApiController extends Controller
{
    /**
     * @Rest\Get(
     *     path="category/{id}",
     *     requirements={"id": "\d+"}
     * )
     * @Rest\View()
     * @ApiDoc(
     *     resource=true,
     *     section="category",
     *     description="Get a category by id",
     * )
     */
    public function getCategoryAction($id)
    {
        $category = $this->getDoctrine()->getRepository(Category::class)->find($id);

        if (is_null($category)) {
            throw new NotFoundHttpException(sprintf('Category with id %s not found', $id));
        }

        return $category;
    }

    /**
     * @Rest\Get("category")
     * @Rest\View()
     * @ApiDoc(
     *     resource=true,
     *     section="category",
     *     description="Get a list of all categories",
     * )
     */
    public function getCategoriesAction()
    {
        return $this->getDoctrine()->getRepository(Category::class)->findAll();
    }

    /**
     * @Rest\Get(
     *     path="product/{id}",
     *     requirements={"id": "\d+"}
     * )
     * @Rest\View()
     * @ApiDoc(
     *     resource=true,
     *     section="product",
     *     description="Get a product by id",
     * )
     */
    public function getProductAction($id)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);

        if (is_null($product)) {
            throw new NotFoundHttpException(sprintf('Product with id %s not found', $id));
        }

        return $product;
    }

    /**
     * @Rest\Get("product")
     * @Rest\View()
     * @ApiDoc(
     *     resource=true,
     *     section="product",
     *     description="Get products list grouped by categories",
     * )
     */
    public function getProductsAction()
    {
        return $this->getDoctrine()->getRepository(Product::class)->findAll();
    }
}
