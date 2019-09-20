<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RestaurantController extends Controller
{
    /**
     * List all restaurants with dishes.
     */
    public function index()
    {
        // $restaurants = User::all()->where('role', '=', 'restaurant');
        $restaurants = User::has('dishes')
            ->with('dishes')->get();
        dd($restaurants);
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
}
