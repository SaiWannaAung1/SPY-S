<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Suppliers;
use \Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;


    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {

        $slug = uniqid();
        if ($data['shopName']==null){
            $user = "customer";
            $file = $data['image'];
            $filename = uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/uploads/',$filename);

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'slug' => $slug,
                'address' => $data['address'],
                'gender' => trim($data['gender']),
                'role' => $user,
                'shop_name' => $data['shopName'],
                'image' => $filename,

                'password' => Hash::make( $data['password'])

            ]);
        }
        else{
            $user = "supplier";
            $file = $data['image'];
            $filename = uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/uploads/',$filename);

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'slug' => $slug,
                'address' => $data['address'],
                'gender' => "shop",
                'role' => $user,
                'shop_name' => $data['shopName'],
                'image' => $filename,

                'password' => Hash::make( $data['password'])
            ]);
        }


    }





}
