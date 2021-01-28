<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $data = [
            'categories' => Category::all(),
        ];
        return view('admin.categories.index', $data);
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
            'user_mistake' => false
        ];
        return view('admin.categories.create', $data);
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
        //
        $data = $request->all();
        // dd($data);
        $category_add = new Category;

        $slug = Str::slug($data['name']);
        $data['slug'] = $slug;
        // dd($data);
        $category_add->fill($data);

        if (Category::where('slug', $slug)->first()) {
            // code...
            $data = [
                'user_mistake' => true
            ];
            return view('admin.categories.create', $data);
        }else {
            // code...
            $category_add->save();
            //bottone1
            if ($data['submit'] == 'index_view') {
                return redirect()->route('admin.categories.index')->withSuccess('Store ha funzionato con successo per la categoria con ID: '.$category_add->id);
                //bottone2
            }else if ($data['submit'] == 'create_view') {
                return redirect()->route('admin.categories.create')->withSuccess('Store ha funzionato con successo per la categoria con ID: '.$category_add->id);
            }else{
                abort(404);
            }
        }
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
    public function edit(Category $category)
    {

        if($category) {
            $data = [
                'category' => $category,
                'user_mistake' => false
            ];
            return view('admin.categories.edit', $data);
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
    public function update(Request $request, Category $category)
    {
        //
        //
        $data = $request->all();
        //dd($data);
        $slug = Str::slug($data['name']);
        $data['slug'] = $slug;

        //controllo se cè da modificare lo slug
        if( Category::where('slug', $slug)->first()) {

            $data = [
                'category' => $category,
                'user_mistake' => true
            ];
            return view('admin.categories.edit', $data);

        }

        $category->update($data);
        return redirect()->route('admin.categories.index')->withSuccess('Update ha funzionato con successo per la categoria con ID: '.$category->id);
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
