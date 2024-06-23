<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories_deleted = Category::withoutTrashed()->where('id','')->restore();
        // dd($categories_deleted);
        $categories = Category::all();        
        return view('admin.admin-course-category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     try{
        $request->validate([
            'name' => 'required|unique:categories',
            'description' =>'required|unique:categories'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;

        if($request->category_id != null)
            $category->category_id = $request->category_id;
        else
            $category->category_id = 0;

        if($request->has('view'))            
            $category->view = 1;
        else
            $category->view = 0;

        $category->view_count = 0;
        $category->save();
        return redirect()->back()->with('message','Category Saved successfully!!');
    }
    catch(Exception $e){
        return redirect()->back()->with('message',$e->getMessage());
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        try{
            $courses = Course::where('category_id',$category->id)->get();        
            return view('admin.admin-course-category-single',compact('courses','category'));
        }
        catch(Exception $e){
            return redirect()->back()->with('message',$e->getMessage());
       }
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
    public function update(Request $request, $id)
    {
        dd($id);
        $cat = Category::findOrFail($id);
        $cat->name = $request->name;
        $cat->category_id->$request->category_id;
        if(isset($request->view))
        {
            $cat->view = 1;
        }
        else{
            $cat->view = 0;
        }

        $cat->description = $request->description;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Category $category)
    {
        if(Category::where('category_id',$category->id)->count() > 0){
            foreach(Category::where('category_id',$category->id)->get() as $cat)
            {
                $cat->delete();
            }
        }
        $category->delete();
        return redirect()->back()->with('message','Category Deleted Successfully!!');
    }
    
    public function upgrade(Category $category)
    {
      try{
        if($category->view == 1){
            if(Category::where('category_id',$category->id)->count() > 0){
                foreach(Category::where('category_id',$category->id)->get() as $cat)
                {
                    $cat->view = 0;
                    $cat->save();
                }
            }
            $category->view =0;
        }
        else{
            if(Category::where('category_id',$category->id)->count() > 0){
                foreach(Category::where('category_id',$category->id)->get() as $cat)
                {
                    $cat->view = 1;
                    $cat->save();
                }
            }
            $category->view = 1;
        }
        $category->save();
        return redirect()->back()->with('message','Category Upgrade Successfully!!');
      }
      catch (\Throwable $e)
      {
        return redirect()->back()->with('message',$e->getMessage());
      }
    }

    public function modif(Request $request, $id)
    {
        dd($request->all());
        $cat = Category::findOrFail($id);
        $cat->name = $request->name;
        $cat->description = $request->description;
        if(isset($request->description))
        {
            $cat->category_id = $request->category_id;
        }
        if(isset($request->view))
        {
            $cat->view = 1;
        }
        else{
            $cat->view = 0;
        }
        $cat->save();
        return redirect()->back()->with('message','Category Updated !!');
    }

    public function catDelete($id)
    {
        $cat = Category::findOrFail($id);
        $cat->delete();
        return redirect()->back()->with('message','SubCat deleted Successfully!');
    }
}
