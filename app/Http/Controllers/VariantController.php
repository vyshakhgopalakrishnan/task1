<?php

namespace App\Http\Controllers;
use App\Models\Variant;
use Illuminate\support\Facades\Validator;
use Illuminate\Http\Request;

class VariantController extends Controller
{
   
    public function insert(Request $request)
    { 
        $validator = Validator::make(request()->all(), [
            
            'size' => 'required',
            'color' => 'required',
            'price' => 'required',
           
            'image' => 'required',
            
            
        ]);
        $img = $this->imageUpload($request);
        if ($validator->fails()) {
            return ['code' => 401, 'message' => 'invalid credentials '];
        }
        $insert = Variant::create([
           
            'size' => $request->size,
            'color' => $request->color,
            'price' => $request->price,
            'image' => json_encode( $img ) ,
           
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
    public function imageUpload( Request $request )
    {        $image = $request->image; 
           $imageName = time() . $image->getClientOriginalName();
           $image->move( public_path( 'image' ), $imageName );
           return 'image/' . $imageName;
       }
}
