<?php

namespace App\Http\Controllers;



use Illuminate\View\View;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function  index(): view
    {

        // $products = Product::orderBy('id', 'desc')->get();
        $products = Product::paginate(4);
        $total = Product::count();

        return view(
            'home',
            compact('products', 'total')
        );
    }
    public function  create()
    {
        return view('create');
    }
    public function  save(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);
        $data = Product::create($validation);
        if($data){
            session()->flash('success', 'Produit ajouté avec succès');
            return redirect(route('home'));
        }else{
            session()->flash('error', 'Some problem occure');
            return redirect(route('create')); 
        }

    }

    
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('update', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $title = $request->title;
        $category = $request->category;
        $price = $request->price;

        
        $products->title = $title;
        $products->category = $category;
        $products->price = $price;

        $validation = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);
        $data = $products->save($validation);
        if ($data) {
            session()->flash('success', 'Mise à jour du produit réussie');
            return redirect(route('home'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('update'));
        }
    }



    public function delete($id)
    {
        $products = Product::findOrFail($id)->delete();
        if ($products) {
            session()->flash('success', 'Produit supprimé avec succès');
            return redirect(route('home'));
        } else {
            session()->flash('error', 'Product Not Delete successfully');
            return redirect(route('home'));
        }
    }
}
