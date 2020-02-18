<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use \Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;


    protected $redirectTo = RouteServiceProvider::HOME;


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
        $file = $data['image'];

        $filename = uniqid().'_'.$file->getClientOriginalName();
        $file->move(public_path().'/uploads/',$filename);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'slug' => $slug,
            'image' => $filename,
            'gender' => $data['gender'],
            'address' => $data['address'],
            'password' => Hash::make( $data['password'])
        ]);
        return redirect('/supplier/create_product')->with('status','Product is successfully created');

    }
}
