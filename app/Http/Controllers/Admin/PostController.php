<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $curr_page = isset($request->page) ? $request->page : 1;
        $posts = Post::get()->all();
        $total = count($posts);
        $limit = 10;
        $offset = ($curr_page - 1) * $limit;
        $paginate = new LengthAwarePaginator($posts, $total, $limit);
        $posts = array_slice($posts, $offset, $limit);
        // $paginate->withPath('/CRUD/public/user');
        // return view('users.index', compact('users', 'paginate'));

        return view('Admin.Post.index', compact('posts', 'paginate'));


        
        
        //    $posts = DB::table('posts')
        //     ->join('categories', 'posts.category_id', '=', 'categories.id')
        //     ->join('users', 'posts.user_id', '=', 'users.id')->get();
        
        // $posts = DB::table('posts')->find(3);

        // return view('Admin.Post.index', compact('posts'));

//  paginate
        // $data = [];
        // $posts = Post::paginate(10)->withQueryString(); // withQueryString để add thêm tất cả các query string trên URL hiện tại vào trong paginate

        // $posts->appends(['sort' => 'votes']); //có thể sử dụng phương thức appends để add thêm query string vào URL.
        // $data['posts'] =  $posts;
        // return view('Admin.Post.index', compact('posts'));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}