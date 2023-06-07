<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BaseProductController;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\Moderator\ProductService;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Response;

final class ProductController extends BaseProductController
{
    public function __construct(readonly private ProductService $productService)
    {
    }

    /**
     * @OA\Get(
     *     path="/client/products",
     *     summary="Product list",
     *     tags={"client"},
     *     description="Show all products",
     *     security={{"apiAuth":{}}},
     *     @OA\Response(
     *          response=200,
     *          description="Products All",
     *          @OA\JsonContent(ref="#/components/schemas/ProductResource")
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *          response=403,
     *          description="You is not moderator",
     *     ),
     * )
     */
    public function index(): ProductCollection
    {
        return new ProductCollection($this->productService->getAll());
    }

    /**
     * @OA\Get(
     *     path="/client/products/{id}",
     *     summary="Product",
     *     tags={"client"},
     *     description="Show one products",
     *     security={{"apiAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *          response=204,
     *          description="Product",
     *          @OA\JsonContent(ref="#/components/schemas/ProductResource")
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="Not found",
     *     )
     * )
     */
    public function show(Product $product): ProductResource
    {
        return new ProductResource($this->productService->show($product));
    }

    /**
     * @OA\Post(
     *     path="/client/products/{id}",
     *     summary="Product",
     *     tags={"client"},
     *     description="Buy product",
     *     security={{"apiAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *          response=204,
     *          description="the product is bought",
     *          @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="Not found",
     *     )
     * )
     */
    public function buy(Product $product): JsonResponse
    {
        $this->productService->buy($product, $this->getAuthUser());

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
