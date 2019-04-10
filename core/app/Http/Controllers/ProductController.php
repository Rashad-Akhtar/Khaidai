<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Validator;

class ProductController extends Controller
{
    //product
    public function products()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.product.index',compact('products','categories'));
    }

    public function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'expiry_date' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'expiry_date' => $request->expiry_date,
            'description' => $request->description,
        ]);

        return back()->with('success','Product Created Successfully');
    }

    public function updateProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'expiry_date' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::find($request->id);

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->expiry_date = $request->expiry_date;
        $product->description = $request->description;   

        $product->save();

        return back()->with('success','Product Updated Successfully');
    }

    public function stock()
    {
        $products = Product::all();
        return view('admin.product.stock',compact('products'));
    }

    public function updateStock(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stock' => 'numeric|required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::find($request->id);
        $product->stock = $request->stock;

        $product->save();

        return back()->with('success','Stock Updated Successfully');
    }

    public function sales()
    {
        $products = Product::where('stock','>','0')->get();
        $cart = session()->has('cart') ? session()->get('cart') : [];
        $total = array_sum(array_column($cart,'total_price'));
        if($total > 1000)
        {
            $discount = ($total * 2.5) / 100;
            $grand_total = $total - $discount; 
        }
        else
        {
            $discount = 0;
            $grand_total = $total;
        }

        return view('admin.product.sales',compact('products','cart','total','discount','grand_total'));
    }
}
