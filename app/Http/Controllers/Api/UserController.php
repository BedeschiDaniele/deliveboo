<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Category;

class UserController extends Controller
{
    //Api restaurants with categories  
    public function restaurants() {
        $users = User::with(['categories'])->get();
        return response()->json($users);
    }

    //Api categories  
    public function categories() {
        $categories = Category::all();
        return response()->json($categories);
    }
}
