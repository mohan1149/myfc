<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function vendors()
    {
        try {
            $users = User::where('role',1)->get();
            return view('vendors.index',['users'=>$users]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function createVendor()
    {
        try {
            return view('vendors.create');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function storeVendor(Request $request)
    {
        try {
            $user = new User();
            $avatar = $request->file('avatar');
            $image_name  = uniqid().'.'.$avatar->getClientOriginalExtension();
            $destination = 'storage/avatars';
            $avatar->move($destination, $image_name );
            $url = $request->getSchemeAndHttpHost().'/storage/avatars/'.$image_name;
            $user->name = strip_tags($request['username']);
            $user->email = strip_tags($request['email']);
            $user->phone = strip_tags($request['phone']);
            $user->password = Hash::make($request['password']);
            $user->avatar = $url;
            $user->role = 1;
            $user->save();
            return redirect('/vendors');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function editVendor()
    {
        try {
            return view('vendors.edit');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function updateVendor()
    {
        try {
            return redirect('/vendors');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function deleteVendor()
    {
        try {
            return redirect('/vendors');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    
}
