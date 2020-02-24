<?php

namespace App\Http\Controllers;

use App\Messages;
use App\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function user_list()
    {

        $users = User::latest()->where('id','!=',auth()->user()->id)->get();
        if (\Request::ajax()){
            return response()->json($users,200);
        }
        return abort(404);


    }


    public function user_message($id=null)
    {
            $user = User::findOrFail($id);
            $messages = Messages::where(function ($q) use($id){
                $q->where('from',auth()->user()->id);
                $q->where('to',$id);
            })->orWhere(function($q) use ($id){
                    $q->where('from',$id);
                    $q->where('to',auth()->user()->id);
            })->with('user')->get();

            return response()->json([
                    'messages' => $messages,
                    'user'=> $user,
            ]
            );

//        return abort(404);
    }



    public function send_message(Request $request)
    {
       return $request->all();
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
