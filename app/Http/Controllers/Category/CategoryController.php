<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Category as category;
use Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=category::get_all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
             $data=$request->all();
      if($request->file('img')!= null){

            $path;
            if(request()->file('img')->isValid()){
                $path = $request->file('img')->storeAs('public', time().'.jpg');
                $img_name=str_replace('public/', '', $path);
                if(empty($path)){
                    return response()->json([],400);
                }

            }
        category::category_insert($data['name'],$data['description'],$img_name);
         return redirect('/admin/categories/index');
    }
    return Redirect::back()->withErrors('The image input must not be empty');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category,$id)
    {
        $id=$request['id'];
        $category=category::get($id);
        return view('admin.category.show',compact('$category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        $category=Category::get($id);
        return view('admin.category.update',compact('category'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $id=$request['id'];
             $data=$request->all();
             if($request->file('img')!= null){

            $path;
            if(request()->file('img')->isValid()){
                $path = $request->file('img')->storeAs('public', time().'.jpg');
                $img_name=str_replace('public/', '', $path);
                if(empty($path)){
                    return response()->json([],400);
                }

            }


        category::category_update($id,$data['name'],$img_name);
    }
    else
    {
        $category=Category::get($id);

        category::category_update($id,$data['name'],$category->image);
    }

         return redirect('/admin/categories/index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function delete(Request $request)
    {
        $id=$request['id'];
        Category::category_delete($id);
        return redirect('/admin/categories/index');
    }
}
