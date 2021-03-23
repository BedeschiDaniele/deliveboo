<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dish;
use App\Order;

class RestaurantController extends Controller
{
    private $formValidation = [
        'customer_name' => 'required | max: 60',
        'customer_address' => 'required | max: 80',
        'customer_phone' => 'required | max: 15',
        // 'credit-card-number' => 'required | numeric | max: 16',
        // 'expiration-month' => 'required | numeric',
        // 'expiration-year' => 'required | numeric'
    ];

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

    public function store(Request $request) {
        $data = $request->all();
        $request->validate($this->formValidation);
        //dd($data);
        $newOrder = new Order();
        $newOrder->fill($data);
        $newOrder['order_status'] = 'accepted';
        
        $newOrder->save();
        $count = 0;
        for ($j=0; $j < count($data['quantity']) ; $j++) { 
            $quantity = $data['quantity'][$j];
            for ($i=0; $i < $quantity ; $i++) { 
                $newOrder->dishes()->attach($data['dishes'][$count]);
            }
            $count++;
        }
        
        return view('success');
    }
}
