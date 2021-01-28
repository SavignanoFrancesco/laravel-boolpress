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
        return view('admin.categories.create');
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
        // dd($data);
        $category_add = new Category;
        $category_add->fill($data);

        //genero lo slug e faccio in modo che sia univoco
        $slug = Str::slug($data['name']);
        $slug_prefix = $slug;

        $slug_exists = Category::where('slug', $slug)->first();
        $counter = 1;

        while($slug_exists) {
            $slug = $slug_prefix.'-'.$counter;
            $counter++;
            $slug_exists = Category::where('slug', $slug)->first();
        }

        $category_add->slug = $slug;

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
