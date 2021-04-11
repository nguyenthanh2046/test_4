<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $products = Product::all();
        return view('modules.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.products.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('products', 'name'),
            ],
            'sku' => [
                'required',
                Rule::unique('products', 'sku')
            ],
            'category_id' => [
                'required'
            ],
            'price' => [
                'required'
            ]
        ], [], ['category_id' => 'category']);

        try {
            DB::beginTransaction();

            $requestDatas = $request->all();
            $imageData = $requestDatas['image'] ?? null;
            if ($imageData) {
                unset($requestDatas['image']);
                $imageData = (new Product)->getProducImageData($imageData);

                $requestDatas['original_name'] = $imageData['original_name'];
                $requestDatas['file_name'] = $imageData['file_name'];
            }

            $product = Product::create($requestDatas);

            $categoryIds = $requestDatas['category_id'];
            $product->categories()->attach($categoryIds);

            DB::commit();

            $redirectUrl = route('products.index');

            return response()->json(['redirect_url' => $redirectUrl]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit(Product $product)
    {
        return view('modules.products.form', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, Product $product): JsonResponse
    {
        $this->validate($request,
            [
                'name' => [
                    'required',
                    Rule::unique('products', 'name')->ignoreModel($product, 'name'),
                ],
                'sku' => [
                    'required',
                    Rule::unique('products', 'sku')->ignoreModel($product, 'sku')
                ],
                'category_id' => [
                    'required'
                ],
                'price' => [
                    'required'
                ]
            ], [], ['category_id' => 'category']);

        try {
            DB::beginTransaction();

            $requestDatas = $request->all();
            $imageData = $requestDatas['image'] ?? null;
            if ($imageData) {
                unset($requestDatas['image']);
                $imageData = $product->getProducImageData($imageData);

                $requestDatas['original_name'] = $imageData['original_name'];
                $requestDatas['file_name'] = $imageData['file_name'];
            }

            $product->update($requestDatas);
            $categoryIds = $requestDatas['category_id'];
            $product->categories()->sync($categoryIds);

            DB::commit();

            $redirectUrl = route('products.index');

            return response()->json(['redirect_url' => $redirectUrl]);

        } catch (\Exception $e) {
            DB::rollBack();

            return $this->errorResponse($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product): JsonResponse
    {
        try {
            DB::beginTransaction();
            $product->delete();
            $product->categories()->detach();
            DB::commit();

            return $this->asJson([
                'message' => __('Data deleted successfully'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e);
        }
    }

    public function searchProductByCategory(Request $request): JsonResponse
    {
        $categoryId = (int)$request->category_id;
        $subCategoryIds = (new Category)->getSubCategoryIds($categoryId, [$categoryId]);
       if($categoryId){
           $products =  Product::whereHas(
               'categories' , function ($query) use ($subCategoryIds) {
               $query->whereIn('category_id', $subCategoryIds);
           })->get();
       }else{
           $products =  Product::all();
       }

        return $this->asJson([
            'dataTables' => view('.modules.products._table_product_content', ['products' => $products])->render(),
        ]);
    }
}
