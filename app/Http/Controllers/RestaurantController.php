<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RestaurantController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function show($slug) {
        $restaurant = User::where('slug',$slug)->firstOrFail();
        return view('restaurant', compact('restaurant'));
    }

    public function checkout($slug) {
        $restaurant = User::where('slug',$slug)->firstOrFail();
        return view('checkout', compact('restaurant'));
    }



}
