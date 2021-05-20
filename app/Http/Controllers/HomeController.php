<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

abstract class SortBy
{
    const CREATED_AT = 0;
    const PRICE = 1;
    const NAME = 2;
}

abstract class SortDirection
{
    const ASC = 0;
    const DESC = 1;
}

class HomeController extends Controller
{
    public function index(Request $req) {
        $req->validate([
            'minPrice' => 'nullable|numeric|min:0',
            'maxPrice' => 'nullable|numeric|min:0'
        ]);

        $products = Product::all();

        // filtra nombre
        if($req->search) {
            $products = $products->filter(function($element, $key) use($req) {
                $filter = (str_contains(strtolower($element->name), strtolower($req->search)) ||
                    str_contains(strtolower($element->description), strtolower($req->search)));

                return $filter;
            });
        }

        // filtra precio
        if($req->minPrice) {
            $products = $products->filter(function($element, $key) use($req) {
                return $element->price >= $req->minPrice;
            });
        }

        if($req->maxPrice) {
            $products = $products->filter(function($element, $key) use($req) {
                return $element->price <= $req->maxPrice;
            });
        }

        // Ordenación
        if($req->sortBy == SortBy::CREATED_AT) {
            $products = (SortDirection::DESC == $req->desc ?
                $products->sortByDesc('created_at') :
                $products->sortBy('created_at'));
        }elseif($req->sortBy == SortBy::PRICE) {
            $products = (SortDirection::DESC == $req->desc ?
                $products->sortByDesc('price') :
                $products->sortBy('price'));
        }elseif($req->sortBy == SortBy::NAME) {
            $products = (SortDirection::DESC == $req->desc ?
                $products->sortByDesc('name') :
                $products->sortBy('name'));
        }

        if($req->sortBy == SortBy::NAME) {
            $products->sortBy('name');
        }

        return view('home', ['products' => $products]);
    }
}
