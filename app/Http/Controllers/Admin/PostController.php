<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//riferimento al model Post
use App\Post;
use App\Category;
use App\Tag;
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
        //
        $data = [
            'posts' => Post::all(),
        ];
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ];
        return view('admin.posts.create', $data);
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
        $data = $request->all();
        // dd($data);
        $post_add = new Post;
        $post_add->fill($data);

        //genero lo slug e faccio in modo che sia univoco
        $slug = Str::slug($data['title']);
        $slug_prefix = $slug;

        $slug_exists = Post::where('slug', $slug)->first();
        $counter = 1;

        while($slug_exists) {
            $slug = $slug_prefix.'-'.$counter;
            $counter++;
            $slug_exists = Post::where('slug', $slug)->first();
        }

        $post_add->slug = $slug;

        $post_add->save();

        if (array_key_exists("tags",$data)) {
            // code...
            $post_add->tags()->sync($data['tags']);
        }else{
            $post_add->tags()->sync([]);
        }

        //bottone1
        if ($data['submit'] == 'index_view') {
            return redirect()->route('admin.posts.index')->withSuccess('Store ha funzionato con successo per il post con ID: '.$post_add->id);
        //bottone2
        }else if ($data['submit'] == 'create_view') {
            return redirect()->route('admin.posts.create')->withSuccess('Store ha funzionato con successo per il post con ID: '.$post_add->id);
        }else{
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //

        if($post) {
            return view('admin.posts.show', ['post' => $post]);
        }
       abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        if($post) {
            $data = [
                'post' => $post,
                'categories' => Category::all(),
                'tags' => Tag::all()
            ];
            return view('admin.posts.edit', $data);
        }

        abort(404);

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
        //
        $data = $request->all();
        //dd($data);


        //controllo se cè da modificare lo slug
        if(Str::slug($data['title']) != $post->slug) {

            //generazione slug univoco
            $slug = Str::slug($data['title']);
            $slug_prefix = $slug;
            $post_exists = Post::where('slug', $slug)->first();
            $counter = 1;

            while($post_exists) {
                $slug = $slug_prefix.'-'.$counter;
                $counter++;
                $post_exists = Post::where('slug', $slug)->first();
                // dd($slug);
            }
            $data['slug'] = $slug;

        }

        $post->update($data);


        if (array_key_exists("tags",$data)) {
            // code...
            $post->tags()->sync($data['tags']);
        }else{
            $post->tags()->sync([]);
        }

        return redirect()->route('admin.posts.index')->withSuccess('Update ha funzionato con successo per il post con ID: '.$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post_ID = $post->id;
        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('admin.posts.index')->withSuccess('Destroy ha funzionato con successo per il post con ID: '.$post_ID);
    }
}
