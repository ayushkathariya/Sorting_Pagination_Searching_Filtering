<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get sorting options from request
        $sortField = $request->query('sort_by', 'title'); // default sorting by title
        $sortOrder = $request->query('order', 'asc');     // default ascending order

        // Get filter options from request
        $filterCategory = $request->query('category', null);
        $minPrice = $request->query('min_price', null);
        $maxPrice = $request->query('max_price', null);

        // Get Search Query
        $searchQuery = $request->query('q', '');

        // Query the products
        $query = Product::query();

        // Apply filters
        if ($filterCategory) {
            $query->where('category_id', $filterCategory);
        }
        if ($minPrice) {
            $query->where('price', '>=', $minPrice);
        }
        if ($maxPrice) {
            $query->where('price', '<=', $maxPrice);
        }

        // Apply Searching
        if ($searchQuery) {
            $query->where('title', 'like', '%' . $searchQuery . '%');
        }

        // Apply sorting
        $products = $query->orderBy($sortField, $sortOrder)->paginate(3);



        // Get categories for the filter dropdown
        $categories = Category::all();

        return view('products.index', compact('products', 'categories', 'sortField', 'sortOrder', 'filterCategory', 'minPrice', 'maxPrice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
