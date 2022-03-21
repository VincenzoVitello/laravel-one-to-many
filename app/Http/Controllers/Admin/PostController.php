<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all(); 
        return view('admin.posts.index', compact('posts')); //pagina in cui verranno mostrati tutti i post
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required|min:1|max:50',
            "content" => 'required',
        ]);

        $data = $request->all();
        
            // $tempSlug = Str::slug($data['title'],'-');
            // $cont = 1;
            // while (Post::where('slug', $tempSlug)->first()){
            //     $tempSlug = Str::slug($data['title'],'-')."-".$cont;
            //     $cont++;
            // }

            // $data['slug'] = $tempSlug;

        $newPost = new Post();
        $newPost->fill($data);
        $newPost->save();


        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => 'required|min:1|max:50',
            "content" => 'required',
        ]);


        $data = $request->all();

        // $tempSlug = Str::slug($data['title'],'-');
        // $cont = 1;
        // while (Post::where('slug', $tempSlug)->where('id','!=', $post->id)->first()){
        //     $tempSlug = Str::slug($data['title'],'-')."-".$cont;
        //     $cont++;
        // }
        // $data['slug'] = $tempSlug;

        $post->fill($data);
        $post->save();


        return redirect()->route('admin.posts.index', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
