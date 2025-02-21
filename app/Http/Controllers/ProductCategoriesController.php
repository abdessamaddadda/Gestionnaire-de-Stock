<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the product categories
        $categories = ProductCategory::all();

        // Return the index view
        return view('product-categories.index')->with('categories', $categories);
    }
    public function create()
    {
        // Return the create view
        return view('product-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate user input
        $this->validate($request, [
          'name' => 'required|min:3|max:150|unique:product_categories'
        ]);

        // Create a new instance of the model
        $category = new ProductCategory;

        $category->name = $request->input('name');

        // Save the new model
        $category->save();

        // Return to the index with a success message
        return redirect('/product-categories')->with('success', 'Product category has been created successfully!');
    }
    public function show($productCategory)
    {
        // Get the product category and its products
        $category = ProductCategory::find($productCategory);
        $products = Product::where('product_category_id', $category->id)->get();

        // Return the show view
        return view('product-categories.show')->with('category', $category)->with('products', $products);
    }
    public function edit($productCategory)
    {
        // Get the product category
        $category = ProductCategory::find($productCategory);

        // Return the edit view
        return view('product-categories.edit')->with('category', $category);
    }
    public function update(Request $request, $productCategory)
    {
        // Get the product category
        $category = ProductCategory::find($productCategory);

        // Validate user input
        $this->validate($request, [
          'name' => 'required|min:3|max:150|unique:product_categories,name,'.$category->id,
        ]);

        // Edit the product category
        $category->name = $request->input('name');

        // Save the changes
        $category->save();

        // Return to index view with success message
        return redirect('/product-categories')->with('success', 'Product category has been edited and changes were saved!');
    }
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
