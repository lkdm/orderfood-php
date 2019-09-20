<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dish;

class RestaurantController extends Controller
{
    /**
     * List all restaurants with dishes.
     */
    public function index()
    {
        // Only retrieve restaurants with dishes
        $restaurants = User::has('dishes')->with('dishes')->get();
        return view('restaurants.index')->with('restaurants', $restaurants);
    }
    /**
     * Display the restaurant
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = User::find($id);
        $dishes = Dish::all()->where('user_id', '=', $id);
        return view('restaurants.show')->with('restaurant', $restaurant)->with('dishes', $dishes);
    }
}
