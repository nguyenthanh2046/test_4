<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('modules.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        return view('modules.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('categories', 'name')
            ],
        ]);
        try {
            DB::beginTransaction();

            $requestDatas = $request->all();

            Category::create($requestDatas);

            DB::commit();

            $redirectUrl = route('categories.index');

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
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit(Category $category)
    {
        return view('modules.categories.form', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category $category
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Category $category): JsonResponse
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('categories', 'name')->ignoreModel($category, 'name')
            ],
        ]);

        try {
            DB::beginTransaction();

            $requestDatas = $request->all();
            $category->update($requestDatas);

            DB::commit();

            $redirectUrl = route('categories.index');

            return response()->json(['redirect_url' => $redirectUrl]);

        } catch (\Exception $e) {
            DB::rollBack();

            return $this->errorResponse($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        try {
            $category->delete();

            return $this->asJson([
                'message' => __('Data deleted successfully'),
            ]);
        } catch (\Exception $e) {
            return $this->errorResponse($e);
        }
    }

    public function list(Request $request, Category $category = null): array
    {
        $subCategoryIds = [];
        if ($category) {
            $subCategoryIds = $category->getSubCategoryIds($category->id, [$category->id]);
        }
        $searchName = $request->q;
        $categories = Category::where('name', 'like', "%$searchName%")->whereNotIN('id', $subCategoryIds)->select('id', 'name')->get()->toArray();
        return ['items' => $categories];
    }
}
