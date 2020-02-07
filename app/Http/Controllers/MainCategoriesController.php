<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainCategoriesRequest;
use App\MainCategories;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainCategoriesController extends Controller
{
    public function index()
    {
        $id = 1;
        $m_cats =MainCategories::all();
        return view('admin.create_category',compact('m_cats','id'));

    }



    public function store(MainCategoriesRequest $request)
    {
        $slug = uniqid();
        MainCategories::create([
            'name'=>$request->get('mCat_name'),
            'slug' => $slug
        ]);
        return redirect('/admin/main_category')->with('status','Main Category is successfully created' );
    }


    public function show(MainCategories $mainCategories)
    {
        //
    }


    public function edit()
    {

    }


    public function update(Request $request)
    {
        $current_timestamp = Carbon::now()->timestamp;
        $slug =   $request->input('mCat_slug');
        $m_cat = MainCategories::whereSlug($slug)->first();
        $m_cat->name =$request->input('mCat_name');
        $m_cat->updated_at = $current_timestamp;
        $m_cat->save();
        return redirect(action('MainCategoriesController@index')) ->with('status','The Main Category has been updated');
    }

    public function destroy($slug)
    {
        $mCat = MainCategories::whereSlug($slug)->first();
        $mCat->delete();
        return redirect('/admin/main_category')->with('status', 'The Main Category '.$slug.' has been deleted!');
    }


}
