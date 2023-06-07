<?php

namespace App\Http\Controllers\Moderator;

use App\DataTransferObjects\ProductDTO;
use App\Http\Controllers\BaseProductController;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
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
     *     path="/moderator/products",
     *     summary="Product list",
     *     tags={"moderator"},
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
     * @OA\Post(
     *     path="/moderator/products",
     *     summary="Store product",
     *     tags={"moderator"},
     *     description="Store product",
     *     security={{"apiAuth":{}}},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ProductRequest")
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Product",
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
    public function store(StoreRequest $request): ProductResource
    {
        return new ProductResource(
            $this->productService->save(ProductDTO::fromRequest($request->validated()), $this->getAuthUser())
        );
    }

    /**
     * @OA\Get(
     *     path="/moderator/products/{id}",
     *     summary="Product",
     *     tags={"moderator"},
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
     *          response=403,
     *          description="You is not moderator",
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
     * @OA\Put(
     *     path="/moderator/products/{id}",
     *     summary="Product list",
     *     tags={"moderator"},
     *     description="Show all products",
     *     security={{"apiAuth":{}}},
     *     @OA\Parameter(
     *          name="id",
     *          description="product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ProductRequest")
     *     ),
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
    public function update(UpdateRequest $request, Product $product): ProductResource
    {
        return new ProductResource(
            $this->productService->update(ProductDTO::fromRequest($request->validated()), $product)
        );
    }

    /**
     * @OA\Delete(
     *     path="/moderator/products/{id}",
     *     summary="Product",
     *     tags={"moderator"},
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
     *          response=200,
     *          description="Product",
     *          @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *          response=403,
     *          description="You is not moderator",
     *     )
     * )
     */
    public function destroy(Product $product): JsonResponse
    {
        $this->productService->delete($product);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
