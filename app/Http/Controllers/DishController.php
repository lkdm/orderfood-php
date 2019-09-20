<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\User;
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

        // Guard: Only restaurants can create new dishes.
        if (Auth::user()->role != "restaurant") {
            return redirect('/');
        }

        // Guards: Input validation
        $this->validate($request, [
            'name'=>'required|max:255',
            'price'=>'required|numeric|digits_between:0,9999',
            'photo'=>'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $dish = new Dish();
        $dish->name = $request->name;
        $dish->price = $request->price;
        $dish->photo = $request->photo;
        $dish->approved = 0;
        // TODO: Check for unique name
        $dish->restaurant_id = Auth::user()->id;
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
        //
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
        //
    }

    /**
     * Remove the dish
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
