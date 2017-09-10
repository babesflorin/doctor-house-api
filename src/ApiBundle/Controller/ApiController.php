<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Category;
use ApiBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Rest\Post("statistics")
     * @Rest\View()
     * @ApiDoc(
     *     resource=true,
     *     section="statistics",
     *     description="Post products statistics",
     * )
     */
    public function postStatistics(Request $request)
    {
        $redis = $this->container->get('snc_redis.default');
        $productIds = json_decode($request->getContent(), true);

        foreach ($productIds as $id) {
            $redis->set(sprintf('product:%s:last_hit', $id), time());
            $redis->incr(sprintf('product:%s:hits', $id));
            $redis->lpush(sprintf('product:%s:user_data', $id), ['user']);
        }

        return ['message' => 'statistics processed'];
    }

    /**
     * @Rest\Get(
     *     path="statistics/{id}",
     *     requirements={"id": "\d+"}
     * )
     * @Rest\View()
     * @ApiDoc(
     *     resource=true,
     *     section="statistics",
     *     description="Get product statistics",
     * )
     */
    public function getStatistics($id)
    {
        $redis = $this->container->get('snc_redis.default');

        return [
            'last_hit' => $redis->get(sprintf('product:%s:last_hit', $id)),
            'hits' => $redis->get(sprintf('product:%s:hits', $id)),
            'user_data' => $redis->lrange(sprintf('product:%s:user_data', $id), 0, -1),
        ];
    }
}
