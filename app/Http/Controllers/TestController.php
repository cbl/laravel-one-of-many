<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class TestController
{
    public function __invoke()
    {
        $this->userLoginExample();
        $this->userStateExample();
        $this->productPriceExample();

        return view('welcome');
    }

    public function userLoginExample()
    {
        // The latest created login for the user.

        $users = User::with('latest_login')->get();
        $users->first()->latest_login()->get();
        $users->first()->latest_login()->exists();
        $users->first()->latest_login()->count();
    }

    public function userStateExample()
    {
        // The `current_state` relation is the latest created state for the model.

        User::with('current_state')->get();
        User::whereHas('current_state', function ($q) {
            $q->where('state', 'active');
        })->get();
    }

    public function productPriceExample()
    {
        // The `price` relation is last published price for the product.

        Product::with('price')->get();
    }
}
