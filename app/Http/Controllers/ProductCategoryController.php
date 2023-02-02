<?php

namespace App\Http\Controllers;
use App\Models\Product_category;
use Illuminate\support\Facades\Validator;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function insert(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            
            'product_category' => 'required',
           
            
            
        ]);
        if ($validator->fails()) {
            return ['code' => 401, 'message' => 'invalid credentials '];
        }
        $insert = Product_category::create([
           
            'product_category' => $request->product_category,
           
        ]);
        if ($insert) {
            return [
                'code' => 200,
                'message' => 'inserted successfully ',
            ];
        } else {
            return ['code' => 401, 'message' => 'something went wrong'];
        }
    }

}
