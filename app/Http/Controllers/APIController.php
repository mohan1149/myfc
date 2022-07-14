<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class APIController extends Controller
{
    public function login(Request $request){
        try {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $reponse = [
                    'status' => true,
                    'user' => $user,
                ];
            }else{
                $reponse = [
                    'status' => false,
                    'error' => 'invalid_credentials',
                ];
            }
            return response()->json($reponse, 200);
        } catch(\Exception $e){
            $error = [
                'status'=> false,
                'error' => $e->getMessage(),
            ];
            return response()->json($error, 200);
        }
    }
    public function register(Request $request){
        try {
            $user = new User();
            $user->name = strip_tags($request['name']);
            $user->email = strip_tags($request['email']);
            $user->phone = strip_tags($request['phone']);
            $user->password = Hash::make($request['password']);
            $user->role = 0;
            $user->save();
            $reponse = [
                'status' => true,
            ];
            return response()->json($reponse, 200);
        } catch (\Exception $e) {
            $error = [
                'status'=> false,
                'error' => $e->getMessage(),
            ];
            return response()->json($error, 200);
        }
    }

    // Get All Brands
    public function getAllBrands(){
	    try
        {		
            $brands = DB::table('brands')           
            ->orderBy('created_at', 'desc')                
            ->get();

		    $response = [
			    'code'=>200,
			    'status'=>'success',
			    'data'=>$brands,

                ];
		    return response()->json($response,200);
        } catch (\Exception $e) {
            $response = [
                'code'=>500,
                'message'=>$e->getMessage(),
                'status'=>'failed'
            ];
            return response()->json($response,200);
        }
    }

        // Get All Product Categories
        public function getAllCategories()
        {
            try
            {
                                
                $proCat = DB::table('categories')           
                ->orderBy('created_at', 'desc')                
                ->get();

                $response = [
                    'code'=>200,
                    'status'=>'success',
                    'data'=>$proCat,
    
                    ];
                return response()->json($response,200);
            } catch (\Exception $e) {
                $response = [
                    'code'=>500,
                    'message'=>$e->getMessage(),
                    'status'=>'failed'
                ];
                return response()->json($response,200);
            }
        }   


                // Get All Product Categories
        public function getProdcuts()
        {
            try
            {     
                $prodcuts = DB::table('products AS pt')
                ->Join('categories As ct', 'pt.category', '=', 'ct.id')                    
                ->Join('brands As br', 'pt.brand', '=', 'br.id')                        
                ->select('pt.id as id','pt.uid','pt.avatar','pt.images','pt.name','pt.description','pt.stock','pt.brand as brandId','br.name as brandName','pt.category as catgoryId','ct.name as CategoryName','pt.price','pt.color', 'pt.size','pt.show','pt.created_at')
                ->orderBy('created_at', 'desc')     
                ->take(10)    // top 10                          
                ->get();

                $response = [
                    'code'=>200,
                    'status'=>'success',
                    'data'=>$prodcuts,
    
                    ];
                return response()->json($response,200);
            } catch (\Exception $e) {
                $response = [
                    'code'=>500,
                    'message'=>$e->getMessage(),
                    'status'=>'failed'
                ];
                return response()->json($response,200);
            }
        }        
        
        
        //Get Products by Vendor ID
        public function getProductsByVenodrID(Request $request)
        {
            try
            {
                $response = [];
                $vendorID = $request['uid'];              

                $prod = DB::table('products AS pt')
                ->Join('categories As ct', 'pt.category', '=', 'ct.id')                    
                ->Join('brands As br', 'pt.brand', '=', 'br.id')
                ->select('pt.id as id','pt.uid','pt.avatar','pt.images','pt.name','pt.description','pt.stock','pt.brand as brandId','br.name as brandName','pt.category as catgoryId','ct.name as CategoryName','pt.price','pt.color', 'pt.size','pt.show','pt.created_at')
                ->where('pt.uid', $vendorID)
                ->get();

                $response = [
                    'code'=>200,
                    'status'=>'success',
                    'data'=>$prod,
                ];
                return response()->json($response,200);
            }
            catch (\Exception $e) 
            {
                $response = [
                    'code'=>500,
                    'message'=>$e->getMessage(),
                    'status'=>'failed'
                ];
                return response()->json($response,200);
            }
        }
       

}