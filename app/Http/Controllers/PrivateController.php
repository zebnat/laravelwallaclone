<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PrivateController extends Controller
{
    public function show() {
        $user = User::find(auth()->id());
        $products = $user->products;
        return view('private', ['products' => $products]);
    }
}
