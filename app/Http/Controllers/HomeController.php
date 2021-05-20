<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

// enum para ordenar
abstract class SortBy
{
    const CREATED_AT = 0;
    const PRICE = 1;
    const NAME = 2;
}

// enum para dirección
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
            'maxPrice' => 'nullable|numeric|min:0',
            'cat' => 'nullable'
        ]);

        // Recibir colección de productos 
        // (llama a función privada que está definida debajo)
        $products = $this->prepareProductsQuery($req)->paginate(3);
        $categories = Category::all();

        return view('home', ['products' => $products, 'cats' => $categories]);
    }

    /*
     * Tratamiento del query builder de modelo
     *
     * Se encarga de preparar todo el tema de filtrar y 
     * ordenar en el queryBuilder de modelo
     *
     */
    private function prepareProductsQuery(Request $req) {
        // Inicializamos ProductQueryBuilder
        $productsBuilder = Product::query();

        // Filtramos por categoría el query si está presente
        if($req->cat) {
            $productsBuilder = $productsBuilder
                                    ->where("category_id", $req->cat);
        }

        // Filtramos por búsqueda el query
        if($req->search) {
            $productsBuilder = $productsBuilder
                                    ->where("name", "LIKE", "%".$req->search."%")
                                    ->orWhere("description", "LIKE", "%".$req->search."%");
        }

        // Filtramos por precios mínimo y máximo
        if($req->minPrice) {
            $productsBuilder = $productsBuilder->where("price", ">=", $req->minPrice);
        }
        if($req->maxPrice) {
            $productsBuilder = $productsBuilder->where("price", "<=", $req->maxPrice);
        }

        // Ordering query
        $sortDirection = ($req->desc ? "desc" : "asc");
        switch($req->sortBy){
            case SortBy::CREATED_AT :
                $productsBuilder = $productsBuilder->orderBy("created_at", $sortDirection);
                break;
            case SortBy::PRICE :
                $productsBuilder = $productsBuilder->orderBy("price", $sortDirection);
                break;
            case SortBy::NAME :
                $productsBuilder = $productsBuilder->orderBy("name", $sortDirection);
                break;
        }

        return $productsBuilder;

    }
}
