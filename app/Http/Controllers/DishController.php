<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
// User is used to get Restaurant details
use App\User;

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
            'index'
        ]]);
    }
    public function index()
    {
        // TODO: Add with "approved = True"
        $dishes = Dish::all();
        return view('dishes.index')->with('dishes', $dishes);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show the dish
        $dish = Dish::find($id);
        // TODO: This is probably working correctly without this line. It's probably to do with your seeder.
        // $dish->restaurant = User::find($dish->restaurant_id);
        // dd($dish);
        return view('dishes.show')->with('dish', $dish);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
