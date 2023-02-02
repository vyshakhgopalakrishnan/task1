<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\Variant;
use App\Models\product_category;
use Illuminate\support\Facades\Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function insert(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'product_name' => 'required',
            'product_category' => 'required',
            'poduct_MRP' => 'required',
            'poduct_selling_price' => 'required',
            'variants' => 'required',
            
            
        ]);
        if ($validator->fails()) {
            return ['code' => 401, 'message' => 'invalid credentials '];
        }
        $insert = product::create([
            'product_name' => $request->product_name,
            'poduct_selling_price' => $request->poduct_selling_price,
            'product_category' => $request->product_category,
            'poduct_MRP' => $request->poduct_MRP,
            'variants' => $request->variants,
            'description' => $request->description,
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
    public function select() {
       $s=product::get();
       
       
       
        

        foreach ( $s as $key=>$value ) {
            $p[ 'product_name' ] = $value->product_name;
           $b =product_category::where( 'product_categories.id', '=', $value->product_category )
          
            ->pluck('product_category');
            $p[ 'product_category' ]=$b;
            $p[ 'poduct_MRP' ] = $value->poduct_MRP;
            $p[ 'poduct_selling_price' ] = $value->poduct_selling_price;
            $f =Variant::where( 'variants.id', '=', $value->variants )
          
            ->get(['size','color','price','image']);
            $p[ 'variants' ]=$f;

            $p[ 'description' ] =$value->description;
           
           
        }
        return $p;
}
}