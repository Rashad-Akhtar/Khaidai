<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;
use App\Admin;
use App\Category;
use App\Product;
use App\Sale;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
       $total_categories = count(Category::all());
       $total_products = count(Product::all());
       $total_sale = DB::table('sales')->sum('grand_total');
       return view('admin.profile.dashboard',compact('total_categories','total_products','total_sale'));
    }

    public function changePasswordForm()
    {
        return view('admin.profile.changepassword');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required',
            'new_password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return  back()->withErrors($validator)->withInput();
        }

        $admin = Auth::guard('admin')->user();

        $current_password = $request->current_password;
        $new_password = $request->new_password;
        $new_password_confirmation = $request->new_password_confirmation;

       if((Hash::check($current_password , $admin->password)) && ($new_password == $new_password_confirmation) )
       {
          $user = Admin::find(Auth::guard('admin')->user()->id);
          $user->password = Hash::make($new_password);
          $user->save();
          return back()->with('success','Password has been updated');
       }
       else
       {
           return back()->with('warning','Wrong Information');
       }
    }
}
