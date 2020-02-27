<?php

namespace App\Http\Controllers;

use App\User;

class UsersManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_user()
    {
        $id = 1;
    $users = User::all();
    return view('admin.manage_user',compact('users','id'));

    }

    public function update_user($slug,$status)
    {
        $id = 1;
        $users = User::all();
if ($status =='active'){
    $user = User::whereSlug($slug)->first();
    $user->status = "unactivated";
    $user->save();
    return redirect('admin/user_management')->with(compact('users','id'),'status','The User has been ben');
}else{
    $user = User::whereSlug($slug)->first();
    $user->status = "active";
    $user->save();
    return redirect('admin/user_management')->with(compact('users','id'),'status','The User has been activate');
}
    }


}
