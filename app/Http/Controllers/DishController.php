<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // Add exceptions to middleware
        // TODO: Add different permissions for customer and restaurant
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }
    public function index()
    {
        // TODO: Add pagination to view

        // TODO: Get count of all orders
        // TODO: Order by Order qty

        $dishes = Dish::where('approved', 'LIKE', 1)->orderBy('name')->simplePaginate(5);
        return view('dishes.index')->with('dishes', $dishes);
    }
    /**
     * Show the form for creating a dish
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Guard: Only restaurants can create new dishes.
        if (Auth::user()->role != "restaurant") {
            return redirect('/');
        }

        return view('dishes.create');
    }

    /**
     * Store a newly created dish in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
         *  Creates a new dish
         *  Accepts a maximum of 2MB for photo
         */

        $restaurant_id = Auth::user()->id;

        // Guard: Only restaurants can create new dishes.
        if (Auth::user()->role != "restaurant") {
            return redirect('/');
        }

        // Guards: Input validation
        $this->validate($request, [
            'name'=>'required|min:8|max:255',
            'price'=>'required|numeric|digits_between:0,9999',
            'photo'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Guard: Check for unique name
        $similar = Dish::whereRaw('Name LIKE ? AND restaurant_id = ?', array($request->name, $restaurant_id))->count();
        if ($similar != 0) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'name' => ['You already have a dish with the same name in your restaurant.']
             ]);
             throw $error;
        }

        // Create a new dish and map its details
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->price = $request->price;
        $dish->photo = $request->photo;
        $dish->approved = 0;
        $dish->restaurant_id = $restaurant_id;

        $dish->save();
        return redirect("dish/$dish->id");
    }

    /**
     * Display the dish
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish = Dish::find($id);
        return view('dishes.show')->with('dish', $dish);
    }

    /**
     * Show the form for editing the dish
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Guard: Only restaurants can edit dishes.
        if (Auth::user()->role != "restaurant") {
            return redirect('/');
        }

        return view('dishes.edit');
    }

    /**
     * Update the dish
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $restaurant_id = Auth::user()->id;

        // Guard: Only restaurants can update dishes.
        if (Auth::user()->role != "restaurant") {
            return redirect('/');
        }

        // Guards: Input validation
        $this->validate($request, [
            'name'=>'required|min:8|max:255',
            'price'=>'required|numeric|digits_between:0,9999',
            'photo'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Guard: Check for unique name
        $similar = Dish::whereRaw('Name LIKE ? AND restaurant_id = ?', array($request->name, $restaurant_id))->count();
        if ($similar != 0) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'name' => ['You already have a dish with the same name in your restaurant.']
             ]);
             throw $error;
        }

        // Update the existing dish and map its details
        $dish = Dish::findOrFail($id);
        $dish->name = $request->name;
        $dish->price = $request->price;
        $dish->photo = $request->photo;

        // For the sake of development, updates are automatically approved.
        // TODO: Upon production release, change this to 0.
        $dish->approved = 1;

        // Updating the restaurant_ID should never be necessary.
        // $dish->restaurant_id = $restaurant_id;

        $dish->save();
        return redirect("dish/$dish->id");
    }

    /**
     * Remove the dish
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Guard: Only restaurants can destroy dishes.
        if (Auth::user()->role != "restaurant") {
            return redirect('/');
        }

        $dish = Dish::findOrFail($id);
        $dish->delete();
        return redirect("dish");
    }

    /**
     * Admin-only: Approve the dish
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        // Guard: Only admins can approve dishes.
        if (Auth::user()->role != "administrator") {
            return redirect('/');
        }
        // Check that dish exists
        // Approve the dish
    }
}
