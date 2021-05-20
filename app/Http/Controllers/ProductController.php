<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Product;
use App\Models\Photo;

class ProductController extends Controller
{
    public function show($id) {
        $p = Product::find($id);

        // @todo only if you are not the owner
        $p->visits = $p->visits + 1;
        $p->save();

        return view('product', ['product' => $p, 'photos' => $p->photos]);
    }

    public function create(Request $req) {
        $req->validate([
            'productName' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|between:0,1000000',
            'img1' => 'required|file|image',
            'category' => 'required'
        ]);

        $mandatoryFile = $req->file('img1');

        $p = new Product;
        $p->name = $req->productName;
        $p->description = $req->description;
        $p->price = $req->price;
        $p->visits = 0;
        $p->category_id = 1; // @TODO undo this hardcoded category
        $p->user_id = auth()->id();
        $p->save();

        $this->storePhoto($mandatoryFile, $p->id, 1); // main photo

        $this->storePhoto($req->file('img2'), $p->id, 0);
        $this->storePhoto($req->file('img3'), $p->id, 0);

        return redirect(route('private'));
    }

    private function storePhoto(?UploadedFile $f, $productId, $isMain){
        if($f !== null) {
            $p = new Photo;
            $p->extension = $f->extension();
            $p->is_main = $isMain;
            $p->product_id = $productId;
            $p->save();

            $f->storeAs('public/photos', $p->id . "." . $p->extension);
        }
    }

    public function edit($id) {
        $p = Product::find($id);

        return view('edit_product', ['product' => $p]);
    }

    public function update(Request $req, $id) {
        $req->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|between:0,1000000'
        ]);

        $p = Product::find($id);
        $p->name = $req->name;
        $p->description = $req->description;
        $p->price = $req->price;
        $p->save();

        return redirect(route('edit_product', $p->id));
    }

    public function remove($id) {
        $p = Product::find($id);
        $p->delete();

        return redirect(route('private'));
    }
}
