<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Redirect;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',array('categories' => $categories ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Requests\MiechuBlogCategoryRequest $request)
    {
        // walidacja odbywa sie juz na poziomie klasy request ktora w razie nie powodzenia dokona redirect i stworzy error
        // messages, akacja controllera nie zostanie nawet wykonana

       // $input = $request->all();

        Category::create(array(
            'name' => $request->input('name'),
        ));

        return Redirect::route('categories.index')->with('message','category created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show',array('category' => $category ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit',array('category' => $category ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  Illuminate\Http\Request  $request
     * @return Response
     */
    public function update($id, Requests\MiechuBlogCategoryRequest $request)
    {
        $category = Category::find($id);

        $category->name = $request->input('name');

        $category->update();

        return Redirect::route('categories.index')->with('message','category updated    ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return Redirect::route('categories.index')->with('message','category deleted');
    }
}
