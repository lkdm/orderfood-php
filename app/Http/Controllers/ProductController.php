<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Manufacturer;

class ProductController extends Controller
{
    // Why did this not automatically generate?

    function __construct() {
        // Use Middleware auth except to restrict all of ProductController, except the following methods:
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    public function index() {
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }
    public function show($id) {
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }
    public function create() {
        /*
         *  Displays a view, with a form for product creation.
         */

        // Provide the view with a list of manufactuerers
        return view('products.create_form')->with('manufacturers', Manufacturer::all());
    }
    public function store(Request $request) {
        /*
         *  Creates a new product
         */

        // Guards: Input validation
        $this->validate($request, [
            'name'=>'required|max:255',
            'price'=>'required|numeric',
            'manufacturer'=>'exists:manufacturers,id'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->manufacturer_id = $request->manufacturer;
        $product->save();
        return redirect("product/$product->id");

    }
    public function edit($id) {
        $product = Product::find($id);

        // Need to also pass in Manufacturer
        return view('products.edit_form')->with('product', $product)->with('product', $product)->with('manufacturers', Manufacturer::all());
    }
    public function update(Request $request, $id) {
        /*
         *  Updates an existing product
         */

        // Guards: Input validation
        $this->validate($request, [
            'name'=>'required|max:255',
            'price'=>'required|numeric|min:1',
            'manufacturer'=>'exists:manufacturers,id'
        ]);
        // Pass the request object in
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->manufacturer_id = $request->manufacturer;
        $product->save();
        return redirect("product/$product->id");

    }
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect("product");
    }
}
