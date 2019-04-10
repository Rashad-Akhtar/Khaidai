<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use Validator;
use App\Sale;
use App\SaleProduct;

class SalesController extends Controller
{
    public function addCart(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required',
            'quantity' => 'numeric|required',
        ]);

        $product = Product::find($request->product_id);

        if($request->quantity > $product->stock)
        {
            return back()->with('warning','Quantity is out of stock');
        }

        if (Carbon::parse($product->expiry_date)->lt(Carbon::now()) ){

            return back()->with('warning','Expiry Date is Over for this Product');
        }

        $cart = session()->has('cart') ? session()->get('cart') : [];

        if(array_key_exists($product->id,$cart))
        {
            return back()->with('warning','You Have Already Selected This');
        }
        else
        {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'total_price' => $request->quantity * $product->price,
            ];
        }

        session(['cart'=>$cart]);

        return redirect()->route('admin.sales')->with('success','Product Added Successfully');
    }

    public function cartClear(Request $request)
    {
        session(['cart'=>[]]);

        return back();
    }

    public function cartRemove(Request $request)
    {
        $this->validate($request,[
            'id' => 'required'
        ]);

        $cart = session()->has('cart') ? session()->get('cart') : [];

        unset($cart[$request->id]);

        session(['cart'=>$cart]);

        return back();
    }

    public function cartCheckout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
            'customer_phone' => 'numeric|required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cart = session()->has('cart') ? session()->get('cart') : [];
        $total_products = array_sum(array_column($cart,'quantity'));

        $sale = Sale::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'total_products' => $total_products,
            'sub_total' => $request->sub_total,
            'discount' => $request->discount,
            'grand_total' => $request->grand_total,
        ]);

        foreach($cart as $key => $product)
        {
            SaleProduct::create([
                'sale_id' => $sale->id,
                'product_id' => $key,
                'name' => $product['name'],
                'price' => $product['price']
            ]);

            $product1 = Product::find($key);
            Product::where('id',$key)->update([
                'stock' => $product1->stock - $product['quantity']
            ]);
        }

        Session(['cart'=>[]]);

        return back()->with('success','You Have Ordered Successfully');
    }
}
