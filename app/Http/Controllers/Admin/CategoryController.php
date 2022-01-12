<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PDOException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category = Category::find(8);
        // return $category;
        // $category = Category::get();
        // $category->deleted_at = Carbon::now('Asia/Ho_Chi_Minh');
        // $category->save();
        //  $category->deleted_at->getTimestamp();


        // $category =  new Category();
        // $category->category_name = 'day';
        // $category->parent_id = 1;
        // $category->user_id = 4;
        // $category->save();
        // return $category;    
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
    public function store(Request $request)
    {
        $filename = $request->file('thumbnail')->hashName();
        $path = Storage::putFileAs('public/thumbnail', $request->file('thumbnail'), $filename);
        $categoryInsert = [
            'name' => $request->category_name,
            'thumbnail' => $filename,
            'paren_id' => $request->paren_id,

        ];

        DB::beginTransaction();

        try {
            Category::create($categoryInsert);


            // insert into data to table category (successful)
            DB::commit();
            return redirect()->route('category.index')->withFlashSuccess('Insert into data category success');
        } catch (PDOException $ex) {
            // insert into data to table category (fail)
            DB::rollBack();
            Log::error($ex->getMessage());
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}