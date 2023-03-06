<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



class productController extends Controller {

    public function index() {
        $products = Product::all();
        if ($products->count() > 0) {
            return response()->json([
                'status' => 200,
                'products' =>  $products
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No products found'
            ], 404);
        }
    }
    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:5|max:70',
            'category' => 'required|min:5|max:70',
            'replacement' => 'required|min:5|max:70',
            'vendor_id' => 'required|min:1|max:24',
            //'photo' => 'image|mimes:jpeg,jpg,png,gif',
        ]);
        if (request()->hasFile('photo')) {
            $photoName = 'product_' . time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('uploads/images'), $photoName);
        }
        if ($validate->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validate->messages()
            ], 422);
        } else {
            $product = Product::create([
                'name' => $request->name,
                'category' => $request->category,
                'replacement' => $request->replacement,
                'vendor_id' => $request->vendor_id,
                'photo' => $photoName
            ]);
            if ($product) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Product created successfully',
                    'product' => $product
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Somthing went wrong',
                ], 500);
            }
        }
    }
    public function show($id) {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'status' => 200,
                'product' => $product
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No product found'
            ], 404);
        }
    }
    public function edit($id) {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'status' => 200,
                'product' => $product
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No product found'
            ], 404);
        }
    }
    public function update(Request $request, $id) {
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:5|max:70',
            'category' => 'required|min:5|max:70',
            'replacement' => 'required|min:5|max:70',
            'vendor_id' => 'required|min:1|max:24',
            //'photo' => 'image|mimes:jpeg,jpg,png,gif',
        ]);
        if (request()->hasFile('photo')) {
            $photoName = 'product_' . time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('uploads/images'), $photoName);
        }
        if ($validate->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validate->messages()
            ], 422);
        } else {
            $product = Product::find($id);
            if ($product) {
                $product = Product::create([
                    'name' => $request->name,
                    'category' => $request->category,
                    'replacement' => $request->replacement,
                    'vendor_id' => $request->vendor_id,
                    'photo' => $photoName
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Product updated successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No product found',
                ], 404);
            }
        }
    }
    public function destroy($id) {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No product found'
            ], 404);
        }
    }
}
