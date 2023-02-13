<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Symfony\Component\Console\Input\Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        //dd($input['desc']);

        if (Category::where('desc', $input['desc'])->exists()) {
            $categories = Category::all();
            (session()->flash('success', null));
            session()->flash('error', 'Categoria NÃO adicionada, já existe !');
            return view('pages.product.create', compact('categories'));
        }

        Category::create($input);
        $categories = Category::all();
        $suppliers = Fornecedor::all();
        (session()->flash('error', null));
        session()->flash('success', 'Categoria adicionada com sucesso!');
        return view('pages.product.create', compact('categories', 'suppliers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        // dd($request['id']);
        Category::destroy($request['id']);

        $categories = Category::all();
        $suppliers = Fornecedor::all();
        session()->flash('success', null);
        session()->flash('error', 'Categoria Deletada!');
        return view('pages.product.create', compact('categories', 'suppliers'));
    }
}