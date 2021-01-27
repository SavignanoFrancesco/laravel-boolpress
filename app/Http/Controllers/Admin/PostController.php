<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//riferimento al model Post
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
        //
        $data = [
            'posts' => Post::all()
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
        //
        $data = $request->all();
        // dd($data);
        $post_add = new Post;
        $post_add->fill($data);

        //genero lo slug e faccio in modo che sia univoco
        $slug = Str::slug($post_add->title);
        $slug_prefix = $slug;

        $post_exists = Post::where('slug', $slug)->first();
        $counter = 1;

        while($post_exists) {
            $slug = $slug_prefix . '-' . $counter;
            $counter++;
            $post_exists = Post::where('slug', $slug)->first();
        }

        $post_add->slug = $slug;

        $post_add->save();
        //bottone1
        if ($data['submit'] == 'index_view') {
            return redirect()->route('admin.posts.index')->withSuccess('Store ha funzionato con successo per il post con slug: '.$post_add->slug);
        //bottone2
        }else if ($data['submit'] == 'create_view') {
            return redirect()->route('admin.posts.create')->withSuccess('Store ha funzionato con successo per il post con slug: '.$post_add->slug);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
