<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.components.articles.articles', [
            'title'     => "Articles | Dashboard",
            'article'   => Article::with(['category', 'user'])
                ->latest()
                ->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.components.articles.create', [
            'title'         => "Buat Artikel Baru",
            'category'      => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul'         => 'required|unique:articles,judul',
            'body'          => 'required|max:100',
            'user_id'       => 'required',
            'category_id'   => 'required',
            'image'         => 'image|file|max:8192'
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('article-images');
        }

        Article::create($validatedData);

        return redirect('/dashboard/articles')->with('articleSuccess', 'Artikel Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        // ddd($article);
        return view('backend.components.articles.edit', [
            'title'     => "Edit Article",
            'article'   => $article,
            'category'  => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // ddd($request);
        $validatedData = [
            'body'          => 'required',
            'user_id'       => 'required',
            'category_id'   => 'required',
            'image'         => 'image|file|max:8192'
        ];

        if ($request['judul'] != $article->judul) {
            $rules['judul'] = 'required|max:50|unique:articles,judul';
        }

        $validateData = $request->validate($validatedData);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('article-images');
        }

        Article::whereRaw('id = ?', [$article->id])
            ->update($validateData);

        return redirect('/dashboard/articles')->with('success', 'Data Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::delete($article->image);
        }
        Article::destroy($article->id);

        return back()->with('success', 'Berhasil Menghapus Data!');
    }

    public function truncate()
    {
        Article::truncate();

        return back()->with('success', 'Artikel Berhasil Dikosongkan');
    }
}
