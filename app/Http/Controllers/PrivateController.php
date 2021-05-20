<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class PrivateController extends Controller
{
    public function show() {
        $user = User::find(auth()->id());
        $products = $user->products;
        return view('private', ['products' => $products]);
    }

    public function create() {
        $categories = Category::all();
        return view('create_product', ['cats' => $categories]);
    }
}
