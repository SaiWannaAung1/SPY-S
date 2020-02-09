<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoriesRequest;
use App\MainCategories;
use App\SubCategories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($main_id,$main_CatName)
    {

        $id = 1;
        $sub_cats =DB::table('sub_categories')
            ->where('main_category_id', '=', $main_id)
            ->get();;

        return view('admin.subcategory',compact('sub_cats','id','main_CatName','main_id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoriesRequest $request)
    {
//        dd($request->input('mCat_id'));
        $slug = uniqid();
        SubCategories::create([
            'name'=>$request->get('subCat_name'),
            'main_category_id'=>$request->get('mCat_id'),
            'slug' => $slug
        ]);
        return redirect('/admin/main_category')->with('status','Sub Category is successfully created' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoriesRequest $request)
    {
        $main_id =   $request->input('main_id');
        $main_CatName =   $request->input('main_CatName');
        $current_timestamp = Carbon::now()->timestamp;
        $slug =   $request->input('sCat_slug');
        $s_cat = SubCategories::whereSlug($slug)->first();
        $s_cat->name =$request->input('sCat_name');
        $s_cat->updated_at = $current_timestamp;
        $s_cat->save();
        return redirect('/admin/'.$main_id.'/'.$main_CatName.'/sub_category') ->with('status','The Sub Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($main_id,$main_CatName,$slug)
    {

        $sub_cat= SubCategories::whereSlug($slug)->first();
        $sub_cat->delete();
        return redirect("/admin/{{$main_id}}/{{$main_CatName}}/sub_category")->with('status', 'The Sub Category '.$slug.' has been deleted!');
    }
}
