<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',array('posts' => $posts ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Requests\MiechuBlogPostRequest $request)
    {
        // walidacja odbywa sie juz na poziomie klasy request ktora w razie nie powodzenia dokona redirect i stworzy error
        // messages, akacja controllera nie zostanie nawet wykonana

        // $input = $request->all();

        Post::create(array(
            'name' => $request->input('name'),
        ));

        return Redirect::route('posts.index')->with('message','post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = post::find($id);
        return view('posts.show',array('post' => $post ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        return view('posts.edit',array('post' => $post ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  Illuminate\Http\Request  $request
     * @return Response
     */
    public function update($id, Requests\MiechuBlogPostRequest $request)
    {
        $post = post::find($id);

        $post->name = $request->input('name');

        $post->update();

        return Redirect::route('posts.index')->with('message','post updated    ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        $post->delete();

        return Redirect::route('posts.index')->with('message','post deleted');
    }
}
