<?php

namespace Celebi\Commands\Controllers;

use App\Http\Controllers\Controller;
use Celebi\Commands\Models\Blog;
use Celebi\Commands\Requests\BlogRequest;

class BlogController extends Controller
{
    private $except = ["_token", "_method"];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $blogs = Blog::get();
        return view("admin.blog.index",compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');
        
        return view("admin.blog.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $this->authorize('create');

        Blog::create($request->except( $this->except ));

        return back()->with("message","Blog Başarıyla Eklendi")->with("type","success");
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
        $this->authorize('update');

        $blog = Blog::find($id);

        return view("admin.blog.edit",compact("blog"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $this->authorize('update');

        Blog::findOrFail($id)->update($request->except( $this->except ));

        return back()->with("message","Blog Başarıyla Güncellendi")->with("type","success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete');        

        Blog::findOrFail($id)->delete();
        return back()->with("message","Blog başarıyla silindi")->with("type","success");
    }
}